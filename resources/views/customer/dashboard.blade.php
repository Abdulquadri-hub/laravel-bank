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
                    <th> Account </th>
                    <th> Account No </th>
                    <th> Amount </th>
                    <th> Status </th>
                    <th> Initiate At</th>
                    <th> Ref No </th>
                  </tr>
                  </thead>
                  <tbody>
                  @if ($transactions)
                    @foreach ($transactions as $transaction)
                      <tr>
                        <td>
                          <img src="{{env('APP_FRONTEND_URL')}}/assets/images/logo.svg" class="me-2" alt="image">
                        </td>
                        <td> {{ $transaction->account->account_number }} </td>
                        <td> 
                          
                            @if ($transaction->transaction_type === "credit")
                              <i class="mdi mdi-plus"></i> {{ $transaction->amount }}
                            @elseif ($transaction->transaction_type === "debit")
                            <i class="mdi mdi-minus"></i> {{ $transaction->amount }}
                            @endif
                           
                        </td>
                        <td>
                          <label class="badge badge-gradient-success">

                            @if (!is_null($transaction->deposit_id))
                              {{ $transaction->deposit->status }}
                            @elseif (!is_null($transaction->transfer_id))
                              {{ $transaction->transfer->status }}
                            @elseif (!is_null($transaction->external_transfer_id))
                              {{ $transaction->deposit->status }}
                            @endif
            
                          </label>
                        </td>
                        <td> 
                          {{ $transaction->created_at }}
                        </td>
                        <td> 

                            @if (!is_null($transaction->deposit_id))
                              {{ $transaction->deposit->reference }}
                            @elseif (!is_null($transaction->transfer_id))
                              {{ $transaction->transfer->reference }}
                            @elseif (!is_null($transaction->external_transfer_id))
                              {{ $transaction->deposit->reference }}
                            @endif
                          
                        </td>
                      </tr>
                    @endforeach

                  @else
                    <h3 class="card-title text-center mt-3">No transactions found !!</h3>
                  @endif
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