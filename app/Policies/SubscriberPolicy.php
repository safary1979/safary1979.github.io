<?php

namespace App\Policies;

use App\Bunch;
use App\Subscriber;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class SubscriberPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

//    public function editt(Bunch $bunch){
//        dump($bunch);
////        dump($subscriber->id);
//
//        if (Auth::user()->id == 2){
//            return TRUE;
//        }
//        return FALSE;
//    }

//    public function edit($user,$subscriber_id)
//    {
//        dump($user->id);
//        dump($subscriber_id);
//
//        if (Auth::user()->id == 1){
//            return TRUE;
//        }
//        return FALSE;
//    }

}
