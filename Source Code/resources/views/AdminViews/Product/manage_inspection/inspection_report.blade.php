@extends('AdminViews.Layout.layout')
@section('title','Inspection Report')
@section('style')
<style>

</style>

@endsection

@section('content')


  <main id="main" class="main">


    <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">


      <div class="card-body">
            <h5 class="card-title">Inspection Report</h5>

            <table id="inspection-table" class="datatable table table-striped responsive">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Product Title</th>
                  <th scope="col">Status</th>
                  <th scope="col">Inspected By</th>
                  <th scope="col">Inspection Date</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>

                @foreach($inspections as $ins)
                <tr>
                  <th scope="row">{{$ins->id}}</th>
                  <td>{{$ins->phone->title}}</td>
                  <td>{{$ins->status}}</td>
                  <td>{{$ins->admin->name}}</td>
                  <td>{{$ins->created_at->format('d/M/Y H:s')}}</td>
                  <td>
                    <a href="#" class="btn btn-success btn-sm view-inspection" data-inspection="{{ json_encode($ins) }}"><i class="bi bi-eye"></i></a>
                  </td>                </tr>
@endforeach
              </tbody>
            </table>
<!-- Modal -->
<div class="modal fade" id="inspectionModal" tabindex="-1" aria-labelledby="inspectionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inspectionModalLabel">Inspection Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Display the inspection details here -->
        <h6>Inspectio ID: <span id="inspectionId"></span></h6>
        <h6>Phone Title: <span id="phoneTitle"></span></h6>
        <h6>Status: <span id="inspectionStatus"></span></h6>
        <h6>Admin Name: <span id="adminName"></span></h6>
        <h6>Inspected At: <span id="createdAt"></span></h6>
        <hr>

        <h3 class="rejection-reason">Rejecttion Reason</h3>
        <ul id="inspectionList"></ul>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

document.addEventListener("DOMContentLoaded", function () {
    // Get the modal and its elements
    var inspectionModal = document.getElementById("inspectionModal");
    var inspectionIdElement = document.getElementById("inspectionId");
    var phoneTitleElement = document.getElementById("phoneTitle");
    var inspectionStatusElement = document.getElementById("inspectionStatus");
    var adminNameElement = document.getElementById("adminName");
    var createdAtElement = document.getElementById("createdAt");
    // Get all the view inspection buttons
    var viewButtons = document.querySelectorAll(".view-inspection");

    // Add a click event listener to each view button
    viewButtons.forEach(function (button) {
      button.addEventListener("click", function (event) {
        event.preventDefault();

        // Get the inspection data from the data attribute
        var inspectionData = JSON.parse(this.getAttribute("data-inspection"));
var ulElement = document.getElementById('inspectionList');

console.log(inspectionData);
Object.entries(inspectionData).forEach(function ([key, value]) {
  if (value === "true") {
    var formattedKey = key.replace('_', ' ');
    console.log(formattedKey);
    var liElement = document.createElement('li');
    liElement.textContent = formattedKey;
    ulElement.appendChild(liElement);
  }
});

        // Populate the modal with the inspection data
        inspectionIdElement.textContent = inspectionData.id;
        phoneTitleElement.innerHTML = "<a href='/phone-details/" + inspectionData.phone.id + "'>" + inspectionData.phone.title + "</a>";
        inspectionStatusElement.textContent = inspectionData.status;
        adminNameElement.textContent = inspectionData.admin.name;
        // Convert the created_at date and time to a human-readable format
        var createdAt = new Date(inspectionData.created_at);
        var createdAtFormatted = createdAt.toLocaleString();
        createdAtElement.textContent = createdAtFormatted;
        if(inspectionData.status!="Rejected"){
          $('.rejection-reason').hide();
        }
        else{
          $('.rejection-reason').show();

        }

        // Show the modal
        var modal = new bootstrap.Modal(inspectionModal);
        modal.show();
      });
    });
  });
var table =$('#inspection-table').DataTable({
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
</script>
@endsection