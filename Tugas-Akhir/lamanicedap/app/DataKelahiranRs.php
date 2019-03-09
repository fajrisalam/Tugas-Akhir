<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKelahiranRs extends Model
{
    protected $table = 'data_kelahiran_rs';
    public $timestamps = false;
    protected $fillable = ['no_ket_rs', 
    	'kode_rs', 
    	'lhr_dri_luar', 
    	'nama_dokter', 
    	'nik_ayah_lhr', 
    	'nik_ibu_lhr',
    	'nama_anak',
    	'jenis_kel_anak',
    	'tgl_lhr_anak',
    	'jam_lhr_anak',
    	'berat_anak',
    	'panjang_anak',
    	'tgl_isi_rs',
    	'ket_lhr_dri_luar'
    ];    	

}
