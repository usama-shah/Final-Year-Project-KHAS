@extends('UserViews/Layout.layout')
@section('title', 'Cart ')
@section('style')
<link rel="stylesheet" href="{{ asset('css/Purchase/cart.css') }}">
@endsection
@section('content')
<section class="checkout-wrapper section col-12 pt-4 pb-4 ">
   <div class="shopping-cart section">
      <div class="container">
         <div class="row">
            <div class="col-md-12 mx-auto d-flex flex-wrap">
                @if($items)
                <a class="btn btn-primary ms-auto my-2" href="{{route('checkout.show')}}">Proceed to Checkout</a>
@endif
               <div class="col-12 bg-white border rounded">
                  <table class="table">
                     <thead>
                        <tr>
                            <th>
P ID
                            </th>
                           <th>
                              Product
                           </th>
                           <th>
                              Quantity
                           </th>
                           <th>
                              Sub Total
                           </th>
                           <th>
                              Remove
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($items as $item)
                        @if($item->phones) {{-- Check if phone exists --}}
                        <tr class="py-5">
                        <td class="text-center"><b>{{$item->phones->id}}</b></td>
                            <td>
                              <a class="d-flex align-items-center" href="{{route('phones.show', $id=$item->phone_id)}}">
                                 <img src="{{$item->phones->main_image}}" class="me-3 rounded-2"width="60px"/>
                                 <h4>{{$item->phones->title}}</h4>
                              </a>
                           </td>
                           <td>
                              1
                           </td>
                           <td>
                              {{$item->phones->formatted_price}}
                           </td>
                           <td class="text-center">
                              <a href="{{route('cart.remove',$id=$item->id)}}" class="btn btn-sm btn-outline-khas-primary removeItem" data-item-id="{{$item->id }}"><i class="bi bi-trash-fill"></i></a>
                           </td>
                        </tr>
                        @endif
                        @empty
                        <tr >
                           <td class="text-center text-muted" colspan="4">No item available in the cart.
                           <td>
                        </tr>
                        @endforelse
                     </tbody>
                     @if(count($items)>0)
                     <tfoot>
                        <tr>
                           <th>Total</th>
                           <td>{{$totalQuantity}}</td>
                           <td>{{$totalPrice}}</td>
                           <td class="text-center"><a class="btn btn-primary" href="{{route('checkout.show')}}">Proceed to Checkout</a></td>
                        </tr>
                     </tfoot>
                     @endif
                  </table>
               </div>
            </div>
           <!--- <div class="col-md-4">
               <div class="col-12">
                  <div class="row">
                     <form action="#"
                        class="col-12 d-flex justify-content-around align-items-center py-5 mb-4 bg-white border rounded">
                        <div class="">
                           <input name="Coupon" class="form-control" placeholder="Enter Your Coupon">
                        </div>
                        <div class="">
                           <button class="btn btn-khas-primary">Apply Coupon</button>
                        </div>
                     </form>
                     <div class="col-12 d-flex justify-content-around align-items-center bg-white border rounded">
                        <div class="row p-4">
                           <div class="row my-2">
                              <div class="col-6 text-start">Subtotal</div>
                              <div class="col-6 text-end">RS.23223</div>
                           </div>
                           <div class="row my-2">
                              <div class="col-6 text-start">Shipping</div>
                              <div class="col-6 text-end">RS.233</div>
                           </div>
                           <div class="row my-2">
                              <div class="col-6 text-start">Copoun Discount</div>
                              <div class="col-6 text-end">RS.233</div>
                           </div>
                           <div class="row my-2">
                              <div class="col-6 text-start">Total</div>
                              <div class="col-6 text-end">RS.29033</div>
                           </div>
                           {{--
                           <ul>
                              <li class="my-2">Cart Subtotal<span class="ms-4">$2560.00</span></li>
                              <li class="my-2">Shipping<span class="ms-4">Free</span></li>
                              <li class="my-2">You Save<span class="ms-4">$29.00</span></li>
                              <li class="my-2">You Pay<span class="ms-4">$2531.00</span></li>
                           </ul>
                           --}}
                           <div class="col-12 d-flex justify-content-between mt-3">
                              <a href="/" class="btn btn-khas-primary">Continue shopping</a>
                              <a href="{{url('/checkout')}}" class="btn btn-outline-khas-primary">Checkout</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>--->
      </div>
   </div>
   </div>
</section>
@endsection
@section('script')
<script></script>
@endsection