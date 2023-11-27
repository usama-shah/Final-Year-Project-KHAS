@extends('AdminViews.Layout.layout')
@section('title','Add Return')
@section('style')
<style>

</style>

@endsection

@section('content')
  <main id="main" class="main">
    <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">
      <div class="col-md-10 m-auto">
            <div class="card-body  ">
               <h5 class="card-title w-100 text-center display-3">Add Return</h5>
               <!-- Add user -->
               <form method="post" action="{{route('return.getphone')}}">
                  @csrf
                  <div class="row  mb-3 ">
                     <div class="col-md-6 mx-auto">
                        <label for="inputText" class="col-sm-12 col-form-label">Phone ID</label>
                        <div class="col-sm-12">
                        <input type="number" value="" name="phone_id" class="form-control">
                        </div>
                     </div>

                  </div>

                  <div class="row mb-3">
                     <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-khas-primary">Find</button>
                     </div>
                  </div>
               </form>


               @if(!empty($phone))

               <div class="col-12">
                  <h3 class="w-100 text-center">Seller Info</h3>
                  <table class="table table-striped table-hover">
                     <input type="hidden" name="phone_id" value="{{$phone->id}}" />
                     <tr>
                        <th scope="row">Name</th>
                        <td>{!! $phone->user? $phone->user->first_name." ".$phone->user->last_name  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     </tr>
                     <tr>
                        <th scope="row">Phone</th>
                        <td>{!! $phone->user? $phone->user->phone  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     </tr>
                     <tr>
                        <th scope="row">Email</th>
                        <td>{!! $phone->user? $phone->user->email  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                    <input type="hidden" name="seller_email" value="{{$phone->user->email}}"/>
                     </tr>
                     <tr>
                        <th scope="row">CNIC Number</th>
                        <td>{!! $phone->user? $phone->user->cnic  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     </tr>
                     <tr>
                        <th scope="row">Address</th>
                        <td>{!! $phone->user? $phone->user->address  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                     </tr>
                  </table>
                           </div>

                           <div class="col-12 mt-4">
                  <h3 class="w-100 text-center">Cutomer Information</h3>
                  <table class="table table-striped table-hover">
                     <tbody>
                        <tr>
                           <th scope="row">Purchased By</th>
                           <td>{!! $purchaser? $purchaser->first_name." ". $purchaser->last_name  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                        </tr>
                        <tr>
                           <th scope="row">Purchaser Phone</th>
                           <td>{!! $purchaser? $purchaser->phone  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                        </tr>
                        <tr>
                           <th scope="row">Purchaser Email</th>
                           <td>{!! $purchaser? $purchaser->email  : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                           <input type="hidden" name="customer_email" value="{{$purchaser->email}}"/>

                        </tr>
                        <tr>
                           <th scope="row">Purchased At</th>
                           <td>{!! $phone->created_at? $phone->created_at : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                        </tr>
                        <tr>
                           <th scope="row">Payment Status</th>

                           <td>{!! $transaction? $transaction->status : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                        </tr>
                        <tr>
                           <th scope="row">Payment Done At</th>

                           <td>{!! $transaction? $transaction->created_at : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                        </tr>
                        <tr>
                           <th scope="row">Payment Method</th>

                           <td>{!! $transaction? $transaction->method : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                        </tr>
                        <tr>
                           <th scope="row">Transaction ID</th>

                           <td>{!! $transaction? $transaction->transaction_id : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                        </tr>
                        <tr>
                           <th scope="row">Amount</th>

                           <td>{!! $transaction? "RS ". number_format($transaction->amount) : '<span class="text-muted font-italic">Not Provided</span>' !!}</td>
                        </tr>
                     </tbody>
                  </table>
                  <form method="post" action="{{route('return.save')}}">
                     @csrf
                     <div class="row mb-3">
                        <input type="hidden" value="{{$phone->id}}" name="phone_id" />
                        <div class="col-sm-12 text-center">
                           <button type="submit" class="btn btn-khas-primary">Return Now</button>
                        </div>
                     </div>
                  </form>
               @endif
               <!-- End General Form Elements -->
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