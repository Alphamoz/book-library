<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookPostRequest;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index(Request $request){
        if($request->has('search')){
            $keyword = $request->search;
            $allData = Book::with('author')->join('authors', 'books.author_id', '=', 'authors.id')->where('books.id', 'LIKE', "%$keyword%")->orWhere('authors.author_name', 'LIKE', "%$keyword%")->orWhere("desc", "LIKE", "%$keyword%")->orWhere("subjects", "LIKE", "%$keyword%")->orWhere("category", "LIKE", "%$keyword%")->paginate(12)->withQueryString();
        }
        else{
            $allData = Book::with('author')->paginate(12);
        }
        // $bookdatas = $allData;
        // return $allData;
        if(!$allData){
            return response()->json([
                "status"=>"error",
                "message"=>"Data not found",
                "error_code"=>404
        ]);
        }

        return response()->json([
            "status"=>"success",
            "message"=>"Read Data Successfull",
            'data'=>$allData
        ]);
    }
    function detail($id){
        $detailedData = Book::findorFail($id);
        return view('detail', compact('detailedData'));
    }
    function create(){
        return view('createBook');
    }
    function store(BookPostRequest $request, Book $book){
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
        return view('editBook', compact('bookId'));
    }
    function update(BookPostRequest $request, Book $bookId){
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
        $bookId->delete();
        return redirect()->route('books.index');
    }
}
