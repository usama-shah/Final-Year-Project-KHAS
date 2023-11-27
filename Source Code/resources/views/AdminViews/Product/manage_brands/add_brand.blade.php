@extends('AdminViews.Layout.layout')
@section('title','Add Brand')
@section('style')
<style>
</style>
@endsection
@section('content')
<main id="main" class="main">
   <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">
       <div class="container">
         <h1>Add New Brand</h1>
         @if($brand)

            <form action="{{ route('brand.update', $brand->id) }}" method="POST">
               @method('PUT')

            @else
            <form action="{{ route('brand.create') }}" method="POST">


         @endif
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$brand?$brand->name:old('name') }}" required>
               </div>
               <div class="d-flex">

                   <button type="submit" class="btn mx-auto my-4 btn-primary">Save Changes</button>
                </div>
           </form>
       </div>
      </div>
   </section>
</main>
@endsection
@section('script')
<script></script>
@endsection