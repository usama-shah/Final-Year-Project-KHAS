@if(count($module->subModules) <= 0)
<li class="nav-item">
  <a class="nav-link collapsed" href="{{!empty($module->module_route && Route::has($module->module_route))?route($module->module_route):'#'}}">
    <i class="{{$module->icon}}"></i>
    <span>{{$module->module_name}}</span>
  </a>
</li>

@else

<li class="nav-item " style="cursor: pointer" id="{{"sidebar-van".$module->id}}">
    <a class="nav-link collapsed"  data-bs-target="{{"#module_no".$module->id}}" data-bs-toggle="collapse" >
      <i class="{{$module->icon}}"></i><span>{{$module->module_name}}</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>

    <ul id="{{"module_no".$module->id}}" class="nav-content collapse " data-bs-parent="{{"#sidebar-van".$module->id}}">
        @if($module->subModules->count() > 0)
        <ul>
            @each('AdminViews.Layout.sidebar_menu', $module->subModules, 'module')
        </ul>
    @endif

    </ul>
  </li>

  @endif