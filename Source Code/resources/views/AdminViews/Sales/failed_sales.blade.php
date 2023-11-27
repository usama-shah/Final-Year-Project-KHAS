@extends('AdminViews.Layout.layout')
@section('title','Returned Sales')
@section('style')
<style>

</style>

@endsection

@section('content')


  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">


      <div class="card-body">
            <h5 class="card-title">Returned Sales</h5>

            <!-- Default Table -->
            <table id="sales-table" class="table datatable" >
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Title</th>
                  <th scope="col">Customer</th>
                  <th scope="col">Date</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($phones as $phone)
                <tr>
                  <th scope="row">{{$phone->id}}</th>
                  <th scope="row"><img src="{{$phone->phone->main_image}}" width="50px"/></th>
                  <td>{{$phone->phone->title}}</td>
                  <td>{{$phone->purchaser->first_name}}</td>
                  <td>{{$phone->updated_at->format('d,M,Y:H:s')}}</td>
                  <td>{{$phone->status}}</td>

                  <td> <a href="{{url('/phone-details',$id=$phone->phone->id)}}" target="_blank" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a>
                    {{-- <a href="{{route('sale.complete',$id=$phone->phone->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-check"></i></a> --}}
                    </td>
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
           "pageLength": 10
         });
       });
</script>
@endsection