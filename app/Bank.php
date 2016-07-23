<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    
public function wallet()
{

return $this->hasOne('App\Wallet');

}


public function payments()
{

return $this->hasMany('App\Payment');

}



}
