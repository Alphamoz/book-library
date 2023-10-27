@extends('layout.mainlayout')

@section('content')
@if(session('status'))
<div class="alert alert-success ilangbos" role="alert">
  {{ session('status') }}
</div>
@endif
<div class="row">
  @foreach ($allData['data'] as $key => $book)
  <div class="col-sm-6 col-md-3">
    <div class="thumbnail fixed-height-card">
      {{-- @dd($allData) --}}
      <img src="{{$book['image_path']}}" alt="..." width="250px">
      <div class="caption">
        <h3>{{$book['title']}}</h3>
        <h3>{{$book['author']['author_name']}}</h3>
        <p>{{Str::limit($book['desc'], 50)}}</p>
        <div class="text-center"><a href="{{route('books.show', ['bookId' => $book['id']])}}" class="btn btn-default" role="button">Show Detail</a></div>
      </div>
    </div>
  </div>
  @if (($key+1) % 4 == 0 && !$loop->last)
  </div>
<div class="row">
  @endif
  @endforeach
</div>
@endsection

@section('pagination')
{{-- @parent --}}
@if ($allData['links'])
            

  <div class="d-flex justify-content-center text-center">
    {{-- pagination has not work yet --}}
      {{-- {{$allData->links()}} --}}


    <nav aria-label="Page navigation example">
      <ul class="pagination">
        @foreach ($allData['links'] as $item)
        {{-- inside item, there are url, label and active --}}
        <li class="page-item {{$item['active'] ? 'active':'' }}"><a class="page-link" href="{{$item['feurl']}}">{!! $item['label'] !!}</a></li>
        @endforeach
      </ul>
    </nav>
  </div>
  @endif
@endsection
