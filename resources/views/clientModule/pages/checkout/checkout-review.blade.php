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
            <li aria-current="page" class="breadcrumb-item active">Checkout - Order Review</li>
          </ol>
        </nav>
      </div>

      <!-- Category -->
      @include('clientModule.components.sidebar.category-bar')

      <div id="checkout" class="col-lg-7">
        <div class="box">
          <form method="get" action="checkout4.html">
            <h1>Checkout - Order review</h1>
            <div class="nav flex-column flex-sm-row nav-pills">
              <a href="{{route('checkout.delivery')}}" class="nav-link flex-sm-fill text-sm-center">
                <i class="fa fa-truck"> </i>Delivery Method
              </a>
              <a href="{{route('checkout.address')}}" class="nav-link flex-sm-fill text-sm-center">
                <i class="fa fa-map-marker"></i>Address
              </a>
              <a href="{{route('checkout.payment')}}" class="nav-link flex-sm-fill text-sm-center">
                <i class="fa fa-money"> </i>Payment Method
              </a>
              <a href="{{route('checkout.review')}}" class="nav-link flex-sm-fill text-sm-center active">
                <i class="fa fa-eye"> </i>Order Review
              </a>
            </div>
            <div class="content">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2">Product</th>
                      <th>Quantity</th>
                      <th>Unit price</th>
                      <th>Discount</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="#"><img src="img/detailsquare.jpg" alt="White Blouse Armani"></a></td>
                      <td><a href="#">White Blouse Armani</a></td>
                      <td>2</td>
                      <td>$123.00</td>
                      <td>$0.00</td>
                      <td>$246.00</td>
                    </tr>
                    <tr>
                      <td><a href="#"><img src="img/basketsquare.jpg" alt="Black Blouse Armani"></a></td>
                      <td><a href="#">Black Blouse Armani</a></td>
                      <td>1</td>
                      <td>$200.00</td>
                      <td>$0.00</td>
                      <td>$200.00</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="5">Total</th>
                      <th>$446.00</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.table-responsive-->
            </div>
            <!-- /.content-->
            <div class="box-footer d-flex justify-content-between"><a href="{{route('checkout.payment')}}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Payment Method</a>
              <button type="submit" class="btn btn-primary">Place an order<i class="fa fa-chevron-right"></i></button>
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