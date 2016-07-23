@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Load Money to Bank Account</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/postloadbank') }}">
                        {{ csrf_field() }}
                         <input id="wallet_id" type="hidden" class="form-control" name="wallet_id" value="{{ $wallet->id }}">
           
                    <div class="form-group{{ $errors->has('bank1') ? ' has-error' : '' }}">
                            <label for="bank1" class="col-md-4 control-label">Select Bank 1st Bank</label>

                            <div class="col-md-6">
                           <select class="form-control" name="bank1">
                           @foreach($banks as $bank)
                           <option value="{{$bank->id}}">{{$bank->name}}</option>
                             @endforeach
                                </select>

                                @if ($errors->has('bank1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank1') }}</strong>
                                    </span>
                                @endif
                            </div>
                       </div>
                   


                        <div class="form-group{{ $errors->has('bank2') ? ' has-error' : '' }}">
                            <label for="bank2" class="col-md-4 control-label">Select Bank 2nd Bank</label>

                            <div class="col-md-6">
                           <select class="form-control" name="bank2">
                           @foreach($banks as $bank)
                           <option value="{{$bank->id}}">{{$bank->name}}</option>
                             @endforeach
                                </select>

                                @if ($errors->has('bank2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank2') }}</strong>
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


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Make  Withdraw
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
