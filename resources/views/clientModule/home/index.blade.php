<!DOCTYPE html>
<html>
@include('clientModule.header')

<div id="all">
    <div id="content">
        <div class="box py-4">

            <div class="row">

                <!-- Sliders -->
                <div class="col-md-12">
                    <div id="main-slider" class="owl-carousel owl-theme">
                        <div class="item"><img src="{{asset('img/banners/main-slider1.jpg')}}" alt="" class="img-fluid"></div>
                        <div class="item"><img src="{{asset('img/banners/main-slider2.jpg')}}" alt="" class="img-fluid"></div>
                        <div class="item"><img src="{{asset('img/banners/main-slider3.jpg')}}" alt="" class="img-fluid"></div>
                        <div class="item"><img src="{{asset('img/banners/main-slider4.jpg')}}" alt="" class="img-fluid"></div>
                    </div>
                    <!-- /#main-slider-->
                </div>

                <!-- left bar for category navigation -->
                <div class="col-lg-3">
                    @include('clientModule.navbar')
                </div>

                <!-- right bar for product navigation -->
                <div class="col-lg-9">

                    <!-- category -->
                    <div id="hot">
                        <div class="box py-0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="mb-0">Categories</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="product-slider owl-carousel owl-theme">

                                @foreach ($categories as $category)
                                <div class="item">
                                    <div class="product">
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front"><a href="{{route('category.singular', $category->name_en )}}"><img src="{{$category->image}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a></div>
                                                <div class="back"><a href="{{route('category.singular', $category->name_en )}}"><img src="{{$category->image}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a></div>
                                            </div>
                                        </div><a href="{{route('category.singular', $category->name_en )}}" class="invisible"><img src="{{$category->image}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a>

                                        <div class="text">
                                            <h3><a href="{{route('category.singular', $category->name_en )}}">{{$category->name_en}}</a></h3>
                                        </div>
                                    </div>
                                    <!-- /.product-->
                                </div>
                                @endforeach

                                <!-- /.product-slider-->
                            </div>
                            <!-- /.container-->
                        </div>
                        <!-- /#hot-->
                        <!-- *** HOT END ***-->
                    </div>

                    <!-- new arrival -->
                    <div id="hot">
                        <div class="box py-0">
                            <div class="container">
                                <div class="row">
                                    <a href="{{route('category.new')}}">
                                        <h2 class="mb-0">New Arrival</h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="product-slider owl-carousel owl-theme">

                                @foreach ($products as $product)

                                <div class="item">
                                    <div class="product">

                                        @if($product->image_link==null)
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a></div>
                                                <div class="back"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a></div>
                                            </div>
                                        </div><a href="{{route('product.index', $product->name_en)}}" class="invisible"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a>
                                        @else
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset($product->image_link)}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a></div>
                                                <div class="back"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset($product->image_link)}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a></div>
                                            </div>
                                        </div><a href="{{route('product.index', $product->name_en)}}" class="invisible"><img src="{{asset($product->image_link)}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a>
                                        @endif

                                        <div class="text">
                                            <h3><a href="{{route('product.index', $product->name_en)}}">{{$product->name_en}}</a></h3>
                                            <p class="price">
                                                @if($product->discount>0)
                                                <del>${{$product->original_price}}</del>
                                                @endif
                                                ${{$product->buying_price}}
                                            </p>
                                        </div>

                                        @if($product->discount>0)
                                        <!-- /.text-->
                                        <div class="ribbon sale">
                                            <div class="theribbon">Sale</div>
                                            <div class="ribbon-background"></div>
                                        </div>
                                        @endif

                                    </div>
                                    <!-- /.product-->
                                </div>
                                @endforeach

                                <!-- /.product-slider-->
                            </div>
                            <!-- /.container-->
                        </div>
                        <!-- /#hot-->
                        <!-- *** HOT END ***-->
                    </div>

                    <!-- best offer -->
                    <div id="hot">
                        <div class="box py-0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{route('category.offer')}}">
                                            <h2 class="mb-0">Best Offer</h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="product-slider owl-carousel owl-theme">
                                @foreach ($products->sortByDesc('discount') as $product)
                                @if($product->discount > 0)
                                <div class="item">
                                    <div class="product">

                                        @if($product->image_link==null)
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a></div>
                                                <div class="back"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a></div>
                                            </div>
                                        </div><a href="{{route('product.index', $product->name_en)}}" class="invisible"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a>
                                        @else
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset($product->image_link)}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a></div>
                                                <div class="back"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset($product->image_link)}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a></div>
                                            </div>
                                        </div><a href="{{route('product.index', $product->name_en)}}" class="invisible"><img src="{{asset($product->image_link)}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a>
                                        @endif

                                        <div class="text">
                                            <h3><a href="{{route('product.index', $product->name_en)}}">{{$product->name_en}}</a></h3>
                                            <p class="price">
                                                @if($product->discount>0)
                                                <del>${{$product->original_price}}</del>
                                                @endif
                                                ${{$product->buying_price}}
                                            </p>
                                        </div>

                                        @if($product->discount>0)
                                        <!-- /.text-->
                                        <div class="ribbon sale">
                                            <div class="theribbon">Sale</div>
                                            <div class="ribbon-background"></div>
                                        </div>
                                        <div class="ribbon new">
                                            <div class="theribbon">{{$product->discount}}%</div>
                                            <div class="ribbon-background"></div>
                                        </div>
                                        @endif

                                    </div>
                                    <!-- /.product-->
                                </div>
                                @endif
                                @endforeach

                                <!-- /.product-slider-->
                            </div>
                            <!-- /.container-->
                        </div>
                        <!-- /#hot-->
                        <!-- *** HOT END ***-->
                    </div>

                    <!-- category products -->
                    @foreach ($categories as $category)
                    <div id="hot">
                        <div class="box py-0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{route('category.singular', $category->name_en)}}">
                                            <h2 class="mb-0">{{$category->name_en}}</h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="product-slider owl-carousel owl-theme">

                                @foreach ($products as $product)
                                @if($product->category_product_id==$category->id)

                                <div class="item">
                                    <div class="product">
                                        @if($product->image_link==null)
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a></div>
                                                <div class="back"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a></div>
                                            </div>
                                        </div><a href="{{route('product.index', $product->name_en)}}" class="invisible"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a>
                                        @else
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset($product->image_link)}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a></div>
                                                <div class="back"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset($product->image_link)}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a></div>
                                            </div>
                                        </div><a href="{{route('product.index', $product->name_en)}}" class="invisible"><img src="{{asset($product->image_link)}}" alt="" class="img-fluid" style="height: 200px; object-fit: cover;"></a>
                                        @endif
                                        <div class="text">
                                            <h3><a href="{{route('product.index', $product->name_en)}}">{{$product->name_en}}</a></h3>
                                            <p class="price">
                                                @if($product->discount>0)
                                                <del>${{$product->original_price}}</del>
                                                @endif
                                                ${{$product->buying_price}}
                                            </p>
                                        </div>

                                        @if($product->discount>0)
                                        <!-- /.text-->
                                        <div class="ribbon sale">
                                            <div class="theribbon">Sale</div>
                                            <div class="ribbon-background"></div>
                                        </div>
                                        @endif

                                        <!-- /.ribbon for new arrival-->
                                        <!-- @if( \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($product->create_at)->format('Y-m-d'), true)>15)
                                        <div class="ribbon new">
                                            <div class="theribbon">NEW</div>
                                            <div class="ribbon-background"></div>
                                        </div>
                                        @endif -->

                                        <!-- /.ribbon-->
                                        <!-- <div class="ribbon gift">
                                            <div class="theribbon">GIFT</div>
                                            <div class="ribbon-background"></div>
                                        </div> -->
                                        <!-- /.ribbon-->
                                    </div>
                                    <!-- /.product-->
                                </div>
                                @endif
                                @endforeach

                                <!-- /.product-slider-->
                            </div>
                            <!-- /.container-->
                        </div>
                        <!-- /#hot-->
                        <!-- *** HOT END ***-->
                    </div>
                    @endforeach

                    <!-- all product view -->
                    <div class="box">
                        <!-- product details -->
                        <div class="box info-bar">
                            <div class="row">
                                <div class="col-md-12 col-lg-4 products-showing">Showing <strong>12</strong> of <strong>25</strong> products</div>
                                <div class="col-md-12 col-lg-7 products-number-sort">
                                    <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                                        <div class="products-sort-by mt-2 mt-lg-0"><strong>Sort by</strong>
                                            <select name="sort-by" class="form-control">
                                                <option>Price</option>
                                                <option>Name</option>
                                                <option>Sales first</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- product view -->
                        <div class="row products">

                            @foreach ($products->sortByDesc('create_at') as $product)

                            @include('clientModule.category.productView')

                            @endforeach
                        </div>
                        <!-- end product view-->
                    </div>

                </div>

            </div>

        </div>
    </div>

    @include('clientModule.footer')

</html>