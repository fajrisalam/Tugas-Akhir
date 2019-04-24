<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataKelahiran;
use Illuminate\Support\Facades\Crypt;

class LahirController extends Controller
{
    public function index(){
        $data['data'] = Crypt::encryptString('Hello world.');
    	return view('lahir.index', $data);
    }
    public function daftarLahir(){
    	return view('lahir.form-lahir');
    }
    public function daftarRS(){
    	return view('lahir.form-rs');
    }
    public function monitoringLahir(){
    	return view('lahir.monitoring-lahir');
    }
    public function bantuanLahir(){
    	return view('lahir.bantuan-lahir');
    }
    public function inputLahir(){
    	
    	DataKelahiran::create([
    		'REG_TX_LHR' =>3,
	    	'NO_KET_RSPUS' => request('no_rs'),
	    	'IFLAG' => 1,
	    	'NIP_VERIF_KEL' => 0,
	    	'NIP_VERIF_DUKCAPIL_1' => 0,
	    	'NIP_VERIF_DUKCAPIL_2' => 0,
	    	'KET_ALASAN' => 0
		]);

    	return redirect('/');
    }
}
