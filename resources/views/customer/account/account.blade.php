@extends("layouts.app")

@section("content")
    <section class="section profile">
      <div class="row">

      @if(!is_null($account))

      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <h2>{{ $account?->user->firstname}}</h2>
            <h3>{{ $account?->user->lastname}}</h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="mdi mdi-twitter"></i></a>
              <a href="#" class="facebook"><i class="mdi mdi-facebook"></i></a>
              <a href="#" class="instagram"><i class="mdi mdi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="mdi mdi-linkedin"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <a href="{{ route('customer.account.index') . '/overview'}}" class="text-decoration-none">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('customer.account.index') . '/edit'}}" class="text-decoration-none">
                  <button class="nav-link" >Edit Profile</button>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('customer.account.index') . '/change-password' }}" class="text-decoration-none">
                  <button class="nav-link">Change Password</button>
                </a>
              </li>

            </ul>

            <div class="tab-content pt-2">

              @if ($mode == "edit")
              
                <div class="pt-3">
                
                <!-- Profile Edit Form -->
                <form method="post">
                  @csrf

                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text" class="form-control" value="{{ old('home_address',  $account?->user->home_address) }}" name="home_address" />
                      @if($errors->has('home_address')) <small class="text-danger">{{ $errors->first('home_address') }}</small> @endif
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="" class="col-md-4 col-lg-3 col-form-label">Phone Number</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text" class="form-control" value="{{ old('phone_num', $account?->user->phone_num) }}" name="phone_num">  
                      @if($errors->has('phone_num')) <small class="text-danger">{{ $errors->first('phone_num') }}</small> @endif
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text" name="email" value="{{ old('firstname',  $account?->user->email) }}" class="form-control" />
                      @if($errors->has('email')) <small class="text-danger">{{ $errors->first('email') }}</small> @endif
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form>

                </div>
              
              @elseif ($mode == "change-password")

                <div class="pt-3">

                  <form method="post">
                    @csrf
                    
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" value="{{ old('password') }}" class="form-control" id="currentPassword">
                      @if($errors->has('password')) <small class="text-danger">{{ $errors->first('password') }}</small> @endif
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" value="{{ old('newpassword') }}" type="password" class="form-control" id="newPassword">
                      @if($errors->has('newpassword')) <small class="text-danger">{{ $errors->first('newpassword') }}</small> @endif
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" value="{{ old('renewpassword') }}" class="form-control" id="renewPassword">
                      @if($errors->has('renewpassword')) <small class="text-danger">{{ $errors->first('renewpassword') }}</small> @endif
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                  </form>

                </div>

              @elseif ($mode == "overview")  

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title">Account Details</h5>

                <div class="row shadow-sm p-3 my-2 bg-light">
                  <div class="col-lg-5 col-md-4 label">Your Username</div>
                  <div class="col-lg-7 col-md-8">@ {{ $account?->user->username}} </div>
                </div>

                <div class="row  p-3 my-2">
                  <div class="col-lg-5 col-md-4 label">Your Account Number</div>
                  <div class="col-lg-7 col-md-8">{{ $account?->account_number}} </div>
                </div>

                <div class="row shadow-sm p-3 my-2  bg-light">
                  <div class="col-lg-5 col-md-4 label">Country</div>
                  <div class="col-lg-7 col-md-8">USA</div>
                </div>

                <div class="row shadow-sm p-3 my-2">
                  <div class="col-lg-5 col-md-4 label">Address</div>
                  <div class="col-lg-7 col-md-8">{{ $account?->user->home_address}} </div>
                </div>

                <div class="row shadow-sm p-3 my-2 bg-light">
                  <div class="col-lg-5 col-md-4 label">Phone</div>
                  <div class="col-lg-7 col-md-8">{{ $account?->user->phone_num}} </div>
                </div>

                <div class="row shadow-sm p-3 my-2">
                  <div class="col-lg-5 col-md-4 label">Email</div>
                  <div class="col-lg-7 col-md-8">{{ $account?->user->email}} </div>
                </div>

                <div class="row shadow-sm p-3 my-2 bg-light">
                  <div class="col-lg-5 col-md-4 label">Next Of Kin</div>
                  <div class="col-lg-7 col-md-8"> </div>
                </div>
                
                </div>
              
              @else

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title">Account Details</h5>

                <div class="row shadow-sm p-3 my-2 bg-light">
                  <div class="col-lg-5 col-md-4 label">Your Username</div>
                  <div class="col-lg-7 col-md-8">@ {{ $account?->user->username}} </div>
                </div>

                <div class="row  p-3 my-2">
                  <div class="col-lg-5 col-md-4 label">Your Account Number</div>
                  <div class="col-lg-7 col-md-8">{{ $account?->account_number}} </div>
                </div>

                <div class="row shadow-sm p-3 my-2  bg-light">
                  <div class="col-lg-5 col-md-4 label">Country</div>
                  <div class="col-lg-7 col-md-8">USA</div>
                </div>

                <div class="row shadow-sm p-3 my-2">
                  <div class="col-lg-5 col-md-4 label">Address</div>
                  <div class="col-lg-7 col-md-8">{{ $account?->user->home_address}} </div>
                </div>

                <div class="row shadow-sm p-3 my-2 bg-light">
                  <div class="col-lg-5 col-md-4 label">Phone</div>
                  <div class="col-lg-7 col-md-8">{{ $account?->user->phone_num}} </div>
                </div>

                <div class="row shadow-sm p-3 my-2">
                  <div class="col-lg-5 col-md-4 label">Email</div>
                  <div class="col-lg-7 col-md-8">{{ $account?->user->email}} </div>
                </div>

                <div class="row shadow-sm p-3 my-2 bg-light">
                  <div class="col-lg-5 col-md-4 label">Next Of Kin</div>
                  <div class="col-lg-7 col-md-8"> </div>
                </div>
                
                </div>
              
              @endif

            </div>

          </div>
        </div>

      </div>

      @else

      <div class="card">
        <p class="card-title text-center text-muted">Account Not Found!</p>
      </div>

      @endif


      </div>
    </section>

@endsection