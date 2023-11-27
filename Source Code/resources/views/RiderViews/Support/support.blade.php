@extends('UserViews/Layout.layout')
@section('title','Support')
@section('style')
@endsection
@section('content')
<section class="checkout-wrapper section col-12 pt-4 pb-4 ">
   <div class="container">
      <div class="row justify-content-center ">
        @include('RiderViews/Profile/Components/sidebar')

          <div class="my-4 col-md-9">
              <div class="col-12 mb-4 d-flex justify-content-end">
              <button class="btn btn-primary">New Ticket</button>
              </div>

<table class="table table-striped shadow-lg rounded-4 p-4 bg-white">
    <tr>
        <th>Ticket ID</th>
        <th>Subject</th>
        <th>Date</th>
        <th>Status</th>
    </tr>
    <tr>
        <td>1221</td>
        <td>Phone Not Recived</td>
        <td>2-Feb-2023</td>
        <td>Open</td>
    </tr>
    <tr>
        <td>1221</td>
        <td>Withdraw Failed</td>
        <td>1-Feb-2023</td>
        <td>Closed</td>
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