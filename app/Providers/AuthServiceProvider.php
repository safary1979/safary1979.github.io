<?php

namespace App\Providers;

use App\Policies\SubscriberPolicy;
use App\Subscriber;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Subscriber::class => SubscriberPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()//GateContract $gate
    {
        $this->registerPolicies();

//        $gate->define('edit', function (Subscriber $subscriber){
//            if (Auth::user()->id == $subscriber->created_by) {
//                return TRUE;
//            }
//            return FALSE;
//        });
//
//        Gate::define('edit-sub', function (User $user,$subscriber_createdBy ) { //Subscriber $subscribers
////            dump($subscriber_id);
//            if (Auth::user()->id == $subscriber_createdBy ) {
////                dump($subscriber_id);
////                dump(Auth::user()->id);
//                //$subscribers->created_by
//                return TRUE;
//            }
//            return FALSE;
//        });






    }
}
