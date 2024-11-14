<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.LoginForm'); // Ensure correct view path
    }

    /**
     * Handle the login process.
     */
    public function login(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Remember Me functionality
        $remember = $request->has('remember');

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'), $remember)) {
            Log::info('User logged in successfully: ' . $request->email);

            return redirect()->intended('/dashboard')->with('success', 'Welcome back!');
        }

        // Log unsuccessful login attempt
        Log::warning('Failed login attempt for email: ' . $request->email);

        // Redirect back with an error message
        return back()->withErrors([
            'login_error' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Show the signup form.
     */
    public function showSignupForm()
    {
        return view('auth.SignUpForm'); // Ensure correct view path
    }

    /**
     * Handle the signup process.
     */
    public function signup(Request $request)
    {
        // Validate the signup inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create the user with hashed password
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Log successful registration
        Log::info('User registered: ' . $request->email);

        // Auto-login the user after registration (optional)
        // Auth::login($user);

        // Redirect to dashboard or login page with a success message
        return redirect()->route('login.form')->with('success', 'Registration successful! You can now log in.');
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request)
    {
        Log::info('User logged out: ' . Auth::user()->email);

        // Logout the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate CSRF token for security
        $request->session()->regenerateToken();

        // Redirect to login page
        return redirect()->route('login.form')->with('info', 'You have been logged out.');
    }
}
