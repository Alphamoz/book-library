@extends('layout.mainlayout')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('books.update', ['bookId' => $bookId])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    {{-- <br> --}}
    <div class="form-group">
        <label for="title">Book Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{$bookId->title}}">
    </div>
    <div class="form-group">
        <label for="isbn">ISBN</label>
        <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN" value="{{$bookId->isbn}}">
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" name="author" id="author" placeholder="Author Name" value="{{$bookId->author}}">
    </div>
    <div class="form-group">
        <label for="author">Image</label>
        <input type="file" class="form-control-file" name="image_path" id="image" value="{{$bookId->image_path}}">
    </div>
    <div class="form-group">
        <label for="publisher">Publisher</label>
        <input type="text" class="form-control" name="publisher" id="publisher" placeholder="publisher" value="{{$bookId->publisher}}">
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control" name="category" id="category" placeholder="Category" value="{{$bookId->category}}">
    </div>
    <div class="form-group">
        <label for="pages">Pages</label>
        <input type="text" class="form-control" name="pages" id="pages" placeholder="Pages" value="{{$bookId->pages}}">
    </div>
    <div class="form-group">
        <label for="language">Language</label>
        <input type="text" class="form-control" name="language" id="language" placeholder="Language" value="{{$bookId->language}}">
    </div>
    <div class="form-group">
        <label for="publish_date">Publish Date</label>
        <input type="date" class="form-control" name="publish_date" id="publish_date" placeholder="Publish Date" value="{{$bookId->publish_date}}">
    </div>
    <div class="form-group">
        <label for="subjects">Subjects</label>
        <input type="text" class="form-control" name="subjects" id="subjects" placeholder="subjects" value="{{$bookId->subjects}}">
    </div>
    <div class="form-group">
        <label for="desc">Desc</label>
        <input type="text" class="form-control" name="desc" id="desc" placeholder="Description" value="{{$bookId->desc}}">
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check Me for Data Confirmation</label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection