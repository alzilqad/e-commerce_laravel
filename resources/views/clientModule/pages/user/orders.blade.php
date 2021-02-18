<!DOCTYPE html>
<html>
@include('clientModule.components.header')

<div id="all">
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- breadcrumb-->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li aria-current="page" class="breadcrumb-item active">My orders</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-3">
          <!--
              *** CUSTOMER MENU ***
              _________________________________________________________
              -->
          <div class="card sidebar-menu">
            <div class="card-header">
              <h3 class="h4 card-title">Customer section</h3>
            </div>
            <div class="card-body">
              <ul class="nav nav-pills flex-column"><a href="customer-orders.html" class="nav-link active"><i class="fa fa-list"></i> My orders</a><a href="customer-wishlist.html" class="nav-link"><i class="fa fa-heart"></i> My wishlist</a><a href="customer-account.html" class="nav-link"><i class="fa fa-user"></i> My account</a><a href="index.html" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></ul>
            </div>
          </div>
          <!-- /.col-lg-3-->
          <!-- *** CUSTOMER MENU END ***-->
        </div>
        <div id="customer-orders" class="col-lg-9">
          <div class="box">
            <h1>My orders</h1>
            <p class="lead">Your orders on one place.</p>
            <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
            <hr>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Order</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th># 1735</th>
                    <td>22/06/2013</td>
                    <td>$ 150.00</td>
                    <td><span class="badge badge-info">Being prepared</span></td>
                    <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a></td>
                  </tr>
                  <tr>
                    <th># 1735</th>
                    <td>22/06/2013</td>
                    <td>$ 150.00</td>
                    <td><span class="badge badge-info">Being prepared</span></td>
                    <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a></td>
                  </tr>
                  <tr>
                    <th># 1735</th>
                    <td>22/06/2013</td>
                    <td>$ 150.00</td>
                    <td><span class="badge badge-success">Received</span></td>
                    <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a></td>
                  </tr>
                  <tr>
                    <th># 1735</th>
                    <td>22/06/2013</td>
                    <td>$ 150.00</td>
                    <td><span class="badge badge-danger">Cancelled</span></td>
                    <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a></td>
                  </tr>
                  <tr>
                    <th># 1735</th>
                    <td>22/06/2013</td>
                    <td>$ 150.00</td>
                    <td><span class="badge badge-warning">On hold</span></td>
                    <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('clientModule.components.footer')
</html>