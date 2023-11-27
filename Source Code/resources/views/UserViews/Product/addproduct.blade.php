@extends('UserViews/Layout.layout')
@section('title','Upload Phone Data ')
@section('style')
<style>
  .preview-container {
    position: relative;
    display: inline-block;
  }

  .remove-btn {
    position: absolute;
    top: -5px;
    right: -5px;
    display: none;
  }
</style>
@endsection
@section('content')
<section class="checkout-wrapper section col-12 pt-4 pb-4 ">
   <div class="container">
      <div class="row justify-content-center">
         <div class="py-3 shadow-lg rounded-4 px-4 col-md-8 ">
            <!-- Title-->
            <div class="d-sm-flex flex-wrap justify-content-between align-items-center pb-2">
               <h2 class=" py-2 text-center w-100 ">Add New Product</h2>
            </div>

            <form class="needs-validation" action="{{route('phones.create')}}" method="post" enctype='multipart/form-data'>
               @csrf
               @if($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif


           <div class="mb-3 form-group col-12 pb-2">
            <label class="form-label" for="title">Post Title*</label>
            <input class="form-control" type="text" name="title" id="title" required="" value="{{ isset($phone) ? $phone->title : old('title') }}">
            <div class="invalid-feedback">
              Please enter a name.
            </div>
          </div>
               <div class="row">
                <div class="mb-3 col-sm-6 pb-2">
                  <label class="form-label" for="brand">Phone Brand*</label>
                  <select required="" class="form-control " name="brand" id="brand">
                    <option value="" selected disabled>Select Brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ (isset($phone) && $phone->brand == $brand->id) || old('brand') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>

                </div>

                <div class="mb-3 col-sm-6 pb-2">
                  <label class="form-label" for="model">Model Name*</label>
                  <input required="" class="form-control" type="text" name="model" id="model" value="{{ isset($phone) ? $phone->model : old('model') }}">

                </div>
                <div class="mb-3 col-sm-6 pb-2">
                  <label class="form-label" for="price">Price*</label>
                  <input required="" class="form-control" type="number" step="0.01" name="price" id="price" value="{{ isset($phone) ? $phone->price : old('price') }}">
                </div>
                <div class="mb-3 col-sm-6 pb-2">
                  <label class="form-label" for="color">Color*</label>
                  <input required="" class="form-control" type="text" name="color" id="color" value="{{ isset($phone) ? $phone->color : old('color') }}">
                </div>
                <div class="mb-3 col-sm-6 pb-2">
                  <label class="form-label" for="pta_approved">PTA Approved*</label>
                  <select required="" class="form-control" name="pta_approved" id="pta_approved">
                    <option selected value="" disabled>Select PTA Status</option>
                    <option value="Approved" {{ old('pta_approved', isset($phone) && $phone->pta_approved == 'Approved' ? 'selected' : '') }}>Approved</option>
                    <option value="Not Approved" {{ old('pta_approved', isset($phone) && $phone->pta_approved == 'Not Approved' ? 'selected' : '') }}>Not Approved</option>
                  </select>
                </div>

                  <div class="mb-3 col-sm-6 pb-2">
                    <label class="form-label" for="pta_approved">SIM Status*</label>
                  <select required="" class="form-control" name="sim_status" id="sim_status">
                    <option selected value="" disabled>Select SIM Status</option>
                    <option value="Working" {{ old('sim_status', isset($phone) && $phone->sim_status == 'Working' ? 'selected' : '') }}>Working</option>
                    <option value="Not Working" {{ old('sim_status', isset($phone) && $phone->sim_status == 'Not Working' ? 'selected' : '') }}>Not Working</option>
                  </select>

                </div>
                <div class="mb-3 col-sm-6 pb-2">
                  <label class="form-label" for="storage_capacity">Storage Capacity*</label>
                  <select required="" class="form-control" name="storage_capacity" id="storage_capacity">
                    <option selected value="" disabled>Select Storage</option>
                    <option value="8" {{ isset($phone) && $phone->storage_capacity == '8' ? 'selected' : '' }}>8 GB</option>
                    <option value="16" {{ isset($phone) && $phone->storage_capacity == '16' ? 'selected' : '' }}>16 GB</option>
                    <option value="32" {{ isset($phone) && $phone->storage_capacity == '32' ? 'selected' : '' }}>32 GB</option>
                    <option value="64" {{ isset($phone) && $phone->storage_capacity == '64' ? 'selected' : '' }}>64 GB</option>
                    <option value="128" {{ isset($phone) && $phone->storage_capacity == '128' ? 'selected' : '' }}>128 GB</option>
                    <option value="256" {{ isset($phone) && $phone->storage_capacity == '256' ? 'selected' : '' }}>256 GB</option>
                    <option value="512" {{ isset($phone) && $phone->storage_capacity == '512' ? 'selected' : '' }}>512 GB</option>
                  </select>
                </div>
                  <div class="col-6 ">
                     <label class="form-label" for="unp-product-name">RAM*</label>
                     <select required="" class="form-select" name="ram" id="ram">
                      <option selected value="" disabled>Select Ram</option>
                      <option value="1" {{ $phone && $phone->ram == 1 ? 'selected' : '' }}>1 GB</option>
                      <option value="2" {{ $phone && $phone->ram == 2 ? 'selected' : '' }}>2 GB</option>
                      <option value="3" {{ $phone && $phone->ram == 3 ? 'selected' : '' }}>3 GB</option>
                      <option value="4" {{ $phone && $phone->ram == 4 ? 'selected' : '' }}>4 GB</option>
                      <option value="5" {{ $phone && $phone->ram == 5 ? 'selected' : '' }}>5 GB</option>
                      <option value="6" {{ $phone && $phone->ram == 6 ? 'selected' : '' }}>6 GB</option>
                      <option value="7" {{ $phone && $phone->ram == 7 ? 'selected' : '' }}>7 GB</option>
                      <option value="8" {{ $phone && $phone->ram == 8 ? 'selected' : '' }}>8 GB</option>
                   </select>

                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                     <label class="form-label" for="original_packaging">
                     Box Available*
                     <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Indicates if the original box is available."></i>
                     </label>
                     <select  class="form-control" name="original_packaging" id="original_packaging">
                     <option value="Yes" {{ (isset($phone) && $phone->original_packaging == 'Yes') ? 'selected' : (old('original_packaging') == 'Yes' ? 'selected' : '') }}>Yes</option>
                     <option value="No" {{ (isset($phone) && $phone->original_packaging == 'No') ? 'selected' : (old('original_packaging') == 'No' ? 'selected' : '') }}>No</option>
                     </select>
                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                     <label class="form-label" for="condition">
                     Overall Condition
                     <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select the overall condition of the phone."></i>
                     </label>
                     <select class="form-control" name="condition" id="condition">
                    <option value="Used" {{ (isset($phone) && $phone->condition == 'Used') ? 'selected' : (old('condition') == 'Used' ? 'selected' : '') }}>Used</option>
                     <option value="Boxed Packed" {{ (isset($phone) && $phone->condition == 'Pin Packed') ? 'selected' : (old('condition') == 'Pin Packed' ? 'selected' : '') }}>Pin Packed</option>
                     <option value="New" {{ (isset($phone) && $phone->condition == 'New') ? 'selected' : (old('condition') == 'New' ? 'selected' : '') }}>New</option>
                     <option value="Like New" {{ (isset($phone) && $phone->condition == 'Like New') ? 'selected' : (old('condition') == 'Like New' ? 'selected' : '') }}>Like New</option>
                     </select>
                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                     <label class="form-label" for="purchase_date">
                     Purchase Date
                     <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Enter the date when the phone was purchased by you."></i>
                     </label>                     <input class="form-control" type="date" name="purchase_date" id="purchase_date" value="{{ old('purchase_date') }}">
                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                    <label class="form-label" for="purchase-proof">
                      Purchase Receipt
                      <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Upload a copy of the purchase receipt if available."></i>
                    </label>
                    <div class="input-group">
                      <input class="form-control" type="file" name="purchase_proof" id="purchase-proof" accept="image/*">
                      <button type="button" class="btn btn-outline-danger" id="remove-image-btn" style="display:none"><i class="bi bi-x-lg"></i></button>
                    </div>
                    <div class="mt-2">
                      <img id="preview-image" src="#" alt="Preview" style="display:none; width:50px; height:50px;">
                    </div>
                  </div>


                  <div class="mb-3 col-sm-6 pb-2">
                     <label class="form-label" for="warranty_status">
                     Warranty Status
                     <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select the current warranty status of the phone."></i>
                     </label>                   <select class="form-control" name="warranty_status" id="warranty_status">
                      <option value="expired" {{ old('warranty_status', $phone->warranty_status ?? '') == 'expired' ? 'selected' : '' }}>Expired</option>
                      <option value="active" {{ old('warranty_status', $phone->warranty_status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                    </select>

                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                     <label class="form-label" for="expiration_date">
                     Warranty Expiration Date
                     <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Enter the warranty expiration date if the warranty is still active."></i>
                     </label>                     <input class="form-control" type="date" name="expiration_date" id="expiration_date" value="{{ old('expiration_date') }}" disabled>
                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                     <label class="form-label" for="operating_system">
                     Operating System*
                     <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Enter the current operating system version installed on the phone."></i>
                     </label>                     <input required class="form-control" type="text" name="operating_system" id="operating_system" value="{{ old('operating_system') }}">
                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                     <label class="form-label" for="battery_health">
                     Battery Health*
                     <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Enter the battery health percentage of the phone."></i>
                     </label>                     <input required class="form-control" type="number" min="0" max="100" step="1" name="battery_health" id="battery_health" value="{{ old('battery_health') }}">
                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                    <label class="form-label" for="accessories">
                      Accessories Included
                      <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select the accessories included with the phone.You can also select multiple accessories."></i>
                    </label>
                    <select class="form-control select2" name="accessories[]" id="accessories" multiple>
                      @php
                        $accessoriesList = ['Charger', 'Headphones', 'Case', 'Screen Protector', 'USB Cable', 'SIM Eject Tool', 'Car Charger', 'Wireless Charger', 'Power Bank', 'Bluetooth Speaker', 'Bluetooth Headset', 'Stylus Pen'];
                        $selectedAccessories = old('accessories', isset($phone) && $phone->accessories ? json_decode($phone->accessories) : []);
                      @endphp
                      @foreach($accessoriesList as $accessory)
                        <option {{ in_array($accessory, $selectedAccessories) ? 'selected' : '' }}>{{ $accessory }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="mb-3 col-sm-6 pb-2">
                     <label class="form-label" for="reason_for_selling">
                     Reason for Selling
                     <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Enter the reason for selling the phone."></i>
                     </label>                     <input class="form-control" type="text" name="reason_for_selling" id="reason_for_selling" value="{{ old('reason_for_selling') }}">
                  </div>
                  <!-- Physical condition -->
                  <div class="mb-3 col-sm-6 pb-2">
                     <label class="form-label" for="front_screen_condition">
                     Front Screen Condition
                     <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select the condition of the front screen."></i>
                     </label>
                     <select class="form-control" name="front_screen_condition" id="front_screen_condition">
                     <option value="No scratches" {{ (isset($phone) && $phone->front_screen_condition == 'No scratches') ? 'selected' : (old('front_screen_condition') == 'No scratches' ? 'selected' : '') }}>No scratches</option>
                     <option value="Minor scratches" {{ (isset($phone) && $phone->front_screen_condition == 'Minor scratches') ? 'selected' : (old('front_screen_condition') == 'Minor scratches' ? 'selected' : '') }}>Minor scratches</option>
                     <option value="Deep scratches" {{ (isset($phone) && $phone->front_screen_condition == 'Deep scratches') ? 'selected' : (old('front_screen_condition') == 'Deep scratches' ? 'selected' : '') }}>Deep scratches</option>
                     <option value="Cracked" {{ (isset($phone) && $phone->front_screen_condition == 'Cracked') ? 'selected' : (old('front_screen_condition') == 'Cracked' ? 'selected' : '') }}>Cracked</option>
                     </select>
                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                     <label class="form-label" for="back_cover_condition">
                     Back Cover Condition
                     <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select the condition of the back cover."></i>
                     </label>
                     <select class="form-control" name="back_cover_condition" id="back_cover_condition">
                     <option value="No scratches" {{ (isset($phone) && $phone->back_cover_condition == 'No scratches') ? 'selected' : (old('back_cover_condition') == 'No scratches' ? 'selected' : '') }}>No scratches</option>
                     <option value="Minor scratches" {{ (isset($phone) && $phone->back_cover_condition == 'Minor scratches') ? 'selected' : (old('back_cover_condition') == 'Minor scratches' ? 'selected' : '') }}>Minor scratches</option>
                     <option value="Deep scratches" {{ (isset($phone) && $phone->back_cover_condition == 'Deep scratches') ? 'selected' : (old('back_cover_condition') == 'Deep scratches' ? 'selected' : '') }}>Deep scratches</option>
                     <option value="Cracked" {{ (isset($phone) && $phone->back_cover_condition == 'Cracked') ? 'selected' : (old('back_cover_condition') == 'Cracked' ? 'selected' : '') }}>Cracked</option>
                     </select>
                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                     <label class="form-label" for="frame_edges_condition">
                     Frame and Edges Condition
                     <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select the condition of the frame and edges of the phone."></i>
                     </label>
                     <select class="form-control" name="frame_edges_condition" id="frame_edges_condition">
                     <option value="No scratches" {{ (isset($phone) && $phone->frame_edges_condition == 'No scratches') ? 'selected' : (old('frame_edges_condition') == 'No scratches' ? 'selected' : '') }}>No scratches</option>
                     <option value="Minor scratches" {{ (isset($phone) && $phone->frame_edges_condition == 'Minor scratches') ? 'selected' : (old('frame_edges_condition') == 'Minor scratches' ? 'selected' : '') }}>Minor scratches</option>
                     <option value="Deep scratches" {{ (isset($phone) && $phone->frame_edges_condition == 'Deep scratches') ? 'selected' : (old('frame_edges_condition') == 'Deep scratches' ? 'selected' : '') }}>Deep scratches</option>
                     <option value="Dents" {{ (isset($phone) && $phone->frame_edges_condition == 'Dents') ? 'selected' : (old('frame_edges_condition') == 'Dents' ? 'selected' : '') }}>Dents</option>
                     </select>
                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                     <label class="form-label" for="buttons_condition">
                     Buttons Condition
                     <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select the condition of the buttons."></i>
                     </label>
                     <select class="form-control" name="buttons_condition" id="buttons_condition">
                     <option value="Fully functional" {{ (isset($phone) && $phone->buttons_condition == 'Fully functional') ? 'selected' : (old('buttons_condition') == 'Fully functional' ? 'selected' : '') }}>Fully functional</option>
                     <option value="Slightly stuck" {{ (isset($phone) && $phone->buttons_condition == 'Slightly stuck') ? 'selected' : (old('buttons_condition') == 'Slightly stuck' ? 'selected' : '') }}>Slightly stuck</option>
                     <option value="Not functional" {{ (isset($phone) && $phone->buttons_condition == 'Not functional') ? 'selected' : (old('buttons_condition') == 'Not functional' ? 'selected' : '') }}>Not functional</option>
                     </select>
                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                     <label class="form-label" for="ports_condition">
                     Ports Condition
                     <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select the condition of the ports.e.g charging port"></i>
                     </label>
                     <select class="form-control" name="ports_condition" id="ports_condition">
                        <option value="Excellent" {{ isset($phone) && $phone->ports_condition == 'Excellent' ? 'selected' : (old('ports_condition') == 'Excellent' ? 'selected' : '') }}>Excellent</option>
                        <option value="Good" {{ isset($phone) && $phone->ports_condition == 'Good' ? 'selected' : (old('ports_condition') == 'Good' ? 'selected' : '') }}>Good</option>
                        <option value="Fair" {{ isset($phone) && $phone->ports_condition == 'Fair' ? 'selected' : (old('ports_condition') == 'Fair' ? 'selected' : '') }}>Fair</option>
                        <option value="Poor" {{ isset($phone) && $phone->ports_condition == 'Poor' ? 'selected' : (old('ports_condition') == 'Poor' ? 'selected' : '') }}>Poor</option>
                        <option value="Not Functional" {{ isset($phone) && $phone->ports_condition == 'Not Functional' ? 'selected' : (old('ports_condition') == 'Not Functional' ? 'selected' : '') }}>Not Functional</option>
                     </select>
                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                     <label class="form-label" for="touchscreen_functionality">
                     Touchscreen Functionality
                     <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select how much your touch screen is functional."></i>
                     </label>
                     <select class="form-control" name="touchscreen_functionality" id="touchscreen_functionality">
                     <option value="Fully functional" {{ isset($phone) && $phone->touchscreen_functionality == 'Fully functional' ? 'selected' : (old('touchscreen_functionality') == 'Fully functional' ? 'selected' : '') }}>Fully functional</option>
                     <option value="Partially functional" {{ isset($phone) && $phone->touchscreen_functionality == 'Partially functional' ? 'selected' : (old('touchscreen_functionality') == 'Partially functional' ? 'selected' : '') }}>Partially functional</option>
                     <option value="Not functional" {{ isset($phone) && $phone->touchscreen_functionality == 'Not functional' ? 'selected' : (old('touchscreen_functionality') == 'Not functional' ? 'selected' : '') }}>Not functional</option>
                     </select>
                  </div>
                  <!-- Damages or issues -->
                  <div class="mb-3 col-sm-6 pb-2">
                    <label class="form-label" for="screen_damage">
                      Screen Damage
                      <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select the level of screen damage if any."></i>
                    </label>
                    <select class="form-control" name="screen_damage" id="screen_damage">
                      <option value="None" {{ (isset($phone) && $phone->screen_damage == 'None') || old('screen_damage') == 'None' ? 'selected' : '' }}>None</option>
                      <option value="Minor Scratches" {{ (isset($phone) && $phone->screen_damage == 'Minor Scratches') || old('screen_damage') == 'Minor Scratches' ? 'selected' : '' }}>Minor Scratches</option>
                      <option value="Deep Scratches" {{ (isset($phone) && $phone->screen_damage == 'Deep Scratches') || old('screen_damage') == 'Deep Scratches' ? 'selected' : '' }}>Deep Scratches</option>
                      <option value="Cracked" {{ (isset($phone) && $phone->screen_damage == 'Cracked') || old('screen_damage') == 'Cracked' ? 'selected' : '' }}>Cracked</option>
                      <option value="Dead Pixels" {{ (isset($phone) && $phone->screen_damage == 'Dead Pixels') || old('screen_damage') == 'Dead Pixels' ? 'selected' : '' }}>Dead Pixels</option>
                      <option value="Lines on Display" {{ (isset($phone) && $phone->screen_damage == 'Lines on Display') || old('screen_damage') == 'Lines on Display' ? 'selected' : '' }}>Lines on Display</option>
                    </select>
                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                    <label class="form-label" for="water_damage">
                      Water Damage
                      <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select the level of water damage if any."></i>
                    </label>
                    <select class="form-control" name="water_damage" id="water_damage">
                      <option value="None" {{ (isset($phone) && $phone->water_damage == 'None') || old('water_damage') == 'None' ? 'selected' : '' }}>None</option>
                      <option value="Liquid contact indicator triggered" {{ (isset($phone) && $phone->water_damage == 'Liquid contact indicator triggered') || old('water_damage') == 'Liquid contact indicator triggered' ? 'selected' : '' }}>Liquid contact indicator triggered</option>
                      <option value="Corrosion" {{ (isset($phone) && $phone->water_damage == 'Corrosion') || old('water_damage') == 'Corrosion' ? 'selected' : '' }}>Corrosion</option>
                      <option value="Functional issues due to water exposure" {{ (isset($phone) && $phone->water_damage == 'Functional issues due to water exposure') || old('water_damage') == 'Functional issues due to water exposure' ? 'selected' : '' }}>Functional issues due to water exposure</option>
                    </select>
                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                    <label class="form-label" for="battery_issues">
                      Battery Issues
                      <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select any battery issues."></i>
                    </label>
                    <select class="form-control" name="battery_issues" id="battery_issues">
                      <option value="None" {{ (isset($phone) && $phone->battery_issues == 'None') || old('battery_issues') == 'None' ? 'selected' : '' }}>None</option>
                      <option value="Fast draining" {{ (isset($phone) && $phone->battery_issues == 'Fast draining') || old('battery_issues') == 'Fast draining' ? 'selected' : '' }}>Fast draining</option>
                      <option value="Slow Charging" {{ (isset($phone) && $phone->battery_issues == 'Slow Charging') || old('battery_issues') == 'Slow Charging' ? 'selected' : '' }}>Slow Charging</option>
                      <option value="Swollen" {{ (isset($phone) && $phone->battery_issues == 'Swollen') || old('battery_issues') == 'Swollen' ? 'selected' : '' }}>Swollen</option>
                      <option value="Not holding charge" {{ (isset($phone) && $phone->battery_issues == 'Not holding charge') || old('battery_issues') == 'Not holding charge' ? 'selected' : '' }}>Not holding charge</option>
                    </select>
                    </div>

                    <div class="mb-3 col-sm-6 pb-2">
                      <label class="form-label" for="camera_issues">
                        Camera Issues
                        <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select any camera issues."></i>
                      </label>
                      <select class="form-control" name="camera_issues" id="camera_issues">
                        <option value="None">None</option>
                        <option value="Blurry images" {{ (isset($phone) && $phone->camera_issues == 'Blurry images') || old('camera_issues') == 'Blurry images' ? 'selected' : '' }}>Blurry images</option>
                        <option value="Focus problems" {{ (isset($phone) && $phone->camera_issues == 'Focus problems') || old('camera_issues') == 'Focus problems' ? 'selected' : '' }}>Focus problems</option>
                        <option value="Damaged lens" {{ (isset($phone) && $phone->camera_issues == 'Damaged lens') || old('camera_issues') == 'Damaged lens' ? 'selected' : '' }}>Damaged lens</option>
                      </select>
                    </div>
                    <div class="mb-3 col-sm-6 pb-2">
                      <label class="form-label" for="audio_issues">
                        Audio Issues
                        <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select any audio issues."></i>
                      </label>
                      <select class="form-control" name="audio_issues" id="audio_issues">
                        <option value="None">None</option>
                        <option value="Speaker problems" {{ (isset($phone) && $phone->audio_issues == 'Speaker problems') || old('audio_issues') == 'Speaker problems' ? 'selected' : '' }}>Speaker problems</option>
                        <option value="Microphone problems" {{ (isset($phone) && $phone->audio_issues == 'Microphone problems') || old('audio_issues') == 'Microphone problems' ? 'selected' : '' }}>Microphone problems</option>
                        <option value="Headphone jack issues" {{ (isset($phone) && $phone->audio_issues == 'Headphone jack issues') || old('audio_issues') == 'Headphone jack issues' ? 'selected' : '' }}>Headphone jack issues</option>
                      </select>
                    </div>
                    <div class="mb-3 col-sm-6 pb-2">
                      <label class="form-label" for="connectivity_issues">
                        Connectivity Issues
                        <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select if any of the following have problems in connectivity."></i>
                      </label>
                      <select class="form-control" name="connectivity_issues" id="connectivity_issues">
                        <option value="None" {{ (isset($phone) && $phone->connectivity_issues == 'None') || old('connectivity_issues') == 'None' ? 'selected' : '' }}>None</option>
                        <option value="Wi-Fi" {{ (isset($phone) && $phone->connectivity_issues == 'Wi-Fi') || old('connectivity_issues') == 'Wi-Fi' ? 'selected' : '' }}>Wi-Fi</option>

<option value="Bluetooth" {{ (isset($phone) && $phone->connectivity_issues == 'Bluetooth') || old('connectivity_issues') == 'Bluetooth' ? 'selected' : '' }}>Bluetooth</option>
                     <option value="Mobile Network" {{ (isset($phone) && $phone->connectivity_issues == 'Mobile Network') || old('connectivity_issues') == 'Mobile Network' ? 'selected' : '' }}>Mobile network</option>
                     </select>
                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                    <label class="form-label" for="sensor_issues">
                      Sensor Issues
                      <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select any of the following sensor have any issues."></i>
                    </label>
                    <select class="form-control" name="sensor_issues" id="sensor_issues">
                      <option value="None" {{ (isset($phone) && $phone->sensor_issues == 'None') || old('sensor_issues') == 'None' ? 'selected' : '' }}>None</option>
                      <option value="GPS" {{ (isset($phone) && $phone->sensor_issues == 'GPS') || old('sensor_issues') == 'GPS' ? 'selected' : '' }}>GPS</option>
                      <option value="Accelerometer" {{ (isset($phone) && $phone->sensor_issues == 'Accelerometer') || old('sensor_issues') == 'Accelerometer' ? 'selected' : '' }}>Accelerometer</option>
                      <option value="Gyroscope" {{ (isset($phone) && $phone->sensor_issues == 'Gyroscope') || old('sensor_issues') == 'Gyroscope' ? 'selected' : '' }}>Gyroscope</option>
                      <option value="Fingerprint Sensor" {{ (isset($phone) && $phone->sensor_issues == 'Fingerprint Sensor') || old('sensor_issues') == 'Fingerprint Sensor' ? 'selected' : '' }}>Fingerprint Sensor</option>
                      <option value="Face Sensor" {{ (isset($phone) && $phone->sensor_issues == 'Face Sensor') || old('sensor_issues') == 'Face Sensor' ? 'selected' : '' }}>Face Sensor</option>
                      <option value="Proximity sensor" {{ (isset($phone) && $phone->sensor_issues == 'Proximity sensor') || old('sensor_issues') == 'Proximity sensor' ? 'selected' : '' }}>Proximity sensor</option>
                    </select>
                  </div>
                  <div class="mb-3 col-sm-6 pb-2">
                    <label class="form-label" for="software_issues">
                      Software Issues
                      <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select any software issues."></i>
                    </label>
                    <select class="form-control" name="software_issues" id="software_issues">
                      <option value="None" {{ old('software_issues', $phone->software_issues ?? '') == 'None' ? 'selected' : '' }}>None</option>
                      <option value="Frequent crashes" {{ old('software_issues', $phone->software_issues ?? '') == 'Frequent crashes' ? 'selected' : '' }}>Frequent crashes</option>
                      <option value="Freezing" {{ old('software_issues', $phone->software_issues ?? '') == 'Freezing' ? 'selected' : '' }}>Freezing</option>
                      <option value="Boot loop" {{ old('software_issues', $phone->software_issues ?? '') == 'Boot loop' ? 'selected' : '' }}>Boot loop</option>
                    </select>
                  </div>

                  <div class="mb-3 py-2">
                     <label class="form-label" for="unp-product-description">Product description*</label>
                     <textarea required="" class="form-control" rows="6" name="description" id="unp-product-description"></textarea>
                  </div>

                  <div class="mb-3 pb-2">
                    <label class="form-label" for="imei">IMEI Number* (Only admin and purchaser will see it)</label>
                    <input class="form-control" required="" type="text" name="imei" id="imei">

                  </div>


                  <div class="mb-3 pb-2">
                    <label class="form-label" for="unp-product-files">Product Thumbnail*
                    </label>
                    <input required="" class="form-control" type="file" name="main_image" id="unp-product-files" accept="image/*">
                    <div class="mt-2">
                      <div class="preview-container">
                        <img id="thumbnail-preview-image" src="#" alt="Thumbnail Preview" style="display:none; width:200px; height:auto">
                        <button type="button" class="btn btn-outline-danger btn-sm remove-btn" id="remove-thumbnail-btn"><i class="bi bi-x-lg"></i></button>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3 pb-2">
                    <label class="form-label" for="additional_images">Upload More Images*
                    </label>
                    <input required="" class="form-control" multiple type="file" name="additional_images" id="additional_images">
                    <div id="additional-images-container" class="mt-2 d-flex flex-wrap"></div>
                </div>


                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
         </div>
         <div class="col-md-4 px-2 d-flex justify-content-end">
            <div class="shadow-lg col-11 rounded-4 p-3">
               <ul>
                  By uploading a product for sale on Khas, you agree to the following terms and conditions:<br>
                  <li class="mt-3">The product must be as described in the post and in working condition.</li>
                  <li>Khas reserves the right to inspect the product before it is sold to ensure it meets the stated condition.</li>
                  <li>In the event the product is not as described in the post, Khas may return the product to the seller at their expense.</li>
                  <li>Sellers are responsible for accurately and truthfully describing their products.</li>
                  <li>Khas reserves the right to remove any product that does not meet these terms and conditions.</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@section('script')
<script>

function updateEncodedImages() {
  const encodedImages = document.querySelectorAll('.encoded-image');
  const encodedImagesInput = document.getElementById('encoded-images');
  const encodedImagesArray = Array.from(encodedImages).map(img => img.value);

  encodedImagesInput.value = JSON.stringify(encodedImagesArray);
}


document.getElementById('additional_images').addEventListener('change', function (event) {
    const files = event.target.files;

    for (let i = 0; i < files.length; i++) {
        const file = files[i];

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imageContainer = document.createElement('div');
                imageContainer.classList.add('image-container', 'position-relative', 'me-2', 'mb-2');

                const preview = document.createElement('img');
                preview.src = e.target.result;
                preview.classList.add('preview-image');
                preview.style.width = '150px';
                preview.style.height = 'auto';
                preview.style.objectFit = 'cover';
                imageContainer.appendChild(preview);

                const removeBtn = document.createElement('button');
                removeBtn.classList.add('remove-image-btn', 'btn', 'btn-sm', 'btn-danger', 'position-absolute');
                removeBtn.innerHTML = '<i class="bi bi-x-lg"></i>';
                removeBtn.style.top = '0';
                removeBtn.style.right = '0';
                imageContainer.appendChild(removeBtn);

                removeBtn.addEventListener('click', function () {
                    imageContainer.remove();
                });

                document.getElementById('additional-images-container').appendChild(imageContainer);

                const encodedImageInput = document.createElement('input');
encodedImageInput.type = 'hidden';
encodedImageInput.name = 'encoded_image[]';
encodedImageInput.className = 'encoded-image';
encodedImageInput.value = e.target.result;
imageContainer.appendChild(encodedImageInput);
console.log(encodedImageInput.value);

updateEncodedImages();

            };
            reader.readAsDataURL(file);
        }
    }
});





   $(document).ready(function() {
    const $warrantyStatus = $('#warranty_status');
    const $expirationDate = $('#expiration_date');

    $warrantyStatus.on('change', function() {
        if ($warrantyStatus.val() === 'active') {
            $expirationDate.prop('disabled', false);
        } else {
            $expirationDate.prop('disabled', true);
            $expirationDate.val('');
        }
    });
   });


   document.getElementById('purchase-proof').addEventListener('change', function(event) {
  const file = event.target.files[0];
  const preview = document.getElementById('preview-image');
  const removeBtn = document.getElementById('remove-image-btn');

  if (file && file.type.startsWith('image/')) {
    const reader = new FileReader();
    reader.onload = function(e) {
      preview.src = e.target.result;
      preview.style.display = 'block';
      removeBtn.style.display = 'block';
    };
    reader.readAsDataURL(file);
  } else {
    preview.style.display = 'none';
    removeBtn.style.display = 'none';
  }
});

document.getElementById('remove-image-btn').addEventListener('click', function(event) {
  const input = document.getElementById('purchase-proof');
  const preview = document.getElementById('preview-image');
  const removeBtn = document.getElementById('remove-image-btn');

  input.value = '';
  preview.src = '';
  preview.style.display = 'none';
  removeBtn.style.display = 'none';
});


document.getElementById('unp-product-files').addEventListener('change', function(event) {
  const file = event.target.files[0];
  const preview = document.getElementById('thumbnail-preview-image');
  const removeBtn = document.getElementById('remove-thumbnail-btn');

  if (file && file.type.startsWith('image/')) {
    const reader = new FileReader();
    reader.onload = function(e) {
      preview.src = e.target.result;
      preview.style.display = 'block';
      removeBtn.style.display = 'block';
    };
    reader.readAsDataURL(file);
  } else {
    preview.style.display = 'none';
    removeBtn.style.display = 'none';
  }
});

document.getElementById('remove-thumbnail-btn').addEventListener('click', function(event) {
  const input = document.getElementById('unp-product-files');
  const preview = document.getElementById('thumbnail-preview-image');
  const removeBtn = document.getElementById('remove-thumbnail-btn');

  input.value = '';
  preview.src = '';
  preview.style.display = 'none';
  removeBtn.style.display = 'none';
});


  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })


</script>

@endsection



