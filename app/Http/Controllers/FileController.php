<?php

namespace App\Http\Controllers;

use App\File;
use App\Log;
use App\User;
use App\sharing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use finfo;
use Illuminate\Encryption\Encrypter;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(!Auth::check()) return redirect(route('login')); 

        $user = Auth::user()->id;

        $data['files'] = DB::table('files')->where('id_user', $user)->where('delete', 0)->get();
        $data['share'] = sharing::where('id_shared', $user)->get();

        $data['c'] = 1; $data['d'] = 1;
        $data['active'] = 2;
        
        return view('file.myfiles', $data);
    }
    public function formUpload(){
        $data['active'] = 3;
        if(!Auth::check()) return redirect(route('login'));
        else return view('file.form', $data);
    }

    public function upload(Request $request){
        $this->validate($request, [
            'file' => 'required|file|max:2048', // max 2MB
        ]);
        $key = env('APP_KEY');
        $user = Auth::user()->id;
        

        $files = $request->file('file');
        $size = $request->file('file')->getSize();

        $id = File::all()->last()->id +1;
        $filename = $id.'.dat';

        $fileContent = $files->get();

        //encryptnya mamank
        $start = microtime(true)*1000;
        $enc = new Encrypter('12345678901234567890123456789876', 'AES-256-CBC');
        //aes
        $encryptedContent = $enc->encrypt($fileContent);
        Storage::put($filename, $encryptedContent);
        $time = microtime(true)*1000 - $start;

        // $path = $files->store('/');
        $fileOri = $files->getClientOriginalName();
        $ext = $files->getClientMimeType();
        $path = '/';

        $title = $files->getClientOriginalName();
        
        $checksum = 'sha256sum.exe ../storage/app'.$path.$filename;
        $process = new Process($checksum);
        $process->run();
        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $sha = explode(" ",$process->getOutput())[0];
        
        $file = File::create([
            'id_user' => $user,
            'filename' => $title,
            'stored' => $filename,
            'format' => $ext,
            'size' => $size,
            'path' => $path,
            'duration' => $time,
            'sha' => $sha,
            'key' => $key,
            'privasi' => 0,
            'modif' => 0,
            'delete' => 0
        ]);

        $log = Log::create([
            'user_id' => $user,
            'file_id' => $id,
            'duration' => $time,
            'execution' => 1,
        ]);

        return redirect()
            ->back()
            ->withSuccess(sprintf('File %s has been uploaded.', $title));      
    }

    public function Download($id){
        $file = File::find($id);
        if($file->delete)
            return redirect('myfile')->withSuccess('File telah dihapus');


        $checksum = 'sha256sum.exe ../storage/app'.$file->path.$file->stored;
        $process = new Process($checksum);
        $process->run();
        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $sha = explode(" ",$process->getOutput())[0];

        //Jika sha tidak sama (ada perubahan data)
        if($file->sha != $sha){
            $file->modif = 1;
            $file->save();

            return redirect()
                ->back()
                ->withSuccess(sprintf('File telah dimodifikasi.'));
        }

        $encryptedContent = Storage::get($file->stored);
        //aes
        $start = microtime(true)*1000;
        $enc = new Encrypter('12345678901234567890123456789876', 'AES-256-CBC');
        $decryptedContent = $enc->decrypt($encryptedContent);
        $time = microtime(true)*1000 - $start;

        $log = Log::create([
            'user_id' => Auth::user()->id,
            'file_id' => $id,
            'duration' => $time,
            'execution' => 2
        ]);

        // return Storage::download($decryptedContent);
        return response()->make($decryptedContent, 200, array(
            'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($decryptedContent),
            'Content-Disposition' => 'attachment; filename="' . pathinfo($file->filename, PATHINFO_BASENAME) . '"'
        ));
    }


    public function delete(File $id){
        $file = $id;
        $file->delete = 1;
        $file->save();

        $log = Log::create([
                'user_id' => Auth::user()->id,
                'file_id' => $file->id,
                'duration' => 0,
                'execution' => 3
            ]);
        return redirect()->back()->withSuccess(sprintf('Berhasil menghapus file %s.', $file->filename));
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
