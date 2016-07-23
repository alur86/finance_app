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
        <caption>Transactions Info</caption>
          <tr>  
             <th>Id</th>
             <th>Email</th>
            <th>Date</th>  
            <th>Description</th>  
            <th>Withdraw</th>
            <th>Payment Status</th>  
            <th>Deposit</th> 
          </tr>  
        </thead>  
        <tbody> 
         @foreach( $banks as $bank )  
          @foreach( $payments as $payment)  
          <tr>  
          
              <td> {{ $payment->id }} </td> 
             <td> {{ $payment->email }} </td> 
           
            <td> {{ $bank->created_at }} </td> 
            <td> {{$bank->transwer}} </td> 
            <td>{{ $bank->withdraw}} USD</td>
             <td>{{ $bank->payment_status}} </td>
             <td>{{ $bank->deposit }} USD</td>

              
          </tr>  
         @endforeach
         @endforeach
        </tbody>  
      </table> 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
