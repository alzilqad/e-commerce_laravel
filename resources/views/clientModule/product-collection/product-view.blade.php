<div class="col-lg-3 col-md-6">
    <div class="product">

        @if($product->image==null)
        <div class="flip-container">
            <div class="flipper">
                <div class="front"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; width: 300px; object-fit: cover;"></a></div>
                <div class="back"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; width: 300px; object-fit: cover;"></a></div>
            </div>
        </div><a href="{{route('product.index', $product->name_en)}}" class="invisible"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; width: 300px; object-fit: cover;"></a>
        @else
        <div class="flip-container">
            <div class="flipper">
                <div class="front"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset($product->image->image_link)}}" alt="" class="img-fluid" style="height: 200px; width: 300px; object-fit: cover;"></a></div>
                <div class="back"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset($product->image->image_link)}}" alt="" class="img-fluid" style="height: 200px; width: 300px; object-fit: cover;"></a></div>
            </div>
        </div><a href="{{route('product.index', $product->name_en)}}" class="invisible"><img src="{{asset($product->image->image_link)}}" alt="" class="img-fluid" style="height: 200px; width: 300px; object-fit: cover;"></a>
        @endif

        <div class="text">
            <h3><a href="{{route('product.index', $product->name_en)}}">{{$product->name_en}}</a></h3>
            <p class="price">
                @if($product->discount>0)
                <del>${{$product->original_price}}</del>
                @endif
                ${{$product->buying_price}}
            </p>
            <p class="buttons"><a href="{{route('product.index', $product->name_en)}}" class="btn btn-outline-secondary">View detail</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a></p>
        </div>
        <!-- /.text-->

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
    <!-- /.product            -->
</div>