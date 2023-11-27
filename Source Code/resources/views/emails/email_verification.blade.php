@component('mail::message')
# Khas - Email Verification

Hello {{ $user->first_name }},

Thank you for registering on our website. Please verify your email address by entering the verification code below:

@component('mail::panel')
{{ $verification_code }}
@endcomponent

Alternatively, you can click the button below to verify your email address.

@component('mail::button', ['url' => url('/verify_email?code='.$verification_code.'&token='.$email_token)])
Verify Email
@endcomponent
This link will expire after 60 minutes.
<br>
If you did not request this verification, please ignore this email.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
