<?php

namespace App\Http\Controllers;
use App\Book;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::latest()->paginate(5);
        return view('admin/books',['books'=> $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book =Book::find($id);
        return view('admin/bookUpdate',['book'=>$book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'author'=>'required',
            'info'=>'required',
            'image'=>'required|image',
            'book'=>'required|mimes:pdf',
        ]);
        if ($request->hasFile('image')){
            $imageExt = $request->file('image')->getClientOriginalExtension();
            $imageName = time().'thumnnail.'.$imageExt;
            $request->file('image')->storeAs('thumbnails/',$imageName,'public');
        }
        if ($request->hasFile('book')){
            $bookExt = $request->file('book')->getClientOriginalExtension();
            $bookName = time().'book.'.$bookExt;
            $request->file('book')->storeAs('books/',$bookName,'public');
        }
        $book =Book::find($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->info = $request->input('info');
        $book->image = $imageName;
        $book->bookfile = $bookName;
        $book->user_id = auth()->user()->id;
        $book->category_id = $request->input('category');
        $book->save();
        return redirect(route('books.index'))->with('msg','update OK');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
