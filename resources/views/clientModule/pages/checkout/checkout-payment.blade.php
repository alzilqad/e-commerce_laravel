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
            <li aria-current="page" class="breadcrumb-item active">Checkout - Payment Method</li>
          </ol>
        </nav>
      </div>

      <!-- Category -->
      @include('clientModule.components.sidebar.category-bar')

      <div id="checkout" class="col-lg-7">
      <div class="box" style="padding: 20px">
          <form method="get" action="{{route('checkout.review')}}">
            <h1>Checkout - Payment method</h1>
            <div class="nav flex-column flex-sm-row nav-pills">
              <a href="{{route('checkout.delivery')}}" class="nav-link flex-sm-fill text-sm-center">
                <i class="fa fa-truck"> </i>Delivery Method
              </a>
              <a href="{{route('checkout.address')}}" class="nav-link flex-sm-fill text-sm-center">
                <i class="fa fa-map-marker"></i>Address
              </a>
              <a href="{{route('checkout.payment')}}" class="nav-link flex-sm-fill text-sm-center active">
                <i class="fa fa-money"> </i>Payment Method
              </a>
              <a href="" class="nav-link flex-sm-fill text-sm-center disabled">
                <i class="fa fa-eye"> </i>Order Review
              </a>
            </div>
            <div class="content py-3">
              <div class="row">
                <div class="col-md-6">
                  <div class="box payment-method" style="text-align: center; padding-top: 20px">
                    <h4 style="font-size: 25px">Cash on Delivery</h4>
                    <p style="height: 50px">You pay when you get it</p>
                    <div class="box-footer text-center">
                      <input type="radio" name="payment" value="cash" checked>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box payment-method" style="text-align: center; padding-top: 20px">
                    <h4 style="font-size: 25px">Payment Gateway</h4>
                    <p style="height: 50px">bKash/Nagad/Rocket <br> VISA/Master/Debit/Credit Card</p>
                    <div class="box-footer text-center">
                    <input type="radio" disabled>
                      <!-- <input type="radio" name="payment" value="payment2"> -->
                    </div>
                  </div>
                </div>
                
              </div>
              <!-- /.row-->
            </div>
            <!-- /.content-->
            <div class="box-footer d-flex justify-content-between"><a href="{{route('checkout.address')}}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Shipping Address</a>
              <button type="submit" class="btn btn-primary">Continue to Order Review<i class="fa fa-chevron-right"></i></button>
            </div>
          </form>
          <!-- /.box-->
        </div>
      </div>
      
      <!-- Summary -->
      @include('clientModule.components.sidebar.summary-bar')

    </div>
  </div>
</div>

@include('clientModule.components.footer')

</html>