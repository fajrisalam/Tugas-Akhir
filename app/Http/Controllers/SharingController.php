<?php

namespace App\Http\Controllers;

use App\sharing;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class SharingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(!Auth::check()) return redirect(route('login')); 

        $data['log'] = sharing::all();
        $data['c'] = 1;
        $data['active'] = 5;

        // dd($data['log'][2]->file[0]);
        return view('share.index', $data);
    }

    public function form(File $id){
        if(!Auth::check()) return redirect(route('login')); 

        return view('share.form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sharing  $sharing
     * @return \Illuminate\Http\Response
     */
    public function show(sharing $sharing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sharing  $sharing
     * @return \Illuminate\Http\Response
     */
    public function edit(sharing $sharing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sharing  $sharing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sharing $sharing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sharing  $sharing
     * @return \Illuminate\Http\Response
     */
    public function destroy(sharing $sharing)
    {
        //
    }
}
