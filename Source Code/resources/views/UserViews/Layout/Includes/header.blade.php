
    @if (session('global_status'))
<div class="alert m-0  rounded-0  alert-success alert-dismissible fade show" role="alert">
    {{ session('global_status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('global_error'))
<div class="alert m-0  rounded-0 alert-danger alert-dismissible fade show" role="alert">
    {{ session('global_error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<?php

!empty($authUser->banned) == 1 ? (Auth::logout()): null;

?>


    <header class="header navbar-area">
        <!-- Start Topbar -->
        <div class="topbar bg-khas-secondery">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="topbar-left">
                            <ul class="useful-links">
                                <li><a class="text-white" href="{{url('/')}}">Home</a></li>
                                {{-- <li><a class="text-white" href="#">About Us</a></li>
                                <li><a class="text-white" href="contact.html">Contact Us</a></li> --}}
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="topbar-right d-flex justify-content-end align-items-center">
                            <a href="{{route('phones.add')}}"><button class="btn btn-primary mx-3">Sell Now</button></a>

                            @if ($authUser)
                            <div class="dropdown">
                                <div class="header-profile">
                                    <a href="javascript:void(0)">
                                       <img class="rounded-circle" src="{{ $authUser ? $authUser->photo : asset('storage/profile_photos/default_profile_photo.jpg') }}"  alt="Profile Image" width="30px" height="30px" srcset="">
                                    </a>

                                        <button class="btn text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ $authUser->first_name }}
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="{{url('dashboard')}}">Dashboard</a></li>
                                          <li><a class="dropdown-item" href="{{route('profile.show',['id' =>  $authUser->id])}}">Profile</a></li>
                                          <li><a class="dropdown-item" href="{{url('profile_settings')}}">Settings</a></li>
                                          <li><a class="dropdown-item" href="{{url('logout')}}">Logout</a></li>
                                        </ul>
                                      </div>
                                </div>


                            @else
                            <ul class="user-login m-0">
                                <li>
                                    <a class="text-white" href="{{url('login')}}">Sign In</a>
                                </li>
                                <li>
                                    <a class="text-white" href="{{url('signup')}}">Register</a>
                                </li>
                            </ul>
                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="/">
                            <h1><span class="text-secendory">K</span><span class="text-primary">HAS</span></h1>
                            {{-- <img src="{{asset('images/khas-logo-rec.png')}}" alt="Logo"> --}}
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <div id="navbar-search" class="navbar-search search-style-5">
                                <form action="{{ url('/') }}" method="GET" class="w-100 d-flex">
                                    {{-- <div class="search-select">
                                        <div class="select-position">
                                            <select id="select1" name="brand" class="select2-search">
                                                <option value="" disabled>--Brand--</option>
                                                @forelse ($brands as $brand)
                                                    <option value="{{$brand->id}}" {{ request('brand') == $brand->id ? 'selected' : '' }}>{{$brand->name}}</option>
                                                @empty
                                                    <option disabled>--No Brands Available--</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="search-input">
                                        <input type="text" id="search" name="search" placeholder="Search" value="{{ request('search') }}">
                                    </div>
                                    <div class="search-btn">
                                        <button id="nav-search-btn" class=" btn btn-khas-primary"><i class="bi bi-search"></i></button>
                                    </div>
                                </form>



                            </div>
                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-5">
                        <div class="middle-right-area col-12">

                            <div class="navbar-cart col-12 d-flex justify-content-end">
                                <div class="wishlist">
                                    <a href="{{route('compare.index')}}">
                                        <i class="bi bi-arrow-left-right"></i>
                                        <span id="compare-count" class="total-items bg-khas-secondery">{{ count(session('compare', [])) }}</span>
                                    </a>
                                </div>
                                <div class="wishlist" data-bs-toggle="modal" data-bs-target="#favModal">
                                    <a href="#">
                                        <i class="bi bi-suit-heart"></i>
                                        <span id="fav-count" class="total-items bg-khas-secondery">{{$authUser?count($authUser->favorites):'0'}}</span>
                                    </a>
                                </div>



                                <div class="cart-items">
                                    <a href="{{route('cart.index')}}" class="main-btn">
                                        <i class="bi bi-cart3"></i>
                                        <span id="cart-count" class="total-items bg-khas-secondery">{{$authUser?count($authUser->cartItems):'0'}}</span>
                                    </a>


                                    <!--/ End Shopping Item -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
        <!-- Start Header Bottom -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="nav-inner">

                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="{{url("/")}}" class="active" aria-label="Toggle navigation"><i class="bi bi-house-heart"></i>&nbsp; Home</a>
                                    </li>

@if(!empty($brands))
                                    <li class="nav-item">

                                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                            data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">Brands</a>

                                            <ul class="sub-menu collapse" id="submenu-1-2">
                                                @foreach($brands as $brand)
                                            <li class="nav-item"><a href="{{url('/category/brand'.'/'.$brand->id)}}"> {{$brand->name}}</a></li>
@endforeach

                                        </ul>
                                        @endif
                                    </li>



                                    @foreach($categories as $category)

                                    <li class="nav-item">
                                        @if(empty($category->parent_id))
                                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                            data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation"><i class="{{$category->icon}}"></i> {{$category->prefix." ".$category->name." ".$category->suffix}}</a>
                                            @endif
                                    @if(count($category->subcategories)>0)
                                            <ul class="sub-menu collapse" id="submenu-1-2">
                                                @foreach($category->subcategories as $sub)
                                            <li class="nav-item"><a href="{{url('category/'.$category->column_name.'/'.$sub->name)}}"><i class="{{$sub->icon}}"></i> {{$sub->prefix." ".$sub->name." ".$sub->suffix}}</a></li>
@endforeach

                                        </ul>
                                        @endif
                                    </li>

                                    @endforeach
                                </ul>

                            </div> <!-- navbar collapse -->


                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>

            </div>
        </div>
        <!-- End Header Bottom -->
    </header>

