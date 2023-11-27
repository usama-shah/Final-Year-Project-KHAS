@component('mail::message')

#Phone Inspection Report
Dear {{ $user->first_name }},

Congratulations,

We are happy to inform you that one of the phones purchased by you in your order no. {{ $purchase->purchase_id }} has been passed during our initial inspection.


Purchase ID: {{ $purchase->purchase_id }}
Product ID: {{ $inspection->phone_id }}
Phone Model: {{ $phone->model }}
Color: {{ $phone->color }}
Inspected at: {{ $inspection->created_at }}
Inspected By: {{ $admin->name }}

@endcomponent
{{-- You can view the full inspection report [here]({{ route('inspection_report', ['id' => $inspection->id]) }}). --}}

If you have any questions, please feel free to contact us.

Thank you for shopping with us!

{{ config('app.name') }}
@endcomponent