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
                <h5>Men</h5>
                <ul class="list-unstyled">
                    <li><a href="category.html">T-shirts</a></li>
                    <li><a href="category.html">Shirts</a></li>
                    <li><a href="category.html">Accessories</a></li>
                </ul>
                <h5>Ladies</h5>
                <ul class="list-unstyled">
                    <li><a href="category.html">T-shirts</a></li>
                    <li><a href="category.html">Skirts</a></li>
                    <li><a href="category.html">Pants</a></li>
                    <li><a href="category.html">Accessories</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <br><br>
                <h5>Men</h5>
                <ul class="list-unstyled">
                    <li><a href="category.html">T-shirts</a></li>
                    <li><a href="category.html">Shirts</a></li>
                    <li><a href="category.html">Accessories</a></li>
                </ul>
                <h5>Ladies</h5>
                <ul class="list-unstyled">
                    <li><a href="category.html">T-shirts</a></li>
                    <li><a href="category.html">Skirts</a></li>
                    <li><a href="category.html">Pants</a></li>
                    <li><a href="category.html">Accessories</a></li>
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
            <div class="col-lg-6 mb-2 mb-lg-0">
                <p class="text-center text-lg-left">©2021 Al Zilqad</p>
            </div>
            <div class="col-lg-6">
                <p class="text-center text-lg-right">Template design by <a href="https://bootstrapious.com/">Bootstrapious</a>
                    <!-- If you want to remove this backlink, pls purchase an Attribution-free License @ https://bootstrapious.com/p/obaju-e-commerce-template. Big thanks!-->
                </p>
            </div>
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


<script>
    //Get the button:
    mybutton = document.getElementById("toTopBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        // document.body.scrollTop = 0; // For Safari
        // document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

        $("html, body").animate({
            scrollTop: 0
        }, 1000);
        return false;
    }
</script>

</body>