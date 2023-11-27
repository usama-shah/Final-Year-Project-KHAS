<?php

namespace App\Http\Controllers\UserControllers\Registration;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
// use App\Mail\EmailVerification;
// use Illuminate\Mail\Message;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Services\EmailService;

class VerifyEmail extends Controller
{

    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function email_verification()
    {
        return view('UserViews.Registration.email_verification')->with('status', 'We have sent a verification code to your email address. Please enter it below to verify your account.');

    }

    public function resendVerificationCode(Request $request)
    {
        // Find the user based on the email stored in the session
        $user = User::where('email_verification_token', session('email_token'))->first();

        if (!$user) {
            return redirect('/email_verification')->with('error', 'User not found.');
        }

        $this->emailService->sendEmailVerificationMail($request->email);

        return redirect()->route('verification.send')->with('status', 'A new verification code has been sent to your email address.');
    }

    public function verifyEmail(Request $request)
    {

        $code = $request->input('code');
        $email_token = null;
        $message = null;
        if (!empty($request->input('token'))) {
            $email_token = $request->input('token');
        } else if (!empty(session('email_token'))) {
            $email_token = session('email_token');
        } else {
            $message = 'This Verification Code/Link Is Expired or Wrong.';
        }

        if ((!$email_token) && ($message == null)) {
            $message = 'This Verification Link Is Expired.';
        }

        $user = User::where('email_verification_token', $email_token)
            ->where('verification_code', $code)
            ->first();

        if ((!$user) && ($message == null)) {
            $message = 'Invalid verification code.';
        } else {

            $emailSentTime = $user->email_sent_timestamp; // Replace this with your actual timestamp
            $currentDateTime = date('Y-m-d H:i:s');
            $emailSentTimestamp = strtotime($emailSentTime);
            $currentTimestamp = strtotime($currentDateTime);

            // Calculate the difference in seconds
            $timeDifference = $currentTimestamp - $emailSentTimestamp;

            // Check if the time difference is more than 1 hour (3600 seconds)
            if (($timeDifference < 3600) && ($message == null)) {
                // Update the user's email_verified_at column and clear the verification_code
                $user->update([
                    'email_verified_at' => now(),
                    'verification_code' => null,
                    'email_verification_token' => null,
                    'last_login' => now(),
                ]);

                // Log the user in
                Auth::login($user);
                session(['email_token' => '']);

                // Redirect to the dashboard
                return redirect('/dashboard')->with('global_status', 'Your email has been verified successfully.');

            }
        }
        return redirect()->route('verification.send')->with('error', $message);

    }

    // public function emailService->sendEmailVerificationMail($email)
    // {

    //     // Find the user based on the email
    //     $user = User::where('email', $email)->first();

    //     if (!$user) {
    //         return redirect('/email_verification')->with('error', 'User not found.');
    //     }

    //     // Generate a new verification code
    //     $new_verification_code = rand(10000, 99999);
    //     $email_verification_token = bin2hex(random_bytes(16));
    //     session(['email_token' => $email_verification_token]);

    //     // Update the user's verification code in the database
    //     $user->update(['verification_code' => $new_verification_code, 'email_verification_token' => $email_verification_token, 'email_sent_timestamp' => date('Y-m-d H:i:s')]);

    //     // Send the email with the new verification code
    //     try {
    //         Mail::to($user->email)->send(new EmailVerification($user, $new_verification_code, $email_verification_token));
    //         // Email was sent successfully, return success message or perform any other actions
    //         return redirect('/email_verification')->with('success', 'Email sent successfully.');
    //     } catch (Message $e) {
    //         // An error occurred while sending the email
    //         // You can log the error, display a message, or take other actions as needed
    //         error_log('Error sending email: ' . $e->getMessage());
    //         return redirect('/email_verification')->with('error', 'There was an issue sending the email. Please try again and make sure your email address exist.');
    //     }
    // }
}
