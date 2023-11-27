@extends('UserViews/Layout.layout')
@section('title','Check Out')
@section('style')
<link rel="stylesheet" href="{{asset('css/purchase/checkout.css')}}">
<script src="https://js.stripe.com/v3/"></script>
@endsection
@section('content')
<section class="checkout-wrapper section col-12 pt-4 pb-4 ">
   <div class="container">
      @if($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
      <form action="{{route('pay.now')}}" class="needs-validation" novalidate method="post" id="payment-form">
      <div class="row justify-content-center ">
         <div class="col-lg-8">
            <div class="checkout-steps-form-style-1 bg-white p-4 pt-1 rounded border ">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="single-form form-default">
                           <h3>Shipping Information</h3>
                           <div class="row">
                              <div class="col-md-6 form-input form">
                                 <label>Recivers Name</label>
                                 <input type="text" name="recivers_name" value={{$authUser->first_name." ".$authUser->last_name}} placeholder="Recivers Name">
                              </div>
                              <div class="col-md-6 form-input form">
                                 <label>Recivers Phone</label>
                                 <input type="text" name="recivers_phone" value="{{$authUser->phone}}" placeholder="Recivers Phone">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="single-form form-default">
                           <label>Email Address</label>
                           <div class="form-input form">
                              <input type="text" name="recivers_email" value="{{$authUser->email}}" placeholder="Email Address">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="single-form form-default">
                           <label>City</label>
                           <div class="form-input form">
                              <input type="text" name="recivers_city" value="{{$authUser->default_address?$authUser->city:""}}" placeholder="City">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="single-form form-default">
                           <label>Full Address</label>
                           <div class="form-input form">
                              <input type="text" name="recivers_address" value="{{$authUser->default_address?$authUser->address:""}}" placeholder="Full Address">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="single-form form-default">
                           <label>Zip Code</label>
                           <div class="form-input form">
                              <input type="text" name="recivers_zip_code" value="{{$authUser->default_address?$authUser->zip_code:""}}"  placeholder="Zip Code">
                           </div>
                        </div>
                     </div>
                     {{-- <div class="col-md-12">
                        <div class="checkout-payment-option">
                           <h3 class="">Select Delivery
                              Option
                           </h3>
                           <input name="delivery_option" value="TCS"/>
                           <div class="payment-option-wrapper">
                              <div class="single-payment-option">
                                 <input type="radio" name="shipping" checked="" id="shipping-1">
                                 <label for="shipping-1">
                                    <img width="100px"src="https://www.kptourism.com/uploads/images/poi/1612765285721Pakistan-post-logo.png" alt="PPO">
                                    <p>Pakistan Post</p>
                                    <span class="price">Rs/200</span>
                                 </label>
                              </div>
                              <div class="single-payment-option">
                                 <input type="radio" name="shipping" id="shipping-2">
                                 <label for="shipping-2">
                                    <img  width="100px"src="https://www.tcsexpress.com/Assets/images/Logo.png" alt="TCS">
                                    <p>TCS</p>
                                    <span class="price">RS/300</span>
                                 </label>
                              </div>
                              <div class="single-payment-option">
                                 <input type="radio" name="shipping" id="shipping-3">
                                 <label for="shipping-3">
                                    <img width="100px" src="https://www.leopardscourier.com/logos/LCS-Main-Logo-300x128.png" alt="Leopard">
                                    <p>Leopard Exress</p>
                                    <span class="price">RS/310</span>
                                 </label>
                              </div>
                              <div class="single-payment-option">
                                 <input type="radio" name="shipping" id="shipping-4">
                                 <label for="shipping-4">
                                    <img width="100px"src="https://trax.pk/wp-content/uploads/2021/07/Black-Logo.svg" alt="Trax">
                                    <p>Trax</p>
                                    <span class="price">RS/280</span>
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div> --}}
                  </div>
                  <div class="row mt-1">
                     <div class="col-12">
                     </div>
                  </div>

            </div>
         </div>
         <div class="col-lg-4">
            <div class="checkout-sidebar">
               {{--
               <div class="checkout-sidebar-coupon">
                  <p>Appy Coupon to get discount!</p>
                  <form action="#">
                     <div class="single-form form-default">
                        <div class="form-input form">
                           <input type="text" placeholder="Coupon Code">
                        </div>
                        <div class="button">
                           <button class="btn btn-khas-primary rounded-0">apply</button>
                        </div>
                     </div>
                  </form>
               </div>
               --}}
               <div class="checkout-sidebar-price-table mt-30">
                  <h5 class="title">Pricing Table</h5>
                  <div class="sub-total-price">
                     <div class="total-price">
                        <p class="value">Total Items:</p>
                        <p class="price">{{count($items)}}</p>
                     </div>
                     <div class="total-price">
                        <p class="value">Subotal Price:</p>
                        <p class="price">RS/{{$totalPrice}}</p>
                     </div>
                     {{-- <div class="total-price shipping">
                        <p class="value">Delivery Charges:</p>
                        <p class="price">RS/300</p>
                     </div>
                     <div class="total-price discount">
                        <p class="value">Discount:</p>
                        <p class="price">RS/1000</p>
                     </div> --}}
                  </div>
                  <div class="total-payable">
                     <div class="payable-price">
                        <p class="value">Total Price:</p>
                        <p class="price">RS/{{$totalPrice}}</p>
                        <input type="hidden" name="totalPrice" value="{{$totalPrice}}">

                     </div>
                  </div>
               </div>
               <div class="bg-white border p-3 mt-4">
                  <h5 class="title">Payment Method</h5>                  <div class="payment-method-selection col-12 d-flex justify-content-around my-3 flex-wrap">
                   <div>
                     <input type="radio" id="card-option"  name="payment_method" value="card" checked>
                     <label for="card-option">Card</label>
                   </div>
                   <div>
                     <input type="radio" id="wallet-option"  name="payment_method" value="wallet">
                     <label for="wallet-option">Wallet</label>
                  </div>
                  </div>

                  <div class="checkout-payment-form">
                     {{-- Card Payment Form --}}
                     <div id="card-payment-form">
                        @csrf
                        <div class="form-row">
                           <div class="col-md-12 mb-3">
                              <label for="card-element">Card Information</label>
                              <div id="card-element" class="form-control"></div>
                              <div id="card-errors" role="alert" class="invalid-feedback"></div>
                           </div>
                        </div>
                        <button class="btn btn-primary w-100" id="paybycard" type="submit">Pay Now ({{$totalPrice}})</button>
                     </div>

                     {{-- Wallet Payment Form --}}
                     <div id="wallet-payment-form" style="display: none;">
                        <!-- Add your wallet payment form fields here -->
                        @if (intval($totalPrice) <= intval($authUser->balance))
                        <p class="my-2">Your Current Balance is Rs {{$authUser->balance}}</p>
                        <button class="btn btn-primary w-100" type="submit">Pay Now ({{$totalPrice}})</button>
                        @else
                        <p class="my-2 text-danger">Insufficent Balance.Your Current Balance is Rs {{$authUser->balance}}.Please change payment method or deposite balance in your wallet.</p>

                        @endif
                     </div>
                  </div>
               </div>


            </div>
         </div>
      </div>
   </form>
   </div>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function() {
      $('input[type="radio"]').on('change', function() {
         var selectedPaymentMethod = $(this).val();

         if (selectedPaymentMethod === "card") {
            $('#card-payment-form').show();
            $('#wallet-payment-form').hide();
         } else if (selectedPaymentMethod === "wallet") {
            $('#card-payment-form').hide();
            $('#wallet-payment-form').show();
         }
      });
   });
   // Create a Stripe client.
   var stripe = Stripe('{{env("STRIPE_KEY")}}');
   const elements = stripe.elements();
   // Custom styling can be passed to options when creating an Element.

   const style = {
   base: {
   fontSize: '16px',
   fontSmoothing: 'antialiased',
   color: '#495057',
   '::placeholder': {
     color: '#6c757d',
   },
   lineHeight: '1.5',
   },
   invalid: {
   color: '#dc3545',
   iconColor: '#dc3545',
   },
   };


   // Create an instance of the card Element.
   const card = elements.create('card', {style});

   // Add an instance of the card Element into the `card-element` <div>.
   card.mount('#card-element');

   // Create a token or display an error when the form is submitted.
   const form = document.getElementById('payment-form');
   const submitBtn = document.getElementById('paybycard');
   submitBtn.addEventListener('click', async (event) => {
   event.preventDefault();

   const {token, error} = await stripe.createToken(card);

   if (error) {
   // Inform the customer that there was an error.
   const errorElement = document.getElementById('card-errors');
   errorElement.textContent = error.message;
   } else {
   // Send the token to your server.
   stripeTokenHandler(token);
   }
   });

   const stripeTokenHandler = (token) => {
   // Insert the token ID into the form so it gets submitted to the server
   const form = document.getElementById('payment-form');
   const hiddenInput = document.createElement('input');
   hiddenInput.setAttribute('type', 'hidden');
   hiddenInput.setAttribute('name', 'stripeToken');
   hiddenInput.setAttribute('value', token.id);
   form.appendChild(hiddenInput);

   // Submit the form
   form.submit();
   }
</script>
@endsection