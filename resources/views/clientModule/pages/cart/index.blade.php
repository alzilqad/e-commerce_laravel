<!DOCTYPE html>
<html>
@include('clientModule.components.header')

<div id="all">
  <div id="content">
    <div class="row">
      <div class="col-lg-12">
        <!-- breadcrumb-->
        <nav aria-label="breadcrumb" style="padding-top: 20px">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
            <li aria-current="page" class="breadcrumb-item active">Shopping Cart</li>
          </ol>
        </nav>
      </div>

      <!-- *** MENUS AND FILTERS *** -->
      <!-- Category -->
      @include('clientModule.components.sidebar.category-bar')
      <!-- *** MENUS AND FILTERS END ***-->

      <div id="basket" class="col-lg-10">
        <div class="box" style="padding: 30px">
          <h1>Shopping cart</h1>
          <p id="cart-topbar" class="text-muted">You currently have
            @if (Session::has('cart'))
            {{count(Session::get('cart'))}}

            @if(count(Session::get('cart'))>1)
            items
            @else
            item
            @endif

            @else
            0
            @endif

            in your cart.
          </p>

          @if(Session::has('cart'))
          <div id="cart-view" class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th colspan="2">Product</th>
                  <th>Quantity</th>
                  <th>Unit price</th>
                  <th>Sub Total</th>
                  <th>Discount</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data['products'] as $product)
                <tr>
                  <td><a href="{{route('product.index', ['id' => $product->id, 'product' => $product->name_en])}}"><img src="{{asset($product->image)}}" alt="" style="width:75px; height:75px"></a></td>
                  <td><a href="{{route('product.index', ['id' => $product->id, 'product' => $product->name_en])}}">{{$product->name_en}}</a></td>
                  <td>
                    <input id="quantity{{$product->id}}" type="number" value="{{$product->quantity}}" class="form-control" min="0" style="width: 5em; cursor: default" onKeyDown="return false" onclick="updateCart('{{$product->id}}',event)">
                  </td>
                  <td>{{$product->original_price}}</td>
                  <td>{{$product->original_price*$product->quantity}}</td>
                  <td>{{$product->discount_price*$product->quantity}}</td>
                  <td>{{$product->buying_price*$product->quantity}}</td>
                  <td><a onclick="removeFromCart('{{$product->id}}', event)" style="color: #4fbfa8; cursor: pointer"><i class="fa fa-trash-o"></i></a></td>
                </tr>
                @endforeach

              </tbody>
              <tfoot>
                <tr>
                  <th colspan="6">Total</th>
                  <th colspan="2">{{$data['totalPrice']}}</th>
                </tr>
              </tfoot>
            </table>
          </div>
          @endif

          <!-- /.table-responsive-->
          <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
            <div class="left"><a href="{{url()->previous()}}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
            <div class="right">
              <a href="{{route('checkout.delivery')}}" type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@include('clientModule.components.footer')

</html>