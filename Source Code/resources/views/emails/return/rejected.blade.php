@component('mail::message')
# Phone Return Application

Dear {{ $return->user->first_name }},

We regret to inform you that your product return application has been rejected.

@component('mail::panel')

@endcomponent

{{-- You can view the full inspection report [here]({{ route('inspection_report', ['id' => $inspection->id]) }}). --}}

If you have any questions, please feel free to contact us.

Thank you for shopping with us!

{{ config('app.name') }}
@endcomponent
