@extends('AdminViews.Layout.layout')
@section('title','Issue Leave')
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
               <h5 class="card-title w-100 text-center display-3">Issue Leave</h5>
               <!-- Add user -->
               <form>
                  <div class="row  mb-3">
                  <div class="col-md-6">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Employee Name</label>
                        <div class="col-sm-12">
                        <select class="form-control">
                               <option>Bilal</option>
                               <option>Hashir</option>
                               <option>Khalid</option>
                               <option>salim</option>
                               <option>asim</option>
                        </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Reason</label>
                        <div class="col-sm-12">
                        <select class="form-control">
                               <option>Sick</option>
                               <option>Accident</option>
                        </select>
                        </div>
                     </div>
                  </div>
                  <div class="row  mb-3">
                  <div class="col-md-6">
                        <label for="inputEmail" class="col-sm-12 col-form-label">From Date</label>
                        <div class="col-sm-12">
                               <input type="date" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label for="inputEmail" class="col-sm-12 col-form-label">To Date</label>
                        <div class="col-sm-12">
                              <input type="date" class="form-control">
                        </div>
                     </div>
                  </div>
                    
                  <div class="row mb-3">                        
                     <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-khas-primary">Issue Leave</button>
                     </div>
                  </div>
               </form>
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