<div class="categories-collections">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="categories">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <div class="line-dec"></div>
                  <h2>Browse Through Book <em>Categories</em> Here.</h2>
                </div>
              </div>
              @foreach($category as $category)
              <div class="col-lg-2 col-sm-6">
                <div class="item">
                  <div class="icon">
                    <img src="assets/images/icon-06.png" alt="">
                  </div>
                  <h4> <a href="{{url('cat_search',$category->id)}}" style="color:white;">{{$category->cat_title}}</a> </h4>
                  
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>