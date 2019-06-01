<?php

namespace App\Http\Controllers;

use App\sharing;
use App\File;
use App\User;
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

        // dd($data['log']);
        return view('share.index', $data);
    }

    public function form(File $id){
        if(!Auth::check()) return redirect(route('login')); 
        $data['active'] = 2;
        $data['file'] = $id;

        return view('share.form', $data);
    }

    public function update_share(Request $request){
        if(!Auth::check()) return redirect(route('login')); 
        $data['request'] = $request;
        $data['active'] = 2;
        $files = File::find($request->file);

        if($request->privasi){
            $file = File::find($request->file);
            $file->privasi = 1;
            $file->save();
        } else{
            $file = File::find($request->file);
            $file->privasi = 0;
            $file->save();
        }

        if($request->email){
            $user = User::where('email', $request->email)->first();

            if($user){
                if($user->id == Auth::user()->id){
                    return redirect()
                        ->back()
                        ->withSuccess(sprintf('Itu akun anda :)'));
                }

                $exist = sharing::where('id_owner', Auth::user()->id)
                                ->where('id_file', $request->file)
                                ->where('id_shared', $user->id)
                                ->exists();
                if($exist){
                    return redirect()
                        ->back()
                        ->withSuccess(sprintf('File %s telah dibagikan kepada %s.', $files->filename, $request->email));
                }
                else{
                    $share = sharing::create([
                            'id_owner' => Auth::user()->id,
                            'id_file' => $request->file,
                            'id_shared' => $user->id
                        ]);
                }
                return redirect()->route('myfile')->withSuccess(sprintf('Berhasil membagikan file kepada %s.', $request->email));
            }
            else{
                return redirect()
                    ->back()
                    ->withSuccess(sprintf('%s tidak terdaftar pada sistem.', $request->email));
            }

        }
        
        return redirect()->route('myfile');
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
