<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   

    
public function bank()
{
return $this->belongsTo('App\Bank');
}


public function wallet()
{
return $this->belongsTo('App\Wallet');
}




}
