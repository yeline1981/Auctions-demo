@extends('layouts.app')
@section('content')

<div class="container">
  <div class="container">
    <form method="post" action="{{ route('images.store') }}" 
          enctype="multipart/form-data">
      @csrf
      <div class="image">
        <label><h4>Add image</h4></label>
        <input type="file" class="form-control" required name="profile_image">
      </div>
  
      <div class="post_button">
        <button type="submit" class="btn btn-success">Add</button>
      </div>
    </form>
  </div>
</div>

@endsection


