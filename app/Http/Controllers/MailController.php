<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Subscriber;
use App\Template;
use App\Mail\MailClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * @param Request $request
     */
    public function send(Request $request){
        $name = $request->name;
        $id = $request->id;
        $bunch_id = Campaign::find($id)->bunch_id;
        $template_id = Campaign::find($id)->template_id;
        $campaign = Subscriber::all()->where('bunch_id',$bunch_id);
        $msg = Template::find( $template_id)->content;

        Mail::to($campaign)->send(new MailClass($name, $msg));
        return redirect()->route('campaign.index');
    }
}
