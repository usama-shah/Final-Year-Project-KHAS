@extends('UserViews/Layout.layout')
@section('title','User Dashboard')
@section('style')
@endsection
@section('content')
<section class="checkout-wrapper section col-12 pt-4 pb-4 ">
   <div class="container">
      <div class="row justify-content-center ">

         <div class="container pb-5 mb-2 mb-md-4">
            <div class="row">
              <!-- Sidebar-->
            @include('RiderViews/Profile/Components/sidebar')

            <section class="col-lg-9   px-4 pb-4 mb-3">

                  <!-- Title-->
                  <div class="d-sm-flex flex-wrap justify-content-between bg-white shadow rounded-3 px-3 py-2 align-items-center border-bottom">
                    <h2 class="h3 py-2 me-2 text-center text-sm-start">Rider Dashboard</h2>
                  </div>

                  <div class="row mx-n2 p-1 mt-4">
                    <div class="col-sm-6 px-2 mb-4">
                      <div class=" bg-success shadow rounded-3 h-100 rounded-3 p-4 text-center">
                        <h3>Total Orders</h3>
                        <p class="h2 mb-2">4</p>
                      </div>
                    </div>
                    <div class="col-sm-6 px-2 mb-4">
                        <div class="bg-warning shadow rounded-3 h-100 rounded-3 p-4 text-center">
                          <h3>Pending Orders</h3>
                          <p class="h2 mb-2">2</p>
                        </div>
                      </div>

                  </div>

                  <div class="row mx-n2 p-1 mt-4">
                    <div class="col-sm-6 px-2 mb-4">
                        <div class="bg-info shadow rounded-3 h-100 rounded-3 p-4 text-center">
                          <h3>Total Earnings</h3>
                          <p class="h2 mb-2">Rs 100,343</p>
                        </div>
                      </div>
                    <div class="col-sm-6 px-2 mb-4">
                      <div class="bg-danger shadow rounded-3 h-100 rounded-3 p-4 text-center">
                        <h3>Balance</h3>
                        <p class="h2 mb-2">Rs 20,343</p>
                      </div>
                    </div>
                  </div>
              </section>

            </div>
          </div>

      </div>
   </div>
</section>
@endsection
@section('script')
<script></script>
@endsection