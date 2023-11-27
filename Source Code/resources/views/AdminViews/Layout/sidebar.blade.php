


  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

       <li class="nav-item">
        <a class="nav-link " href="{{route('dashboard.view')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

       <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#users" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="users" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('users.add')}}">
              <i class="bi bi-person-plus-fill"></i><span>Add User</span>
            </a>
          </li>
          <li>
            <a href="{{route('users.list')}}">
              <i class="bi bi-person-lines-fill"></i><span>User List</span>
            </a>
          </li>

       <li>
            <a href="{{route('users.report')}}">
              <i class="bi bi-pie-chart-fill"></i><span>Report</span>
            </a>
          </li>


        </ul>
      </li>

      <!-- End Components Nav -->



      {{-- Products Menue Starts --}}
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#products" data-bs-toggle="collapse" href="#">
          <i class="bi bi-box-seam-fill"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="products" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/products_list')}}">
              <i class="bi bi-list-task"></i><span>Products List</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/removed_products_list')}}">
              <i class="bi bi-trash2-fill"></i><span>Removed Products</span>
            </a>
          </li>
          <li>



            <li class="nav-item sub-menu-dropdown" id="category-parent">
              <a class="nav-link collapsed" data-bs-target="#category" data-bs-toggle="collapse" href="#">
                <i class="bi bi-tag-fill"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="category" class="nav-content collapse" data-bs-parent="#category-parent">

                <li>
                  <a href="{{url('admin/add_category')}}">
                    <i class="bi bi-file-plus-fill"></i><span>Add Category</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('admin/category_list')}}">
                    <i class="bi bi-list-task"></i><span>Category List</span>
                  </a>
                </li>

              </ul>
            </li>
            <li class="nav-item sub-menu-dropdown" id="brands-parent">
              <a class="nav-link collapsed" data-bs-target="#brands" data-bs-toggle="collapse" href="#">
                <i class="bi bi-shop-window"></i><span>Brands</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="brands" class="nav-content collapse" data-bs-parent="#brands-parent">

                <li>
                  <a href="{{url('admin/add_brands')}}">
                    <i class="bi bi-bag-plus-fill"></i><span>Add Brands</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('admin/brands_list')}}">
                    <i class="bi bi-list-task"></i><span>Brands List</span>
                  </a>
                </li>

              </ul>
            </li>
            <li class="nav-item sub-menu-dropdown" id="inspection-parent">
              <a class="nav-link collapsed" data-bs-target="#inspection" data-bs-toggle="collapse" href="#">
                <i class="bi bi-shop-window"></i><span>Inspection</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="inspection" class="nav-content collapse" data-bs-parent="#inspection-parent">

                <li>
                  <a href="{{route('admin.inspection.add')}}">
                    <i class="bi bi-shield-check"></i><span>Add inspection</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('admin.inspection.list')}}">
                    <i class="bi bi-shield-fill-check"></i><span>Inspection Report</span>
                  </a>
                </li>

              </ul>
            </li>

          {{-- <li>
            <a href="{{url('admin/product_report')}}">
              <i class="bi bi-pie-chart-fill"></i><span>Products Report</span>
            </a>
          </li> --}}

        </ul>
      </li><!-- End Products Nav -->
{{-- Start Sales Nav --}}

<li class="nav-item" id="sales-parent">
  <a class="nav-link collapsed" data-bs-target="#sales" data-bs-toggle="collapse" href="#">
    <i class="bi bi-cart-fill"></i><span>Sales</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="sales" class="nav-content collapse" data-bs-parent="#sales-parent">

    <li>
      <a href="{{url('admin/pending_sales')}}">
        <i class="bi bi-cart"></i><span>Pending Sales</span>
      </a>
    </li>
    <li>
      <a href="{{url('admin/failed_sales')}}">
        <i class="bi bi-cart-x-fill"></i><span>Returned Sales</span>
      </a>
    </li>
    <li>
      <a href="{{url('admin/completed_sales')}}">
        <i class="bi bi-cart-check-fill"></i><span>Completed Sales</span>
      </a>
    </li>
    {{-- <li>
      <a href="{{url('admin/sales_report')}}">
        <i class="bi bi-pie-chart-fill"></i><span>Sales Report</span>
      </a>
    </li> --}}

  </ul>
</li>

{{-- End Sales Nav --}}

{{-- Finance Menu Start --}}

