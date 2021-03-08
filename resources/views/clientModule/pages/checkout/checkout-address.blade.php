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
            <li aria-current="page" class="breadcrumb-item active">Checkout - Address</li>
          </ol>
        </nav>
      </div>

      <!-- Category -->
      @include('clientModule.components.sidebar.category-bar')

      <div id="checkout" class="col-lg-7">
      <div class="box" style="padding: 20px">
          <form method="get" action="{{route('checkout.payment')}}">
            <h1>Checkout - Address</h1>
            <div class="nav flex-column flex-sm-row nav-pills">
              <a href="{{route('checkout.delivery')}}" class="nav-link flex-sm-fill text-sm-center">
                <i class="fa fa-truck"> </i>Delivery Method
              </a>
              <a href="{{route('checkout.address')}}" class="nav-link flex-sm-fill text-sm-center active">
                <i class="fa fa-map-marker"></i>Address
              </a>
              <a href="" class="nav-link flex-sm-fill text-sm-center disabled">
                <i class="fa fa-money"> </i>Payment Method
              </a>
              <a href="" class="nav-link flex-sm-fill text-sm-center disabled">
                <i class="fa fa-eye"> </i>Order Review
              </a>
            </div>
            <div class="content py-3" style="padding: 30px">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Full Name</label>
                    <input id="name" type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input id="phone" type="text" class="form-control">
                  </div>
                </div>
              </div>
              <!-- /.row-->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="division">Division</label>
                    <select name="division" id="division" class="form-control" onchange="getDistrict()">
                      <option value=""></option>
                      @foreach($data['address'] as $division => $district)
                      <option value="{{$division}}">{{$division}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="street">District</label>
                    <select name="district" id="district" class="form-control" disabled>
                      <option value=""></option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.row-->
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input id="address" type="text" class="form-control">
                  </div>
                </div>
              </div>
              <!-- /.row-->
            </div>

            <div class="box-footer d-flex justify-content-between"><a href="{{route('checkout.delivery')}}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Delivery Method</a>
              <button type="submit" class="btn btn-primary">Continue to Payment Method<i class="fa fa-chevron-right"></i></button>
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