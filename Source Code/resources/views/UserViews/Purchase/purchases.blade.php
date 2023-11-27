@extends('UserViews/Layout.layout')
@section('title','My Purchases')
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
                    <h2 class="h3 py-2 me-2 text-center text-sm-start">My Purchases<span class="badge bg-primary text-white text-center ms-2"></span></h2>

                  </div>
                  <div class="row mx-n2 p-1 mt-4">
                    <div class="col-sm-6 px-2 mb-4">
                      <div class="bg-white  bg-white shadow rounded-3 h-100 rounded-3 p-4 text-center">
                        <h3>Total Items</h3>
                        <p class="h2 mb-2"><?php $totalPurchasedPhones = 0;
                        $totalSpend=0;

                          foreach ($authUser->purchase as $purchase) {
                            $totalSpend+= $purchase->total_price;
                              $totalPurchasedPhones += $purchase->items->count();
                          }
                          echo $totalPurchasedPhones;
                          ?></p>
                      </div>
                    </div>
                    <div class="col-sm-6 px-2 mb-4">
                      <div class="bg-white  bg-white shadow rounded-3 h-100 rounded-3 p-4 text-center">
                        <h3>Total Spend</h3>
                        <p class="h2 mb-2">RS {{ number_format($totalSpend)}}</p>
                      </div>
                    </div>
                  </div>


@forelse($authUser->purchase as $purchase)
@foreach($purchase->items as $item)
@if($item->phone)
                  <div class="d-sm-flex justify-content-between bg-white  p-4 mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                    <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4" href="{{route('phones.show',$id=$item->phone_id)}}" style="width: 7rem;"><img width="100%"src="{{$item->phone->main_image}}" alt="Product"></a>
                      <div class="pt-2">
                        <h3 class="product-title fs-base mb-2"><a href="{{route('phones.show',$id=$item->phone_id)}}">{{$item->phone->title}}</a></h3>
                        <div class="fs-sm"><span class="text-muted me-2">Purchased On :</span>{{$purchase->created_at->format("d,M,Y")}}</div>
                        <div class="fs-sm"><span class="text-muted me-2">Status:</span><span class="{{$item->status=='Returned'?"text-danger":"text-success"}}">{{$item->status}}</span></div>
                        <div class="fs-lg text-accent pt-2">RS {{$item->phone->formatted_price}}</div>
                      </div>
                    </div>
                    <div class="pt-2 ps-sm-3 mx-auto mx-sm-0  manage-product-btns text-end">
                      <a href="{{route('phones.show',$id=$item->phone_id)}}"><button class="btn product-action-btn btn-outline-success btn-sm w-50 my-2" type="button"><i class="bi bi-eye me-2"></i>View</button></a>
                      <br>
                      <a href="{{route('phones.inspection',$id=$item->phone_id)}}" class="btn product-action-btn btn-outline-success btn-sm w-50 my-2" type="button"><i class="bi bi-file-check me-2"></i>Show Report</a>
                      <br>
                      <button class="btn product-action-btn btn-outline-danger btn-sm w-50 my-2" type="button" data-bs-toggle="modal" data-bs-target="#returnModal{{$item->phone_id}}"><i class="bi bi-megaphone me-2"></i>File Dispute</button>


                      <div class="modal fade" id="returnModal{{$item->phone_id}}" tabindex="-1" aria-labelledby="returnModalLabel{{$item->phone_id}}" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="returnModalLabel{{$item->phone_id}}">File Dispute</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form id="disputeForm" action="{{ route('phones.return') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                                <div class="mb-3">
                                  <input type="hidden" value="{{$item->phone_id}}" name="phone_id" />
                                  <label for="reason" class="form-label text-right">Reason for returning product*</label>
                                  <select class="form-select col-12" id="reason" required name="reason">
                                    <option value="" selected disabled>--Select Reason</option>
                                    <option>Defective or Damaged Item</option>
                                    <option>Wrong Item Received</option>
                                    <option>Item Not as Described</option>
                                    <option>Size/Color/Style Issue</option>
                                    <option>Changed Mind/No Longer Needed</option>
                                    <option>Shipping or Delivery Issue</option>
                                    <option>Other</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="message" class="form-label">Message*</label>
                                  <textarea required class="form-control" id="message" name="message" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                  <label for="file" class="form-label text-left">Attach File</label>
                                  <input class="form-control" id="file" type="file" name="return_file" rows="3">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                  @endif
@endforeach
@empty
<span class="col-12 text-center text-muted">You have not purchased any item yet.</span>
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