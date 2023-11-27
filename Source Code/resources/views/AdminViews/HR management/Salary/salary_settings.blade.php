@extends('AdminViews.Layout.layout')
@section('title','Salary Setting')
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
               <h5 class="card-title w-100 text-center display-3">Setting Salary</h5>
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
                        <label for="inputEmail" class="col-sm-12 col-form-label">Salary Type</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control">
                        </div>
                     </div>
                  </div>


                  <table border="1" width="100%">
              <tbody><tr><td class="col-sm-6 text-center"><h4 class="payrolladditiondeduction paddingtop30">Addition</h4><br>
                 <table id="add">

                 <tbody></tbody></table>
            </td>
            <td class="col-sm-6 text-center"><h4 class="payrolladditiondeduction">Deduction</h4><br>
              <table id="dduct">
              <tbody>
              
            
            
            
            </tbody></table>

            </td>

          

        </tr></tbody></table>


                  <div class="row  mb-3">
                  <div class="col-md-6">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Gross Salary</label>
                        <div class="col-sm-12">
                               <input type="text" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Weekly HoliDays</label>
                        <div class="col-sm-12">
                    
  <input type="checkbox" name="day1" value="saturday">
  <label for="day1">Saturday</label>
  <input type="checkbox" name="day2" value="sunday">
  <label for="day2">Sunday</label>
  <input type="checkbox" name="day3" value="Monday">
  <label for="day3">Monday</label>
  <input type="checkbox" name="day4" value="Tuesday">
  <label for="day4">Tuesday</label>
  <input type="checkbox" name="day5" value="Wednesday">
  <label for="day5">Wednesday</label>
  <input type="checkbox" name="day6" value="Thursday">
  <label for="day6">Thursday</label>
  <input type="checkbox" name="day7" value="Friday">
  <label for="day7">Friday</label>
                        </div>
                     </div>
                  </div>
                    
                  <div class="row mb-3">                        
                     <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-khas-primary">Reset</button>
                        <button type="submit" class="btn btn-khas-primary">Set</button>
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

