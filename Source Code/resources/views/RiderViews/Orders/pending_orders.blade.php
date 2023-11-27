@extends('UserViews/Layout.layout')
@section('title','Pending Orders')
@section('style')
@endsection
@section('content')
<section class="checkout-wrapper section col-12 pt-4 pb-4 ">
   <div class="container">
      <div class="row justify-content-center ">
        @include('RiderViews/Profile/Components/sidebar')

          <div class="my-4 col-md-9">


<table class="table table-striped shadow-lg rounded-4 p-4 bg-white">
    <tr>
        <th>Order ID</th>
        <th>Product</th>
        <th>Pickup Date/Time</th>
        <th>Delivery Date/Time</th>
        <th>Status</th>
    </tr>
    <tr>
        <td>1221</td>
        <td>I phone 6</td>
        <td>2-Feb-2023, 9:00 PM</td>
        <td>2-Feb-2023, 1:00 PM</td>
        <td class="text-danger">Pending</td>
    </tr>
    <tr>
        <td>1221</td>
        <td>Samsung Glaxy S10</td>
        <td>2-Feb-2023, 9:00 PM</td>
        <td>2-Feb-2023, 12:00 PM</td>
        <td class="text-danger">Pending</td>
    </tr>
</table>
</div>
      </div>
   </div>
</section>
@endsection
@section('script')
<script></script>
@endsection