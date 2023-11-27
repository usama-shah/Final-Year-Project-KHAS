@extends('AdminViews.Layout.layout')
@section('title','Administration List')
@section('style')
<style>

</style>

@endsection

@section('content')


  <main id="main" class="main">


    <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">

      <div class="card-body">
            <h5 class="card-title">Administration List</h5>

            <!-- Default Table -->
            <div class="table-responsive">
              <table id="moduless-table" class="datatable table table-striped responsive">

              <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Role</th>
                      <th scope="col">Last Login</th>
                      <th scope="col">Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($admins as $admin)
                  <tr>
                      <th scope="row">{{ $admin->id }}</th>
                      <td>{{ $admin->name }}</td>
                      <td>{{ $admin->email }}</td>
                      <td>{{ $admin->role_name }}</td>
                      <td>{{ \Carbon\Carbon::parse($admin->last_login)->diffForHumans() }}</td>
                      <td>
                          {{-- <a href="#" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a> --}}
                          <a href="{{route('admin.add',$id=$admin->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                          <a href="#" class="btn btn-danger btn-sm delete-admin" data-id="{{ $admin->id }}"><i class="bi bi-trash-fill"></i></a>
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