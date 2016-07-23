@extends('layouts.app')

@section('content')
<div class="container">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Make Payment via Wallet:</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/postmakepayment') }}">
                        {{ csrf_field() }}
                         <input id="wallet_id" type="hidden" class="form-control" name="wallet_id" value="{{ $wallet->id }}">
                   
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Reciver E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                            <div class="form-group{{ $errors->has('transfer') ? ' has-error' : '' }}">
                            <label for="transwer" class="col-md-4 control-label">Payment Goal</label>

                            <div class="col-md-6">
                                <input id="transwer" type="text" class="form-control" name="transwer">

                                @if ($errors->has('transwer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('transwer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount (in USD)</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount">

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


          
                         <div class="form-group{{ $errors->has('account') ? ' has-error' : '' }}">
                            <label for="account" class="col-md-4 control-label">Card Name</label>

                            <div class="col-md-6">
                          <select name="card">
                           <option  selected value="{{ $wallet->card }}">{{ $wallet->card_name }}</option>
                           <option value="Master Card">Master Card</option>
                             <option value="eurocard">Eurocard</option>
                               <option value="visa">VISA</option>
                            </select>

                                @if ($errors->has('card'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>





                       <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label for="account" class="col-md-4 control-label">Card Number</label>

                            <div class="col-md-6">
                            <input id="number" type="text" class="form-control" name="number" value="{{ $wallet->card_number }}">

                                @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                  

                           <div class="form-group{{ $errors->has('expire') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Expire</label>

                            <div class="col-md-6">

                               <p>  <input type="text" name="datepicker" id="datepicker"></p>

                                @if ($errors->has('expire'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('expire') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      <div class="form-group{{ $errors->has('ccv') ? ' has-error' : '' }}">
                            <label for="cvv" class="col-md-4 control-label">CVV</label>

                            <div class="col-md-6">
                                <input id="cvv" type="text" class="form-control" name="cvv" value="{{ $wallet->cvv }}">

                                @if ($errors->has('cvv'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cvv') }}</strong>
                                    </span>
                                @endif
                            </div>
                       </div>



                  
                      <div class="form-group{{ $errors->has('bank') ? ' has-error' : '' }}">
                            <label for="cvv" class="col-md-4 control-label">Bank</label>

                            <div class="col-md-6">
                           <select class="form-control" name="bank">
                           @foreach($banks as $bank)
                           <option value="{{$bank->id}}">{{$bank->name}}</option>
                             @endforeach
                                </select>

                                @if ($errors->has('bank'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank') }}</strong>
                                    </span>
                                @endif
                            </div>
                       </div>
                   


  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Make Payment
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
