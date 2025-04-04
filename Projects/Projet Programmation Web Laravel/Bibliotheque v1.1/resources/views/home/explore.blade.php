<!DOCTYPE html>
<html lang="en">

  <head>
<base href="/public">
   @include('home.css')
  </head>

<body>

    @include('home.header')

    <div class="currently-market">
    <div class="container">
      <div class="row">
        
        <div class="col-lg-8" style="margin-top:100px;">
          <div class="filters">
            <ul>
              <li data-filter="*"  class="active">All Books</li>
              @foreach($category as $category)
              <li>
              <a href="{{url('cat_search',$category->id)}}" style="color:white;">{{$category->cat_title}}</a>  
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        <form action="{{url('search')}}" method="get">
          @csrf

        <div class="row" style="margin:30px;">
            <div class="col-md-8">
              <input class="form-control" type="search" name="search" placeholder="Search for book title , auther name , category" >
            </div>
            <div class="col-md-4" >
              <input class="btn btn-primary" type="submit" value="Search">
            </div>

        </div>
        </form>

        <div class="col-lg-12">
          <div class="row grid">
            @foreach($data as $data)
            <div class="col-lg-6 currently-market-item all msc">
              <div class="item">
                <div class="left-image">
                  <img src="book/{{$data->book_img}}" alt="" style="border-radius: 20px; min-width: 195px;">
                </div>
                <div class="right-content">
                  <h3>{{$data->title}}</h3>
                  <span class="author">
                    <h6>{{$data->auther_name}}</h6>
                  </span>
                  <div class="line-dec"></div>
                  <span class="bid">
                    <strong>{{$data->pages}} pages</strong><br> 
                </span>
<br>    
                <span class="bid">
                    <strong>{{$data->category->cat_title}}</strong><br> 
                </span>
                  <div class="text-button">
                    <a href="{{url('book_details',$data->id)}}">View Book Details</a>
                  </div>
                  <br>
                  <div class="">
                    <a class="btn btn-primary" href="{{url('upload_books',$data->book_file)}}">Download</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

             </div>
        </div>
      </div>
    </div>
  </div>


    @include('home.footer')
  </body>
</html>