@extends('AdminViews.Layout.layout')
@section('title','Pending Returns')
@section('style')
<style>

</style>

@endsection

@section('content')


  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">


      <div class="card-body">
            <h5 class="card-title">Pending Returns</h5>

            <!-- Default Table -->
            <table class="table">
              <thead>
                <tr>

                  <th scope="col">Phone Id</th>
                  <th scope="col">Customer Name</th>
                  <th scope="col">Total Amount</th>
                  <th scope="col">Date</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($returns as $r)
                <tr>
                  <th scope="row">{{$r->phone_id}}</th>
                  <td>{{$r->user->first_name." ".$r->user->last_name}}</td>
                  <td>{{"Rs ".number_format($r->phone->price)}}</td>
                  <td>{{$r->created_at->format('d,M,Y')}}</td>
                  <td>{{$r->status}}</td>

                  <td> <a href="#" class="btn btn-success btn-sm"   data-bs-toggle="modal" data-bs-target="#returnModal{{$r->phone_id}}"><i class="bi bi-eye"></i></a>

</td>
                </tr>
                <div class="modal fade" id="returnModal{{$r->phone_id}}" tabindex="-1" aria-labelledby="returnModal{{$r->phone_id}}Label" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="returnModal{{$r->phone_id}}Label">Return Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="mb-3 w-100">
                            <b>Phone : </b><a href="{{route('phones.show',$id=$r->phone_id)}}" target="_blank">{{$r->phone->title}}</a>


                          </div>
                          <div class="mb-3 w-100">
                            <b for="reason" class="form-label">Reason for returning product:</b>
                            <p> {{$r->reason}}</p>
                          </div>
                          <div class="mb-3 w-100">
                            <b for="message" class="form-label">Message:</b>
{{$r->message}}
                          </div>
                          <div class="d-flex justify-content-end ">
@if($r->return_file)

                          <a type="button"  href="{{url($r->return_file)}}" target="_blank" class="btn btn-primary mx-2">View File</a>
                    @endif
                    <form  class="mx-2"  method="POST" action="{{route('return.update')}}">
                    @csrf
<input type="hidden" value="{{$r->id}}" name="id">
<input type="hidden" value="Accepted" name="status">
<button type="submit" class="btn btn-success">Accept</button>
</form>
<form method="POST" class="mx-2" action="{{route('return.update')}}">
  @csrf
  <input type="hidden" value="{{$r->id}}" name="id">
  <input type="hidden" value="Rejected" name="status">
                          <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                  </div>
                      </div>
                    </div>
                  </div>
                </div>


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

</script>
@endsection