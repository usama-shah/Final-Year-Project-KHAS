@extends('UserViews/Layout.layout')
@section('title','Inspection Report')
@section('style')
@endsection
@section('content')
<section class="checkout-wrapper section col-12 pt-4 pb-4 ">
   <div class="container">
      <div class="row justify-content-center ">




        <div class="row rounded">
            <!-- Sidebar-->
          @include('UserViews/Profile/Components/sidebar')

          <section class="col-lg-9  px-4 pb-4 mb-3">


         @if(!empty($phone))
         <form method="post" action="{{route('admin.inspection.create')}}">
            @csrf
         <div class="col-12">
<h3 class="w-100 text-center">Inspection Result</h3>

<table class="table table-striped table-hover">
    <tr>
        <th scope="row">Status</th>
        <td>{!! $inspection->status?$inspection->status : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
     </tr>
    <tr>
        <th scope="row">Inspected At</th>
        <td>{!! $inspection->created_at ?$inspection->created_at : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
     </tr>
    <tr>
        <th scope="row">Inspected By</th>
        <td>{!! $inspection->admin->name?$inspection->admin->name : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
     </tr>
    <tr>
        <th scope="row">Feedback</th>
        <td>{!! $inspection->message ?$inspection->message : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
     </tr>
</table>
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
                     <td>{!!$inspection->imei == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>

                  </tr>
                  <tr>
                    <th scope="row">Brand</th>
                    <td>{!! $phone->brand ? $phone->get_brand->name : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                    <td>{!!$inspection->brand == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
                 </tr>
                 <tr>
                    <th scope="row">Model</th>
                    <td>{!! $phone->model ? $phone->model : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                    <td>{!!$inspection->model == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
                 </tr>
                 <tr>
                    <th scope="row">Color</th>
                    <td>{!! $phone->color ? $phone->color : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                    <td>{!!$inspection->color == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
                 </tr>
                 <tr>
                    <th scope="row">Storage</th>
                    <td>{!! $phone->storage_capacity ? $phone->storage_capacity. "GB" : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                    <td>{!!$inspection->storage_capacity == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
                 </tr>
                 <tr>
                    <th scope="row">RAM</th>
                    <td>{!! $phone->ram ? $phone->ram." GB" : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                    <td>{!!$inspection->ram == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
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
                    <td>{!!$inspection->warranty_status == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
                 </tr>
                 <tr>
                    <th scope="row">Overall Condition</th>
                    <td>{!! $phone->condition ? $phone->condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                    <td>{!!$inspection->condition == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
                 </tr>
                 <tr>
                    <th scope="row">PTA</th>
                    <td>{!! $phone->pta_approved ? $phone->pta_approved : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                    <td>{!!$inspection->pta_approved == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
                 </tr>
                 <tr>
                    <th scope="row">SIM Status</th>
                    <td>{!! $phone->sim_status ? $phone->sim_status : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                    <td>{!!$inspection->sim_status == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
                 </tr>
                 <tr>
                    <th scope="row">Original Box</th>
                    <td>{!! $phone->original_packaging ? $phone->original_packaging : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                    <td>{!!$inspection->original_packaging == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
                 </tr>

                  <tr>
                     <th scope="row">Condition</th>
                     <td>{!! $phone->condition ? $phone->condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td>{!!$inspection->condition == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>

                  </tr>
                  <tr>
                     <th scope="row">Purchase Date</th>
                     <td>{!! $phone->purchase_date ? $phone->purchase_date : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td>{!!$inspection->purchase_date == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>

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
                        <td>{!!$inspection->purchase_proof == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>

                     </td>
                  </tr>

                  <tr>
                     <th scope="row">Accessories</th>
                     <td>{!! $phone->accessories ? implode(', ', json_decode($phone->accessories)) : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td>{!!$inspection->accessories == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
                 </tr>
                 <tr>
                     <th scope="row">Reason for Selling</th>
                     <td>{!! $phone->reason_for_selling ? $phone->reason_for_selling : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td>{!!$inspection->reason_for_selling == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
                 </tr>
                 <!-- Add checkbox input in each row -->
                 <tr>
                     <th scope="row">Battery Health</th>
                     <td>{!! $phone->battery_health ? $phone->battery_health . '%' : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td>{!!$inspection->battery_health == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
                 </tr>
                 <tr>
                     <th scope="row">Front Screen Condition</th>
                     <td>{!! $phone->front_screen_condition ? $phone->front_screen_condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     <td>{!!$inspection->front_screen_condition == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>

                 </tr>
                 <tr>
                  <th scope="row">Back Cover Condition</th>
                  <td>{!! $phone->back_cover_condition ? $phone->back_cover_condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td>{!!$inspection->back_cover_condition == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>

              </tr>

              <tr>
                  <th scope="row">Frame Edges Condition</th>
                  <td>{!! $phone->frame_edges_condition ? $phone->frame_edges_condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td>{!!$inspection->frame_edges_condition == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>

              </tr>

              <tr>
                  <th scope="row">Buttons Condition</th>
                  <td>{!! $phone->buttons_condition ? $phone->buttons_condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td>{!!$inspection->buttons_condition == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>

              </tr>

              <tr>
                  <th scope="row">Ports Condition</th>
                  <td>{!! $phone->ports_condition ? $phone->ports_condition : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td>{!!$inspection->ports_condition == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>

               </tr>

              <tr>
                  <th scope="row">Touchscreen Functionality</th>
                  <td>{!! $phone->touchscreen_functionality ? $phone->touchscreen_functionality : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td>{!!$inspection->touchscreen_functionality == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
               </tr>

              <!-- Add checkbox inputs in the remaining rows -->

              <tr>
                  <th scope="row">Screen Damage</th>
                  <td>{!! $phone->screen_damage ? $phone->screen_damage : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td>{!!$inspection->screen_damage == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>

               </tr>

              <tr>
                  <th scope="row">Water Damage</th>
                  <td>{!! $phone->water_damage ? $phone->water_damage : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td>{!!$inspection->water_damage == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>

               </tr>

              <tr>
                  <th scope="row">Battery Issues</th>
                  <td>{!! $phone->battery_issues ? $phone->battery_issues : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td>{!!$inspection->battery_issues == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
              </tr>

              <tr>
                  <th scope="row">Camera Issues</th>
                  <td>{!! $phone->camera_issues ? $phone->camera_issues : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td>{!!$inspection->camera_issues == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
              </tr>

              <tr>
                  <th scope="row">Audio Issues</th>
                  <td>{!! $phone->audio_issues ? $phone->audio_issues : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td>{!!$inspection->audio_issues == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
              </tr>

              <tr>
                  <th scope="row">Connectivity Issues</th>
                  <td>{!! $phone->connectivity_issues ? $phone->connectivity_issues : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td>{!!$inspection->connectivity_issues == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
              </tr>

              <tr>
                  <th scope="row">Sensor Issues</th>
                  <td>{!! $phone->sensor_issues ? $phone->sensor_issues : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td>{!!$inspection->sensor_issues == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
              </tr>

              <tr>
                  <th scope="row">Software Issues</th>
                  <td>{!! $phone->software_issues ? $phone->software_issues: '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td>{!!$inspection->software_issues == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
              </tr>
              <tr>
                  <th scope="row">Description</th>
                  <td>{!! $phone->description ? $phone->description: '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                  <td>{!!$inspection->description == "true" ? "<span class='text-danger'>Wrong</span>" : "<span class='text-success'>Correct</span>"!!}</td>
              </tr>
               </tbody>
            </table>


<div class="col-xl-3 col-md-4 col-sm- 6 mx-auto d-flex mb-4">

   <button class="mx-auto btn btn-primary" type="submit">Submit</button>
</div>
</form>
         @endif

          </section>

        </div>


      </div>
   </div>
</section>
@endsection
@section('script')
<script></script>
@endsection