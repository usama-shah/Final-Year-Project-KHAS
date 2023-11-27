<span class="text-muted">Total {{$phones->total()}} Phones Found</span>

@foreach($phones as $phone)
<div class="row mb-3  p-4 shadow-lg bg-white rounded">
   <div class="col-md-3 mt-1"><img role="button" class="img-fluid img-responsive rounded product-image"
      src="{{$phone->main_image}}">
   </div>
   <div class="col-md-6 mt-1">
      <div class="d-flex align-items-center">
         <h3><a href="{{route('phones.show',$id=$phone->id)}}">{{$phone->title}}</a></h3>
         {{-- <small style="padding:2px;font-size:10px" class="border text-muted ms-2 rounded">Ad</small> --}}
      </div>
      <small class="text-muted font-italic "> {{ dateDiff($phone->created_at)}}</small>
      {{-- <div class="d-flex flex-row">
         <div class="ratings mr-2"><span><b>Seller Rattings : </b></span><i class="fa fa-star"></i><i
            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
         <span>
         (6)</span>
      </div> --}}
      <div class="mt-1 mb-1 spec-1">
         {{-- <span class="badge ms-1 rounded-pill text-muted border">{{$phone->condition}}
         </span> --}}
         <span class="badge ms-1 rounded-pill text-muted border">{{$phone->get_brand->name}}
         </span>
         <span class="badge ms-1 rounded-pill text-muted border">{{$phone->model}}
         </span>
         <span class="badge ms-1 rounded-pill text-muted border">{{$phone->storage_capacity}}GB ROM</span>
         <span class="badge ms-1 rounded-pill text-muted border">{{$phone->ram}}GB RAM</span>
      </div>
      <p class="text-justify text-truncate para mb-0">{{$phone->description}}<br><br>
      </p>
   </div>
   <div class="align-items-center align-content-center col-md-3 border-left mt-1">
      <div class="d-flex flex-row justify-content-center align-items-center">
         <h4 class="mr-1">RS {{ $phone->formatted_price }}
         </h4>
         {{-- <span class="strike-text">$20.99</span> --}}
      </div>
      <div class="d-flex flex-column mt-4">
         <a  href="{{route('phones.show',$id=$phone->id)}}" class="btn btn-khas-primary btn-sm"
            type="button">Details</a>
         @if($phone->status==="Available")
         <button class="btn btn-outline-khas-primary btn-sm mt-2 add-to-favorites"
            data-phone-id="{{ $phone->id }}"
            type="button">Add to favorites</button>
         @else
         <h4 class="text-danger m-auto mt-3">SOLD</h4>
         @endif
      </div>
   </div>
</div>
@endforeach
<!-- Render pagination links -->
{{ $phones->links('vendor.pagination.bootstrap-5') }}