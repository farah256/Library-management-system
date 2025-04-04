<!DOCTYPE html>
<html>
  <head> 
@include('admin.css')   
<style type="text/css">
.table_center{
margin:auto ;
width: 80% ;
text-align: center;
margin-top: 50px;
border: 1px solid white;
}
th{
    background-color: skyblue;
    padding: 10px;
    font-size: 20px;
    font-weight: bold;
    color: black;

}

.img-book{
    width: 100px;
    height: auto;
}
</style>

</head>
  <body>
  @include('admin.header')   

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')   

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid"> 
          <div>
                    @if(session()->has('message1'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" 
                    aria-hidden="true">x</button>

                        {{session()->get('message1')}} 
                        </div>

                    @endif
                </div>
                <div>
                    @if(session()->has('message2'))
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" 
                    aria-hidden="true">x</button>

                        {{session()->get('message2')}} 
                        </div>

                    @endif
                </div>
            <div>
                <table class="table_center">
                    <tr>
                        <th>Book Title</th>
                        <th>Auther Name</th>
                        <th>Pages</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Book Image</th>
                        <th>Delete</th>
                        <th>Update</th>

                    </tr>
                    @foreach($book as $book)

                    <tr>
                        <td>{{$book->title}}</td>
                        <td>{{$book->auther_name}}</td>
                        <td>{{$book->pages}}</td>
                        <td>{{$book->description}}</td>
                        <td>{{$book->category->cat_title}}</td>
                        <td>
                            <img class="img-book" src="book/{{$book->book_img}}">
                        </td>
                        <td>
                            <a href="{{url('book_delete',$book->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                        <td>
                            <a href="{{url('edit_book',$book->id)}}" class="btn btn-info">Update</a>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>
          </div>
        </div>
      </div>
 @include('admin.footer')   

  </body>
</html>