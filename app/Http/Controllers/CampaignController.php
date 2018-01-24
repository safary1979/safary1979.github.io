<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Http\Requests\CampaignRequest;
use App\Subscriber;
use App\Template;
use Illuminate\Http\Request;
use App\Bunch;
use Illuminate\Support\Facades\Auth;


class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Campaign $campaign)
    {
        $campaigns = $campaign->owned()->orderBy('id','asc')->get();
//        dump($campaigns);
        return view('campaign.index',compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
//        $this->id;

//        dump($data);

//        dump(Campaign::owned()->get());
//        dump(Bunch::owned()->where('id',2)->get());

        return view('campaign.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Campaign $campaign, CampaignRequest $request)
    {
//        dump($request->all());
        $campaign ->create($request->all());
//        dump($request->all('bunch'));
//        dump($campaign);
        return redirect()->route('campaign.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Campaign $campaign)
    {
        if (Auth::user()->id == $campaign->created_by){
            return view('campaign.show', compact('campaign'));
        }
        return redirect()->back()->with(['message'=>'You don\'t have permission']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Campaign $campaign)
    {
        if (Auth::user()->id == $campaign->created_by){
            return view('campaign.edit', compact('campaign'));
        }
        return redirect()->back()->with(['message'=>'You don\'t have permission']);
//        return view('campaign.edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Campaign $campaign, CampaignRequest $request)
    {

//        dump($request->all());
//        dump($var0=$request->all('template'));

//        dump($var1=$request->all('template_id'));
//        dump( $var2 = Bunch::find($var1));
//        $campaign->update($request->all('id'));
//        dump($campaign);
        $campaign->update($request->all());
        return redirect()->route('campaign.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect()->route('campaign.index');
    }

    public function preview( Campaign $campaign,$id)
    {
//        dump($campaign);
//        $campaigns = $campaign->orderBy('id','asc')->get();
        $campaigns = Campaign::find( $id);
//        $campaigns = $campaign->orderBy('bunch_id','asc')->get();
//        dump($id);
        $bunch_id = $campaigns->bunch_id;
        $template_id = $campaigns->template_id;
//        $temp = $campaign->all('bunch_id');
//        $idd = $temp['bunch_id'];
//        dump($idd);

      $campaign = Subscriber::all()->where('bunch_id',$bunch_id);
//        dump($message = Template::all()->where('id',$template_id));
//        dump($campaign);
        $message = Template::find( $template_id);

//        dump($message->content);





//        dump($campaigns[4]->bunch_id);
//        dump(Bunch::latest()->owned()->get()->count());

        return view('campaign.preview', compact('campaign','campaigns','message'));
    }
}
