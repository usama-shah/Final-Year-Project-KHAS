@extends('AdminViews.Layout.layout')
@section('title','Txn Ledger')
@section('style')
<style>

</style>

@endsection

@section('content')


  <main id="main" class="main">


    <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">


      <div class="card-body">
            <h5 class="card-title">TXN Ledger</h5>

            <!-- Default Table -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th style="display: none;"></th>
                  <th scope="col">Txn ID</th>
                  <th scope="col">User</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Type</th>
                  <th scope="col">Status</th>
                  <th scope="col">Method</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody>
              @foreach($transactions as $transaction)
                <tr>
                  <th style="display: none;">{{$transaction->transaction_id}}</th>
                  <th scope="row">{{ substr($transaction->transaction_id, 0, 6) }}</th>

                  <td>{{$transaction->user->first_name." ".$transaction->user->last_name}}</td>
                  <td>RS {{number_format($transaction->amount)}}</td>
                  <td>{{$transaction->transaction_type}}</td>
                  <td>{{$transaction->status}}</td>
                  <td>{{$transaction->method}}</td>
                  <td>{{$transaction->created_at->format('d,M,Y:H:s')}}</td>
                </tr>
@endforeach
              </tbody>
            </table>
            <!-- End Default Table Example -->
          </div>

      </div>
    </section>

  </main>
@endsection

@section('script')

<script>
  $(document).ready(function() {
         $('.datatable').DataTable({
           "pageLength": 10,
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

         });
       });
</script>
@endsection