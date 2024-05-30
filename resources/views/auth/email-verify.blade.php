<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple | Account Creation</title>
    <link rel="stylesheet" href="{{ env('APP_FRONTEND_URL') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ env('APP_FRONTEND_URL') }}/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ env('APP_FRONTEND_URL') }}/assets/css/style.css">
    <link rel="shortcut icon" href="{{ env('APP_FRONTEND_URL') }}/assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-12 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                    <img src="{{ env('APP_FRONTEND_URL') }}/assets/images/logo.svg">
                </div>

                <p class="card-description text-center text-danger p-4 m-auto fs-5">
                  {{ $msg }}
                </p>

                @if($msg == "The verification token has expired!")
                    <div class="row">
                        <button class="btn btn-dark" type="submit">Resend Link</button>
                      </div>      
                @endif

              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <script src="{{ env('APP_FRONTEND_URL') }}/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{ env('APP_FRONTEND_URL') }}/assets/js/off-canvas.js"></script>
    <script src="{{ env('APP_FRONTEND_URL') }}/assets/js/hoverable-collapse.js"></script>
    <script src="{{ env('APP_FRONTEND_URL') }}/assets/js/misc.js"></script>
  </body>
</html>