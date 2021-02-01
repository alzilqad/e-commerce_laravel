<!DOCTYPE html>
<html>
@include('clientModule.header')

<div id="all">
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- breadcrumb-->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li aria-current="page" class="breadcrumb-item active">Checkout - Payment method</li>
            </ol>
          </nav>
        </div>
        <div id="checkout" class="col-lg-9">
          <div class="box">
            <form method="get" action="checkout4.html">
              <h1>Checkout - Payment method</h1>
              <div class="nav flex-column flex-sm-row nav-pills"><a href="checkout1.html" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker"> </i>Address</a><a href="checkout2.html" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-truck"> </i>Delivery Method</a><a href="checkout3.html" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-money"> </i>Payment Method</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye"> </i>Order Review</a></div>
              <div class="content py-3">
                <div class="row">
                  <div class="col-md-6">
                    <div class="box payment-method">
                      <h4>Paypal</h4>
                      <p>We like it all.</p>
                      <div class="box-footer text-center">
                        <input type="radio" name="payment" value="payment1">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box payment-method">
                      <h4>Payment gateway</h4>
                      <p>VISA and Mastercard only.</p>
                      <div class="box-footer text-center">
                        <input type="radio" name="payment" value="payment2">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box payment-method">
                      <h4>Cash on delivery</h4>
                      <p>You pay when you get it.</p>
                      <div class="box-footer text-center">
                        <input type="radio" name="payment" value="payment3">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.row-->
              </div>
              <!-- /.content-->
              <div class="box-footer d-flex justify-content-between"><a href="checkout2.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Shipping Method</a>
                <button type="submit" class="btn btn-primary">Continue to Order Review<i class="fa fa-chevron-right"></i></button>
              </div>
            </form>
            <!-- /.box-->
          </div>
        </div>
        <!-- /.col-lg-9-->
        <div class="col-lg-3">
          <div id="order-summary" class="card">
            <div class="card-header">
              <h3 class="mt-4 mb-4">Order summary</h3>
            </div>
            <div class="card-body">
              <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Order subtotal</td>
                      <th>$446.00</th>
                    </tr>
                    <tr>
                      <td>Shipping and handling</td>
                      <th>$10.00</th>
                    </tr>
                    <tr>
                      <td>Tax</td>
                      <th>$0.00</th>
                    </tr>
                    <tr class="total">
                      <td>Total</td>
                      <th>$456.00</th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-lg-3-->
      </div>
    </div>
  </div>
</div>

@include('clientModule.footer')
</html>