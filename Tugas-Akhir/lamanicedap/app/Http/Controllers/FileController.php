<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use Config;
// use Illuminate\Encryption\Encrypter;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::orderBy('created_at', 'ASC')
            ->paginate(30);
        $cipher = "AES-256-CBC";
        // openssl_decrypt($secret, $cipher, $key);
        foreach($files as $f){
            config(['app.key' => $f->key]);
            $f->title = Crypt::decryptString($f->title);
            $f->user_id = Crypt::decryptString($f->user_id);
            $f->path = Crypt::decryptString($f->path);
        }
            // dd($files);
        // echo config('app.key')."<br>";
        // config(['app.key' => $files[0]->key]);
        // echo config('app.key')."<br>";
        // echo env('APP_KEY');
        // dd($key); 
        // return;
        $c = 1;
        return view('file.index', compact('files', 'c'));
    }
    public function form(){
        return view('file.form');
    }

    public function upload(Request $request){
        $this->validate($request, [
            'title' => 'nullable|max:100',
            'file' => 'required|file|max:2000', // max 2MB
        ]);
        $key = env('APP_KEY');

        // tampung berkas yang sudah diunggah ke variabel baru
        // 'file' merupakan nama input yang ada pada form
        $uploadedFile = $request->file('file');        

        // simpan berkas yang diunggah ke sub-direktori 'public/files'
        // direktori 'files' otomatis akan dibuat jika belum ada
        $path = $uploadedFile->store('public/files');

        // enkripsi AES
        $title = Crypt::encryptString($request->title ?? $uploadedFile->getClientOriginalName());
        $path = Crypt::encryptString($path);
        $user = Crypt::encryptString('1');

        $file = File::create([
            'user_id' => $user,
            'title' => $title,
            'path' => $path,
            'key' => $key,
            'method' => 1
        ]);
        return redirect()
            ->back()
            ->withSuccess(sprintf('File %s has been uploaded.', Crypt::decryptString($file->title)));      
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function coba(){
        $files = File::orderBy('created_at', 'ASC')
            ->paginate(30);
        foreach($files as $f){
            
            $f->title = Crypt::decryptString($f->title);
            // $f->user_id = Crypt::decryptString($f->user_id);
            // $f->path = Crypt::decryptString($f->path);
            $newEncrypter = new \Illuminate\Encryption\Encrypter( $f->key, Config::get('app.cipher'));
            // $encrypted = $newEncrypter->encrypt( $plainTextToEncrypt );
            $f->titlee = $newEncrypter->decrypt( $f->title );
        }
        dd($files);
        
    }
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
