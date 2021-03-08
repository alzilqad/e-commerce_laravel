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
                @if(Request::url() !== route('home.index'))
                <li class="nav-item"><a href="{{route('home.index')}}" class="nav-link">Home</a></li>
                @endif

                <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#login-modal">Login</a></li>
                <li class="nav-item"><a href="{{route('register.index')}}" class="nav-link">Register</a></li>
        </div>

        <div class="navbar-nav mr-auto" style="float: right;">
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

            <!-- <div id="account-overview" class="navbar-collapse collapse d-none d-lg-block">
                <div class="navbar">

                    <a href="" class="btn btn-primary">
                        <i class="fa fa-user"></i>
                        <span class="tooltiptext">Account</span>
                    </a>
                </div>
            </div> -->

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

    </div>



    </div>
</nav>