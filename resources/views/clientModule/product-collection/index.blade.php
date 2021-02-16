<div class="row products">


    <!-- condition to check the ascending order of products  -->
    @if (Session::get('order')=="asc")
    <!-- loop over products by sorting  -->
    @foreach ($data['products']->sortBy(Session::get('sort')) as $product)

    <!-- condition to check the discounted sorting is selected -->
    @if(Session::get('sort')=='discount')
    <!-- filtered only discounted products -->
    @if($product->discount > 0)
    @include('clientModule.product-collection.product-view')
    @endif
    <!-- end condition to check the discounted sorting is selected -->

    @else
    @include('clientModule.product-collection.product-view')
    @endif

    @endforeach
    <!-- end loop over products by sorting  -->
    <!-- end condition to check the ascending order of products  -->


    

    <!-- condition to check the descending order of products  -->
    @elseif (Session::get('order')=="desc")
    <!-- loop over products by sorting -->
    @foreach ($data['products']->sortByDesc(Session::get('sort')) as $product)

    <!-- condition to check the discounted sorting is selected -->
    @if(Session::get('sort')=='discount')
    <!-- filtered only discounted products -->
    @if($product->discount > 0)
    @include('clientModule.product-collection.product-view')
    @endif
    <!-- end condition to check the discounted sorting is selected -->

    @else
    @include('clientModule.product-collection.product-view')
    @endif

    @endforeach
    <!-- end loop over products by sorting  -->
    @endif
    <!-- end condition to check the descending order of products  -->


    <!-- /.products-->
</div>