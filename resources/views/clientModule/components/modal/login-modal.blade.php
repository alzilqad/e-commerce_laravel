<div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Customer login</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input id="email-modal" name="username" type="text" placeholder="Enter email/phone" class="form-control">
                    @error('id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password-modal" name="password" type="password" placeholder="Enter password" class="form-control">
                    @error('pass')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <p class="text-center">
                    <button class="btn btn-primary" onclick="verifyUser()"><i class="fa fa-sign-in"></i> Log in</button>
                </p>
                <p class="text-center text-muted">Not registered yet?</p>
                <p class="text-center text-muted"><a href="{{route('register.index')}}"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
            </div>
        </div>
    </div>
</div>