
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

                <p class="card-title text-center text-primary">Submit Your Identification Credentials </p>

                <div class="card">
                  <div class="card-body">
                    <label class="card-title">Verification Type: </label>
                    <div class="row">
                       <div class="col-md-6">
                         <div class="form-group row">
                           <div class="col-md-4">
                               <a href="?mode=nin" class="text-decoration-none text-dark">
                                   <button class="btn btn-outline-dark" type="button">NIN </button>
                               </a>
                           </div>
                           <div class="col-md-8">
                             <!-- <div class="form-group"> -->
                               <a href="?mode=govt_id" class="text-decoration-none text-dark">
                                   <button class="btn btn-outline-primary" type="button">Government IDs </button>
                               </a>
                             <!-- </div> -->
                           </div>
                         </div>
                       </div>
                    </div>

                    @if($mode == "nin")

                        <div class="row m-auto">
                            <form method="post" class="pt-3">
                                @csrf
                                 <label class="col-form-label">National Identification Number</label>
                                 <div class="col-sm-6">
                                   <input type="text" class="form-control" value="{{ old('nin') }}" name="nin" />
                                   @if($errors->has('nin')) <small class="text-danger">{{ $errors->first('nin') }}</small> @endif
                                 </div>
                                 <div class="my-2">
                                   <button class="btn btn-outline-success" type="submit">save </button>
                                 </div>
                            </form>
                        </div>

                    @elseif ($mode == "govt_id")

                        <div class="row m-auto">
                            <form method="post" class="pt-3">
                                @csrf
                                <label class="col-form-label">National Identification Or Driver License Or Voters Card</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" value="{{ old('govt_id_url') }}" name="govt_id_url" />
                                    @if($errors->has('govt_id_url')) <small class="text-danger">{{ $errors->first('govt_id_url') }}</small> @endif
                                </div>
    
                                <div class="my-2">
                                    <button class="btn btn-outline-success" type="submit">save </button>
                                </div>
                            </form>
                        </div>
                    
                    @else

                      <div class="row">


                      </div> 

                    @endif

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ env('APP_FRONTEND_URL') }}/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{ env('APP_FRONTEND_URL') }}/assets/js/off-canvas.js"></script>
    <script src="{{ env('APP_FRONTEND_URL') }}/assets/js/hoverable-collapse.js"></script>
    <script src="{{ env('APP_FRONTEND_URL') }}/assets/js/misc.js"></script>
  </body>
</html>
