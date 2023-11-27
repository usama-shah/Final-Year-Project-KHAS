@component('mail::message')
# Order Confirmation

Thank you for your order, {{ $purchase->recivers_name }}.

Your order details:

- Purchase ID: {{ $purchase->id }}
- Name: {{ $purchase->recivers_name }}
- Email: {{ $purchase->recivers_email }}
- Phone: {{ $purchase->recivers_phone }}
- Address: {{ $purchase->recivers_address }}
- City: {{ $purchase->recivers_city }}
- ZIP Code: {{ $purchase->recivers_zip_code }}
- Delivery Option: {{ $purchase->delivery_option }}
- Total Price: RS {{ number_format($purchase->total_price, 2) }}


You can track your order on the [Recent Purchases]({{ url('recent-purchases') }}) page.

If you have any questions, please feel free to contact us.

Thank you for shopping with us!

{{ config('app.name') }}
@endcomponent
