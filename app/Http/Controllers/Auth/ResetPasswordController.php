<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Log; // Correct import for Log
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /**
     * Show the form for sending reset password email.
     */
    public function forgotPassword()
    {
        return view('auth.resetpassword', ['title' => 'Forgot Password']);
    }

    /**
     * Send the reset password email.
     */
    public function sendResetLink(Request $request)
    {
        // Validate the request
        $request->validate(['email' => 'required|email:dns']);

        // Send the reset link to the provided email
        $status = Password::sendResetLink($request->only('email'));

        // Check the status and respond accordingly
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)]) // Show success message
            : back()->withErrors(['email' => __($status)]); // Show error message
    }

    /**
     * Show the form to reset the password.
     */
    public function showResetForm(string $token, Request $request)
    {
        $email = $request->input('email');
        return view('auth.inputpasswordnew', ['token' => $token, 'email' => $email, 'title' => 'Reset Password']);
    }

    /**
     * Handle the reset password process.
     */
    public function resetPassword(Request $request)
{
    // Validate the reset request
    $request->validate([
        'token' => 'required',
        'email' => 'required|email:dns',
        'password' => 'required|min:5|confirmed',
    ]);

    // Log the incoming request data for debugging
    Log::info('Incoming reset password request:', $request->only('token', 'email', 'password', 'password_confirmation'));

    // Attempt to reset the password
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user) use ($request) {
            Log::info('User found for password reset: ' . $user->email);
            $user->forceFill([
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
            ])->save();

            event(new PasswordReset($user));
        }
    );

    // Log the status of the password reset process
    Log::info('Password reset status: ', ['status' => $status]);

    // Respond to the password reset attempt
    return redirect()->route('login')->with('status', __($status));// Redirect on success
   
}
}
