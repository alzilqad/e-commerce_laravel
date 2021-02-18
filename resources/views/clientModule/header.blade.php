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
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <a href="{{route('home.index')}}" class="navbar-brand home">
                            <img src="{{asset('img/logo.png')}}" alt="Obaju logo" class="d-none d-md-inline-block">
                            <img src="{{asset('img/logo-small.png')}}" alt="Obaju logo" class="d-inline-block d-md-none">
                            <span class="sr-only">Obaju - go to homepage</span>
                        </a>

                        <div class="navbar-buttons">
                            <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
                            <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler">
                                <span class="sr-only">Toggle search</span>
                                <i class="fa fa-search"></i>
                            </button>

                            <a href="{{route('cart.index')}}" class="btn btn-outline-secondary navbar-toggler">
                                <i class="fa fa-shopping-cart"></i>
                            </a>

                        </div>

                        <div id="navigation" class="collapse navbar-collapse">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"><a href="{{route('home.index')}}" class="nav-link active">Home</a></li>
                                <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#login-modal">Login</a></li>
                                <li class="nav-item"><a href="{{route('register.index')}}" class="nav-link">Register</a></li>
                                <li class="nav-item"><a href="#footer" class="nav-link">Contact</a></li>
                        </div>

                        <!-- <div class="navbar-buttons d-flex justify-content-end"> -->
                        <div id="search" class="collapse navbar-collapse">
                            <!-- /.nav-collapse-->
                            <form action="{{route('search.index')}}" method="get" role="search" class="ml-auto">
                                <div class="input-group" style="padding: 10px">
                                    <input id="inputText" name="inputText" type="text" placeholder="Search" class="form-control" style="width: 300px">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- cart -->

                        <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block">
                            <a href="" data-toggle="modal" data-target="#cart-modal">
                                <div id="cart" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i> Cart
                                    <span class="cart-badge">
                                        @if (Session::has('cart'))
                                        {{count(Session::get('cart'))}}
                                        @else
                                        0
                                        @endif
                                    </span>
                                </div>
                            </a>
                        </div>

                    </div>
                </nav>

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

            <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Customer login</h5>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="customer-orders.html" method="post">
                                <div class="form-group">
                                    <input id="email-modal" type="text" placeholder="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input id="password-modal" type="password" placeholder="password" class="form-control">
                                </div>
                                <p class="text-center">
                                    <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                                </p>
                            </form>
                            <p class="text-center text-muted">Not registered yet?</p>
                            <p class="text-center text-muted"><a href="{{route('register.index')}}"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
                        </div>
                    </div>
                </div>
            </div>

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

            <!-- <div id="search" class="collapse">
            <div class="container">
                <form role="search" class="ml-auto">
                    <div class="input-group">
                        <input type="text" placeholder="Search" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            </div> -->

        </div>

        <button onclick="topFunction()" id="toTopBtn" title="Go to top">
            <img src="{{asset('img/icons/up-arrow.png')}}" alt="" style="width:30px; height:30px;">
        </button>

    </header>