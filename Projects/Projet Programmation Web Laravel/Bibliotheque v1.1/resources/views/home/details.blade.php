<!DOCTYPE html>
<html lang="en">
<head>
<base href="/public">

    @include('home.css')
    
</head>
<body>
    @include('home.header')

    <div class="item-details-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>View Details For<em> {{$data->title}}</em> Here.</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="center-image">
                        <img src="{{ asset('book/' . $data->book_img) }}" alt="" style="border-radius: 20px; width: 300px;">
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <h1>{{$data->title}}</h1>
                    <br>
                    <span class="author">
                        <h4>{{$data->auther_name}}</h4>
                    </span>
                    <h4>{{$data->description}}</h4>
                    <br>
                    <div class="row">
                        <div class="col-3">
                        <span class="bid">
                            <h4>Category <strong>{{$data->category->cat_title}}</strong></h4>
                            </span>
                            <span class="bid">
                                <h4>Pages <strong> {{$data->pages}}</strong></h4><br>
                            </span>
                            
                        </div>
                        <br>
                        <div class="text-button">
                            
                            <a class="btn btn-primary" href="{{ url('upload_books/' . $data->book_file) }}">Download</a>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    @include('home.footer')
</body>
</html>
