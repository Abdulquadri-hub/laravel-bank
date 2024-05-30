<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple | Register</title>
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                    <img src="../assets/images/logo.svg">
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form method="post" class="pt-3">
                    @csrf

                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="firstname" value="{{old('firstname')}}" placeholder="First Name">
                    @if($errors->has('firstname')) <small class="text-danger">{{ $errors->first('firstname') }}</small> @endif
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="lastname" value="{{old('lastname')}}" placeholder="Last Name">
                    @if($errors->has('lastname')) <small class="text-danger">{{ $errors->first('lastname') }}</small> @endif
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="username" value="{{old('username')}}" placeholder="@example">
                    @if($errors->has('username')) <small class="text-danger">{{ $errors->first('username') }}</small> @endif
                  </div>

                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" name="email" value="{{old('email')}}" placeholder="Email Address">
                    @if($errors->has('email')) <small class="text-danger">{{ $errors->first('email') }}</small> @endif
                  </div>

                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="password" value="{{old('password')}}" placeholder="Password">
                    @if($errors->has('password')) <small class="text-danger">{{ $errors->first('password') }}</small> @endif
                  </div>
                  
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input" name="terms"> I agree to all Terms & Conditions </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" >SIGN UP</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{ route('auth.login') }}" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
  </body>
</html>