<!DOCTYPE html>
<html>
  <head> 
@include('admin.css')   
<style type="text/css">
.div_center{
    text-align: center;
    margin: auto;
}
.title{
     color: white;
     padding: 30px;
     font-size: 30px;
     font-weight: bold;
}
label{
    display: inline-block;
    width: 200px;
}
.div_pad{
    padding:15px ;
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
            <div class="div_center">
                <h2 class="title">Update Book</h2>
                <form action="{{url('update_book',$data->id)}}" method="post" enctype="multipart/form_data">
                    @csrf
              <div class="div_pad">
                    <label>Book Name</label>
                    <input type="text" name="book_name" value="{{$data->title}}">
              </div>
                    <div class="div_pad">
                    <label>Auther Name</label>
                    <input type="text" name="auther_name" value="{{$data->auther_name}}">
               </div>
                    <div class="div_pad">
                    <label>Book Pages</label>
                    <input type="number" name="pages" value="{{$data->pages}}">
               </div>
                    <div class="div_pad">
                    <label>Description</label>
                    <textarea name="description">{{$data->description}}</textarea>
              </div>
                    <div class="div_pad">
                        <label>Category</label>
                        <select name="category">
                            <option value="{{$data->category_id}}">{{$data->category->cat_title}}</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->cat_title}}</option>
                            @endforeach
                        </select>
                        <div class="div_pad">
                            <label>Book Image</label>
                            <img style="width:80px; margin:auto;" src="/book/{{$data->book_img}}">
                        </div>
                        <div class="div_pad">
                            <label>Change Book Image</label>
                            <input type="file" name="book_img" id="">
                        </div>

                    </div>
                    <div class="div_pad">
                    <input type="submit" class="btn btn-info" value="Update">
                    </div>
                </form>
            </div>         
            </div> 
        </div>
        </div>
      @include('admin.footer')   

  </body>
</html>