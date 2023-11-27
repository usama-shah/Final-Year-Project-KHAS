@extends('AdminViews.Layout.layout')
@section('title','Removed Products')
@section('style')
<style>
.status-dot {
  display: inline-block;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  vertical-align: middle;
}

</style>

@endsection

@section('content')
  <main id="main" class="main">
    <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">
        <div class="card-body">
            <h5 class="card-title">Users List</h5>
            <!-- Data Table -->
            <div class="table-responsive">
              <table id="users-table" class="datatable table table-striped responsive">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Post Date</th>
                    {{-- <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Last Login</th>
                    <th scope="col">Status</th> --}}
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- @foreach ($users as $user)
                  <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td> </td>
                    <td>{{ $user->first_name." ".$user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ \Carbon\Carbon::parse($user->last_login)->diffForHumans() }}</td>

                    <td>

                    </td>


                  </tr>
                @endforeach --}}

                </tbody>
              </table>
            </div>
            <!-- End Data Table Example -->
          </div>
      </div>
    </section>
  </main>
<!-- Bootstrap Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label class="w-100" for="reasonSelect">Reason for Delete:</label>
        <select id="reasonSelect" class="form-control w-100 col-12">
          <option value="Scam or Fake">Scam or Fake</option>
          <option value="Policy Voilation">Policy Voilation</option>
          <option value="Others">Others</option>
          <!-- Add more options as needed -->
        </select>
        <br>
        <label for="messageTextarea">Message:</label>
        <textarea id="messageTextarea" class="form-control" rows="4" placeholder="Enter a message"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="recoverConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="recoverConfirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="recoverConfirmationModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmrecoverBtn">Recover</button>
      </div>
    </div>
  </div>
</div>
@endsection






@section('script')
<script>

$(document).on('click', '.show-user-details', function() {
    var userId = $(this).data('id');
console.log("clicked");
$.ajax({
  url: '/admin/get_single_user_data/' + userId,
  method: 'GET',
  dataType: 'json',
  success: function(response) {
    showUserDetails(response);
  }
});
});



var table =$('#users-table').DataTable({
  responsive: true,
  dom: '<"text-center" B>lfrtip',
    buttons: [
        'copyHtml5',
        'csvHtml5',
        'excelHtml5',
        'pdfHtml5'
    ],
    language: {
        searchPlaceholder: "Search...",
        lengthMenu: "Show _MENU_ entries per page",
        zeroRecords: "No entries found",
        info: "Showing _START_ to _END_ of _TOTAL_ entries",
        infoEmpty: "Showing 0 to 0 of 0 entries",
        infoFiltered: "(filtered from _MAX_ total entries)"
    },
    serverSide: true,
    processing: true,
    ajax: {
        url: '/admin/get_removed_products_list',
        data: function(d) {

            d.page = Math.ceil(d.start / d.length) + 1;

        }
    },
    columns: [
        { data: 'id' },
        { data: 'photo' },
        { data: 'title' },
        { data: 'user' },
        { data: 'date' },
        // { data: 'email' },
        // { data: 'phone' },
        // { data: 'last_login' },
        // { data: 'status' },
        { data: 'action' }
    ]
});

 // Define a variable to store the productId
var productId;

$(document).on('click', '.delete_product', function() {
  productId = $(this).data('id');
  deletebutton=$(this);
  console.log(deletebutton);
  $('#deleteConfirmationModal').modal('show');
});

$(document).on('click', '#confirmDeleteBtn', function() {
  var reason = $('#reasonSelect').val();
  var message = $('#messageTextarea').val();
  // Send data to the backend using AJAX
  var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  $.ajax({
    url: '/admin/delete_product',
    type: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-Token': csrf_token
    },
    data: JSON.stringify({
      product_id: productId,
      reason: reason,
      message: message
    }),
    success: function(response) {
      console.log(response);
      // Handle success response from the backend
      toastr.success(response.message); // Display success message using Toastr
      // Perform any necessary UI updates
      deletebutton.removeClass('delete_product');
      deletebutton.removeClass('btn-danger');
      deletebutton.addClass('recover_product');
      deletebutton.addClass('btn-info');
      deletebutton.html('<i class="bi bi-arrow-clockwise"></i>');



    },
    error: function(xhr, status, error) {
      console.log(xhr);
      // Handle error response from the backend
      toastr.error('Error: ' + error);

      // Display an error message or perform any necessary actions
    }
  });
  $('#deleteConfirmationModal').modal('hide');
});



$(document).on('click', '.recover_product', function() {
  productId = $(this).data('id');
  recoverbutton=$(this);
  $('#recoverConfirmationModal').modal('show');
});

$(document).on('click', '#confirmrecoverBtn', function() {
  var reason = $('#reasonSelect').val();
  var message = $('#messageTextarea').val();
  // Send data to the backend using AJAX
  var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  $.ajax({
    url: '/admin/recover_product',
    type: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-Token': csrf_token
    },
    data: JSON.stringify({
      product_id: productId,
      reason: reason,
      message: message
    }),
    success: function(response) {
      console.log(response);
      // Handle success response from the backend
      toastr.success(response.message); // Display success message using Toastr
      // Perform any necessary UI updates
      recoverbutton.removeClass('recover_product');
      recoverbutton.removeClass('btn-info');
      recoverbutton.addClass('delete_product');
      recoverbutton.addClass('btn-danger');
      recoverbutton.html('<i class="bi bi-trash"></i>');



    },
    error: function(xhr, status, error) {
      console.log(xhr);
      // Handle error response from the backend
      toastr.error('Error: ' + error);

      // Display an error message or perform any necessary actions
    }
  });
  $('#recoverConfirmationModal').modal('hide');
});









</script>
@endsection

