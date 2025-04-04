<!DOCTYPE html>
<html>
  <head> 
@include('admin.css')   
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style type="text/css">
    .div_center{
        text-align:center ;
        margin: auto;

}
.cat_label{
    font-size: 30px;
    font-weight: bold;
    padding: 30px;
    color: white;
}
.center{
margin:auto ;
width: 50% ;
text-align: center;
margin-top: 50px;
border: 1px solid white;
}
th{
    background-color: skyblue;
    padding: 10px;

}
tr{
    border: 1px solid white;
    padding: 10px;

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
            <h1 class="cat_label">Add Category</h1>
            <form action="{{url('add_category')}}" method="Post">
                @csrf
                <span style="padding-right:15px;">
                <label>Category Name</label>
                <input type="text" name="category" required>
                <input class="btn btn-primary" type="submit" value="Add Category">
                </span>

            </form>
            <div>
                <table class="center">
                    <tr>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($data as $data)
                    <tr>
                        <td>{{$data->cat_title}}</td>
                        <td>
                            <a class="btn btn-info" href="{{url('cat_edit',$data->id)}}">Update</a>
                            <a class="btn btn-danger" href="{{url('cat_delete',$data->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            </div>
          </div>
        </div>
      </div>
      @include('admin.footer')


  </body>
</html>