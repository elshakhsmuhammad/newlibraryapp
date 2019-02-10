<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Comment;
use App\Recomment;
use Illuminate\Http\Request;
use App\Notifications\RepliedToBook;

class PagesController extends Controller
{
    public $comment;
    public function index(){
        $book= Book::latest()->paginate(5);
        return view('welcome',['books'=> $book]);
    }
    public function viewCategory($id){
        $category = Category::find($id);
        $books = $category->books;
        return view('viewcategory')->with(['books'=>$books,'category'=>$category]);
    }
    public function viewBook($id){
        $book = Book::find($id);
        return view('book')->with('book',$book);
    }


    public function addRedComment(Request $request, $id)
    {
        {
            $this->validate($request, [
                'name' => 'required|max:200'
            ]);

            $coment = Comment::findOrFail($id);
            $recoment = new Recomment();
            $recoment->comment_id =  $coment->id;
            $recoment->user_id = auth()->user()->id;
            $recoment->name = $request->input('name');
            $recoment->save();
            return redirect()->back();
        }

    }

}
