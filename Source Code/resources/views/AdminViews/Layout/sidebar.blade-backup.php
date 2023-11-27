


  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      @each('AdminViews.Layout.sidebar_menu', $modules, 'module')

      {{-- @foreach($modules as $module)

      @if($module->disabled==false)
      @if(count($module->subModules) <= 0)
      <li class="nav-item">
        <a class="nav-link " href="{{!empty($module->module_route && Route::has($module->module_route))?route($module->module_route):'#'}}">
          <i class="{{$module->icon}}"></i>
          <span>{{$module->module_name}}</span>
        </a>
      </li>
      @else
      <li class="nav-item " style="cursor: pointer">
              <a class="nav-link collapsed"  data-bs-target="{{"#module_no".$module->id}}" data-bs-toggle="collapse" >
                <i class="{{$module->icon}}"></i><span>{{$module->module_name}}</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="{{"module_no".$module->id}}" class="nav-content collapse " data-bs-parent="#sidebar-nav">
               @foreach($module->subModules as $submodule)


               @if($submodule->disabled==false)
               {{-- @if($submodule->disabled==false ) --}}
                {{-- <li>
                  <a href="{{!empty($submodule->module_route && Route::has($submodule->module_route))?route($submodule->module_route):'#'}}">
                    <i class="{{$submodule->icon}}"></i><span>{{$submodule->module_name}}</span>
                  </a>
                </li> --}}
                {{-- @endif
@endforeach
              </ul>
            @endif

            @endif
      @endforeach --}}

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
      <a href="{{route('admin.list')}}">
        <i class="bi bi-person-lines-fill"></i><span>Admin List</span>
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
</li>

{{-- Modules Menue Ends --}}


    </ul>

  </aside><!-- End Sidebar-->
