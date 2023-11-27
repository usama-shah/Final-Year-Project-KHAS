@extends('AdminViews.Layout.layout')
@section('title','Boost Product')
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
               <h5 class="card-title w-100 text-center display-3">Boost Product</h5>
               <!-- Add user -->
               <form>
                  <div class="row  mb-3">
                     <div class="col-md-6">
                        <label for="inputText" class="col-sm-12 col-form-label">Select Product</label>
                        <div class="col-sm-12">
                        <select class="form-control">
                               <option>Iphone 12</option>
                               <option>Vivo V23</option>
                               <option>Xiomi Note 11</option>
                               <option>Samsung Note 10</option>
                               <option>Samsung S22</option>
                        </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Boost from</label>
                        <div class="col-sm-12">
                           <input type="date" class="form-control">
                        </div>
                     </div>
                  </div>
                  <div class="row  mb-3">
                     <div class="col-md-6">
                        <label for="inputText" class="col-sm-12 col-form-label">Boost To</label>
                        <div class="col-sm-12">
                           <input type="date" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Charges</label>
                        <div class="col-sm-12">
                           <input type="number" class="form-control">
                        </div>
                     </div>
                  </div>                 
                  <div class="row mb-3">                        
                     <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-khas-primary">Boost</button>
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