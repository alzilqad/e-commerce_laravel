<!DOCTYPE html>
<html>
@include('clientModule.header')

<div id="all">
  <div id="content">
    <div class="box py-4">

      <div class="row">
        <div class="col-lg-12">
          <!-- breadcrumb-->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
              <li aria-current="page" class="breadcrumb-item active">{{$data['activeProduct']->name_en}}</li>
            </ol>
          </nav>
        </div>

        <div class="col-lg-2" style="padding-left: 30px">

          <!-- Category -->
          @include('clientModule.navbar.navbar')

          <!-- *** MENUS AND FILTERS END ***-->

        </div>
        <div class="col-lg-10 order-1 order-lg-2">
          <div id="productMain" class="row">
            <div class="col-md-6">
              <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                @foreach($data['activeProduct']->images as $productImage)
                <div class="item"> <img src="{{asset($productImage->image_link)}}" alt="" class="img-fluid"></div>
                @endforeach
              </div>
              @if($data['activeProduct']->discount>0)
              <!-- /.text-->
              <div class="ribbon sale">
                <div class="theribbon">Sale</div>
                <div class="ribbon-background"></div>
              </div>
              <div class="ribbon new">
                <div class="theribbon">{{$data['activeProduct']->discount}}%</div>
                <div class="ribbon-background"></div>
              </div>
              @endif
            </div>
            <div class="col-md-6">
              <div class="box" style="padding: 30px">
                <h1 class="text-center">{{$data['activeProduct']->name_en}}</h1>
                <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material &amp; care and sizing</a></p>
                <p class="price">
                  @if($data['activeProduct']->discount>0)
                  <del>${{$data['activeProduct']->original_price}}</del>
                  @endif
                  ${{$data['activeProduct']->buying_price}}
                </p>
                <p class="text-center buttons"><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a><a href="basket.html" class="btn btn-outline-primary"><i class="fa fa-heart"></i> Add to wishlist</a></p>
              </div>
              <div data-slider-id="1" class="owl-thumbs">
                @foreach($data['activeProduct']->images as $productImage)
                <button class="owl-thumb-item"><img src="{{asset($productImage->image_link)}}" alt="" class="img-fluid"></button>
                @endforeach
              </div>
            </div>
          </div>
          <div id="details" class="box" style="padding: 30px">
            <h4><b>Product details</b></h4><br />
            <p>
              {!! nl2br($data['activeProduct']->description) !!}
            </p>

            <!-- <blockquote>
              <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em></p>
            </blockquote> -->
            <hr>
            <div class="social">
              <h4>Show it to your friends</h4>
              <p><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" class="email"><i class="fa fa-envelope"></i></a></p>
            </div>
          </div>

          <!-- 
          <div class="row same-height-row">
            <div class="col-md-3 col-sm-6">
              <div class="box same-height" style="padding: 30px">
                <h3>You may also like these products</h3>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="product same-height">
                <div class="flip-container">
                  <div class="flipper">
                    <div class="front"><a href="detail.html"><img src="img/product2.jpg" alt="" class="img-fluid"></a></div>
                    <div class="back"><a href="detail.html"><img src="img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                  </div>
                </div><a href="detail.html" class="invisible"><img src="img/product2.jpg" alt="" class="img-fluid"></a>
                <div class="text">
                  <h3>Fur coat</h3>
                  <p class="price">$143</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="product same-height">
                <div class="flip-container">
                  <div class="flipper">
                    <div class="front"><a href="detail.html"><img src="img/product1.jpg" alt="" class="img-fluid"></a></div>
                    <div class="back"><a href="detail.html"><img src="img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                  </div>
                </div><a href="detail.html" class="invisible"><img src="img/product1.jpg" alt="" class="img-fluid"></a>
                <div class="text">
                  <h3>Fur coat</h3>
                  <p class="price">$143</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="product same-height">
                <div class="flip-container">
                  <div class="flipper">
                    <div class="front"><a href="detail.html"><img src="img/product3.jpg" alt="" class="img-fluid"></a></div>
                    <div class="back"><a href="detail.html"><img src="img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                  </div>
                </div><a href="detail.html" class="invisible"><img src="img/product3.jpg" alt="" class="img-fluid"></a>
                <div class="text">
                  <h3>Fur coat</h3>
                  <p class="price">$143</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row same-height-row">
            <div class="col-md-3 col-sm-6">
              <div class="box same-height" style="padding: 30px">
                <h3>Products viewed recently</h3>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="product same-height">
                <div class="flip-container">
                  <div class="flipper">
                    <div class="front"><a href="detail.html"><img src="img/product2.jpg" alt="" class="img-fluid"></a></div>
                    <div class="back"><a href="detail.html"><img src="img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                  </div>
                </div><a href="detail.html" class="invisible"><img src="img/product2.jpg" alt="" class="img-fluid"></a>
                <div class="text">
                  <h3>Fur coat</h3>
                  <p class="price">$143</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="product same-height">
                <div class="flip-container">
                  <div class="flipper">
                    <div class="front"><a href="detail.html"><img src="img/product1.jpg" alt="" class="img-fluid"></a></div>
                    <div class="back"><a href="detail.html"><img src="img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                  </div>
                </div><a href="detail.html" class="invisible"><img src="img/product1.jpg" alt="" class="img-fluid"></a>
                <div class="text">
                  <h3>Fur coat</h3>
                  <p class="price">$143</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="product same-height">
                <div class="flip-container">
                  <div class="flipper">
                    <div class="front"><a href="detail.html"><img src="img/product3.jpg" alt="" class="img-fluid"></a></div>
                    <div class="back"><a href="detail.html"><img src="img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                  </div>
                </div><a href="detail.html" class="invisible"><img src="img/product3.jpg" alt="" class="img-fluid"></a>
                <div class="text">
                  <h3>Fur coat</h3>
                  <p class="price">$143</p>
                </div>
              </div>
            </div>
          </div>
           -->

        </div>
        <!-- /.col-md-9-->
      </div>
    </div>
  </div>
</div>

@include('clientModule.footer')

</html>