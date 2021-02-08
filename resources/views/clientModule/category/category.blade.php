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
            </ol>
          </nav>
        </div>

        <!-- *** MENUS AND FILTERS *** -->
        <div class="col-lg-3">

          <!-- Category -->
          @include('clientModule.navbar')

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
          <div class="box">
            <h1>{{$activeCategory->name_en}}</h1>
            <p>{{$activeCategory->description}}</p>

            <div class="item"><img src="{{asset($activeCategory->cover_image)}}" alt="" class="center" style="height: 400px"></div>

          </div>

          <!-- subcategory product view -->
          @foreach ($subCategories as $subCategory)
          @if($subCategory->category_id==$activeCategory->id)
          <div id="hot">
            <div class="box py-0">
              <div class="container">
                <div class="row">
                  <div class="col-md-11">
                    <a href="{{route('category.singular', $subCategory->name_en)}}">
                      <h2 class="mb-0">{{$subCategory->name_en}}</h2>
                    </a>
                  </div>
                  <div class="col-md-1">
                    <a href="{{route('category.singular', $subCategory->name_en)}}">
                      <span class="badge see-more">
                        <h7>More
                          <img src="{{asset('img/icons/right-arrow.png')}}" alt="" style="width:10px; height:10px;">
                        </h7>
                      </span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-slider owl-carousel owl-theme">

              @foreach ($products as $product)
              @if($product->category_sub_product_id==$subCategory->id)

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
            @if($product->category_product_id==$activeCategory->id)

            @include('clientModule.category.productView')

            @endif
            @endforeach
          </div>
          <!-- end product view-->

          <!-- pages pagination -->
          <!-- <div class="pages">
            <p class="loadMore"><a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a></p>
            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
              <ul class="pagination">
                <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
              </ul>
            </nav>
          </div> -->
          <!-- end pages pagination -->

        </div>
        <!-- /.col-lg-9-->

      </div>
    </div>
  </div>
</div>

@include('clientModule.footer')

</html>