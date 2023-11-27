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
            @include('UserViews/Profile/Components/sidebar')

            <section class="col-lg-9   px-4 pb-4 mb-3">

                  <!-- Title-->
                  <div class="d-sm-flex flex-wrap justify-content-between bg-white shadow rounded-3 px-3 py-2 align-items-center border-bottom">
                    <h2 class="h3 py-2 me-2 text-center text-sm-start">User Dashboard</h2>

                  </div>

                  <div class="row mx-n2 p-1 mt-4">
                    <div class="col-sm-6 px-2 mb-4">
                      <div class="text-white bg-primary shadow rounded-3 h-100 rounded-3 p-4 text-center">
                        <h3>Total Products</h3>
                        <p class="h2 mb-2">{{count($authUser->phones)}}</p>
                      </div>
                    </div>
                    <div class="col-sm-6 px-2 mb-4">
                        <div class="text-white bg-primary  shadow rounded-3 h-100 rounded-3 p-4 text-center">
                          <h3>Sold</h3>
                          <p class="h2 mb-2">@php
                            $i = 0;
                        @endphp
                        @foreach($authUser->phones as $phone)
                            @if($phone->status == "Sold")
                                @php
                                    $i++;
                                @endphp
                            @endif
                        @endforeach
                        {{$i}}
                        </p>
                        </div>
                      </div>

                  </div>

                  <div class="row mx-n2 p-1 mt-4">
                    <div class="col-sm-6 px-2 mb-4">
                        <div class="bg-primary text-white shadow rounded-3 h-100 rounded-3 p-4 text-center">
                          <h3>Total Sales</h3>
                          <p class="h2 mb-2">@php
                            $i = 0;
                        @endphp
                        @foreach($authUser->phones as $phone)
                            @if($phone->status == "Sold")
                                @php
                                    $i=$i+$phone->price;
                                @endphp
                            @endif
                        @endforeach
                        Rs {{number_format($i)}}</p>
                        </div>
                      </div>
                    <div class="col-sm-6 px-2 mb-4">
                      <div class="bg-primary text-white shadow rounded-3 h-100 rounded-3 p-4 text-center">
                        <h3>Total Purchase</h3>
                        <p class="h2 mb-2">@php
                          $i = 0;
                      @endphp
                      @foreach($authUser->purchasedPhones as $phone)
                          @if($phone->status != "Returned")
                              @php
                                  $i=$i+$phone->phone->price;
                              @endphp
                          @endif
                      @endforeach
                      Rs {{number_format($i)}}</p>
                      </div>
                    </div>
                  </div>


                  {{-- <div class="d-sm-flex justify-content-between   mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                    <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4" href="{{url('product-details')}}" style="width: 7rem;"><img width="100%"src="https://i0.wp.com/mobilemall.com.pk/wp-content/uploads/2022/07/Realme-3-price-in-Pakistan.jpeg" alt="Product"></a>
                      <div class="pt-2">
                        <h3 class="product-title fs-base mb-2"><a href="{{url('product-details')}}">Realme 3 Pro 6 GB</a></h3>
                        <div class="fs-sm"><span class="text-muted me-2">Posted on:</span>14 Jan 2023</div>
                        <div class="fs-sm"><span class="text-muted me-2">Status:</span>Available</div>
                        <div class="fs-lg text-accent pt-2">RS 50000</div>
                      </div>
                    </div>
                    <div class="pt-2 ps-sm-3 mx-auto mx-sm-0  manage-product-btns text-end">
                      <a href="{{url('product-details')}}"><button class="btn btn-outline-success btn-sm w-50 my-2" type="button"><i class="bi bi-eye me-2"></i>View</button></a>
                      <button class="btn btn-outline-success btn-sm w-50 my-2" type="button"><i class="bi bi-pen me-2"></i>Edit</button>
                      <button class="btn btn-outline-danger btn-sm w-50 my-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash me-2"></i>Delete</button>
                    </div>
                  </div>
                  <div class="d-sm-flex justify-content-between   mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                    <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4" href="{{url('product-details')}}" style="width: 7rem;"><img width="100%"src="https://i0.wp.com/mobilemall.com.pk/wp-content/uploads/2022/07/Realme-3-price-in-Pakistan.jpeg" alt="Product"></a>
                      <div class="pt-2">
                        <h3 class="product-title fs-base mb-2"><a href="{{url('product-details')}}">Realme 3 Pro 6 GB</a></h3>
                        <div class="fs-sm"><span class="text-muted me-2">Posted on:</span>14 Jan 2023</div>
                        <div class="fs-sm"><span class="text-muted me-2">Status:</span>Available</div>
                        <div class="fs-lg text-accent pt-2">RS 50000</div>
                      </div>
                    </div>
                    <div class="pt-2 ps-sm-3 mx-auto mx-sm-0  manage-product-btns text-end">
                      <a href="{{url('product-details')}}"><button class="btn btn-outline-success btn-sm w-50 my-2" type="button"><i class="bi bi-eye me-2"></i>View</button></a>
                      <button class="btn btn-outline-success btn-sm w-50 my-2" type="button"><i class="bi bi-pen me-2"></i>Edit</button>
                      <button class="btn btn-outline-danger btn-sm w-50 my-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash me-2"></i>Delete</button>
                    </div>
                  </div>
                  <div class="d-sm-flex justify-content-between   mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                    <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4" href="{{url('product-details')}}" style="width: 7rem;"><img width="100%"src="https://i0.wp.com/mobilemall.com.pk/wp-content/uploads/2022/07/Realme-3-price-in-Pakistan.jpeg" alt="Product"></a>
                      <div class="pt-2">
                        <h3 class="product-title fs-base mb-2"><a href="{{url('product-details')}}">Realme 3 Pro 6 GB</a></h3>
                        <div class="fs-sm"><span class="text-muted me-2">Posted on:</span>14 Jan 2023</div>
                        <div class="fs-sm"><span class="text-muted me-2">Status:</span>Available</div>
                        <div class="fs-lg text-accent pt-2">RS 50000</div>
                      </div>
                    </div>
                    <div class="pt-2 ps-sm-3 mx-auto mx-sm-0  manage-product-btns text-end">
                      <a href="{{url('product-details')}}"><button class="btn btn-outline-success btn-sm w-50 my-2" type="button"><i class="bi bi-eye me-2"></i>View</button></a>
                      <button class="btn btn-outline-success btn-sm w-50 my-2" type="button"><i class="bi bi-pen me-2"></i>Edit</button>
                      <button class="btn btn-outline-danger btn-sm w-50 my-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash me-2"></i>Delete</button>
                    </div>
                  </div>
                  <div class="d-sm-flex justify-content-between   mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                    <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4" href="{{url('product-details')}}" style="width: 7rem;"><img width="100%"src="https://i0.wp.com/mobilemall.com.pk/wp-content/uploads/2022/07/Realme-3-price-in-Pakistan.jpeg" alt="Product"></a>
                      <div class="pt-2">
                        <h3 class="product-title fs-base mb-2"><a href="{{url('product-details')}}">Realme 3 Pro 6 GB</a></h3>
                        <div class="fs-sm"><span class="text-muted me-2">Posted on:</span>14 Jan 2023</div>
                        <div class="fs-sm"><span class="text-muted me-2">Status:</span>Available</div>
                        <div class="fs-lg text-accent pt-2">RS 50000</div>
                      </div>
                    </div>
                    <div class="pt-2 ps-sm-3 mx-auto mx-sm-0  manage-product-btns text-end">
                      <a href="{{url('product-details')}}"><button class="btn btn-outline-success btn-sm w-50 my-2" type="button"><i class="bi bi-eye me-2"></i>View</button></a>
                      <button class="btn btn-outline-success btn-sm w-50 my-2" type="button"><i class="bi bi-pen me-2"></i>Edit</button>
                      <button class="btn btn-outline-danger btn-sm w-50 my-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash me-2"></i>Delete</button>
                    </div>
                  </div> --}}





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