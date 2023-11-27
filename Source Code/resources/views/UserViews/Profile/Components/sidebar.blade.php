<aside class="col-lg-3 ">
    <div class="bg-white shadow-lg rounded-3  pt-1 mb-5 mb-lg-0">
      <div class="d-md-flex justify-content-between align-items-center text-center text-md-start p-4">
        <div class="d-md-flex align-items-center ">

            <div class="ps-md-3">
            <h3 class="fs-base mb-0">{{Auth::user()->first_name." ".Auth::user()->last_name}}</h3>
            {{-- <span class="text-accent fs-sm">{{Auth::user()->email}}</span><br> --}}
            <span class="text-accent fs-sm"><b>Available : </b>Rs {{number_format($authUser->balance)}}</span><br>
            <span class="text-accent fs-sm"><b>On Hold : </b><span class="text-muted"> Rs {{number_format($authUser->onhold)}}</span></span><br>
            <a href="{{route('phones.add')}}"><button class="btn btn-primary w-100 mt-3">Sell Phone</button></a>
        </div>
        </div><a class="btn btn-primary d-lg-none mb-2 mt-3 mt-md-0" href="#account-menu" data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-list me-2"></i>Menue</a>
      </div>
      <div class="d-lg-block" id="account-menu">
          <div class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('dashboard')}}"><i class="bi bi-grid-fill opacity-60 me-2"></i>Dashboard</a></div>
          <div class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('wallet')}}"><i class="bi bi-cash-stack opacity-60 me-2"></i>Wallet</a></div>
          <div class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{route('phones.add')}}"><i class="bi bi-plus-square opacity-60 me-2"></i>Add New Product</a></div>
          <div class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{route('phones.list')}}"><i class="bi bi-box-seam opacity-60 me-2"></i>Manage Products</a></div>
          <div class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('purchases')}}"><i class="bi bi-shop-window opacity-60 me-2"></i>Purchases</a></div>
          <div class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('sales')}}"><i class="bi bi-receipt opacity-60 me-2"></i>Sales</a></div>
          <div class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('cart')}}"><i class="bi bi-cart opacity-60 me-2"></i>Cart</a></div>
          <div class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('profile')}}"><i class="bi bi-person opacity-60 me-2"></i>Profile</a></div>
          <div class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('profile_settings')}}"><i class="bi bi-gear opacity-60 me-2"></i>Profile Settings</a></div>
          <div class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{route('logout')}}"><i class="bi bi-box-arrow-right opacity-60 me-2"></i>Logout</a></div>
        </ul>
      </div>
    </div>
  </aside>