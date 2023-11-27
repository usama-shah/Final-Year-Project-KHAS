@extends('AdminViews.Layout.layout')
@section('title','Modules List')
@section('style')
<style>

</style>

@endsection

@section('content')


  <main id="main" class="main">


    <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">
        <div class="container p-3">
            <div class="row m-3 ">
              <h5 class="card-title col">Modules List</h5>
              <div class="col text-end">

                <a href="{{route('module.add')}}" class="btn btn-primary">
                  Add New Module
              </a>
              </div>
              </div>

        <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">

                <table id="moduless-table" class="datatable table table-striped responsive">
                    <thead>
                        <tr >
                            <th>ID</th>
                            <th>Module Name</th>
                            <th>Route</th>
                            <th>Icon</th>
                            <th>Status</th>
                            <th>Parent ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($modules as $module)
                            @include('AdminViews.Modules.submodules_row', ['module' => $module, 'level' => 0])
                        @endforeach
                    </tbody>
                </table>

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

function deleteModule(btn) {
    if (confirm("Are you sure you want to delete this module?")) {
        var id = btn.dataset.id;

        var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/admin/delete_module/' + id, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': csrf_token
            },
        })
        .then(response => response.json())
        .then(data => {
          if(data.message){
            toastr.success(data.message);
            $(btn).closest('tr').fadeOut(500, function(){
                $(this).remove();
            });}
            else{
              toastr.error(data.error);

            }

        })
        .catch(error => {
            console.error(error);
            toastr.error("An error occurred while deleting the module."); // Display an animated error notification
        });
    }
}
</script>
@endsection