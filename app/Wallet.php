<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    
public function bank()
{
return $this->belongsTo('App\Bank');
}

public function payments()
{

return $this->hasMany('App\Payment');

}





}
