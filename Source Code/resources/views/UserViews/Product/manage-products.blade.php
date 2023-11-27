@extends('UserViews/Layout.layout')
@section('title','Manage Products')
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
                  <div class="d-sm-flex flex-wrap justify-content-between bg-white shadow rounded-3 px-3 py-2 border align-items-center border-bottom">
                    <h2 class="h3 py-2 me-2 text-center text-sm-start">Manage Products<span class="badge bg-primary text-white text-center ms-2">{{isset($phones)?count($phones):'0'}}</span></h2>

                  </div>



                  @forelse($phones as $phone)
                  <div class="d-sm-flex justify-content-between   mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                    <div class="d-block d-sm-flex align-items-start text-center text-sm-start">
                      <a class="d-block flex-shrink-0 mx-auto me-sm-4" href="{{url('product-details')}}" style="width: 7rem;">
                        <img width="100%"src="{{$phone->main_image}}" alt="Product">
                      </a>
                      <div class="pt-2">
                        <h3 class="product-title fs-base mb-2"><a href="{{route('phones.show',$id=$phone->id)}}">{{$phone->title}}</a></h3>
                        <div class="fs-sm"><span class="text-muted me-2">Posted on:</span>{{dateDiff($phone->created_at)}}</div>
                        <div class="fs-sm"><span class="text-muted me-2">Status:</span>{{$phone->status}}</div>
                        <div class="fs-lg text-accent pt-2">RS {{ $phone->formatted_price }}
                        </div>
                      </div>
                    </div>
                    <div class="pt-2 ps-sm-3 mx-auto mx-sm-0  manage-product-btns text-end">
                      <a style="" href="{{route('phones.show',$id=$phone->id)}}"><button class="btn product-action-btn btn-outline-success btn-sm w-50 my-2" type="button"><i class="bi bi-eye me-2"></i>View</button></a>
                      <br>
@if($phone->status!="Sold")
                      <a href="{{route('phones.update',$id=$phone->id)}}" class="btn product-action-btn btn-outline-success btn-sm w-50 my-2" type="button"><i class="bi bi-pen me-2"></i>Edit</a>
                      <br>
                      <button class="btn product-action-btn btn-outline-danger btn-sm w-50 my-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-phone-id="{{ $phone->id }}"><i class="bi bi-trash me-2"></i>Delete</button>
@endif
                    </div>
                  </div>

@empty
<div class="my-5 text-center"> You have not yet posted any phone.<a href="{{route('phones.add')}}">Click here to post.</a></div>
@endforelse



              </section>

            </div>
          </div>

      </div>
   </div>
</section>
@endsection
@section('script')
<script>


let phoneId;

document.querySelectorAll('[data-bs-target="#exampleModal"]').forEach(button => {
    button.addEventListener('click', function() {
        phoneId = this.getAttribute('data-phone-id');
    });
});
document.querySelector('.confirm-deleted').addEventListener('click', function() {
    window.location.href = `/delete-phone/${phoneId}`;
});

</script>
@endsection