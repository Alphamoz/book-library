@extends('layout.mainlayout')
@section('content')
<form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- <br> --}}
    <div class="form-group">
        <label for="title">Book Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{old('title')}}">
        @error('title')
        {{$message}}
        @enderror
    </div>
    <div class="form-group">
        <label for="isbn">ISBN</label>
        <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN" value="{{old('isbn')}}">
        @error('isbn')
        {{$message}}
        @enderror
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" name="author" id="author" placeholder="Author Name" value="{{old('author')}}">
        @error('author')
        {{$message}}
        @enderror
    </div>
    <div class="form-group">
        <label for="author">Image</label>
        <input type="file" class="form-control-file" name="image_path" id="image" value="{{old('image_path')}}">
        @error('image_path')
        {{$message}}
        @enderror
    </div>
    <div class="form-group">
        <label for="publisher">Publisher</label>
        <input type="text" class="form-control" name="publisher" id="publisher" placeholder="publisher" value="{{old('publisher')}}">
        @error('publisher')
        {{$message}}
        @enderror
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control" name="category" id="category" placeholder="Category" value="{{old('category')}}">
        @error('category')
        {{$message}}
        @enderror
    </div>
    <div class="form-group">
        <label for="pages">Pages</label>
        <input type="text" class="form-control" name="pages" id="pages" placeholder="Pages" value="{{old('pages')}}">
        @error('pages')
        {{$message}}
        @enderror
    </div>
    <div class="form-group">
        <label for="language">Language</label>
        <input type="text" class="form-control" name="language" id="language" placeholder="Language" value="{{old('language')}}">
        @error('language')
        {{$message}}
        @enderror
    </div>
    <div class="form-group">
        <label for="publish_date">Publish Date</label>
        <input type="date" class="form-control" name="publish_date" id="publish_date" placeholder="Publish Date" value="{{old('publish_date')}}">
        @error('publish_date')
        {{$message}}
        @enderror
    </div>
    <div class="form-group">
        <label for="subjects">Subjects</label>
        <input type="text" class="form-control" name="subjects" id="subjects" placeholder="subjects" value="{{old('subjects')}}">
        @error('subjects')
        {{$message}}
        @enderror
    </div>
    <div class="form-group">
        <label for="desc">Desc</label>
        <input type="text" class="form-control" name="desc" id="desc" placeholder="Description" value="{{old('desc')}}">
        @error('desc')
        {{$message}}
        @enderror
    </div>
{{-- 
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check Me for Data Confirmation</label>
    </div> --}}

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection