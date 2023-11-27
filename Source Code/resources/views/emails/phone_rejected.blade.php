@component('mail::message')

#Phone Inspection Report
Dear {{ $user->first_name }},

We regret to inform you that one of the phones purchased by you in your order no. {{ $purchase->purchase_id }} has been rejected during our initial inspection.

<span class="text-success">Your payment has been refunded in your wallet.</span>

Purchase ID: {{ $purchase->purchase_id }}
Product ID: {{ $inspection->phone_id }}
Phone Model: {{ $phone->model }}
Color: {{ $phone->color }}
Inspected at: {{ $inspection->created_at }}
Inspected By: {{ $admin->name }}
#Rejection Reason
The following details of the phone were different from the information provided by the seller in the post:

@component('mail::panel')

<ul>
    <?php
    $inspectionArray = json_decode($inspection, true);
    foreach ($inspectionArray as $key => $value) {
        if ($value === "true") {
            $formattedKey = str_replace('_', ' ', $key);
            echo '<li>' . $formattedKey . '</li>';
        }
    }
    ?>
</ul>
@endcomponent
{{-- You can view the full inspection report [here]({{ route('inspection_report', ['id' => $inspection->id]) }}). --}}

If you have any questions, please feel free to contact us.

Thank you for shopping with us!

{{ config('app.name') }}
@endcomponent