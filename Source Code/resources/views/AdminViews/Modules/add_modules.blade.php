@extends('AdminViews.Layout.layout')
@section('title','Add Modules')
@section('style')
<style></style>
@endsection
@section('content')
<main id="main" class="main">
   <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">
         <div class="container p-3">
            <div class="row my-3 ">
               <div class="col-12 text-end">
                  <a href='{{route('module.list')}}' class="btn btn-primary">
                  Module List
                  </a>
                  <div class="row">
                     <div class="col-md-7 mx-auto">
                        <h3 class="text-center">Add Module</h3>
                        <form action="{{ isset($module) ? route('module.update', $id=$module->id) : route('module.create') }}" method="POST">
                           @csrf
                           @isset($module)
                           @method('PUT')
                           @endisset
                           <div class="modal-body text-start">
                              <div class="row ">
                                 <div class="col-sm-5">
                                    <label class="" for="parent_module">Parent Module</label>
                                    <select class="form-control" name="parent_id" id="parent_module">
                                      <option value="">No Parent</option>
                                      @foreach($modules as $mod)
                                        <option {{$module&& $module->id == $mod->id?"disabled":''}} value="{{ $mod->id }}" {{ isset($module) && $module->parent_id == $mod->id ? 'selected' : '' }}>{{ $mod->module_name }}</option>
                                      @endforeach
                                    </select>
                                  </div>


                                  {{-- <div class="col-sm-5">
                                    <label for="module_disabled">Module Enabled</label>
                                    <select class="form-control" name="module_disabled" id="module_disabled">
                                       <option value="0" {{ isset($module) && !$module->disabled ? 'selected' : '' }}>Enabled</option>
                                       <option value="1" {{ isset($module) && $module->disabled ? 'selected' : '' }}>Disabled</option>
                                    </select>
                                 </div> --}}
                              </div>
                              <!-- Module fields -->
                              <div id="Modules-container" class="mt-3">
                                 {{-- {{dd($module)}} --}}

                                 <div class="row">
                                    <div class="col-sm-5">
                                       <input type="text" name="module_name[]" class="form-control " value="{{$module?$module->module_name:old('module_name')}}"  placeholder="Module name">
                                       <input type="hidden" name="module_id[]" class="form-control" value="{{$module?$module->id:old('id')}}"  placeholder="Module name">
                                      </div>
                                    <div class="col-sm-5">
                                       <input type="text" name="icon[]" class="form-control " value="{{$module?$module->icon:old('icon')}}" placeholder="Icon Class" id="icon">
                                    </div>
                                    <div class="col-sm-5">
                                       <input type="text" name="module_route[]" class="mt-2 form-control " value="{{$module?$module->module_route:old('module_route')}}"placeholder="Route Name" id="module_route">
                                    </div>
                                    <div class="col-sm-5 mt-2">

                                      <select class="form-control " name="module_disabled[]" id="module_disabled">
                                       <option value="0" {{ ($module && $module->disabled==false) ? 'selected' : '' }}>Enabled</option>
                                       <option value="1" {{ ($module && $module->disabled==true) ? 'selected' : '' }}>Disabled</option>

                                      </select>
                                   </div>
                                    <div class="col-auto">
                                       <button type="button" class="btn btn-success add-Module"><i class="bi bi-plus-square-fill"></i></button>
                                    </div>
                                    {{-- @if ($module)
                                    @foreach ($module->subModules as $submodule)
                                    <div class="row my-2 pt-2 border-top">
                                       <div class="col-sm-5">
                                          <input type="text" name="module_name[]" value="{{ $submodule->module_name }}" class="form-control" placeholder="Module name">
                                          <input type="hidden" name="module_id[]" value="{{ $submodule->id }}" class="form-control" placeholder="Module name">
                                       </div>
                                       <div class="col-sm-5">
                                          <input type="text" name="icon[]" value="{{ $submodule->icon }}" class="form-control" placeholder="Icon Class" id="icon">
                                       </div>
                                       <div class="col-sm-5">
                                          <input type="text" name="module_route[]" value="{{ $submodule->module_route }}" class="mt-2 form-control" placeholder="Route Name" id="module_route">
                                       </div>
                                       <div class="col-sm-5">
                                        <select class="form-control mt-2" name="module_disabled[]" id="module_disabled">
                                          <option value="0" {{ ($submodule->disabled==false) ? 'selected' : '' }}>Enabled</option>
                                          <option value="1" {{ ($submodule->disabled==true) ? 'selected' : '' }}>Disabled</option>
                                       </select>
                                     </div>
                                       <div class="col-auto">
                                          <button type="button" class="btn btn-danger remove-Module"><i class="bi bi-x-square-fill"></i></button>
                                       </div>
                                    </div>
                                    @endforeach
                                    @endif --}}
                                 </div>
                              </div>
                              <div class="my-3 mx-auto text-center">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
@endsection
@section('script')
<script>
   $(document).ready(function() {


         // add Module field
         $('.add-Module').click(function() {
             $('#Modules-container').append('<div class="row my-2 border-top pt-2"><div class="col-sm-5"><input type="text" name="module_name[]" class="form-control " placeholder="Module name">   <input type="hidden" name="module_id[]" class="form-control" placeholder="Module name"></div><div class="col-sm-5"><input type="text" name="icon[]" class="form-control " placeholder="Icon Class" id="icon"></div> <div class="col-sm-5"><input type="text" name="module_route[]" class="form-control mt-2" placeholder="Route Name" id="module_route"></div><div class="col-sm-5"> <select class="form-control mt-2" name="module_disabled[]" id="module_disabled"><option value="0">Enabled</option><option value="1">Disabled</option></select></div><div class="col-auto"><button type="button" class="btn btn-danger remove-Module"><i class="bi bi-x-square-fill"></i></button></div></div>');
         });

         // remove Module field
         $('#Modules-container').on('click', '.remove-Module', function() {
             $(this).closest('.row').remove();
         });


           $('.datatable').DataTable({
             "pageLength": 20
           });


         });

</script>
@endsection