@extends('UserViews/Layout.layout')
@section('title',$user->first_name.' '.$user->last_name.' - Profile')
@section('style')
<style>
   .profile-pic{
   position: absolute;
   inset: 0px;
   box-sizing:border-box;
   padding: 0px;
   border: none;
   margin: auto;
   display: block;
   width: 0px;
   height: 0px;
   width: 100%;
   height: 100%;
   object-fit: cover;
   }
</style>
@endsection
@section('content')
<section class="section pt-4 pb-4 ">
   <div class="container  rounded my-4 ">
      <div class="row">
         <aside class=" col-lg-3 py-4 col-md-4 bg-white shadow rounded-3">
            <div class="">
               <div class="d-flex  flex-wrap justify-content-center">
                  -
                  <div class="position-relative rounded-circle overflow-hidden mx-auto mx-md-0 mb-3" style="width: 120px; height: 120px;">
                     <img alt="Profile Image" light="0" src={{$user->photo}} decoding="async" data-nimg="fill" sizes="100vw"  class="profile-pic">
                  </div>
                  <div class="w-100 text-center">
                     <h2 class="h4 text-center  mb-1">{{$user->first_name.' '.$user->last_name}}<i style="font-size: 10px;" class="text-success bi bi-circle-fill"></i></h2>
                     <p class="text-center   mb-2 pb-1"><b> Joined On : </b><span class="text-muted">{{$user->created_at->format('F j, Y');
                        }}<span>
                     </p>
                  </div>
                  {{-- <div class="d-flex justify-content-center w-100  align-items-center border-bottom pb-4 mb-4">
                     <span class="star-rating">
                     <i class="bi bi-star-fill active"></i>
                     <i class="bi bi-star-fill active"></i>
                     <i class="bi bi-star-fill active"></i>
                     <i class="bi bi-star-fill active"></i>
                     <i class="bi bi-star-fill active"></i>
                     </span>
                     <a class="ms-2" href="#">
                     45 reviews
                     </a>
                  </div> --}}
               </div>
               {{--
               <div class="text-center  mt-2"><button type="button" class="btn btn-outline-primary"><i class="bi bi-chat fs-sm me-2"></i>Send Message</button></div>
               --}}
            </div>
         </aside>
         <div class="col-lg-9 col-md-8  ">
            <div class="col-12 ">
               <div class="d-flex  flex-md-row flex-column align-items-md-center justify-content-md-between mb-lg-4 mb-3 pb-md-1">
                  <!-- Nav tabs-->
                  <div class="mb-md-0 mb-4 pb-1" style="overflow-x: auto;">
                     <ul class="nav nav-tabs nav-fill flex-nowrap text-nowrap mb-0" role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#avilable" data-bs-toggle="tab" role="tab" aria-selected="true">Available</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#sold" data-bs-toggle="tab" role="tab" aria-selected="false" tabindex="-1">Sold </a></li>
                        {{-- <li class="nav-item" role="presentation"><a class="nav-link" href="#purchased" data-bs-toggle="tab" role="tab" aria-selected="false" tabindex="-1">Purchased</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#reviews" data-bs-toggle="tab" role="tab" aria-selected="false" tabindex="-1">Reviews</a></li> --}}
                     </ul>
                  </div>
               </div>
               <!-- Tabs content-->
               <div class="tab-content">
                  <!-- avilable products grid-->
                  <div class="tab-pane fade active show" id="avilable" role="tabpanel">
                     <div class="row row-cols-md-3 row-cols-sm-2 row-cols-1 gy-sm-4 gy-3">
                        <!-- Product-->
                        @forelse($user->phones as $phone)
                        @if($phone->status=="Available")
                        <div class="col mb-3 ">
                           <article class="card h-100 border-0 bg-white shadow rounded-3">
                              <div class="card-img-top position-relative overflow-hidden" style="max-height: 14em;">
                                 <a class="d-block" href="{{route('phones.show',$id=$phone->id)}}"><img width="100%" height="100%" src="{{$phone->main_image}}" alt="{{$phone->title}}" /></a>
                                 <span class="btn btn-success btn-sm position-absolute shadow" style="top: 10px; right: 10px;">{{$phone->condition}}</span>
                              </div>
                              <div class="card-body">
                                 <h3 class="product-title mb-2 fs-base"><a class="d-block text-truncate" href="{{route('phones.show',$id=$phone->id)}}">{{$phone->title}}</a></h3>
                                 <div class="d-flex align-items-center flex-wrap">
                                    <h4 class="w-100 text-center">RS {{$phone->formatted_price}}</h4>
                                 </div>
                              </div>
                              <div class="card-footer">
                                 <div class="d-flex justify-content-between my-3">
                                    <button class="btn btn-outline-khas-secondery btn-sm add-to-favorites" data-phone-id={{$phone->id}}><i class="bi bi-heart"></i>Add to Fav</button>
                                    <button class="btn btn-outline-khas-secondery btn-sm addToCart" data-phone-id={{$phone->id}}><i class="bi bi-cart"></i>Add to Cart</button>
                                 </div>
                                 <a href="{{route('phones.show',$id=$phone->id)}}"> <button class="btn btn-primary col-12 mb-3"><i class="bi bi-eye"></i> View Details</button></a>
                                 <button class="btn btn-primary col-12 checkoutBtn" data-phone-id={{$phone->id}}><i class="bi bi-bag-check"></i> Buy Now</button>
                              </div>
                           </article>
                        </div>
                        @endif
                        @empty
                        <span class="w-100 text-center text-muted">No Phones available to show</span>
                        @endforelse
                     </div>
                  </div>
                  <!-- sold-->
                  <div class="tab-pane fade" id="sold" role="tabpanel">
                     <!-- sold grid-->
                     <div class="row ">
                        @forelse($user->phones as $phone)
                        @if($phone->status=="Sold")
                        <div class="col mb-3 ">
                           <article class="card h-100 border-0 bg-white shadow rounded-3">
                              <div class="card-img-top position-relative overflow-hidden" style="max-height: 14em;">
                                 <a class="d-block" href="{{route('phones.show',$id=$phone->id)}}"><img width="100%" height="100%" src="{{$phone->main_image}}" alt="{{$phone->title}}" /></a>
                                 <span class="btn btn-success btn-sm position-absolute shadow" style="top: 10px; right: 10px;">{{$phone->condition}}</span>
                              </div>
                              <div class="card-body">
                                 <h3 class="product-title mb-2 fs-base"><a class="d-block text-truncate" href="{{route('phones.show',$id=$phone->id)}}">{{$phone->title}}</a></h3>
                                 <div class="d-flex align-items-center flex-wrap">
                                    <h4 class="w-100 text-center">RS {{$phone->formatted_price}}</h4>
                                 </div>
                              </div>
                              <div class="card-footer">
                                 <div class="d-flex justify-content-between my-3">
                                    <button class="btn btn-outline-khas-secondery btn-sm add-to-favorites" data-phone-id={{$phone->id}}><i class="bi bi-heart"></i>Add to Fav</button>
                                    <button class="btn btn-outline-khas-secondery btn-sm addToCart" data-phone-id={{$phone->id}}><i class="bi bi-cart"></i>Add to Cart</button>
                                 </div>
                                 <a href="{{route('phones.show',$id=$phone->id)}}"> <button class="btn btn-primary col-12 mb-3"><i class="bi bi-eye"></i> View Details</button></a>
                                 <button class="btn btn-primary col-12 checkoutBtn" data-phone-id={{$phone->id}}><i class="bi bi-bag-check"></i> Buy Now</button>
                              </div>
                           </article>
                        </div>
                        @endif
                        @empty
                        <span class="w-100 text-center text-muted">No Phones available to show</span>
                        @endforelse
                     </div>
                  </div>
                  {{-- <!-- purchased-->
                  <div class="tab-pane fade" id="purchased" role="tabpanel">
                     <!-- purchased products grid-->
                     <div class="row row-cols-md-3 row-cols-sm-2 row-cols-1 gy-sm-4 gy-3">
                        @forelse($user->purchase as $purchase)
                        @foreach($purchase->items as $phone)
                        <div class="col mb-3 ">
                           <article class="card h-100 border-0 bg-white shadow rounded-3">
                              <div class="card-img-top position-relative overflow-hidden" style="max-height: 14em;">
                                 <a class="d-block" href="{{route('phones.show',$id=$phone->id)}}"><img width="100%" height="100%" src="{{$phone->main_image}}" alt="{{$phone->title}}" /></a>
                                 <span class="btn btn-success btn-sm position-absolute shadow" style="top: 10px; right: 10px;">{{$phone->condition}}</span>
                              </div>
                              <div class="card-body">
                                 <h3 class="product-title mb-2 fs-base"><a class="d-block text-truncate" href="{{route('phones.show',$id=$phone->id)}}">{{$phone->title}}</a></h3>
                                 <div class="d-flex align-items-center flex-wrap">
                                    <h4 class="w-100 text-center">RS {{$phone->formatted_price}}</h4>
                                 </div>
                              </div>
                              <div class="card-footer">
                                 <div class="d-flex justify-content-between my-3">
                                    <button class="btn btn-outline-khas-secondery btn-sm add-to-favorites" data-phone-id={{$phone->id}}><i class="bi bi-heart"></i>Add to Fav</button>
                                    <button class="btn btn-outline-khas-secondery btn-sm addToCart" data-phone-id={{$phone->id}}><i class="bi bi-cart"></i>Add to Cart</button>
                                 </div>
                                 <a href="{{route('phones.show',$id=$phone->id)}}"> <button class="btn btn-primary col-12 mb-3"><i class="bi bi-eye"></i> View Details</button></a>
                                 <button class="btn btn-primary col-12 checkoutBtn" data-phone-id={{$phone->id}}><i class="bi bi-bag-check"></i> Buy Now</button>
                              </div>
                           </article>
                        </div>
                        @endforeach
                        @empty
                        <span class="w-100 text-center text-muted">No Phones available to show</span>
                        @endforelse
                     </div>
                  </div>
                  <!-- reviews-->
                  <div class="tab-pane fade" id="reviews" role="tabpanel">
                     <div class=" border-bottom py-2">
                        <div class="container " id="reviews">
                           <div class="row pb-3 shadow-lg rounded-4 p-4">
                              <div class="col-lg-4 col-md-5">
                                 <h2 class="h3 mb-4">45 Reviews</h2>
                                 <div class="star-rating me-2"><i class="bi bi-star-fill fs-sm text-accent me-1"></i><i class="bi bi-star-fill fs-sm text-accent me-1"></i><i class="bi bi-star-fill fs-sm text-accent me-1"></i><i class="bi bi-star-half fs-sm text-accent me-1"></i><i class="bi bi-star fs-sm text-muted me-1"></i></div>
                                 <span class="d-inline-block align-middle">4.5 Overall rating</span>
                              </div>
                              <div class="col-lg-8 col-md-7">
                                 <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">5</span><i class="bi bi-star-fill fs-xs ms-1"></i></div>
                                    <div class="w-100">
                                       <div class="progress" style="height: 4px;">
                                          <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                    <span class="text-muted ms-3">23</span>
                                 </div>
                                 <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">4</span><i class="bi bi-star-fill fs-xs ms-1"></i></div>
                                    <div class="w-100">
                                       <div class="progress" style="height: 4px;">
                                          <div class="progress-bar" role="progressbar" style="width: 27%; background-color: #a7e453;" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                    <span class="text-muted ms-3">12</span>
                                 </div>
                                 <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">3</span><i class="bi bi-star-fill fs-xs ms-1"></i></div>
                                    <div class="w-100">
                                       <div class="progress" style="height: 4px;">
                                          <div class="progress-bar" role="progressbar" style="width: 17%; background-color: #ffda75;" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                    <span class="text-muted ms-3">8</span>
                                 </div>
                                 <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">2</span><i class="bi bi-star-fill fs-xs ms-1"></i></div>
                                    <div class="w-100">
                                       <div class="progress" style="height: 4px;">
                                          <div class="progress-bar" role="progressbar" style="width: 9%; background-color: #fea569;" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                    <span class="text-muted ms-3">5</span>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">1</span><i class="bi bi-star-fill fs-xs ms-1"></i></div>
                                    <div class="w-100">
                                       <div class="progress" style="height: 4px;">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 4%;" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                    <span class="text-muted ms-3">2</span>
                                 </div>
                              </div>
                           </div>
                           <hr class="mt-4 mb-3">
                           <div class="row pt-4">
                              <!-- Reviews list-->
                              <div class="col-12">
                                 <div class="d-flex justify-content-end pb-4">
                                    <div class="d-flex align-items-center flex-nowrap">
                                       <label class="fs-sm text-muted text-nowrap me-2 d-none d-sm-block" for="sort-reviews">Sort by:</label>
                                       <select class="form-select form-select-sm" id="sort-reviews">
                                          <option>Newest</option>
                                          <option>Oldest</option>
                                          <option>High rating</option>
                                          <option>Low rating</option>
                                       </select>
                                    </div>
                                 </div>
                                 <!-- Review-->
                                 <div class="col-12 shadow-lg rounded-4 p-4 mb-4 border-bottom">
                                    <div class="d-flex mb-3">
                                       <div class="d-flex align-items-center me-4 pe-2">
                                          <img class="rounded-circle" src="https://t3.ftcdn.net/jpg/02/36/48/86/360_F_236488644_opXVvD367vGJTM2I7xTlsHB58DVbmtxR.jpg" width="50" height="50" alt="Luqman Waheed">
                                          <div class="ps-3">
                                             <h6 class="fs-sm mb-0">Luqman Waheed</h6>
                                             <span class="fs-ms text-muted">19 Jan 2023</span>
                                          </div>
                                       </div>
                                       <div>
                                          <div class="star-rating"><i class="star-rating-icon bi bi-star-fill active"></i><i class="star-rating-icon bi bi-star-fill active"></i><i class="star-rating-icon bi bi-star-fill active"></i><i class="star-rating-icon bi bi-star-fill active"></i><i class="star-rating-icon ci-star"></i>
                                          </div>
                                       </div>
                                    </div>
                                    <p class="fs-md mb-2">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes</p>
                                 </div>
                                 <div class="col-12 pb-4 shadow-lg rounded-4 p-4 mb-4 border-bottom">
                                    <div class="d-flex mb-3">
                                       <div class="d-flex align-items-center me-4 pe-2">
                                          <img class="rounded-circle" src="https://t3.ftcdn.net/jpg/02/36/48/86/360_F_236488644_opXVvD367vGJTM2I7xTlsHB58DVbmtxR.jpg" width="50" height="50" alt="Luqman Waheed">
                                          <div class="ps-3">
                                             <h6 class="fs-sm mb-0">Luqman Waheed</h6>
                                             <span class="fs-ms text-muted">19 Jan 2023</span>
                                          </div>
                                       </div>
                                       <div>
                                          <div class="star-rating"><i class="star-rating-icon bi bi-star-fill active"></i><i class="star-rating-icon bi bi-star-fill active"></i><i class="star-rating-icon bi bi-star-fill active"></i><i class="star-rating-icon bi bi-star-fill active"></i><i class="star-rating-icon ci-star"></i>
                                          </div>
                                       </div>
                                    </div>
                                    <p class="fs-md mb-2">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes</p>
                                 </div>
                                 <div class="col-12 pb-4 shadow-lg rounded-4 p-4 mb-4 border-bottom">
                                    <div class="d-flex mb-3">
                                       <div class="d-flex align-items-center me-4 pe-2">
                                          <img class="rounded-circle" src="https://t3.ftcdn.net/jpg/02/36/48/86/360_F_236488644_opXVvD367vGJTM2I7xTlsHB58DVbmtxR.jpg" width="50" height="50" alt="Luqman Waheed">
                                          <div class="ps-3">
                                             <h6 class="fs-sm mb-0">Luqman Waheed</h6>
                                             <span class="fs-ms text-muted">19 Jan 2023</span>
                                          </div>
                                       </div>
                                       <div>
                                          <div class="star-rating"><i class="star-rating-icon bi bi-star-fill active"></i><i class="star-rating-icon bi bi-star-fill active"></i><i class="star-rating-icon bi bi-star-fill active"></i><i class="star-rating-icon bi bi-star-fill active"></i><i class="star-rating-icon ci-star"></i>
                                          </div>
                                       </div>
                                    </div>
                                    <p class="fs-md mb-2">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div> --}}
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
@endsection
@section('script')
<script></script>
@endsection