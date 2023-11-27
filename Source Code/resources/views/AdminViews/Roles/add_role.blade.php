@extends('AdminViews.Layout.layout')
@section('title','Add Roles')
@section('style')
<style>
</style>
@endsection
@section('content')
<main id="main" class="main">
   <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">
         <div class="panel-body">
            <form action="{{route('role.create')}}" method="POST">
          @csrf
                <div class="form-group row my-3">
               <label for="type" class="col-sm-3 col-form-label">Role Name <i class="text-danger">*</i></label>
               <div class="col-sm-6">
                  <input type="text" value="{{ !empty($role) ? $role->role : old('role') }}"
                  class="form-control" name="role" id="type" placeholder="Role Name" required="">
               </div>
            </div>

                @forelse($modules as $module)
                <h2 class="">{{$module->module_name}}</h2>
                <table class="table">
                <thead>

                    <tr>
                        <th>Sl No</th>
                        <th>Menu Name</th>
                        <th>Create (<label for="checkAllcreate0"><input type="checkbox" onclick="checkallcreate({{$module->id}})" id="checkAllcreate{{$module->id}}" name=""> All)</label></th>
                        <th>Read (<input type="checkbox" onclick="checkallread({{$module->id}})" id="checkAllread{{$module->id}}" name=""> all)</th>
                        <th>Update (<input type="checkbox" onclick="checkalledit({{$module->id}})" id="checkAlledit{{$module->id}}" name=""> all)</th>
                        <th>Delete (<input type="checkbox" onclick="checkalldelete({{$module->id}})" id="checkAlldelete{{$module->id}}" name=""> all)</th>
                    </tr>
                </thead>
                <tbody >

                    @forelse($module->subModules as $sub_module)

                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>
                            {{$sub_module->module_name}}
                            {{-- <input type="hidden" name="module_id[]" value="{{$module->id}}"> --}}
                            <input type="hidden" name="module_id[]" value="{{$module->id}}">
                        </td>

                        <td>
                            <div class="checkbox checkbox-success text-center">
                                <input type="checkbox" name="create[]" value="1" id="create00" class="createcheckbox{{$module->id}}"
                                {{-- @forelse($role->permissions as $permission)
                                @if($permission->sub_modules_id==$sub_module->id)
                               {{ "checked"}}

                                @endif
                                @empty
                                @endforelse --}}
>
                                                                                        <label for="create00"></label>
                            </div>
                        </td>
                        <td>
                            <div class="checkbox checkbox-success text-center">
                            <input type="checkbox" name="read[]" value="1" id="read00" class="readcheckbox{{$module->id}}">
                            <label for="read00"></label>
                            </div>
                        </td>
                        <td>
                            <div class="checkbox checkbox-success text-center">
                            <input type="checkbox" name="update[]" value="1" id="update00" class="editcheckbox{{$module->id}}">
                            <label for="update00"></label>
                            </div>
                        </td>
                        <td>
                            <div class="checkbox checkbox-success text-center">
                            <input type="checkbox" name="delete[]" value="1" id="delete00" class="deletecheckbox{{$module->id}}">
                            <label for="delete00"></label>
                            </div>
                        </td>
                    </tr>
                    @empty

                    <tr>
                        <td>1</td>
                        <td>
                        {{$module->module_name}}
                        <input type="hidden" name="module_id[]" value="{{$module->id}}">
                        <input type="hidden" name="sub_module_id[]" value="0">
                        </td>
                        <td>
                        <div class="checkbox checkbox-success text-center">
                            <input type="checkbox" name="create[]" value="1" id="create00" class="createcheckbox{{$module->id}}">
                            <label for="create00"></label>
                        </div>
                        </td>
                        <td>
                        <div class="checkbox checkbox-success text-center">
                            <input type="checkbox" name="read[]" value="1" id="read00" class="readcheckbox{{$module->id}}">
                            <label for="read00"></label>
                        </div>
                        </td>
                        <td>
                        <div class="checkbox checkbox-success text-center">
                            <input type="checkbox" name="update[]" value="1" id="update00" class="editcheckbox{{$module->id}}">
                            <label for="update00"></label>
                        </div>
                        </td>
                        <td>
                        <div class="checkbox checkbox-success text-center">
                            <input type="checkbox" name="delete[]" value="1" id="delete00" class="deletecheckbox{{$module->id}}">
                            <label for="delete00"></label>
                        </div>
                        </td>
                    </tr>

                    @endforelse
                </tbody>

                </table>
    @empty
    <table class="table">
    <tr><td class="text-disabled text-center">No Data Found</td></tr>
    </table>

    @endforelse
            <div class="form-group text-right">
               <button type="reset" class="btn btn-danger w-md m-b-5">Reset</button>
               <button type="submit" class="btn  btn-primary w-md m-b-5">Save</button>
            </div>
         </div>
        </form>
      </div>
   </section>
</main>
@endsection
@section('script')
<script>

function checkallcreate(Id) {
    $('.createcheckbox'+Id).prop('checked', function(i, val) {
    return !val;
  });
}
function checkallread(Id) {
    $('.readcheckbox'+Id).prop('checked', function(i, val) {
    return !val;
  });
}
function checkalledit(Id) {
    $('.editcheckbox'+Id).prop('checked', function(i, val) {
    return !val;
  });
}
function checkalldelete(Id) {
    $('.deletecheckbox'+Id).prop('checked', function(i, val) {
    return !val;
  });
}
</script>
@endsection
