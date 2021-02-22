<!DOCTYPE html>
<html>
@include('clientModule.components.header')

<div id="all">
  <div id="content">
    <div class="box py-4">

      <div class="row">

        <div class="col-lg-12">
          <!-- breadcrumb-->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{route('home.index')}}">Home</a>
              </li>
              <li aria-current="page" class="breadcrumb-item active">
                <a href="{{route('category.singular', $data['activeCategory']->name_en)}}">{{$data['activeCategory']->name_en}}</a>
              </li>
              @if($data['parentSubCategory']!=null)
              <li aria-current="page" class="breadcrumb-item active">
                <a href="{{route('category.sub', [$data['activeCategory']->name_en, $data['parentSubCategory']->name_en])}}">{{$data['parentSubCategory']->name_en}}</a>
              </li>
              @endif
              @if($data['parentSubCategory2']!=null)
              <li aria-current="page" class="breadcrumb-item active">
                <a href="{{route('category.sub2', [$data['activeCategory']->name_en, $data['parentSubCategory']->name_en, $data['parentSubCategory2']->name_en])}}">{{$data['parentSubCategory2']->name_en}}</a>
              </li>
              @endif
              <li aria-current="page" class="breadcrumb-item active">
                {{$data['activeSubCategory']->name_en}}
              </li>
            </ol>
          </nav>
        </div>

        <!-- *** MENUS AND FILTERS *** -->
        <!-- Category -->
        @include('clientModule.components.sidebar.category-bar')
        <!-- *** MENUS AND FILTERS END ***-->


        <div class="col-lg-10">

          <!-- category details -->
          <div class="box" style="padding: 30px">
            <h1>{{$data['activeSubCategory']->name_en}}</h1>
            <p>{{$data['activeSubCategory']->description}}</p>

            <div class="item"><img src="{{asset($data['activeSubCategory']->cover_image)}}" alt="" class="center" style="height: 400px"></div>

          </div>

          <!-- subcategory product view -->
          @foreach ($data['subCategories'] as $subCategory)
          @if($subCategory->sub_category_id==$data['activeSubCategory']->id)
          <div id="hot">
            <div class="box py-0">
              <div class="container">
                <div class="row">
                  @if($data['parentSubCategory']==null)
                  <div class="col-md-11">
                    <a href="{{route('category.sub2', ['category' => $data['activeCategory']->name_en, 'subCategory' => $data['activeSubCategory']->name_en, 'subCategory2' => $subCategory->name_en])}}">
                      <h2 class="mb-0">{{$subCategory->name_en}}</h2>
                    </a>
                  </div>
                  <div class="col-md-1" style="padding-left: 50px">
                    <a href="{{route('category.sub2', ['category' => $data['activeCategory']->name_en, 'subCategory' => $data['activeSubCategory']->name_en, 'subCategory2' => $subCategory->name_en])}}">
                      <span class="badge see-more">
                        <h7>More
                          <img src="{{asset('img/icons/right-arrow.png')}}" alt="" style="width:10px; height:10px;">
                        </h7>
                      </span>
                    </a>
                  </div>
                  @else
                  <div class="col-md-11">
                    <a href="{{route('category.sub3', ['category' => $data['activeCategory']->name_en, 'subCategory' => $data['parentSubCategory']->name_en, 'subCategory2' => $data['activeSubCategory']->name_en, 'subCategory3' => $subCategory->name_en])}}">
                      <h2 class="mb-0">{{$subCategory->name_en}}</h2>
                    </a>
                  </div>
                  <div class="col-md-1" style="padding-left: 50px">
                    <a href="{{route('category.sub3', ['category' => $data['activeCategory']->name_en, 'subCategory' => $data['parentSubCategory']->name_en, 'subCategory2' => $data['activeSubCategory']->name_en, 'subCategory3' => $subCategory->name_en])}}">
                      <span class="badge see-more">
                        <h7>More
                          <img src="{{asset('img/icons/right-arrow.png')}}" alt="" style="width:10px; height:10px;">
                        </h7>
                      </span>
                    </a>
                  </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="product-slider owl-carousel owl-theme">

              @foreach ($data['products'] as $product)
              @if($product->category_sub_product_id==$data['activeSubCategory']->id)

              <div class="item">
                <div class="product">
                  @if($product->image==null)
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;"></a></div>
                      <div class="back"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;"></a></div>
                    </div>
                  </div><a href="{{route('product.index', $product->name_en)}}" class="invisible"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;"></a>
                  @else
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset($product->image->image_link)}}" alt="" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;"></a></div>
                      <div class="back"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset($product->image->image_link)}}" alt="" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;"></a></div>
                    </div>
                  </div><a href="{{route('product.index', $product->name_en)}}" class="invisible"><img src="{{asset($product->image->image_link)}}" alt="" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;"></a>
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

            <!-- /#hot-->
            <!-- *** HOT END ***-->
          </div>
          @endif
          @endforeach

          <div class="box" style="padding: 30px">
            <!-- product details -->
            @include('clientModule.components.product-collection.product-topbar')
            <!-- product view -->

            <div id="ProductView">
              @include('clientModule.components.product-collection.condition')
            </div>

            <!-- end product view-->
          </div>

        </div>
        <!-- /.col-lg-9-->

      </div>
    </div>
  </div>
</div>

@include('clientModule.components.footer')

</html>