@extends('AdminViews.Layout.layout')
@section('title','Add Employee')
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
               <h5 class="card-title w-100 text-center display-3">Add Employee</h5>
               <!-- Add user -->
               <form>
                  <div class="row  mb-3">
                     <div class="col-md-6">
                        <label for="inputText" class="col-sm-12 col-form-label">First Name</label>
                        <div class="col-sm-12">
                           <input type="text" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Last Name</label>
                        <div class="col-sm-12">
                           <input type="text" class="form-control">
                        </div>
                     </div>
                  </div>
                  <div class="row  mb-3">
                     <div class="col-md-6">
                        <label for="inputText" class="col-sm-12 col-form-label">Employee Class</label>
                        <div class="col-sm-12">
                           <input type="text" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Gender</label>
                        <div class="col-sm-12">
                        <select class="form-control">
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>
                               <option value="Other">Other</option>
                        </select>
                        </div>
                     </div>
                  </div>
                  <div class="row  mb-3">
                     <div class="col-md-6">
                        <label for="inputText" class="col-sm-12 col-form-label">Phone</label>
                        <div class="col-sm-12">
                           <input type="number" class="form-control">
                        </div>
                     </div>
                        <div class="col-md-6">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Designation</label>
                        <div class="col-sm-12">
                        <select class="form-control">
                               <option value="Customer">Customer</option>
                               <option value="Buyer">Buyer</option>
                               <option value="Seller">Seller</option>
                        </select>
                        </div>
                     </div>
                     <div class="row  mb-3">
                     <div class="col-md-6">
                        <label for="inputText" class="col-sm-12 col-form-label">CNIC</label>
                        <div class="col-sm-12">
                           <input type="number" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Address</label>
                        <div class="col-sm-12">
                           <input type="text" class="form-control">
                        </div>
                     </div>
                  </div>
                  <div class="row  mb-3">
                     <div class="col-md-6">
                        <label for="inputText" class="col-sm-12 col-form-label">Email</label>
                        <div class="col-sm-12">
                           <input type="email" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Blood Group</label>
                        <div class="col-sm-12">
                           <input type="text" class="form-control">
                        </div>
                     </div>
                  </div>
                  <div class="row  mb-3">
                     <div class="col-md-6">
                        <label for="inputText" class="col-sm-12 col-form-label">Rate Type</label>
                        <div class="col-sm-12">
                        <select class="form-control">
                               <option value="Hourly">Hourly</option>
                               <Buyer value="Weekly">Weekly</option>
                               <option value="Monthly">Monthly</option>
                        </select>
                        </div>
                     </div>
                        <div class="col-md-6">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Per Hour Rate</label>
                        <div class="col-sm-12">
                        <input type="number" class="form-control">
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



                     <div class="col-md-6">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Reason</label>
                        <div class="col-sm-12">
                        <select class="form-control">
                               <option>Battery Life</option>
                               <option>Damaged Body</option>
                               <option>Damaged Panel</option>
                               <option>charging port not working</option>
                               <option>camera replaced</option>
                        </select>
                        </div>
                     </div>