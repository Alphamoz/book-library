@extends('layout.mainlayout')
@section('tabTitle', 'Detail')

@section('content')
    {{-- @foreach ($detailedBook as $item)
    {{$item}}
@endforeach --}}
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <div class="thumbnail" style="position:relative;">
                <div class="row text-center">
                    <div class="col-sm-6 col-md-4">
                        <img src="{{ $detailedBook->image_path }}" class="pt-10 pb-10 pl-10" width="250px">
                        <div class="text-center">
                            <a href="#" class="btn btn-default mt-10 mb-10" role="button">Borrow</a>
                            <!-- <a href="#" class="btn btn-default" role="button">Buy</a> -->
                        </div>
                        <div style="">
                            <a class="btn" href="{{route('books.edit' , $detailedBook->id)}}" >Edit</a>
                            <a class="btn" href="{{route('books.edit' , $detailedBook->id)}}" >Delete</a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-8 text-justify">
                        <h2><b>{{ $detailedBook->title }}</b></h2>
                        <p><small>by</small> <a href="#" class="h-link">{{ $detailedBook->author->author_name }}</a></p>
                        <div class="pt-20">
                            <p>Publisher <a href="#" class="h-link">{{ $detailedBook->publisher }}</a></p>
                            <p>Category <a href="#" class="h-link">{{ $detailedBook->category }}</a></p>
                            <p>Pages <b>{{ $detailedBook->pages }}</b></p>
                            <p>Language <a href="#" class="h-link">{{ $detailedBook->language }}</a></p>
                            <p>Publish Date <a href="#" class="h-link">{{ $detailedBook->publish_date }}</a></p>
                            <p>Subjects {{ $detailedBook->subject }}</p>
                            <p id="synopsis">{{ $detailedBook->desc }}</span></p>
                            <p class="h-link" id="read-btn" onclick="showCompleteText()">Read more</p>
                            <p>ISBN <b>{{ $detailedBook->isbn }}</b></p>
                        </div>
                    </div>
                </div>
                
              
            </div>
            
        </div>

    </div>



@endsection

@section('pagination')
@endsection
