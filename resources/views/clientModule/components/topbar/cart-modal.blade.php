@if (Session::has('cart'))
<div id="cart-modal" tabindex="-1" role="dialog" aria-labelledby="Cart" aria-hidden="true" class="modal fade">
    <div class="modal-dialog modal-sm" style="position: fixed; margin: auto; width: 320px; height: 100%; right: 0px;">
        <div id="cartDropdown" class="shopping-cart">

            <div class="modal-content" style="height: 100%;">
                <div class="modal-header">
                    <div class="shopping-cart-header">
                        <i class="fa fa-shopping-cart cart-icon"></i>
                        <span class="cart-badge-invert">
                            @if (Session::has('cart'))
                            {{count(Session::get('cart'))}}
                            @else
                            0
                            @endif
                        </span>
                    </div>
                    <h3 class="modal-title" style="padding-left: 100px; text-align: center">Cart</h3>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div style="overflow-y: scroll; height: 85%">
                        <ul class="shopping-cart-items">
                            @foreach(Session::get('cart') as $cartItem)
                            <li class="clearfix">
                                <img src="{{asset($cartItem['image'])}}" style="width:75px; height:75px" />
                                <span class="item-name">{{$cartItem['name']}}</span>
                                <span class="item-price">Price: BDT {{$cartItem['price']*$cartItem['quantity']}}</span>
                                <span class="item-quantity">Quantity: {{$cartItem['quantity']}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="shopping-cart-total">
                        <h3 style="text-align: center">
                            <span class="lighter-text">Total:</span>
                            <span class="main-color-text">BDT {{Session::get('totalCartCost')}}</span>
                        </h3>
                    </div>
                    <a href="{{route('cart.index')}}" class="button1">Checkout</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endif