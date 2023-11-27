@extends('AdminViews.Layout.layout')
@section('title','Salary History')
@section('style')
<style>

</style>

@endsection

@section('content')
  
    
  <main id="main" class="main">


    <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">
      
        
      <div class="card-body">
            <h5 class="card-title">Manage Attendance</h5>
          
            <!-- Default Table -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Employee Name</th>
                  <th scope="col">Salary Month</th>
                  <th scope="col">Over Time Hours</th>
                  <th scope="col">Over Time Pay</th>
                  <th scope="col">Absence Hours</th>
                  <th scope="col">Absence Fine</th>
                  <th scope="col">Loan Deduction</th>
                  <th scope="col">Total Salary</th>
                  <th scope="col">Payment Date</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Bilal</td>
                  <td>February 2023</td>
                  <td>21.56</td>
                  <td>299.08</td>
                  <td>88.43</td>
                  <td>442.17</td>
                  <td>200.00</td>
                  <td>2956.92</td>
                  <td>2023-02-03</td>
                  <td> <a href="#" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a> <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a> <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> </a></td>
                </tr>
                
                
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

</script>
@endsection