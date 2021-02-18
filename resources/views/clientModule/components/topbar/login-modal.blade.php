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