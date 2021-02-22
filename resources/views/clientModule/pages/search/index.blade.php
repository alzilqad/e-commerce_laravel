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
              <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
              <li aria-current="page" class="breadcrumb-item active">Search</li>
            </ol>
          </nav>
        </div>

        <!-- *** MENUS AND FILTERS *** -->
        <!-- Category -->
        @include('clientModule.components.sidebar.category-bar')
        <!-- *** MENUS AND FILTERS END ***-->

        <div class="col-lg-10">

          <div class="box" style="padding-left: 30px">
            <h1>Search results for: '{{$data['text']}}'</h1>
          </div>

          <div class="box" style="padding: 30px">
            @include('clientModule.components.product-collection.product-topbar')

            <div id="ProductView">
              @include('clientModule.components.product-collection.condition')
            </div>

          </div>

        </div>
        <!-- /.col-lg-9-->

      </div>
    </div>
  </div>
</div>

@include('clientModule.components.footer')

</html>