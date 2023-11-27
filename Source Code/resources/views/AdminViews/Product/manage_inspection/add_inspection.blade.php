@extends('AdminViews.Layout.layout')
@section('title','Add Inpection')
@section('style')
<style>
</style>
@endsection
@section('content')
<main id="main" class="main">
   <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">
         <div class="col-md-10 m-auto">
            <div class="card-body  ">
               <h5 class="card-title w-100 text-center display-3">Add Inspection</h5>
               <!-- Add Inspection -->
               <form method="post" action="{{route('admin.inspection.get_phone')}}">
                  @csrf
                  <div class="row  mb-3">
                     <div class="col-12 mx-auto">
                        <div class="col-sm-12 mx-auto col-md-6 my-2">
                           <input type="text" placeholder="Enter Product ID" name="product_id" id="product_id" class="form-control">
                        </div>
                     </div>
                     <div class="col=12">
                        <div class="col-sm-12 mx-auto col-md-6 d-flex my-2">
                           <button class="btn btn-primary mx-auto">Find</button>
                        </div>
                     </div>
                  </div>
               </form>



               {{-- Phone Data --}}

            </div>
         </div>

         @if(!empty($phone))
         <form method="post" action="{{route('admin.inspection.create')}}">
            @csrf
         <div class="col-12">
