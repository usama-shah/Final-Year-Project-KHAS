@extends('AdminViews.Layout.layout')
@section('title','Withdraw Requests')
@section('style')
<style>

</style>

@endsection

@section('content')


  <main id="main" class="main">


    <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">

      <div class="card-body">
            <h5 class="card-title">Withdraw Requests</h5>

            <!-- Default Table -->
            <div class="table-responsive">
              <table id="withdraw-requests-table" class="datatable table table-striped responsive">
                  <thead>
                      <tr>
                          <th>TXN ID</th>
                          <th>User Name</th>
                          <th>Balance</th>
                          <th>Amount</th>
                          <th>Time</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
          </div>


<!-- Modal -->
<div class="modal fade" id="passwordConfirmModal" tabindex="-1" aria-labelledby="passwordConfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="passwordConfirmModalLabel">Confirm Your Identity</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="passwordConfirmForm">
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="confirmPasswordBtn">Confirm</button>
      </div>
    </div>
  </div>
</div>


            <!-- End Default Table Example -->
          </div>

      </div>
    </section>
    <input type="hidden" id="transactionId">
    <div class="modal fade" id="transactionInfoModal" tabindex="-1" aria-labelledby="transactionInfoModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="transactionInfoModalLabel">Transaction Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" id="transaction-id"></h5>
                    <p class="card-text">
                        <strong>User Name: </strong><span id="user-name"></span><br>
                        <strong>Balance: </strong><span id="balance"></span><br>
                        <strong>Amount: </strong><span id="amount"></span><br>
                        <strong>Status: </strong><span id="status"></span><br>
                        <strong>Request Generated At: </strong><span id="created-at"></span><br>
                        <strong>Updated At: </strong><span id="updated-at"></span><br>
                        <strong>Bank: </strong><span id="bank"></span><br>
                        <strong>Account: </strong><span id="account"></span><br>
                        <strong>Action Taken By: </strong><span id="action_by"></span><br>
                    </p>
                </div>
            </div>
        </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('script')

<script>
var table =$('#withdraw-requests-table').DataTable({
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
        url: '/admin/get_withdraw_requests',
        data: function(d) {
          d.status='paid',
          d.status2='rejected'
            d.page = Math.ceil(d.start / d.length) + 1;
        }
    },
    columns: [
    { data: 'id' },
    { data: 'user_name' },
    { data: 'balance' },
    { data: 'amount' },
    { data: 'created_at' },
    { data: 'action' }
]

});

var confirmModal;
$(document).on("click", ".approveBtn", function() {
    var transactionId = $(this).data('transaction-id');  // get the transaction id
    $("#transactionId").val(transactionId);  // store the transaction id in the hidden input field

    confirmModal = new bootstrap.Modal(document.getElementById('passwordConfirmModal'));
    confirmModal.show();
});

$("#confirmPasswordBtn").on("click", function() {
  var transactionId = $("#transactionId").val();
    var password = $("#password").val();
    $.ajax({
        url: '/admin/approve_withdraw',
        type: 'POST',
        data: {
            password: password,
            transaction_id: transactionId,
            _token: "{{ csrf_token() }}"
        },
        success: function(response) {
            // handle success
            if (response.success) {
                // show success toastr
                toastr.success(response.message);
                table.ajax.reload();

            } else {
                // show error toastr
                toastr.error(response.message);
            }
            confirmModal.hide();

        },
        error: function(jqXHR, textStatus, errorThrown) {
            // handle error
            var response = JSON.parse(jqXHR.responseText);
            if (response.message) {
                // show error toastr
                toastr.error(response.message);
            } else {
                // show general error toastr
                toastr.error('An error occurred. Please try again.');
            }
            modal.hide();

        },

    });
});

$(document).on('click', '.transaction-link', function() {
    var transaction = $(this).data('transaction');  // get the transaction object

   // Convert the created_at string into a Date object
   var createdAt = new Date(transaction.created_at);
   var updatedAt = new Date(transaction.updated_at);

// Format the Date object into a human-readable string
var options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
var createdAt = createdAt.toLocaleString(undefined, options);
var updatedAt = updatedAt.toLocaleString(undefined, options);


    // Display the transaction information in the modal
    $('#transaction-id').text( transaction.transaction_id);
    $('#user-name').text(transaction.user.first_name+" "+(transaction.user.last_name?transaction.user.last_name:""));
    $('#balance').text(transaction.user.balance);
    $('#amount').text(transaction.amount);
    $('#status').text(transaction.status);
    $('#bank').text(transaction.pay_method.bank_name);
    $('#account').text(transaction.pay_method.account_number);
    $('#created-at').text(createdAt);
   $('#updated-at').text(updatedAt);
    $('#action_by').text(transaction.admin.name);

    // Open the modal
    $('#transactionInfoModal').modal('show');
});


</script>
@endsection