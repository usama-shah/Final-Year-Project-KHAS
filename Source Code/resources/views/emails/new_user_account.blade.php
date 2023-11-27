# Your  {{ config('app.name') }}  Account<br>

Dear {{ $user['name'] }}, <br>

Your user account has been successfully created. You can now log in using the following credentials:

@component('mail::table')
| Email    | Password |
|:---------|:---------|
| {{ $user['email'] }} | {{ $password }} |
@endcomponent
<br>
For security reasons, we recommend that you change your password after logging in.

@component('mail::button', ['url' => url('/login')])
Go to Login Page
@endcomponent

If you have any questions, please feel free to contact us.

Best regards,

Your  {{ config('app.name') }} team
