<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use App\Models\Category;

use App\Models\Borrow;


class HomeController extends Controller
{
    public function index(){
        $category = Category::all();

        $data = Book::all();
        return view('home.index',compact('data','category'));
    }
    public function book_details($id){
        $data = Book::find($id);
        return view('home.details',compact('data'));
    }
    public function upload_books(Request $request,$book_file){
        return response()->download(public_path('book/'.$book_file));
    }
    public function explore(){
        $category = Category::all();

        $data = Book::all();

        return view('home.explore',compact('data','category'));
}
public function search(Request $request){
    $category = Category::all();
    $search = $request->search;
    $data = Book::where('title','LIKE','%'.$search.'%')->orWhere('auther_name','LIKE','%'.$search.'%')->get();

    return view('home.explore',compact('data','category'));
}
public function cat_search($id){
    $category = Category::all();

   $data = Book::where('category_id',$id)->get();
    return view('home.explore',compact('data','category'));
}



}
 