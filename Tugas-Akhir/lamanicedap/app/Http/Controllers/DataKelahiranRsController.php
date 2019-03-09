<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataKelahiranRs;

use Validator;
use Session;
use Carbon\Carbon;

class DataKelahiranRsController extends Controller
{
    public function addIndex(){
    	return view('daftar_kelahiran.tambahkelahiran');
    }

    public function create(Request $request) {
    	$rules = array(
    		'nik_ayah' => 'required',
    		'nama_ayah' => 'required',
    		'nik_ibu' => 'required',
    		'nama_ibu' => 'required',
    		'ttl' => 'required',
    		'time_lahir' => 'required',
    		'nama_bayi' => 'required',
    		'jenis_kelamin' => 'required',
    		'berat' => 'required',
    		'panjang' => 'required',
    		'nama_dokter' => 'required'
    	);

    	$validator = Validator::make($request->all(), $rules);

    	if ($validator->fails()) {
    		return Redirect::to($request->url())->withError($validator)->withInput();
    	}

    	$lahir = new DataKelahiranRs();
    	$lahir->no_ket_rs = '003';
    	$lahir->kode_rs = '002';
		$lahir->lhr_dri_luar = '001';
		$lahir->nama_dokter = $request->nama_dokter;
		$lahir->nik_ayah_lhr = $request->nik_ayah;
		$lahir->nik_ibu_lhr = $request->nik_ibu;
		$lahir->nama_anak = $request->nama_bayi;
		$lahir->jenis_kel_anak = $request->jenis_kelamin;
		$lahir->tgl_lhr_anak = Carbon::createFromFormat('m/d/Y', $request->ttl)->toDateTimeString();
		$lahir->jam_lhr_anak = Carbon::createFromFormat('h:i A', $request->time_lahir)->toTimeString() ;
		$lahir->berat_anak = $request->berat;
		$lahir->panjang_anak = $request->panjang;
		$lahir->tgl_isi_rs = Carbon::today();
		$lahir->ket_lhr_dri_luar = '001';
		// return dd ($lahir);
		$lahir->save();

		if ($lahir->save()) {
			$request->session()->flash('sukses', 'Data Berhasil Disimpan');
			return redirect($request->url());
		} else {
			$request->session()->flash('gagal', 'Gagal menambahkan data kelahiran');
			return redirect($request->url());
		}
    }
}
