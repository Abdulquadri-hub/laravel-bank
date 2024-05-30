@extends("layouts.app")

@section("content")

<div class="row">
    <div class="col-md-12 px-2">
        <div class="card">
          <div class="card-body">
            <div class="rounded-legend legend-vertical legend-bottom-left pt-4" style="z-index: 2000;">
              <div class="col-md-6 grid-margin stretch-card m-auto">
                <div class="card">
                  <div class="card-body">

                    <h4 class="card-title mt-3 text-center mb-3">Make Deposit</h4>
                    <form action="" method="post">
                        @csrf

                        <div class="form-group">
                          <label for="">Amount</label>
                          <div class="form-group">
                            <input type="number" class="form-control form-control-lg" step="0.01" name="amount" value ="{{ old('amount') }}">
                            @if($errors->has('amount')) <small class="text-danger">{{ $errors->first('amount') }}</small> @endif
                          </div>
                        </div>
    
                        <div class="form-group">
                          <label for="">Transaction Description</label>
                          <div class="form-group">
                            <input type="text" class="form-control form-control-lg" name="description" placeholder="Transaction Description" value ="{{ old('description') }}">
                            @if($errors->has('description')) <small class="text-danger">{{ $errors->first('description') }}</small> @endif
                          </div>
                        </div>
    
                        <div class="form-group">
                          <label for="">Transaction Pin</label>
                          <div class="form-group">
                            <input type="password" class="form-control form-control-lg" name="transaction_pin" placeholder="Transaction Pin">
                            @if($errors->has('transaction_pin')) <small class="text-danger">{{ $errors->first('transaction_pin') }}</small> @endif
                          </div>
                        </div>
    
                        <div class="form-group">
                          <button type="submit" class="btn btn-gradient-primary mb-2">Send</button>
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


@endsection