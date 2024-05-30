@extends("layouts.app")

@section("content")
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> Hi, {{ \App\libs\Purple::getFirstname() }} {{ \App\libs\Purple::getLastname()  }}
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>

    <div class="row">

      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Account Balance <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">&#8358 {{ number_format($customer?->account_balance, 2)  }}</h2>
          </div>
        </div>
      </div>

      <div class="col-md-8 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
              <a href="{{ route('customer.transfer') }}" class="text-decoration-none">
                <button class="btn btn-icon-text">
                  
                  <h4 class="font-weight-normal mb-3 text-white">Transfer 
                    <!-- <span><i class="mdi mdi-plus text-dark fw-5"></i></span> -->
                  </h4>
                </button>
              </a>
              <a href="{{ route('customer.deposit') }}" class="text-decoration-none">
                <button type="button" class="btn">
                  <h4 class="font-weight-normal mb-3 text-white">Deposit </h4>
                </button>
              </a>
              <a href="{{ route('customer.loan') }}" class="text-decoration-none">
                <button type="button" class="btn btn-icon-text">
                  <h4 class="font-weight-normal mb-3 text-white">Loan </h4>
                </button>
              </a> 

              <hr>

              <h4 class="card-title mt-3">Eazy Links</h4>

              <a href="{{ route('customer.airtimetopup') }}" class="">
                <button type="button" class="btn btn-gradient-success my-3">Airtime Topup</button>
              </a>
              
              <a href="{{ route('customer.bills') }}" class="">
                <button type="button" class="btn btn-gradient-danger">Bills</button>
              </a>

              <a href="{{ route('customer.datatopup') }}" class="">
                <button type="button" class="btn btn-gradient-secondary">Data Topup</button>
              </a>
          </div>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="clearfix">
              <h4 class="card-title float-left">Recent Transactions</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                  <tr>
                    <th> Assignee </th>
                    <th> Subject </th>
                    <th> Status </th>
                    <th> Last Update </th>
                    <th> Tracking ID </th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                      <img src="assets/images/faces/face1.jpg" class="me-2" alt="image"> David Grey
                    </td>
                    <td> Fund is not recieved </td>
                    <td>
                      <label class="badge badge-gradient-success">DONE</label>
                    </td>
                    <td> Dec 5, 2017 </td>
                    <td> WD-12345 </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="assets/images/faces/face2.jpg" class="me-2" alt="image"> Stella Johnson
                    </td>
                    <td> High loading time </td>
                    <td>
                      <label class="badge badge-gradient-warning">PROGRESS</label>
                    </td>
                    <td> Dec 12, 2017 </td>
                    <td> WD-12346 </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="assets/images/faces/face3.jpg" class="me-2" alt="image"> Marina Michel
                    </td>
                    <td> Website down for one week </td>
                    <td>
                      <label class="badge badge-gradient-info">ON HOLD</label>
                    </td>
                    <td> Dec 16, 2017 </td>
                    <td> WD-12347 </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="assets/images/faces/face4.jpg" class="me-2" alt="image"> John Doe
                    </td>
                    <td> Loosing control on server </td>
                    <td>
                      <label class="badge badge-gradient-danger">REJECTED</label>
                    </td>
                    <td> Dec 3, 2017 </td>
                    <td> WD-12348 </td>
                  </tr>
                  </tbody>
                </table>
                <a href="http://" class="">
                  <h3 class="card-title text-center mt-3">See All Transactions</h3>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection