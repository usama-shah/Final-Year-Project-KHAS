@extends('AdminViews.Layout.layout')
@section('title','Add Admin')
@section('style')
<style>

</style>

@endsection

@section('content')

  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">

      <div class="col-md-10 m-auto">
            <div class="card-body  ">
               <h5 class="card-title w-100 text-center display-3">Add Admin</h5>

               @if(!empty($admin))
               <form action="{{route('admin.create',$id=$admin->id)}}" method="POST">
                  @else
                  <form action="{{route('admin.create')}}" method="POST">
                  @endif
                  @csrf
                  <div class="row mb-3">
                      <label for="inputName" class="col-sm-12 col-form-label">Name</label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" name="name" id="inputName" placeholder="Enter name" value="{{!empty($admin)?$admin->name: old('name') }}">
                          @if ($errors->has('name'))
                              <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="inputEmail" class="col-sm-12 col-form-label">Email</label>
                      <div class="col-sm-12">
                          <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Enter email" value="{{!empty($admin)?$admin->email: old('email') }}">
                          @if ($errors->has('email'))
                              <span class="text-danger">{{ $errors->first('email') }}</span>
                          @endif
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="inputPhone" class="col-sm-12 col-form-label">Phone</label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" name="phone" id="inputPhone" placeholder="Enter phone number" value="{{!empty($admin)?$admin->phone: old('phone') }}">
                          @if ($errors->has('phone'))
                              <span class="text-danger">{{ $errors->first('phone') }}</span>
                          @endif
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="inputRole" class="col-sm-12 col-form-label">Role</label>
                      <div class="col-sm-12">
                          <select class="form-control" name="role" id="inputRole">

                           @forelse($role as $role)
                           <option value="{{$role->id}}" {{((!empty($admin)) && ($admin->role == $role->id))?'selected':''}}  {{old('role') == $role->id ? 'selected' : '' }}>{{$role->role}}</option>
@empty
                           @endforelse

                          </select>
                          @if ($errors->has('role'))
                              <span class="text-danger">{{ $errors->first('role') }}</span>
                          @endif
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-sm-12 text-center">
                          <button type="reset" class="btn btn-khas-primary mx-2">Reset</button>
                          <button type="submit" class="btn btn-khas-primary mx-2">Save</button>
                      </div>
                  </div>
              </form>


            </div>
         </div>
      </div>
    </section>

  </main>
@endsection

@section('script')

<script>

</script>
@endsection
