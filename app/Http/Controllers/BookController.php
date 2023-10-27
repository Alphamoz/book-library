<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookPostRequest;
use App\Models\Book;
use GuzzleHttp\Client;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    function index(Request $request){
        // using api controller to access database
        $keyword = $request->search;
        $client = new Client;
        $url = "http://book-library.test/api/books" ."?search=" .$keyword;
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $datas = json_decode($content);
        
        $bookdatas = $datas->data;
        
        // $bookdatas = $bookdatas
        // if($request->has('search')){
        //     $keyword = $request->search;
        //     $allData = Book::with('author')->join('authors', 'books.author_id', '=', 'authors.id')->where('books.id', 'LIKE', "%$keyword%")->orWhere('authors.author_name', 'LIKE', "%$keyword%")->orWhere("desc", "LIKE", "%$keyword%")->orWhere("subjects", "LIKE", "%$keyword%")->orWhere("category", "LIKE", "%$keyword%")->paginate(12)->withQueryString();
        // }
        // else{
        //     $allData = Book::with('author')->paginate(12);
        // }
        // $bookdatas = $allData;
        // dd($bookdatas);
        
        return view("book")->with('allData',$bookdatas);
    }
    function detail($id){
        $detailedData = Book::findorFail($id);
        return view('detail', compact('detailedData'));
    }
    function create(){
        return view('createBook');
    }
    function store(BookPostRequest $request, Book $book){
        // should be admin only
        if (! Gate::allows('admin', $book)) {
            abort(403);
        }
        // $title = $request->title;
        $validated= $request->validated();
        $path = $request->file('image_path')->store('images');
        $validated['image_path'] = Storage::url($path);
        $book->create($validated);
        // dd($title);
        return redirect('/books')->with('status', "Data Saved Successfully");
    }
    function show(Book $bookId){
        $detailedBook=$bookId;
        // return $bookId;
        return view('detail', compact('detailedBook'));
    }
    function edit(Book $bookId){
        // should be admin only
        if (! Gate::allows('admin', $bookId)) {
            abort(403);
        }
        return view('editBook', compact('bookId'));
    }
    function update(BookPostRequest $request, Book $bookId){
        // should be admin only
        if (! Gate::allows('admin', $bookId)) {
            abort(403);
        }
        $validated= $request->validated();

        $path = $request->file('image_path')->store('images');
        $validated['image_path'] = Storage::url($path);
        $bookId->update($validated);
        // dd($title);
        return redirect()->route('books.show', ['bookId' => $bookId]);
    }
    function confirmDelete($bookId){
        
        $item = Book::findorFail($bookId);
        return view('confirmDelete', compact('item'));
    }
    function delete(Book $bookId){
        // should be admin only
        if (! Gate::allows('admin', $bookId)) {
            abort(403);
        }
        $bookId->delete();
        return redirect()->route('books.index');
    }
}