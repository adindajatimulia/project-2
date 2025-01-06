@include('admins.layouts.headers')
    <!-- page-wrapper Start-->
    <section>         
        <div class="container-fluid p-0">
          <div class="row">
            <div class="col-12">
              <div class="login-card">
                <form action="{{route('auth.signin')}}" method="post" class="theme-form login-form" data-callback="{{route('dashboard')}}">
                  @csrf
                  <h4>Login</h4>
                  <h6>Welcome back! Log in to your account.</h6>
                  <div class="form-group">
                    <label>Email</label>
                    <div class="input-group"><span class="input-group-text"><i class="icon-user"></i></span>
                      <input class="form-control" type="text" name="email"  placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                      <input class="form-control" type="password" name="password"  placeholder="*********">
                      <div class="show-hide"><span class="show">                         </span></div>
                    </div>
                  </div>
                  {{-- <div class="form-group">
                    <div class="checkbox">
                      <input id="checkbox1" type="checkbox">
                      <label for="checkbox1">Remember password</label>
                    </div><a class="link" href="forget-password.html">Forgot password?</a>
                  </div> --}}
                  <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- page-wrapper end-->
@include('admins.layouts.footers')