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
        <caption>Bank Info</caption>
          <tr>  
            <th>Bank  Name</th>  
            <th>Account Number</th>  
            <th>Type of account</th>  
            <th>Account holder</th> 
          </tr>  
        </thead>  
        <tbody> 

            @foreach( $banks as $bank )   
          <tr>  

            <td> {{ $bank->name }} </td>  
            <td> {{ $bank->account }}  </td>  
            <td>{{ $bank->type }} </td>
             <td>{{ $user->name }} </td>
              <td><a href="{{ URL::to('edit-bank/'.$bank->id) }}"<span class="glyphicon glyphicon-wrench" title="Edit Bank Account">Edit Bank Account</span></a></td>  
          </tr>  
    @endforeach
       <td><a href="{{ URL::to('add-bank/'.$user->id) }}"<span class="glyphicon glyphicon-paperclip" title="Add Bank Account">Add Bank Account</span></a></td>  
         <td><a href="{{ URL::to('load-bank/'.$user->id) }}"<span class="glyphicon glyphicon-file" title="Load Money to Bank Account">Load Money to Bank Account</span></a></td> 
        </tbody>  
      </table> 


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