<h3 class="w-100 text-center">Seller Info</h3>
<table class="table table-striped table-hover">
   <input type="hidden" name="phone_id" value="{{$phone->id}}" />
   <tr>
      <th scope="row">Name</th>
      <td>{!! $phone->user? $phone->user->first_name." ".$phone->user->last_name  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
   </tr>
   <tr>
      <th scope="row">Phone</th>
      <td>{!! $phone->user? $phone->user->phone  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
   </tr>
   <tr>
      <th scope="row">Email</th>
      <td>{!! $phone->user? $phone->user->email  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
  <input type="hidden" name="seller_email" value="{{$phone->user->email}}"/>
   </tr>
   <tr>
      <th scope="row">CNIC Number</th>
      <td>{!! $phone->user? $phone->user->cnic  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
   </tr>
   <tr>
      <th scope="row">Address</th>
      <td>{!! $phone->user? $phone->user->address  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
   </tr>
</table>
         </div>

         <div class="col-12 mt-4">
<h3 class="w-100 text-center">Cutomer Information</h3>
<table class="table table-striped table-hover">
   <tbody>
      <tr>
         <th scope="row">Purchased By</th>
         <td>{!! $purchaser? $purchaser->first_name." ". $purchaser->last_name  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
      </tr>
      <tr>
         <th scope="row">Purchaser Phone</th>
         <td>{!! $purchaser? $purchaser->phone  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
      </tr>
      <tr>
         <th scope="row">Purchaser Email</th>
         <td>{!! $purchaser? $purchaser->email  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
         <input type="hidden" name="customer_email" value="{{$purchaser->email}}"/>

      </tr>
      <tr>
         <th scope="row">Purchased At</th>
         <td>{!! $phone->created_at? $phone->created_at : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
      </tr>
      <tr>
         <th scope="row">Payment Status</th>

         <td>{!! $transaction? $transaction->status : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
      </tr>
      <tr>
         <th scope="row">Payment Done At</th>

         <td>{!! $transaction? $transaction->created_at : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
      </tr>
      <tr>
         <th scope="row">Payment Method</th>

         <td>{!! $transaction? $transaction->method : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
      </tr>
      <tr>
         <th scope="row">Transaction ID</th>

         <td>{!! $transaction? $transaction->transaction_id : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
      </tr>
      <tr>
         <th scope="row">Amount</th>

         <td>{!! $transaction? "RS ". number_format($transaction->amount) : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
      </tr>
   </tbody>
</table>

         </div>
         <div class="col-12 mt-4">
<h3 class="w-100 text-center">Phone Information</h3>
            <table class="table table-striped table-hover">
               <thead>

                  <tr>
                     <th>Field</th>
                     <th>Information</th>
                     <th>Wrong</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th scope="row">Status</th>
                     <td>{!! $phone->status? $phone->status  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                 <td></td>
                  </tr>

                  <tr>
                     <th scope="row">Price</th>
                     <td>{!! $phone->formatted_price ? "RS ".$phone->formatted_price: '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td></td>
                  </tr>
                  <tr>
                     <th scope="row">IMEI Number</th>
                     <td>{!! $phone->imei ? "RS ".$phone->imei: '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
              <td><input type="checkbox" value="true" class="" name="imei"></td>
                  </tr>
                  <tr>
                     <th scope="row">Brand</th>
                     <td>{!! $phone->brand ? $phone->get_brand->name : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td><input type="checkbox" value="true" class="" name="brand"></td>

                  </tr>
                  <tr>
                     <th scope="row">Model</th>
                     <td>{!! $phone->model ? $phone->model : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td><input type="checkbox" value="true" class="" name="model"></td>

                  </tr>
                  <tr>
                     <th scope="row">Color</th>
                     <td>{!! $phone->color ? $phone->color : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td><input type="checkbox" value="true" class="" name="color"></td>

                  </tr>
                  <tr>
                     <th scope="row">Storage</th>
                     <td>{!! $phone->storage_capacity ? $phone->storage_capacity. "GB" : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td><input type="checkbox" value="true" class="" name="storage_capacity"></td>

                  </tr>
                  <tr>
                     <th scope="row">RAM</th>
                     <td>{!! $phone->ram ? $phone->ram." GB" : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td><input type="checkbox" value="true" class="" name="ram"></td>

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
                        <td><input type="checkbox" value="true" class="" name="warranty_status"></td>

                     </td>
                  </tr>
                  <tr>
                     <th scope="row">Overall Condition</th>
                     <td>{!! $phone->condition ? $phone->condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td><input type="checkbox" value="true" class="" name="condition"></td>

                  </tr>

                  <tr>
                     <th scope="row">PTA</th>
                     <td>{!! $phone->pta_approved ? $phone->pta_approved : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td><input type="checkbox" value="true" class="" name="pta_approved"></td>

                  </tr>
                  <tr>
                     <th scope="row">SIM Status</th>
                     <td>{!! $phone->sim_status ? $phone->sim_status : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td><input type="checkbox" value="true" class="" name="sim_status"></td>

                  </tr>
                  <tr>
                     <th scope="row">Original Box</th>
                     <td>{!! $phone->original_packaging ? $phone->original_packaging : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td><input type="checkbox" value="true" class="" name="original_packaging"></td>

                  </tr>
                  <tr>
                     <th scope="row">Condition</th>
                     <td>{!! $phone->condition ? $phone->condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td><input type="checkbox" value="true" class="" name="condition"></td>

                  </tr>
                  <tr>
                     <th scope="row">Purchase Date</th>
                     <td>{!! $phone->purchase_date ? $phone->purchase_date : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td><input type="checkbox" value="true" class="" name="purchase_date"></td>

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
                        <td><input type="checkbox" value="true" class="" name="purchase_proof"></td>

                     </td>
                  </tr>

                  <tr>
                     <th scope="row">Accessories</th>
                     <td>{!! $phone->accessories ? implode(', ', json_decode($phone->accessories)) : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td><input type="checkbox" value="true" class="" name="accessories"></td>
                 </tr>
                 <tr>
                     <th scope="row">Reason for Selling</th>
                     <td>{!! $phone->reason_for_selling ? $phone->reason_for_selling : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td><input type="checkbox" value="true" class="" name="reason_for_selling"></td>
                 </tr>
                 <!-- Add checkbox input in each row -->
                 <tr>
                     <th scope="row">Battery Health</th>
                     <td>{!! $phone->battery_health ? $phone->battery_health . '%' : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td><input type="checkbox" value="true" class="" name="battery_health"></td>
                 </tr>
                 <tr>
                     <th scope="row">Front Screen Condition</th>
                     <td>{!! $phone->front_screen_condition ? $phone->front_screen_condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td><input type="checkbox" value="true" class="" name="front_screen_condition"></td>
                 </tr>
                 <tr>
                  <th scope="row">Back Cover Condition</th>
                  <td>{!! $phone->back_cover_condition ? $phone->back_cover_condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td><input type="checkbox" value="true" class="" name="back_cover_condition"></td>
              </tr>

              <tr>
                  <th scope="row">Frame Edges Condition</th>
                  <td>{!! $phone->frame_edges_condition ? $phone->frame_edges_condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td><input type="checkbox" value="true" class="" name="frame_edges_condition"></td>
              </tr>

              <tr>
                  <th scope="row">Buttons Condition</th>
                  <td>{!! $phone->buttons_condition ? $phone->buttons_condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td><input type="checkbox" value="true" class="" name="buttons_condition"></td>
              </tr>

              <tr>
                  <th scope="row">Ports Condition</th>
                  <td>{!! $phone->ports_condition ? $phone->ports_condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td><input type="checkbox" value="true" class="" name="ports_condition"></td>
              </tr>

              <tr>
                  <th scope="row">Touchscreen Functionality</th>
                  <td>{!! $phone->touchscreen_functionality ? $phone->touchscreen_functionality : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td><input type="checkbox" value="true" class="" name="touchscreen_functionality"></td>
              </tr>

              <!-- Add checkbox inputs in the remaining rows -->

              <tr>
                  <th scope="row">Screen Damage</th>
                  <td>{!! $phone->screen_damage ? $phone->screen_damage : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td><input type="checkbox" value="true" class="" name="screen_damage"></td>
              </tr>

              <tr>
                  <th scope="row">Water Damage</th>
                  <td>{!! $phone->water_damage ? $phone->water_damage : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td><input type="checkbox" value="true" class="" name="water_damage"></td>
              </tr>

              <tr>
                  <th scope="row">Battery Issues</th>
                  <td>{!! $phone->battery_issues ? $phone->battery_issues : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td><input type="checkbox" value="true" class="" name="battery_issues"></td>
              </tr>

              <tr>
                  <th scope="row">Camera Issues</th>
                  <td>{!! $phone->camera_issues ? $phone->camera_issues : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td><input type="checkbox" value="true" class="" name="camera_issues"></td>
              </tr>

              <tr>
                  <th scope="row">Audio Issues</th>
                  <td>{!! $phone->audio_issues ? $phone->audio_issues : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td><input type="checkbox" value="true" class="" name="audio_issues"></td>
              </tr>

              <tr>
                  <th scope="row">Connectivity Issues</th>
                  <td>{!! $phone->connectivity_issues ? $phone->connectivity_issues : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td><input type="checkbox" value="true" class="" name="connectivity_issues"></td>
              </tr>

              <tr>
                  <th scope="row">Sensor Issues</th>
                  <td>{!! $phone->sensor_issues ? $phone->sensor_issues : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td><input type="checkbox" value="true" class="" name="sensor_issues"></td>
              </tr>

              <tr>
                  <th scope="row">Software Issues</th>
                  <td>{!! $phone->software_issues ? $phone->software_issues: '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td><input type="checkbox" value="true" class="" name="software_issues"></td>
              </tr>
              <tr>
                  <th scope="row">Description</th>
                  <td>{!! $phone->description ? $phone->description: '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td><input type="checkbox" value="true" class="" name="description"></td>
              </tr>
               </tbody>
            </table>

            <div class="col-12">
               <h3 class="w-100 text-center">Action</h3>
<div class="col-md-7 mx-auto my-4">

   <label>Inspection Status</label>
   <select required name="status" class="form-control col-12 my-2">
<option value=""  selected disabled>Select Status</option>
      <option  value="Approved">Approved</option>
      <option value="Rejected">Rejected</option>
   </select>
   <label class="mt-3">Message/Remarks</label>
   <textarea rows="6" class="form-control" name="messsage"></textarea>
</div>
            </div>
         </div>
<div class="col-xl-3 col-md-4 col-sm- 6 mx-auto d-flex mb-4">

   <button class="mx-auto btn btn-primary" type="submit">Submit</button>
</div>
</form>
         @endif
      </div>
   </section>
</main>
@endsection
@section('script')
<script></script>
@endsection