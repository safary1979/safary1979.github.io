<?php

namespace App\Http\Controllers;

use App\Bunch;
use App\Http\Requests\SubscriberRequest;
use App\Subscriber;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\BunchRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Subscriber $subscriber, $id)
    {
        $bunch = Bunch::find($id);
        if (Auth::user()->id == $bunch->created_by){
            $subscribers= Subscriber::where('bunch_id',$id)->owned()->get();
            return view('subscriber.index',compact('subscribers','id', 'bunch'));
        }
        return redirect()->back()->with(['message'=>'You don\'t have permission']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->id;

        return view('subscriber.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Subscriber $subscriber, SubscriberRequest $request)
    {
        $subscriber->create($request->all());
        $temp = $request->all('bunch_id');
        $id = $temp['bunch_id'];
        return redirect() ->action( "SubscriberController@index", ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit( $bunch_id , $subscriber_id)
    {
        $subscriber_createdBy = Subscriber::find($subscriber_id)->created_by;
        $bunch_createdBy = Bunch::find($bunch_id)->created_by;
//        if(Gate::denies('edit-sub', $subscriber_createdBy)){}
        if ( Auth::user()->id == $bunch_createdBy && Auth::user()->id == $subscriber_createdBy){
            $subscriber = Subscriber::find($subscriber_id);
            return view('subscriber.edit', compact('bunch_id', 'subscriber_id','subscriber'));
        }
        return redirect()->back()->with(['message'=>'You don\'t have permission']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($bunch_id , $subscriber_id, SubscriberRequest $request)    {


        $update = Subscriber::find($subscriber_id);

        $update->update($request->all());

        return redirect()->route('subscriber.index',[$bunch_id]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bunch_id , $subscriber_id)
    {
        Subscriber::find($subscriber_id)->delete();

        return redirect()->route('subscriber.index',[$bunch_id]);
    }
}
