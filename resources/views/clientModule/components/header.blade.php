<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DinghySoft</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{asset('vendor/owl.carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/owl.carousel/assets/owl.theme.default.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('favicon.png')}}">

    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    <!-- navbar-->
    <header class="header mb-5">
        <!--
      *** TOPBAR ***
      _________________________________________________________
      -->
        <div id="topbar">
            <div class="fixed-top">
                @include('clientModule.components.topbar.topbar')

                <!-- cart items -->
                <!-- <div id="cartContainer" class="container">
                <div id="cartDropdown" class="shopping-cart">
                    @if (Session::has('cart'))
                    <div class="shopping-cart-header">
                        <i class="fa fa-shopping-cart cart-icon"></i>
                        <span class="cart-badge-invert">
                            @if (Session::has('cart'))
                            {{count(Session::get('cart'))}}
                            @else
                            0
                            @endif
                        </span>
                        <div class="shopping-cart-total">
                            <span class="lighter-text">Total:</span>
                            <span class="main-color-text">$2,229.97</span>
                        </div>
                    </div>

                    <div style="overflow-y: scroll; height: 250px">
                        <ul class="shopping-cart-items">
                            @foreach(Session::get('cart') as $cartItem)
                            <li class="clearfix">
                                <img src="{{$cartItem['image']}}" alt="item1" style="width:50px; height:50px" />
                                <span class="item-name">{{$cartItem['name']}}</span>
                                <span class="item-price">Price: BDT {{$cartItem['price']*$cartItem['quantity']}}</span>
                                <span class="item-quantity">Quantity: {{$cartItem['quantity']}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <a href="{{route('cart.index')}}" class="button1">Checkout</a>
                    @endif
                </div>
            </div> -->

            </div>

            @include('clientModule.components.topbar.login-modal')
            @include('clientModule.components.topbar.cart-modal')

        </div>

        <button onclick="topFunction()" id="toTopBtn" title="Go to top">
            <img src="{{asset('img/icons/up-arrow.png')}}" alt="" style="width:30px; height:30px;">
        </button>

    </header>