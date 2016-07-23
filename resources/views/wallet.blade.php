@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
              

      <div class="panel-body">
      This is  {{ $user->name }} logged in
       <table class="table table-striped">  
        <thead>  
        <caption>Wallet Info</caption>
          <tr>  
            <th>Card Number</th>  
            <th>Card Name</th>  
            <th>Card Expire</th>
            <th>Card CVV</th>  
          </tr>  
        </thead>  
        <tbody>  
          <tr>  
            <td> {{ $wallet->card_number}} </td> 
             <td> {{ $wallet->card_name}} </td> 
            <td>{{ $wallet->expire}}</td>
             <td>{{ $wallet->cvv}} </td>
        
          </tr>  
       <td><a href="{{ URL::to('make-payment/'.$wallet->id) }}"<span class=" glyphicon glyphicon-credit-card" title="Make Payment">Make Payment</span></a></td>  
        </tbody>  
      </table> 


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
