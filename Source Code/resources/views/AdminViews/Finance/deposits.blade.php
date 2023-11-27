@extends('AdminViews.Layout.layout')
@section('title','Deposits')
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
               <h5 class="card-title w-100 text-center display-3">Deposits</h5>
               <!-- Add user -->
               <form>
                  <div class="row  mb-3">
                     <div class="col-md-6">
                        <label for="inputText" class="col-sm-12 col-form-label">Select User</label>
                        <div class="col-sm-12">
                        <select class="form-control">
                               <option>Atif Aslam</option>
                               <option>Syed Mushahid</option>
                               <option>Usama Shah</option>
                               <option>Luqman Waheed</option>
                               <option>Aslam Khan</option>
                        </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Amount</label>
                        <div class="col-sm-12">
                           <input type="number" class="form-control">
                        </div>
                     </div>
                  </div>      
                  <div class="row mb-3">                        
                     <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-khas-primary">Add</button>
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