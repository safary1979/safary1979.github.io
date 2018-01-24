<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Bunch;
use App\Http\Requests\BunchRequest;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
//         public function boot(Request $request)
    {
//        DB::listen(function ($query) {
//            dump(  $query->sql);
//        });
//        $path= request()->path();
////        $id = Bunch::$request->id;
//        dump($path);
//        View::share('var',$path);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
