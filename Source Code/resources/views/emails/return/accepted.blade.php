@component('mail::message')
# Phone Return Application

Dear {{ $return->user->first_name }},

Congratulation,

We are happy to inform you that your product return application has been accepted.


Kindly bring the phone to our nearrest office.

@component('mail::panel')

@endcomponent

{{-- You can view the full inspection report [here]({{ route('inspection_report', ['id' => $inspection->id]) }}). --}}

If you have any questions, please feel free to contact us.

Thank you for shopping with us!

{{ config('app.name') }}
@endcomponent
