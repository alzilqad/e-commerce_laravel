<!DOCTYPE html>
<html>
@include('clientModule.components.header')

<div id="all">
  <div id="content">
    <div class="row">

      <!-- breadcrumb-->
      <div class="col-lg-12">
        <nav aria-label="breadcrumb" style="padding-top: 20px">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
            <li aria-current="page" class="breadcrumb-item active">Checkout - Delivery Method</li>
          </ol>
        </nav>
      </div>

      <!-- Category -->
      @include('clientModule.components.sidebar.category-bar')

      <div id="checkout" class="col-lg-7">
        <div class="box" style="padding: 20px">
          <form method="get" action="{{route('checkout.address')}}">
            <h1>Checkout - Delivery method</h1>
            <div class="nav flex-column flex-sm-row nav-pills">
              <a href="checkout2.html" class="nav-link flex-sm-fill text-sm-center active">
                <i class="fa fa-truck"> </i>Delivery Method
              </a>
              <a href="checkout1.html" class="nav-link flex-sm-fill text-sm-center disabled">
                <i class="fa fa-map-marker"></i>Address
              </a>
              <a href="" class="nav-link flex-sm-fill text-sm-center disabled">
                <i class="fa fa-money"> </i>Payment Method
              </a>
              <a href="" class="nav-link flex-sm-fill text-sm-center disabled">
                <i class="fa fa-eye"> </i>Order Review
              </a>
            </div>
            <div class="content py-3">
              <div class="row">
                <div class="col-md-6">
                  <div class="box shipping-method" style="text-align: center; padding-top: 20px">
                    <h4 style="font-size: 25px">Courier Delivery</h4>
                    <p>Get it on the nearest Courier service.</p>
                    <div class="box-footer text-center">
                      <input type="radio" name="delivery" value="courier">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box shipping-method" style="text-align: center; padding-top: 20px">
                    <h4 style="font-size: 25px">Home Delivery</h4>
                    <p>Get it on next day - fastest option possible.</p>
                    <div class="box-footer text-center">
                      <input type="radio" name="delivery" value="home">
                    </div>
                  </div>
                </div>
              </div>

              <!-- <div class="col-md-6">
                  <div class="box shipping-method">
                    <h4>USPS Next Day</h4>
                    <p>Get it right on next day - fastest option possible.</p>
                    <div class="box-footer text-center">
                      <input type="radio" name="delivery" value="delivery3">
                    </div>
                  </div>
                </div> -->

            </div>
            <div class="box-footer d-flex justify-content-between">
              <a href="{{route('cart.index')}}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Shopping Cart</a>
              <button type="submit" class="btn btn-primary">Continue to Shipping Address<i class="fa fa-chevron-right"></i></button>
            </div>
          </form>
        </div>
        <!-- /.box-->
      </div>

      <!-- Summary -->
      @include('clientModule.components.sidebar.summary-bar')

    </div>
  </div>
</div>

@include('clientModule.components.footer')

</html>