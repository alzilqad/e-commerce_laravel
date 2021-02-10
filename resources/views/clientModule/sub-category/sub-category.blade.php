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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li aria-current="page" class="breadcrumb-item active">{{$activeCategory->name_en}}</li>
              @if($parentSubCategory!=null)
              <li aria-current="page" class="breadcrumb-item active">{{$parentSubCategory->name_en}}</li>
              @endif
              <li aria-current="page" class="breadcrumb-item active">{{$activeSubCategory->name_en}}</li>
            </ol>
          </nav>
        </div>

        <!-- *** MENUS AND FILTERS *** -->
        <div class="col-lg-3" style="padding-left: 30px">

          <!-- Category -->
          @include('clientModule.navbar.navbar')

          <!-- Brand -->
          <div class="card sidebar-menu mb-4">
            <div class="card-header">
              <h3 class="h4 card-title">Brands <a href="#" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
            </div>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Armani (10)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Versace (12)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Carlo Bruni (15)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Jack Honey (14)
                    </label>
                  </div>
                </div>
                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>
              </form>
            </div>
          </div>

          <!-- <div class="banner"><a href="#"><img src="img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div> -->
        </div>
        <!-- *** MENUS AND FILTERS END ***-->


        <div class="col-lg-9">

          <!-- category details -->
          <div class="box" style="padding: 30px">
            <h1>{{$activeSubCategory->name_en}}</h1>
            <p>{{$activeSubCategory->description}}</p>

            <div class="item"><img src="{{asset($activeSubCategory->cover_image)}}" alt="" class="center" style="height: 400px"></div>

          </div>

          <!-- subcategory product view -->
          @foreach ($subCategories as $subCategory)
          @if($subCategory->sub_category_id==$activeSubCategory->id)
          <div id="hot">
            <div class="box py-0">
              <div class="container">
                <div class="row">
                  @if($parentSubCategory==null)
                  <div class="col-md-11">
                    <a href="{{route('category.sub2', ['category' => $activeCategory->name_en, 'subCategory' => $activeSubCategory->name_en, 'subCategory2' => $subCategory->name_en])}}">
                      <h2 class="mb-0">{{$subCategory->name_en}}</h2>
                    </a>
                  </div>
                  <div class="col-md-1">
                    <a href="{{route('category.sub2', ['category' => $activeCategory->name_en, 'subCategory' => $activeSubCategory->name_en, 'subCategory2' => $subCategory->name_en])}}">
                      <span class="badge see-more">
                        <h7>More
                          <img src="{{asset('img/icons/right-arrow.png')}}" alt="" style="width:10px; height:10px;">
                        </h7>
                      </span>
                    </a>
                  </div>
                  @else
                  <div class="col-md-11">
                    <a href="{{route('category.sub3', ['category' => $activeCategory->name_en, 'subCategory' => $parentSubCategory->name_en, 'subCategory2' => $activeSubCategory->name_en, 'subCategory3' => $subCategory->name_en])}}">
                      <h2 class="mb-0">{{$subCategory->name_en}}</h2>
                    </a>
                  </div>
                  <div class="col-md-1">
                  <a href="{{route('category.sub3', ['category' => $activeCategory->name_en, 'subCategory' => $parentSubCategory->name_en, 'subCategory2' => $activeSubCategory->name_en, 'subCategory3' => $subCategory->name_en])}}">
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

              @foreach ($products as $product)
              @if($product->category_sub_product_id==$activeSubCategory->id)

              <div class="item">
                <div class="product">
                  @if($product->image_link==null)
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;"></a></div>
                      <div class="back"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;"></a></div>
                    </div>
                  </div><a href="{{route('product.index', $product->name_en)}}" class="invisible"><img src="{{asset('img/error.jpg')}}" alt="" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;"></a>
                  @else
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset($product->image_link)}}" alt="" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;"></a></div>
                      <div class="back"><a href="{{route('product.index', $product->name_en)}}"><img src="{{asset($product->image_link)}}" alt="" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;"></a></div>
                    </div>
                  </div><a href="{{route('product.index', $product->name_en)}}" class="invisible"><img src="{{asset($product->image_link)}}" alt="" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;"></a>
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
            @include('clientModule.product-collection.product-topbar')
            <!-- product view -->
            <div class="row products">

              @foreach ($products->sortByDesc('create_at') as $product)
              @if($product->category_product_id==$activeCategory->id && $product->category_sub_product_id==$activeSubCategory->id)

              @include('clientModule.product-collection.product-view')

              @endif
              @endforeach
            </div>
            <!-- end product view-->
          </div>

        </div>
        <!-- /.col-lg-9-->

      </div>
    </div>
  </div>
</div>

@include('clientModule.footer')

</html>