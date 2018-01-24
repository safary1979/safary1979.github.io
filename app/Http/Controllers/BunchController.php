<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\BunchRequest;


use App\Bunch;
use App\Subscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BunchController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Bunch $bunch)
    {
        $bunches = $bunch->owned()->orderBy('id','asc')->get();

        return view('bunch.index',compact('bunches','sub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;

        return view('bunch.create', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Bunch $bunch, BunchRequest $request)
    {
        $bunch->create($request->all());
        return redirect()->route('bunch.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bunch $bunch)
    {
        return view('bunch.show', compact('bunch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bunch $bunch)
    {
        if (Auth::user()->id == $bunch->created_by){
            return view('bunch.edit', compact('bunch'));
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
    public function update(Bunch $bunch, BunchRequest $request)
    {
        $bunch->update($request->all());
        return redirect()->route('bunch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bunch $bunch)
    {
        $bunch->delete();
        return redirect()->route('bunch.index');
    }




}
