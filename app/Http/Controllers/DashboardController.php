<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Subscriber;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();  // Fetch products
        return view('dashboard', compact('products'));  // Pass to the view
    }

    public function subscribe(Request $request)
    {
        // Step 1: Validate the email input
        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        // Step 2: Sanitize the email
        $email = filter_var($validatedData['email'], FILTER_SANITIZE_EMAIL);
        // Step 2: Save the email to the subscriber's table
        $email = filter_var($validatedData['email'], FILTER_SANITIZE_EMAIL);
        Subscriber::create(['email' => $email]);

        // Step 3: Send email using PHPMailer
        $mail = new PHPMailer(true); // Enable exceptions

        try {
            // Server settings
            $mail->SMTPDebug = 0; // Disable debug output
            $mail->isSMTP(); // Use SMTP
            $mail->Host = 'smtp.gmail.com'; // SMTP server
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'srikantaich01@gmail.com'; // Replace with your Gmail address
            $mail->Password = 'kaioikluqiwfgjth'; // Replace with your Gmail app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port = 587; // TCP port for TLS

            // Recipients
            $mail->setFrom('srikantaich01@gmail.com', 'Instacart'); // Replace with your email and name
            $mail->addAddress($email); // Recipient's email
            // Optional CC/BCC
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Newsletter Subscription Confirmation';
            $mail->Body = '<b>Thank you for subscribing to our newsletter!</b>';
            $mail->AltBody = 'Thank you for subscribing to our newsletter!';

            // Send email
            $mail->send();
            return redirect()->back()->with('success', 'You have successfully subscribed to our newsletter!');
        } catch (Exception $e) {
            // Catch errors and return a friendly message
            return redirect()->back()->withErrors(['email' => "Email could not be sent. PHPMailer Error: {$mail->ErrorInfo}"]);
        }
    }
}
