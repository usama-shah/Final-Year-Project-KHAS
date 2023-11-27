@extends('AdminViews.Layout.layout')
@section('title','Add Category')
@section('style')
<style>
</style>
@endsection
@section('content')
<main id="main" class="main">
   <section class="section dashboard">
      <div class="row bg-white shadow rounded-3">
       <div class="col-md-7 mx-auto my-4">
         <h1 class="text-center">Add Category</h1>
         @if($category)

            <form action="{{ route('category.update', $category->id) }}" method="POST">
               @method('PUT')

            @else
            <form action="{{ route('category.create') }}" method="POST">


         @endif
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$category?$category->name:old('name') }}" required>
               </div>
            <div class="form-group">
                <label for="name">Prefix</label>
                <input type="text" class="form-control" name="prefix" id="prefix" value="{{$category?$category->prefix:old('prefix') }}">
               </div>
            <div class="form-group">
                <label for="name">Suffix</label>
                <input type="text" class="form-control" name="suffix" id="suffix" value="{{$category?$category->suffix:old('suffix') }}">
               </div>
            <div class="form-group">
                <label for="name">Phone Property</label>
                <input type="text" class="form-control" name="column_name" id="column_name" value="{{$category?$category->column_name:old('column_name') }}">
               </div>
            <div class="form-group">
                <label for="icon">Icon Class</label>
                <input type="text" class="form-control" name="icon" id="icon" value="{{$category?$category->icon:old('icon') }}" >
               </div>
               <div class="form-group">
                   <label for="parent_id">Parent Category</label>
                   <select class="form-control" name="parent_id" id="parent_id">
                       <option value="">No Parent</option>
                       @foreach($categories as $parentCategory)
                           <option value="{{ $parentCategory->id }}" {{$category && $parentCategory->id == $category->parent_id ? 'selected' : '' }}>{{ $parentCategory->name }}</option>
                       @endforeach
                   </select>
               </div>
               <div class="d-flex">

                  <button type="submit" class="btn mx-auto my-4 btn-primary">Save Changes</button>
               </div>           </form>
       </div>
      </div>
   </section>
</main>
@endsection
@section('script')
<script></script>
@endsection