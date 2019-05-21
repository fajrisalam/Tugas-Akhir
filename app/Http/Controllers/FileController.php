<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data['active'] = 2;
        if(!Auth::check()) return route('login'); 
        else return view('testing/testo', $data);
    }
    public function formUpload(){
        $data['active'] = 3;
        if(!Auth::check()) return route('login'); 
        else return view('file/form', $data);
    }

    public function upload(Request $request){
        $this->validate($request, [
            'title' => 'nullable|max:100',
            'file' => 'required|file|max:2048', // max 2MB
        ]);
        $key = env('APP_KEY');
        $user = Auth::user()->id;
        

        $files = $request->file('file');        
        $id = File::all()->last()->id +1;
        $filename = $id.'.dat';

        $fileContent = $files->get();

        //encryptnya mamank
        $start = microtime(true)*1000;
        //aes
        $encryptedContent = encrypt($fileContent);
        Storage::put($filename, $encryptedContent);
        $time = microtime(true)*1000 - $start;

        // $path = $files->store('/');
        $fileOri = $files->getClientOriginalName();
        $ext = \File::extension($fileOri);
        $path = 'app/'.$filename;

        $title = $request->title ?? $files->getClientOriginalName();
        

        $file = File::create([
            'user_id' => $user,
            'filename' => $title,
            'format' => $ext,
            'path' => $path,
            'duration' => $time
        ]);
        // dd($file);
        return redirect()
            ->back()
            ->withSuccess(sprintf('File %s has been uploaded.', $title));      
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
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
