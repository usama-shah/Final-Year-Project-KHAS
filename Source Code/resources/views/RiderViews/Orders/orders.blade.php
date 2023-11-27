@extends('UserViews/Layout.layout')
@section('title','Order History')
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
        <th>Date</th>
        <th>Status</th>
    </tr>
    <tr>
        <td>1221</td>
        <td>I phone 6</td>
        <td>2-Feb-2023</td>
        <td class="text-success">Completed</td>
    </tr>
    <tr>
        <td>1221</td>
        <td>Samsung Glaxy S10</td>
        <td>1-Feb-2023</td>
        <td class="text-danger">Failed</td>
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