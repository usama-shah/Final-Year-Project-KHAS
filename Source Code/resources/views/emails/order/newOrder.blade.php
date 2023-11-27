@component('mail::message')
# Congratulations on Your Sale

Dear {{ $seller->first_name." ".$seller->last_name }},
We are happy to inform you that your phone has been sold! Here are the details of the sale:

<b>Please kindly bring your phone to our nearest office for an inspection within 48 Hours.<p>

- Purchase ID: {{ $purchase->id }}
- Post ID: {{ $phone->id }}
- Post Title: {{$phone->title}}
- Phone Brand: {{$phone->get_brand->name}}
- Phone Model: {{$phone->model}}
- Buyer Name: {{ $purchase->recivers_name }}
- Buyer Email: {{ $purchase->recivers_email }}
- Buyer Phone: {{ $purchase->recivers_phone }}
- Phone Price: RS {{ number_format($phone->price, 2) }}

<p style="color:red">Please note that if you do not bring your phone to us within 48 hours, this order will be cancelled and your account may be penalized.</p>

If you have any questions or need assistance, please don't hesitate to contact us.

Thank you for using our platform to sell your phone!


{{ config('app.name') }}
@endcomponent
