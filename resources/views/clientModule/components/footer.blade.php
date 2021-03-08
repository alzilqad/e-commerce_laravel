<!--
    *** FOOTER ***
    _________________________________________________________
    -->
<div id="footer">
    <div class="container">
        <div class="row">
            <!-- /.col-lg-3-->
            <div class="col-lg-3 col-md-6">
                <h4 class="mb-3">Top categories</h4>

                @for ($index = 0; $index < 3; $index++) <a href="{{route('category.singular', $data['categories'][$index]->name_en)}}">
                    <h5>{{$data['categories'][$index]->name_en}}</h5>
                    </a>
                    @php
                    $counter = 0;
                    @endphp
                    <ul class="list-unstyled">
                        @foreach ($data['subCategories'] as $subCategory)
                        @if($subCategory->category_id==$data['categories'][$index]->id && $subCategory->sub_category_id==0)
                        <li>
                            <a href="{{route('category.sub', ['category' => $data['categories'][$index]->name_en, 'subCategory' => $subCategory->name_en])}}">
                                {{$subCategory->name_en}}
                            </a>
                        </li>

                        @php
                        $counter += 1;
                        @endphp

                        @endif

                        @break($counter == 3)
                        @endforeach
                    </ul>

                    @endfor
            </div>

            <div class="col-lg-3 col-md-6">
                <h4 class="mb-3">Top Brands</h4>


                <ul class="list-unstyled">
                    <li><a href="category.html">None</a></li>
                </ul>

            </div>

            <!-- /.col-lg-3-->
            <div class="col-lg-3 col-md-6">
                <h4 class="mb-3">Where to find us</h4>
                <p><strong>Zaaibo Ltd.</strong><br>6/19 Building<br>Nikunjo 2<br>Dhaka<br><strong>Bangladesh</strong></p><a href="contact.html">Go to contact page</a>
                <hr class="d-block d-md-none">
            </div>
            <!-- /.col-lg-3-->
            <div class="col-lg-3 col-md-6">
                <h4 class="mb-3">Get the news</h4>
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control"><span class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary">Subscribe!</button></span>
                    </div>
                    <!-- /input-group-->
                </form>
                <hr>
                <h4 class="mb-3">Stay in touch</h4>
                <p class="social">
                    <a href="#" class="facebook external"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter external"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="instagram external"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="gplus external"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="email external"><i class="fa fa-envelope"></i></a>
                </p>
            </div>
            <!-- /.col-lg-3-->
        </div>
        <!-- /.row-->
    </div>
    <!-- /.container-->
</div>
<!-- /#footer-->
<!-- *** FOOTER END ***-->

<!--
    *** COPYRIGHT ***
    _________________________________________________________
    -->
<div id="copyright">
    <div class="container">
        <div class="row">
            <p class="text-center">©2021 Al Zilqad Tonoy. All rights reserved.</p>
        </div>
    </div>
</div>
<!-- *** COPYRIGHT END ***-->

<!-- JavaScript files-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
<script src="{{asset('vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js')}}"></script>
<script src="{{asset('js/front.js')}}"></script>
<script src="{{asset('js/scroll.js')}}"></script>
<script src="{{asset('js/filter.js')}}"></script>
<script src="{{asset('js/cart.js')}}"></script>
<script src="{{asset('js/checkout.js')}}"></script>

<script>
    function verifyUser() {
        var username = document.getElementsByName("username")[0].value;
        var password = document.getElementsByName("password")[0].value;
        // alert(username + password);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "GET",
            url: "/login/user",
            datatype: "json",
            data: {
                id: username,
                pass: password
            },
            success: function(response) {
                if (response) {
                    console.log(response);
                    // $("#topbar").load(response + " #topbar");
                    // $("#navigation").load(response + " #navigation");

                    // document.getElementById('login-modal').setAttribute("aria-hidden", "ture");

                    // $('#login-modal').attr("aria-hidden", "false")
                }
            },
        });
    }
</script>

<script>
    var currentPageId = "page-home";
    var currentSelectorId = "home";

    //Function for getting the button ids
    function getButtons() {
        //List of button ids
        var list = ["home", "feed", "create", "account"];
        return list;
    }

    //Make sure the window is loaded before we add listeners
    window.onload = function() {
        var pageIdList = getButtons();
        //Add an event listener to each button
        pageIdList.forEach(function(page) {
            document.getElementById(page).addEventListener("click", changePage, false);
        });
    }

    function changePage() {
        var currentSelector = document.getElementById(currentSelectorId);
        var currentPage = document.getElementById(currentPageId);
        var pageId = "page-" + this.id;
        var page = document.getElementById(pageId);
        var pageSelector = document.getElementById(this.id);

        if (page.classList.contains("active")) {
            return;
        }

        currentSelector.classList.remove("button-active");
        currentSelector.classList.add("button-inactive");
        currentPage.classList.remove("active");
        currentPage.classList.add("inactive");

        pageSelector.classList.remove("button-inactive");
        pageSelector.classList.add("button-active");

        page.classList.remove("inactive");
        page.classList.add("active");

        //Need to reset the scroll
        window.scrollTo(0, 0);

        currentSelectorId = this.id;
        currentPageId = pageId;
    }
</script>

</body>