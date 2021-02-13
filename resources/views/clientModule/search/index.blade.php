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
              <li aria-current="page" class="breadcrumb-item active">Search</li>
            </ol>
          </nav>
        </div>

        <div class="col-lg-2" style="padding-left: 30px">
          <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->

          <!-- Category -->
          @include('clientModule.navbar.navbar')

          <!-- *** MENUS AND FILTERS END ***-->
          <!-- <div class="banner"><a href="#"><img src="img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div> -->
        </div>


        <div class="col-lg-10">

          <div class="box" style="padding-left: 30px">
            <h1>Search results for: '{{$data['text']}}'</h1>
          </div>

          <div class="box" style="padding: 30px">
            @include('clientModule.product-collection.product-topbar')

            <div class="row products">

              @foreach ($data['products']->sortByDesc('create_at') as $product)

              @include('clientModule.product-collection.product-view')

              @endforeach
              <!-- /.products-->
            </div>
          </div>

        </div>
        <!-- /.col-lg-9-->

      </div>
    </div>
  </div>
</div>

@include('clientModule.footer')

</html>