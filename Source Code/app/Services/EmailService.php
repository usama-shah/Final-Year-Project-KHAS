<?php
// app/Services/UserService.php
namespace App\Services;
use App\Mail\EmailVerification;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
class EmailService
{
    public function sendEmailVerificationMail($email)
    {

        // Find the user based on the email
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect('/email_verification')->with('error', 'User not found.');
        }

        // Generate a new verification code
        $new_verification_code = rand(10000, 99999);
        $email_verification_token = bin2hex(random_bytes(16));
        session(['email_token' => $email_verification_token]);

        // Update the user's verification code in the database
        $user->update(['verification_code' => $new_verification_code, 'email_verification_token' => $email_verification_token, 'email_sent_timestamp' => date('Y-m-d H:i:s')]);

        // Send the email with the new verification code
        try {
            Mail::to($user->email)->send(new EmailVerification($user, $new_verification_code, $email_verification_token));
            // Email was sent successfully, return success message or perform any other actions
            return redirect('/email_verification')->with('success', 'Email sent successfully.');
        } catch (Message $e) {
            // An error occurred while sending the email
            // You can log the error, display a message, or take other actions as needed
            error_log('Error sending email: ' . $e->getMessage());
            return redirect('/email_verification')->with('error', 'There was an issue sending the email. Please try again and make sure your email address exist.');
        }
    }
}


?>