<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'sha256-69Ep6ajVe8yYracoJUpg0wdsAawMY3aXqkRHqayhBTo=';"> --}}

    <title>@yield('title')</title>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css">
<link rel="stylesheet" href="{{asset('css/extend-bootstrap.min.css')}}">

 <!-- Icon File -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<link rel="stylesheet" href="{{asset('css/khas.css')}}">
<style>
.select2-container--default .select2-selection--single {
    height: 38px;
    border: 1px solid #ced4da;
    border-radius: 4px;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 36px;
    padding-left: 12px;
    font-size: 1rem;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 36px;
    position: absolute;
    top: 1px;
    right: 1px;
    width: 20px;
}

.select2-container .select2-selection--single .select2-selection__arrow b {
    border-color: #495057 transparent transparent transparent;
}

</style>

@yield('style')
</head>
<body>

    @include('UserViews/Layout/Includes/header')

        <main class="container-fluid ">

    @yield('content')


        </main>
    @include('UserViews/Layout/Includes/footer')
   <div class="loading-animation-wrapper">
    <div class="battery">
        <div class="liquid"></div>
      </div>
      <div>
          <br>
      <h5>Khas</h5>
    </div>
    </div>


    !-- Fav Modal -->

    @if(!empty(Auth::user()->favorites ))

    <div class="modal fade" id="favModal" tabindex="-1" aria-labelledby="favModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="favModalLabel">Favourite Phones</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


<table class="table table-striped">
<thead>
  <tr>
    <th>
      Product
    </th>
    <th>
      Added on
    </th>
    <th>
      Action
    </th>
  </tr>
</thead>
<tbody>
  @if(auth()->check())
  @foreach(Auth::user()->favorites as $fav)
  @if(!empty($fav->phone))
<tr>
 <td>
<div class="d-flex align-items-center">

  <img src="{{$fav->phone->main_image}}" width="50px"/>
<p class="mx-2 my-auto">{{$fav->phone->title}}</p>
<div>
 </td>
 <td>

  {{dateDiff($fav->created_at)}}
 </td>
 <td>
  <a href="{{route('phones.show',$id=$fav->phone_id)}}"class="btn btn-sm btn-success text-light"><i class="bi bi-eye"></i></a>
  <a href="{{route('favorites.remove',$favorite=$fav->id)}}" class="btn btn-sm btn-danger remove-fav text-light" data-fav-id="{{$fav->id}}"><i class="bi bi-trash3-fill"></i></a>
 </td>
</tr>
@endif
@endforeach
@endif
</tbody>
</table>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
@endif


    <div class="modal" id="exampleModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <p>Are you Sure You Wants To Delete?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-danger confirm-deleted">Yes</button>
            </div>
          </div>
        </div>
      </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{asset('js/khas.js')}}"></script>
<script>
  $(document).ready(function() {
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
});



  $(document).ready(function() {
        $('select').select2();
    });
    </script>
     @yield('script')
    </body>
    @if(session('success'))
    <script>
      toastr.success('{{ session('success') }}');
    </script>
    @endif
    @if(session('error_msg'))
    <script>
      toastr.error('{{ session('error_msg') }}');
    </script>
    @endif
    @if(session('error'))
    <script>
      toastr.error('{{ session('error') }}');
    </script>
    @endif
    @if(session('info'))
    <script>
      toastr.info('{{ session('info') }}');
    </script>
    @endif
    @if(session('warning'))
    <script>
      toastr.warning('{{ session('warning') }}');
    </script>
    @endif

</html>
