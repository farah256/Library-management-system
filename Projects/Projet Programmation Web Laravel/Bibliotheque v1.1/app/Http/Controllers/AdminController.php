<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Book;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
public function index(){
if(Auth::id()){
    $usertype = Auth()->user()->usertype;
    if($usertype == 'admin')
    {
        $user = User::all()->count();
        $book = Book::all()->count();
        $book_file = Book::where('book_file')->count();
        $category = Category::all()->count();

        return view ('admin.index',compact('user','book','category','book_file'));
    }
    else if ($usertype == 'user'){
        $category = Category::all();

        $data = Book::all();

        return view ('home.index',compact('data','category'));

    }
}
else {
    return redirect()->back();
}
}
public function category_page(){
    $data = Category::all();
    return view('admin.category',compact('data'));
}

public function add_category(Request $request){
   $data = new Category;
   $data->cat_title = $request->category;
   $data->save();
   return redirect()->back()->with('message1','Category added successfuly');
}
public function cat_delete($id){
    $data = Category::find($id);
    $data->delete();
    return redirect()->back()->with('message2','Category deleted successfuly');
 }
 
 public function cat_edit($id){
    $data = Category::find($id);

    return view('admin.edit_category' ,compact('data'));
 }
 public function update_category(Request $request,$id){
    $data = Category::find($id);
    $data->cat_title = $request->cat_name;
    $data->save();

    return redirect('/category_page')->with('message1','Category updated successfuly');

}
public function add_book(){
    $data = Category::all();

    return view('admin.add_book',compact('data'));
}
public function store_book(Request $request){
    $request->validate([
        'book_name' => 'required|string|max:255',
        'auther_name' => 'required|string|max:255',
        'pages' => 'required|integer',
        'description' => 'required|string',
        'category' => 'required|exists:categories,id',
        'book_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400', 
        'book_file' => 'nullable|mimes:pdf|max:102400', 
    ]);
    $data = new Book;
   $data->title = $request->book_name;
   $data->auther_name  = $request->auther_name;
   $data->pages = $request->pages;
   $data->description = $request->description;
   $data->category_id = $request->category;
   $book_image = $request->book_img;
   if($book_image){
    $book_image_name=time().'.'.$book_image->getClientOriginalExtension();
    $request->book_img->move('book',$book_image_name);
    $data->book_img = $book_image_name;
   }
   $book_files = $request->book_file;
   if($book_files){
    $book_file_name=time().'.'.$book_files->getClientOriginalExtension();
    $request->book_file->move('book',$book_file_name);
    $data->book_file = $book_file_name;
   }
   $data->save();
   return redirect()->back()->with('message1','Book added successfuly');

}
public function list_book(){
    $book = Book::all();
    return view('admin.list_book',compact('book'));
}
public function book_delete($id){
    $data = Book::find($id);
    $data->delete();
    return redirect()->back()->with('message2','Book deleted successfuly');
 }
 public function edit_book($id){
 
    $data = Book::find($id);
    $categories = Category::all();
    return view('admin.edit_book' ,compact('data','categories'));
 }
 public function update_book(Request $request, $id) {
    $data = Book::find($id);
    $data->title = $request->book_name;
    $data->auther_name = $request->auther_name;
    $data->pages = $request->pages;
    $data->description = $request->description;
    $data->category_id = $request->category;
    $book_image = $request->book_img;
    if($book_image) {
        $book_image_name = time() . '.' . $book_image->getClientOriginalExtension();
        $request->book_img->move('book', $book_image_name);
        $data->book_img = $book_image_name;
    }
    $data->save();
    return redirect('/list_book')->with('message1', 'Book updated successfully');
}

}
