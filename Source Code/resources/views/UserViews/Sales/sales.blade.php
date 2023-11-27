@extends('UserViews/Layout.layout')
@section('title','My Sales')
@section('style')
@endsection
@section('content')
<section class="checkout-wrapper section col-12 pt-4 pb-4 ">
   <div class="container">
      <div class="row justify-content-center ">
         <div class="container pb-5 mb-2 mb-md-4">
            <div class="row rounded">
              <!-- Sidebar-->
            @include('UserViews/Profile/Components/sidebar')

            <section class="col-lg-9  px-4 pb-4 mb-3">

                  <!-- Title-->
                  <div class="d-sm-flex flex-wrap justify-content-between bg-white shadow rounded-3 px-3 py-2 align-items-center border-bottom">
                    <h2 class="h3 py-2 me-2 text-center text-sm-start">My Sales</h2>
                   
                  </div>
                  <div class="row mx-n2 p-1 mt-4">
                    <div class="col-sm-6 px-2 mb-4">
                      <div class="bg-white  bg-white shadow rounded-3 h-100 rounded-3 p-4 text-center">
                        <h3>Total Items</h3>
                        <p class="h2 mb-2"><?php $totalsoldPhones = 0;
                        $totalSpend=0;

                          foreach ($authUser->sales as $sales) {
                            $totalSpend+= $sales->price;

                          }
                          echo $authUser->sales->count();
                          ?></p>
                      </div>
                    </div>
                    <div class="col-sm-6 px-2 mb-4">
                      <div class="bg-white  bg-white shadow rounded-3 h-100 rounded-3 p-4 text-center">
                        <h3>Total Earnings</h3>
                        <p class="h2 mb-2">RS {{ number_format($totalSpend)}}</p>
                      </div>
                    </div>
                  </div>


@forelse($authUser->sales as $item)
                  <div class="d-sm-flex justify-content-between bg-white  p-4 mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                    <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4" href="{{route('phones.show',$id=$item->id)}}" style="width: 7rem;"><img width="100%"src="{{$item->main_image}}" alt="Product"></a>
                      <div class="pt-2">
                        <h3 class="product-title fs-base mb-2"><a href="{{route('phones.show',$id=$item->id)}}">{{$item->title}}</a></h3>
                        <div class="fs-sm"><span class="text-muted me-2">sold On :</span>{{$item->purchasedPhones[0]->created_at->format("d,M,Y")}}</div>
                        <div class="fs-sm"><span class="text-muted me-2">Status:</span><span class="{{$item->purchasedPhones[0]->status=='Returned'?"text-danger":"text-success"}}">{{$item->purchasedPhones[0]->status}}</span></div>
                        <div class="fs-lg text-accent pt-2">RS {{$item->formatted_price}}</div>
                      </div>
                    </div>
                    <div class="pt-2 ps-sm-3 mx-auto mx-sm-0  manage-product-btns text-end">
                      <a href="{{route('phones.show',$id=$item->id)}}"><button class="btn  product-action-btn btn-outline-success btn-sm w-50 my-2" type="button"><i class="bi bi-eye me-2"></i>View</button></a><br>
                      <a href="{{route('phones.inspection',$id=$item->id)}}" class="btn  product-action-btn btn-outline-success btn-sm w-50 my-2" type="button"><i class="bi bi-file-check me-2"></i>Show Report</a><br>
                      <button class="btn  product-action-btn btn-outline-danger btn-sm w-50 my-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-megaphone me-2"></i>File Dispute</button>
                    </div>
                  </div>
@empty
<span class="col-12 text-center text-muted">You have not sold any item yet.</span>
@endforelse



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