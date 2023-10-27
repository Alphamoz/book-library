@extends('layout.mainlayout')
@section('content')
<section class="mb-10 text-center">
<h1>Confirm Delete</h1>
<p>Are you sure you want to delete the following item?</p>
<div class="card">
    <img class="card-img-top" src="{{$item->image_path}}" alt="Card image cap" width="300rem" height="auto">
    <div class="card-body">
      <h5 class="card-title">{{$item->title}}</h5>
      <p class="card-text">{{Str::limit($item->desc, 50)}}</p>
      <form method="POST" action="{{route('books.delete', ['bookId'=>$item->id])}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="{{route('books.index')}}" class="btn btn-light">Cancel</a>
      </form>      
    </div>
  </div>
</section>
@endsection

@section('pagination')
    
@endsection
