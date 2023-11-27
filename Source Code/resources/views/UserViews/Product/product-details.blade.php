@if(empty($phone))
<?php return redirect()->route('not_found'); ?>
@endif
@extends('UserViews/Layout.layout')
@section('title', $phone->title)
@section('style')
<style></style>
@endsection
@section('content')
<section class="checkout-wrapper section col-12 pt-4 pb-4 ">
   <div class="container">
      <div class="row shadow-lg py-3 rounded-3 justify-content-center">
         <div class="col-md-6">
            <div class="main-img border text-center col-12">
               <img style="max-width: 100%; height: auto;" src="{{$phone->main_image}}" id="current" alt="#">
            </div>

            @if(!empty($phone->additional_images))
            <div class="images row border py-3 mt-4">
               @php
               $additionalImages = json_decode($phone->additional_images, true);
               @endphp
               @foreach($additionalImages as $image)
               <div class="col-3 text-center mb-3" role="button">
                  <img width="95%" height="100%" src="{{ $image }}" class="img select-img" alt="#">
               </div>
               @endforeach
            </div>
            @endif
         </div>
         <div class="col-md-6">
            <div class="product-info">
               <h1 class="title">{{$phone->title}}</h1>
               <div class="d-flex justify-content-between">
                  <p class="category"> Posted by:<a href="{{route('profile.show',$id=$phone->user)}}">{{$phone->user->first_name." ".$phone->user->last_name}}</a></p>
                  <p class="category">
                     Posted:
                     <spna class="text-muted">
                     {{ dateDiff($phone->created_at) }}</span>
                  </p>
               </div>
               <h3 class="price">Price : <span >{{ $phone->formatted_price }}
                  </span>
               </h3>
               {{--
               <div class="col-lg-4 mb-5 col-md-4 col-12">
                  <div class="form-group quantity">
                     <label for="color">Quantity</label>
                     <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                     </select>
                  </div>
               </div>
               --}}
               <table class="table table-striped table-hover">
                  <tbody>
                     <tr>
                        <th scope="row">Brand</th>
                        <td>{!! $phone->brand ? $phone->get_brand->name : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     </tr>
                     <tr>
                        <th scope="row">Model</th>
                        <td>{!! $phone->model ? $phone->model : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     </tr>
                     <tr>
                        <th scope="row">Color</th>
                        <td>{!! $phone->color ? $phone->color : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     </tr>
                     <tr>
                        <th scope="row">Storage</th>
                        <td>{!! $phone->storage_capacity ? $phone->storage_capacity. "GB" : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     </tr>
                     <tr>
                        <th scope="row">RAM</th>
                        <td>{!! $phone->ram ? $phone->ram." GB" : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     </tr>
                     <tr>
                        <th scope="row">Warranty</th>
                        <td>
                           @if($phone->warranty_status)
                           <span class="{{ ($phone->warranty_status != 'active') ? 'text-danger' : 'text-success' }}">{{ $phone->warranty_status }}</span>
                           @if($phone->warranty_status == "active")
                           (expiring on {{ $phone->expiration_date }})
                           @endif
                           @else
                           <span class="text-muted font-italic">Not Provided</span>
                           @endif
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">Overall Condition</th>
                        <td>{!! $phone->condition ? $phone->condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     </tr>
                     <!-- Add more issues as needed -->
                  </tbody>
               </table>
            </div>
            <div class="bottom-content">
               <div class="row align-items-end">
                  <div class="col-md-4 text-center">
                     @if($phone->status!="Available")
                     <button class="btn btn-outline-danger " disabled style="width: 100%;"><i class="bi bi-slash-circle"></i> SOLD</button>
                     @else
                     <button class="btn btn-outline-primary addToCart" data-phone-id="{{$phone->id}}" style="width: 100%;"><i class="bi bi-cart3"></i> Add to Cart</button>
                     @endif
                  </div>
                  <div class="col-md-4 text-center">
                     <button class="btn btn-outline-khas-primary add-to-compare" data-phone-id="{{ $phone->id }}"><i class="bi bi-arrow-left-right"></i> Add to Compare</button>
                  </div>
                  <div class="col-md-4 text-center">
                     <button class="btn btn-outline-khas-primary add-to-favorites" data-phone-id="{{$phone->id}}"><i class="bi bi-suit-heart"></i> Add to Wishlist</button>
                  </div>
                  @if($phone->status==="Available")
                  <div class="col-12 text-center my-4">
                     <button class="btn col-12 btn-khas-primary checkoutBtn" data-phone-id="{{$phone->id}}"><i class="bi bi-bag-fill"></i> Buy Now</button>
                  </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
      @if($phone->description)
      <h3 class="mb-3 mt-4 w-100 text-center">Description</h3>
      <p>{{$phone->description}}</p>
      @endif
      <table style="table-layout: fixed" class="table table-bordered  table-hover">
         <tbody>
            <tr>
               <th scope="row">Status</th>
               <td>{!! $phone->status ? $phone->status : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
            </tr>
            <tr>
               <th scope="row">PTA</th>
               <td>{!! $phone->pta_approved ? $phone->pta_approved : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
            </tr>
            <tr>
               <th scope="row">SIM Status</th>
               <td>{!! $phone->sim_status ? $phone->sim_status : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
            </tr>
            <tr>
               <th scope="row">Original Box</th>
               <td>{!! $phone->original_packaging ? $phone->original_packaging : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
            </tr>
            <tr>
               <th scope="row">Condition</th>
               <td>{!! $phone->condition ? $phone->condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
            </tr>
            <tr>
               <th scope="row">Purchase Date</th>
               <td>{!! $phone->purchase_date ? $phone->purchase_date : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
            </tr>
            <tr>
               <th scope="row">Purchase Proof</th>
               <td>
                  @if($phone->purchase_proof)
                  <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#purchaseProofModal">
                  View
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="purchaseProofModal" tabindex="-1" aria-labelledby="purchaseProofModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="purchaseProofModalLabel">Purchase Proof</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              <img src="{{ $phone->purchase_proof }}" alt="Purchase Proof" class="img-fluid">
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  @else
                  <span class="text-muted font-italic">Not Provided</span>
                  @endif
               </td>
            </tr>
            <tr>
               <th scope="row">Warranty Status</th>
               <td>
                  @if($phone->warranty_status)
                  <span class="{{ ($phone->warranty_status != 'active') ? 'text-danger' : 'text-success' }}">{{ $phone->warranty_status }}</span>
                  @if($phone->warranty_status == "active")
                  (expiring on {{ $phone->expiration_date }})
                  @endif
                  @else
                  <span class="text-muted font-italic">Not Provided</span>
                  @endif
               </td>
            </tr>
            <tr>
               <th scope="row">Accessories</th>
               <td>{!! $phone->accessories ? implode(', ', json_decode($phone->accessories)) : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
            </tr>
            <tr>
               <th scope="row">Reason for Selling</th>
               <td>{!! $phone->reason_for_selling ? $phone->reason_for_selling : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
            </tr>
         </tbody>
         /
      </table>
      <ul class="nav nav-tabs" id="myTabs" role="tablist">
         <li class="nav-item col" role="presentation">
            <a class="nav-link active" id="issues-tab" data-bs-toggle="tab" href="#issues" role="tab" aria-controls="issues" aria-selected="true">Issues/Damages</a>
         </li>
         <li class="nav-item col" role="presentation">
            <a class="nav-link" id="conditions-tab" data-bs-toggle="tab" href="#conditions" role="tab" aria-controls="conditions" aria-selected="false">Conditions</a>
         </li>
      </ul>
      <div class="tab-content" id="myTabsContent">
         <div class="tab-pane fade show active" id="issues" role="tabpanel" aria-labelledby="issues-tab">
            <!-- issues content goes here -->
            <table class="table table-striped table-hover my-3">
               <tbody>
                  <tr>
                     <th scope="row">Battery Health</th>
                     <td>{!! $phone->battery_health ? $phone->battery_health . '%' : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  </tr>
                  <tr>
                     <th scope="row">Front Screen Condition</th>
                     <td>{!! $phone->front_screen_condition ? $phone->front_screen_condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  </tr>
                  <tr>
                     <th scope="row">Back Cover Condition</th>
                     <td>{!! $phone->back_cover_condition ? $phone->back_cover_condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  </tr>
                  <tr>
                     <th scope="row">Frame Edges Condition</th>
                     <td>{!! $phone->frame_edges_condition ? $phone->frame_edges_condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  </tr>
                  <tr>
                     <th scope="row">Buttons Condition</th>
                     <td>{!! $phone->buttons_condition ? $phone->buttons_condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  </tr>
                  <tr>
                     <th scope="row">Ports Condition</th>
                     <td>{!! $phone->ports_condition ? $phone->ports_condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  </tr>
                  <tr>
                     <th scope="row">Touchscreen Functionality</th>
                     <td>{!! $phone->touchscreen_functionality ? $phone->touchscreen_functionality : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="tab-pane fade" id="conditions" role="tabpanel" aria-labelledby="conditions-tab">
            <!-- Conditions content goes here -->
            <table class="table table-striped table-hover my-3">
               <tbody>
                  <tr>
                     <th scope="row">Screen Damage</th>
                     <td>{!! $phone->screen_damage ? $phone->screen_damage : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  </tr>
                  <tr>
                     <th scope="row">Water Damage</th>
                     <td>{!! $phone->water_damage ? $phone->water_damage : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  </tr>
                  <tr>
                     <th scope="row">Battery Issues</th>
                     <td>{!! $phone->battery_issues ? $phone->battery_issues : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  </tr>
                  <tr>
                     <th scope="row">Camera Issues</th>
                     <td>{!! $phone->camera_issues ? $phone->camera_issues : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  </tr>
                  <tr>
                     <th scope="row">Audio Issues</th>
                     <td>{!! $phone->audio_issues ? $phone->audio_issues : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  </tr>
                  <tr>
                     <th scope="row">Connectivity Issues</th>
                     <td>{!! $phone->connectivity_issues ? $phone->connectivity_issues : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  </tr>
                  <tr>
                     <th scope="row">Sensor Issues</th>
                     <td>{!! $phone->sensor_issues ? $phone->sensor_issues : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  </tr>
                  <tr>
                     <th scope="row">Software Issues</th>
                     <td>{!! $phone->software_issues ? $phone->software_issues: '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="container mt-5">
            <h3>You May Also Like</h3>
            <div class="row d-flex ">
               @foreach($relatedPhones as $rphone)
               <div class="col-md-4 ">
                  <div class="card mb-4 ">
                     <a href="{{route('phones.show',$id=$rphone->id)}}" > <img src="{{$rphone->main_image}}" class="card-img-top" alt="Phone Image"></a>
                     <div class="card-body">
                        <a href="{{route('phones.show',$id=$rphone->id)}}" >
                           <h5 class="card-title">{{$rphone->title}}</h5>
                        </a>
                        <p class="card-text">{{ Str::words($rphone->description, $words = 40, $end = '...') }}</p>
                        <div class="d-flex align-items-center justify-content-between">
                           <b>Price: RS {{$rphone->formatted_price}}</b>
                           <a href="{{route('phones.show',$id=$rphone->id)}}" class="btn btn-primary">View Details</a>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@section('script')
<script>
   // Image selection script
   $('.select-img').click(function () {
       var selected = $(this).attr("src");
       $('#current').attr("src", selected);
   });
</script>
@endsection