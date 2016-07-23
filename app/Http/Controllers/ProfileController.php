<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileEditRequest;

use App\Http\Requests;
use App\Profile;
use Auth;


class ProfileController extends Controller
{


 public function profile() {
 	    
         $user = Auth::user();
         $userId = $user->id;

         $profile = Profile::where( 'user_id', '=', $userId )->first();
          
 
         return view('profile')->with('user', $user)->with('profile', $profile);
    
 }



    public function getProfileEdit() {
       
          $user = Auth::user();
          
          $userId = $user->id;

         $profile = Profile::where( 'user_id', '=', $userId )->first();


        return view('profile-edit')->with('user', $user)->with('profile', $profile);
    }


   public function postProfileEdit(ProfileEditRequest $request) {


     $user = Auth::user();

     $userId = $user->id;

    
     $user->name = $request->get('name');
    
     $user->email = $request->get('email');
    
     $user->password = $request->get('password');

     $user->save();


    $profile = Profile::where( 'user_id', '=', $userId )->first();

     $profile->name = $request->get('profile');

     $profile->telephone = $request->get('telephone');

     $profile->save();


     return \Redirect::route('profile')->with('message', 'Profile Updated');


   }





}
