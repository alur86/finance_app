@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
              

                <div class="panel-body">
                    Welcome back, {{ $user->name }} 
<table class="table table-striped">  
        <thead>  
        <caption>User's Profile:</caption>
          <tr>  
            <th>Profile Name</th>  
            <th>Phone Number</th>  
            <th>E-mail</th>  
          </tr>  
        </thead>  
        <tbody>  
          <tr>  
            <td> {{ $profile->name }} </td>  
            <td> {{ $profile->telephone }}  </td>  
            <td>{{ $user->email }} </td>

              <td><a href="{{ URL::to('profile-edit/'.$user->id) }}"<span class="glyphicon glyphicon-user" title="Edit Profile"></span>Edit Profile</a></td>  
          </tr>  
     
        </tbody>  
      </table> 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
