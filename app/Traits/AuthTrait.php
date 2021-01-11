<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

 /**
 *  @throws \Exception
 **/
trait AuthTrait{

    public function userAuthCheck(){
        if(!Auth::User()){
            throw new \Exception('You should be logged in to use this  this repository');
        }
    }

}

?>
