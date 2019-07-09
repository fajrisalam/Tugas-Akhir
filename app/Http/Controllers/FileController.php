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
        
        // $calonKey = Auth::user()->id.Auth::user()->name.Auth::user()->email.Auth::user()->created_at.Auth::user()->updated_at;
        // $ckey = sha1($calonKey);
        // $key = substr($ckey, 0, 32);
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
        //user
        $user = Auth::user()->id;

        //file
        $files = $request->file('file');
        $size = $request->file('file')->getSize();
        $lastFile = File::all()->last();
        if(!$lastFile) $id = 1;
        else $id = $lastFile->id + 1;
        // $id = File::all()->last()->id +1;
        $filename = $id.'.dat';
        $fileContent = $files->get();
        $title = $files->getClientOriginalName();

        //generate key
        $calonKey = Auth::user()->id.Auth::user()->name.Auth::user()->email.Auth::user()->created_at.Auth::user()->updated_at;
        $ckey = sha1($calonKey);
        $key = substr($ckey, 0, 32);

        //encrypt AES
        $start = microtime(true)*1000;
        $enc = new Encrypter($key, 'AES-256-CBC');
        $encryptedContent = $enc->encrypt($fileContent);

        //store encrypted
        Storage::put($filename, $encryptedContent);
        $time = microtime(true)*1000 - $start;
        // $path = $files->store('/');
        $fileOri = $files->getClientOriginalName();
        $ext = $files->getClientMimeType();
        $path = '/';

        // generate checksum / sha256
        $checksum = 'sha256sum ../storage/app'.$path.$filename;
        $process = new Process($checksum);
        $process->run();
            // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $sha = explode(" ",$process->getOutput())[0];

        // transfer ke server backup
        $scp = 'scp /var/www/html/Tugas-Akhir/storage/app/'.$filename.' root@128.199.64.128:/var/www/html/backup/'.$filename;
        $transfer = new Process($scp);
        $transfer->run();
        if (!$transfer->isSuccessful()) {
            throw new ProcessFailedException($transfer);
        }
        
        // insert db
        $file = File::create([
            'id_user' => $user,
            'filename' => $title,
            'stored' => $filename,
            'format' => $ext,
            'size' => $size,
            'path' => $path,
            'duration' => $time,
            'sha' => $sha,
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


        $checksum = 'sha256sum ../storage/app'.$file->path.$file->stored;
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
        // ambil encrypted file
        $encryptedContent = Storage::get($file->stored);
        //generate key
        $owner = User::find($file->id_user);
        $calonKey = $owner->id.$owner->name.$owner->email.$owner->created_at.$owner->updated_at;
        $ckey = sha1($calonKey);
        $key = substr($ckey, 0, 32);

        //aes
        $start = microtime(true)*1000;
        $enc = new Encrypter($key, 'AES-256-CBC');
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
