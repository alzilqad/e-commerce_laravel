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
              <li aria-current="page" class="breadcrumb-item active">{{$page}}</li>
            </ol>
          </nav>
        </div>

        <div class="col-lg-3" style="padding-left: 30px">
          <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->

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

          <!-- *** MENUS AND FILTERS END ***-->
          <!-- <div class="banner"><a href="#"><img src="img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div> -->
        </div>


        <div class="col-lg-9">

          <div class="box" style="padding-left: 30px">
            <h1>{{$page}}</h1>
          </div>

          <div class="box" style="padding: 30px">
            @include('clientModule.product-collection.product-topbar')

            <div class="row products">

              @foreach ($products->sortByDesc('create_at') as $product)
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