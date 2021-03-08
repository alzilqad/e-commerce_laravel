<!DOCTYPE html>
<html>
@include('clientModule.components.header')

<div id="all">
  <div id="content">
    <div class="row">

      <!-- breadcrumb-->
      <div class="col-lg-12">
        <nav aria-label="breadcrumb" style="padding-top: 20px">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
            <li aria-current="page" class="breadcrumb-item active">Sign In</li>
          </ol>
        </nav>
      </div>

      <div class="col-lg-8 center">
        <div class="responsive-box center" style="padding: 30px;">
          
            <form action="/examples/actions/confirmation.php" method="post">
              <h2>Login</h2>
              <p class="hint-text">Sign in with your social media account or email address</p>
              <div class="social-btn text-center">
                <a href="#" class="btn btn-primary btn-lg" style="width: 44%"><i class="fa fa-facebook"></i> Facebook</a>
                <a href="#" class="btn btn-danger btn-lg" style="width: 44%"><i class="fa fa-google"></i> Google</a>
              </div>
              <div class="or-seperator"><b>or</b></div>
              <div class="form-group">
                <input type="text" class="form-control input-lg" name="username" placeholder="Email/Phone" required="required">
              </div>
              <div class="form-group">
                <input type="password" class="form-control input-lg" name="password" placeholder="Password" required="required">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block signup-btn" style="background-color: #4fbfa8">Sign Up</button>
              </div>
            </form>
            <div class="text-center">Do not have an account? <a href="{{route('register.index')}}">Register here</a></div>
        </div>
      </div>

    </div>
  </div>
</div>

@include('clientModule.components.footer')

</html>