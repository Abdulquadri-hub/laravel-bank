@extends("layouts.app")

@section("content")

<div class="row">
    <div class="col-md-12 px-2">
        <div class="card">
          <div class="card-body">
            <div class="rounded-legend legend-vertical legend-bottom-left pt-4" style="z-index: 2000;">

              <h4 class="card-title mt-3">Select Transfer Mode</h4>
              <div class="mt-4">
                <div class="btn-group col-md-12" role="group">

                  <button type="button" class="btn btn-outline-secondary">
                    <a href="?transfermode=purplebank" class="text-decoration-none">
                      <i class="mdi mdi-bank d-block mb-1"></i> 
                      Purple Bank 
                    </a>
                  </button>

                  <button type="button" class="btn btn-outline-secondary" >
                    <a href="?transfermode=otherbanks" class="text-decoration-none">
                      <i class="mdi mdi-bank d-block mb-1"></i> 
                      Other Banks 
                    </a>
                  </button>
                </div>
              </div>

              <form action="" method="post">
                @csrf

                <div class="col-md-6 grid-margin stretch-card m-auto">
                  <div class="card">
                    <div class="card-body">
                      <!-- <h4 class="card-title">Select Source Account</h4> -->
                      <div class="form-group">
                        <label for="">Enter Destination Account</label>
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg" name="dest_accountnumber" placeholder="Account Number">
                          @if($errors->has('dest_accountnumber')) <small class="text-danger">{{ $errors->first('dest_accountnumber') }}</small> @endif
                        </div>
                        <button type="button" class="btn btn-outline-primary">Choose Beneficiary</button>
                        <hr>
                      </div>
  
                      <div class="form-group">
                        <label for="">Amount</label>
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg" name="amount" placeholder="0.00">
                          @if($errors->has('amount')) <small class="text-danger">{{ $errors->first('amount') }}</small> @endif
                        </div>
                      </div>
  
                      <div class="form-group">
                        <label for="">Transaction Description</label>
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg" name="description" placeholder="Transaction Description">
                          @if($errors->has('description')) <small class="text-danger">{{ $errors->first('description') }}</small> @endif
                        </div>
                      </div>
  
                      <div class="form-group">
                        <div class="form-check">
                          <label class="form-check-label">
                             <input type="checkbox" class="form-check-input"> Save as Beneficiary </label>
                        </div>
                      </div>
  
                      <div class="form-group">
                        <label for="">Transaction Pin</label>
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg" name="transaction_pin" placeholder="Transaction Pin">
                          @if($errors->has('transaction_pin')) <small class="text-danger">{{ $errors->first('transaction_pin') }}</small> @endif
                        </div>
                      </div>
  
                      <div class="form-group">
                        <button type="submit" class="btn btn-gradient-primary mb-2">Send</button>
                      </div>
  
                    </div>
                  </div>
                </div>

              </form>


            </div>
          </div>
        </div>
      </div>
</div>


@endsection