@component('mail::message')
# Phone Inspection Report

Dear {{ $user->first_name }},

We regret to inform you that your phone has been rejected during our initial inspection.

- Purchase ID: {{ $purchase->purchase_id }}
- Product ID: {{ $inspection->phone_id }}
- Phone Model: {{ $phone->model }}
- Color: {{ $phone->color }}
- Inspected at: {{ $inspection->created_at }}
- Inspected By: {{ $admin->name }}

## Rejection Reason

The following details of the phone were different from the information provided in your post:

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

<span class="text-danger">If you think this is done by a mistake you can contact us.Other wise your account will be banne if this happens again.</span>
If you have any questions, please feel free to contact us.

Thank you for shopping with us!

{{ config('app.name') }}
@endcomponent