<li class="nav-item" id="finanace-parent">
  <a class="nav-link collapsed" data-bs-target="#finanace" data-bs-toggle="collapse" href="#">
    <i class="bi bi-bank2"></i><span>Finance</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="finanace" class="nav-content collapse" data-bs-parent="#finanace-parent">

    <li>
      <a href="{{url('admin/txn_ledger')}}">
        <i class="bi bi-file-earmark-ruled-fill"></i><span>TXN Ledger</span>
      </a>
    </li>
    {{-- <li>
      <a href="{{url('admin/wallets')}}">
        <i class="bi bi-wallet2"></i><span>Wallets</span>
      </a>
    </li> --}}
    {{-- <li>
      <a href="{{url('admin/charges_and_discounts')}}">
        <i class="bi bi-receipt"></i><span>Charges And Discounts</span>
      </a>
    </li> --}}
    <li>
      <a href="{{route('withdraw.requests')}}">
        <i class="bi bi-arrow-left-square-fill"></i><span>Withdraw Requests</span>
      </a>
    </li>
    <li>
      <a href="{{url('admin/withdraw_history')}}">
        <i class="bi bi-clock-history"></i><span>Withdraw History</span>
      </a>
    </li>

    {{-- <li>
      <a href="{{url('admin/finance_report')}}">
        <i class="bi bi-pie-chart-fill"></i><span>Reports</span>
      </a>
    </li> --}}

  </ul>
</li>

{{-- Finance Menue Ends --}}



{{-- Hr Menu Starts --}}



{{-- Hr Menu Ends --}}




{{-- Return Menu Start --}}

<li class="nav-item" id="returns-parent">
  <a class="nav-link collapsed" data-bs-target="#returns" data-bs-toggle="collapse" href="#">
    <i class="bi bi-arrow-repeat"></i><span>Returns</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="returns" class="nav-content collapse" data-bs-parent="#returns-parent">
    <li>
      <a href="{{url('admin/add_return')}}">
        <i class="bi bi-reply-all-fill"></i><span>Add Return</span>
      </a>
    </li>
    <li>
      <a href="{{url('admin/failed_sales')}}">
        <i class="bi bi-hourglass-bottom"></i><span>Pending Return</span>
      </a>
    </li>
    <li>
      <a href="{{url('admin/completed_returns')}}">
        <i class="bi bi-check-square-fill"></i><span>Completed Return</span>
      </a>
    </li>
    {{-- <li>
      <a href="{{url('admin/returns_report')}}">
        <i class="bi bi-pie-chart-fill"></i><span>Report</span>
      </a>
    </li> --}}

  </ul>
</li>

{{-- Return Menue Ends --}}

{{-- Roles Menu Start --}}

<li class="nav-item" id="roles-parent">
  <a class="nav-link collapsed" data-bs-target="#roles" data-bs-toggle="collapse" href="#">
    <i class="bi bi-award-fill"></i><span>Roles</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="roles" class="nav-content collapse" data-bs-parent="#roles-parent">
    <li>
      <a href="{{route('role.add')}}">
        <i class="bi bi-node-plus-fill"></i><span>Add Role</span>
      </a>
    </li>
    <li>
      <a href="{{route('role.list')}}">
        <i class="bi bi-person-lines-fill"></i><span>Roles List</span>
      </a>
    </li>
    <li>
      <a href="{{route('admin.add')}}">
        <i class="bi bi-person-plus-fill"></i><span>Assign Roles</span>
      </a>
    </li>

  </ul>
</li>

{{-- Roles Menue Ends --}}
{{-- Modules Menu Start --}}
{{--
<li class="nav-item" id="Modules-parent">
  <a class="nav-link collapsed" data-bs-target="#Modules" data-bs-toggle="collapse" href="#">
    <i class="bi bi-box-fill"></i><span>Modules</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="Modules" class="nav-content collapse" data-bs-parent="#Modules-parent">
    <li>
      <a href="{{route('module.add')}}">
        <i class="bi bi-plus-square-fill"></i><span>Add Modules</span>
      </a>
    </li>
    <li>
      <a href="{{route('module.list')}}">
        <i class="bi bi-list-task"></i><span>Modules List</span>
      </a>
    </li>
  </ul>
</li> --}}

{{-- Modules Menue Ends --}}


    </ul>

  </aside><!-- End Sidebar-->
