<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('ContactUs');
    }
    public function sendMessage(Request $request)
    {
        // Step 1: Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Step 2: Get form data
        $data = $request->only(['name', 'email', 'subject', 'message']);

        // Step 3: Send email to the customer using PHPMailer
        $mail = new PHPMailer(true); // Enable exceptions

        try {
            // Server settings
            $mail->SMTPDebug = 0; // Disable debug output
            $mail->isSMTP(); // Use SMTP
            $mail->Host = 'smtp.gmail.com'; // SMTP server
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'email'; // Replace with your Gmail address
            $mail->Password = 'password'; // Replace with your Gmail app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port = 587; // TCP port for TLS

            // Recipients
            $mail->setFrom('email', 'name');
            $mail->addAddress($data['email'], $data['name']); // Customer email
            $mail->addAddress('admin@email,com', 'Complaint');//create conversation between admin and client for complaint resolution
             // Admin email address

            // Content settings
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Thank you for your message!';
            // Use HTML to format the body with the form details
            $mail->Body = "
                <h2>Thank you for reaching out to us!</h2>
                <p>Dear {$data['name']},</p>
                <p>We have received your message with the following details:</p>
                <table>
                    <tr>
                        <th>Name:</th>
                        <td>{$data['name']}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{$data['email']}</td>
                    </tr>
                    <tr>
                        <th>Subject:</th>
                        <td>{$data['subject']}</td>
                    </tr>
                    <tr>
                        <th>Message:</th>
                        <td>{$data['message']}</td>
                    </tr>
                </table>
                <p>We will get back to you as soon as possible. Thank you for your patience!</p>
                <p>Best Regards,<br>Instacart Team</p>
            ";
            $mail->AltBody = 'Thank you for reaching out! We have received your message and will get back to you soon.';

            // Send email to customer
            $mail->send();

            // Step 4: Redirect back with a success message
            return redirect()->back()->with('success', 'Your message has been sent successfully!');

        } catch (Exception $e) {
            // Catch errors and return a friendly message
            return redirect()->back()->withErrors(['email' => "Email could not be sent. PHPMailer Error: {$mail->ErrorInfo}"]);
        }
    }
}
