<?php

namespace App\Http\Controllers;

use App\Template;
use Illuminate\Http\Request;
use App\Http\Requests\TemplateRequest;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Template $template)
    {
        $templates = $template->owned()->orderBy('id','asc')->get();
        return view('template.index',compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        return view('template.create', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Template $template, TemplateRequest $request)
    {
        $template ->create($request->all());
        return redirect()->route('template.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        if (Auth::user()->id == $template->created_by){
            return view('template.show', compact('template'));
        }
        return redirect()->back()->with(['message'=>'You don\'t have permission']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        if (Auth::user()->id == $template->created_by){
            return view('template.edit', compact('template'));
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
    public function update(Template $template, TemplateRequest $request)
    {
        $template->update($request->all());
        return redirect()->route('template.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        $template->delete();
        return redirect()->route('template.index');
    }
}
