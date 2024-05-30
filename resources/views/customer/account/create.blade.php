
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

                <p class="card-description text-center text-primary">Create Your Purple Account </p>

                <div class="card">
                  <div class="card-body">
                    <form method="post" class="pt-3">
                       @csrf

                      <p class="card-description"> Personal info </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                              <input type="text" name="firstname" value="{{ old('firstname', $user?->firstname) }}" class="form-control" />
                              @if($errors->has('firstname')) <small class="text-danger">{{ $errors->first('firstname') }}</small> @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                              <input type="text" name="lastname" value="{{ old('lastname', $user?->lastname) }}" class="form-control" />
                              @if($errors->has('lastname')) <small class="text-danger">{{ $errors->first('lastname') }}</small> @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                              <select class="form-control form-select" name="gender">
                                @if($errors->has('gender')) <small class="text-danger">{{ $errors->first('gender') }}</small> @endif
                                <option>Male</option>
                                <option>Female</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-9">
                              <input type="date" class="form-control" value="{{ old('date_of_birth') }}" name="date_of_birth" placeholder="dd/mm/yyyy" />
                              @if($errors->has('date_of_birth')) <small class="text-danger">{{ $errors->first('date_of_birth') }}</small> @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email Address</label>
                            <div class="col-sm-9">
                              <input type="text" name="email" value="{{ old('email', $user?->email) }}" class="form-control" />
                              @if($errors->has('email')) <small class="text-danger">{{ $errors->first('email') }}</small> @endif
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{ old('phone_num') }}" name="phone_num" placeholder="09076189518">  
                              @if($errors->has('phone_num')) <small class="text-danger">{{ $errors->first('phone_num') }}</small> @endif
                            </div>
                          </div>
                        </div>

                      </div>

                      <p class="card-description"> Address </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Home Address </label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{ old('home_address') }}" name="home_address" />
                              @if($errors->has('home_address')) <small class="text-danger">{{ $errors->first('home_address') }}</small> @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">State</label>
                            <div class="col-sm-9">
                              <input type="text" name="state" value="{{ old('state') }}" class="form-control" />
                              @if($errors->has('state')) <small class="text-danger">{{ $errors->first('state') }}</small> @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Office Address</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{ old('office_address') }}" name="office_address" />
                              @if($errors->has('office_address')) <small class="text-danger">{{ $errors->first('office_address') }}</small> @endif
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Postcode</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{ old('postcode') }}" name="postcode" />
                              @if($errors->has('postcode')) <small class="text-danger">{{ $errors->first('postcode') }}</small> @endif
                            </div>
                          </div>
                        </div>

                      </div>

                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{ old('city') }}" name="city" />
                              @if($errors->has('city')) <small class="text-danger">{{ $errors->first('city') }}</small> @endif
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nationality</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{ old('nationality') }}" name="nationality" />
                              @if($errors->has('nationality')) <small class="text-danger">{{ $errors->first('nationality') }}</small> @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <p class="card-description"> Account </p>

                        <div class="row">

                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">BVN</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ old('bvn') }}" name="bvn" />
                                @if($errors->has('bvn')) <small class="text-danger">{{ $errors->first('bvn') }}</small> @endif
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">transaction Pin</label>
                              <div class="col-sm-9">
                                <input type="password" class="form-control" value="{{ old('transaction_pin') }}" name="transaction_pin" />
                                @if($errors->has('transaction_pin')) 
                                  <small class="text-danger">{{ $errors->first('transaction_pin') }}</small>   
                                @endif
                              </div>
                            </div>
                          </div>
  
                      </div>
                      
                      <div class="row">
                        <button class="btn btn-primary" type="submit">Proceed</button>
                      </div>
                    </form>
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
