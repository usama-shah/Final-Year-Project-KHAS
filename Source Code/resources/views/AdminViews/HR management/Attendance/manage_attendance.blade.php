@extends('AdminViews.Layout.layout')
@section('title','Manage Attendance')
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
                  <th scope="col">Name</th>
                  <th scope="col">Date</th>
                  <th scope="col">Check In</th>
                  <th scope="col">Check Out</th>
                  <th scope="col">Duty Time</th>
                  <th scope="col">Over Time</th>
                  <th scope="col">Total Time</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Bilal</td>
                  <td>2022-12-25</td>
                  <td>08:00 am</td>
                  <td>04:40 pm</td>
                  <td>08:00</td>
                  <td>00:40</td>
                  <td>08:40</td>
                  <td> <a href="#" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a> <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a> <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> </a></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Ahmed</td>
                  <td>2022-12-25</td>
                  <td>08:00 am</td>
                  <td>04:40 pm</td>
                  <td>08:00</td>
                  <td>00:40</td>
                  <td>08:40</td>
                  <td> <a href="#" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a> <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a> <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> </a></td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Khalid</td>
                  <td>2022-12-25</td>
                  <td>08:00 am</td>
                  <td>04:40 pm</td>
                  <td>08:00</td>
                  <td>00:40</td>
                  <td>08:40</td>
                  <td> <a href="#" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a> <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a> <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> </a></td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>Yusuf</td>
                  <td>2022-12-25</td>
                  <td>08:00 am</td>
                  <td>04:40 pm</td>
                  <td>08:00</td>
                  <td>00:40</td>
                  <td>08:40</td>
                  <td> <a href="#" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a> <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a> <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> </a></td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>Saif</td>
                  <td>2022-12-25</td>
                  <td>08:00 am</td>
                  <td>04:40 pm</td>
                  <td>08:00</td>
                  <td>00:40</td>
                  <td>08:40</td>
                  <td> <a href="#" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a> <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a> <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> </a></td>
                </tr>
                
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

</script>
@endsection