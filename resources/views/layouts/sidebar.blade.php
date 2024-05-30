        <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="{{ route('customer.account.index') }}" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{env('APP_FRONTEND_URL')}}/assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{ \App\libs\Purple::getFirstname() }} {{ \App\libs\Purple::getLastname()  }}</span>
                  <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('customer.dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <!-- <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Basic UI Elements</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
              </div>
            </li> -->

            <li class="nav-item">
              <a class="nav-link" href="{{ route('customer.transfer') }}">
                <span class="menu-title">Transfer</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('customer.deposit') }}">
                <span class="menu-title">Deposit</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('customer.loan') }}">
                <span class="menu-title">Loan</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('customer.airtimetopup') }}">
                <span class="menu-title">Airtime Topup</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('customer.datatopup') }}">
                <span class="menu-title">Data Topup</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('customer.bills') }}">
                <span class="menu-title">Bills Payment</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('auth.login') }}">
                <span class="menu-title"> Login </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('auth.register') }}">
                <span class="menu-title"> Register </span>
              </a>
            </li>
        </ul>