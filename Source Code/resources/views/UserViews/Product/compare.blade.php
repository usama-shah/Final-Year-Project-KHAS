@extends('UserViews/Layout.layout')
@section('title',' ')
@section('style')
@endsection
@section('content')
<section class="checkout-wrapper section col-12 pt-4 pb-4 ">
   <div class="container">
      <div class="row justify-content-center ">
         <div class="table-responsive">

          @if(count($phones)>0)
          <table class="table table-bordered table-layout-fixed fs-sm" style="min-width: 45rem; table-layout:fixed">
            <thead>
            <tr>
                <td></td>
                @foreach($phones as $phone)
                    <td class="text-center px-4 pb-4">
                        <a href="{{route('compare.remove',$id=$phone->id)}}" class="removeCompare btn btn-sm btn-outline-danger d-block w-100 text-danger mb-2" ><i class="bi bi-trash me-1"></i>Remove</a><a class="d-inline-block mb-3" href="{{url('product-details')}}"><img src="{{asset($phone->main_image)}}" width="80" alt="{{ $phone->title }}"></a>
                        <h3 class="product-title fs-sm"><a href="{{route('phones.show',$id=$phone->id)}}">{{ $phone->title }}</a></h3>
                        <button class="btn btn-primary btn-sm addToCart" data-phone-id="{{$phone->id}}" type="button">Add to Cart</button>
                    </td>
                @endforeach
            </tr>
            </thead>
            <tbody id="summary" data-filter-target="">
            <tr class="bg-secondary">
                <th class="text-uppercase text-dark">Summary</th>
                @foreach($phones as $phone)
                    <td><span class="text-dark fw-medium text-dark">{{ $phone->title }}</span></td>
                @endforeach
            </tr>
            <tr>
                <th class="text-dark">Brand</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->get_brand->name }}</td> <!-- Assuming that the brand relationship exists -->
                @endforeach
            </tr>
            <tr>
                <th class="text-dark">Model</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->model }}</td>
                @endforeach
            </tr>
            <tr>
                <th class="text-dark">Model</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->model }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Price</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->price }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Color</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->color }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Storage Capacity</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->storage_capacity }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Ram</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->ram }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Original Packaging</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->original_packaging }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Condition</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->condition }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Purchase Date</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->purchase_date }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Purchase Proof</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->purchase_proof }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Warranty Status</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->warranty_status }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Operating System</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->operating_system }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Battery Health</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->battery_health }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Accessories</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->accessories }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Reason For Selling</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->reason_for_selling }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Front Screen Condition</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->front_screen_condition }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Back Cover Condition</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->back_cover_condition }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Frame Edges Condition</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->frame_edges_condition }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Buttons Condition</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->buttons_condition }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Ports Condition</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->ports_condition }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Touchscreen Functionality</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->touchscreen_functionality }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Screen Damage</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->screen_damage }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Water Damage</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->water_damage }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Battery Issues</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->battery_issues }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Camera Issues</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->camera_issues }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Audio Issues</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->audio_issues }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Connectivity Issues</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->connectivity_issues }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Sensor Issues</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->sensor_issues }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Software Issues</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->software_issues }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Description</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->description }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Images</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->images }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Deleted At</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->deleted_at }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">IMEI</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->imei }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">PTA Approved</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->pta_approved }}</td>
                @endforeach
</tr>
<tr>
                <th class="text-dark">Sim Status</th>
                @foreach($phones as $phone)
                    <td>{{ $phone->sim_status }}</td>
                @endforeach
</tr>


            <!-- Add more rows as needed -->
            </tbody>
            <!-- Add more tbody elements as needed -->
        </table>
        @else
        <p class="w-100 text-center text-muted my-5">No Phone Available For Comparision</p>
@endif
         </div>
      </div>
   </div>
</section>
@endsection
@section('script')
<script></script>
@endsection