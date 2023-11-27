@extends('AdminViews.Layout.layout')
@section('title','Roles List')
@section('style')
<style>

</style>

@endsection

@section('content')


  <main id="main" class="main">


    <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">

      <div class="card-body">
            <h5 class="card-title">Roles List</h5>

            <!-- Default Table -->
            <div class="table-responsive">
              <table id="moduless-table" class="datatable table table-striped responsive">

              <thead>
                  <tr>
                      <th scope="col">#</th>

                      <th scope="col">Role</th>
                      <th scope="col">Created On</th>
                      <th scope="col">Created By</th>
                      <th scope="col">Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($roles as $role)
                  <tr>
                      <th scope="row">{{ $role->id }}</th>
                      <td>{{ $role->role }}</td>
                      <td>{{ \Carbon\Carbon::parse($role->created_at)->format('Y,m,d') }}</td>
                      <td>{{ $role->admin_name }}</td>
                      <td>
                          <a href="{{route('role.add',$id=$role->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                          <a href="#" class="btn btn-danger btn-sm delete-role" data-id="{{ $role->id }}"><i class="bi bi-trash-fill"></i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>

            <!-- End Default Table Example -->
          </div>

      </div>
      </div>
    </section>

  </main>
@endsection

@section('script')

<script>
 $(document).ready(function() {
        $('.datatable').DataTable({
          "pageLength": 20
        });
      });
</script>
@endsection