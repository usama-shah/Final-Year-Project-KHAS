@extends('UserViews/Layout.layout')
@section('title',' ')
@section('style')
@endsection
@section('content')
<section class="checkout-wrapper section col-12 pt-4 pb-4 ">
   <div class="container">
      <div class="row justify-content-center ">
        @include('RiderViews/Profile/Components/sidebar')

          <div class="my-4 col-md-9">

              <div class="col-12 shadow p-4 rounded-3 mb-4 d-flex justify-content-between">
                  <div><h2>Balance  : 12,124</h2></div>
                  <div>
              <button class="btn btn-outline-primary">Withdraw</button>
              <button class="btn btn-outline-primary">Deposite</button>
                  </div>
              </div>
<h3 class="my-4">Payment History</h3>
<table class="table table-striped  rounded-4 p-4 bg-white">
    <tr>
        <th>Txn ID</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Status</th>
    </tr>
    <tr>
        <td>1221</td>
        <td>10,100</td>
        <td>2-Feb-2023</td>
        <td>Withdraw</td>
    </tr>
    <tr>
        <td>3221</td>
        <td>50,232</td>
        <td>1-Feb-2023</td>
        <td>Deposite</td>
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