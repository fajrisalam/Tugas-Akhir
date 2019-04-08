<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKelahiran extends Model
{
    public $table = 'data_kelahiran';
    protected $fillable = array (
    	'REG_TX_LHR',
    	'NO_KET_RSPUS',
    	'TGL_UBAH_TRKHR',
    	'IFLAG',
    	'NIP_VERIF_KEL',
    	'NIP_VERIF_DUKCAPIL_1',
    	'NIP_VERIF_DUKCAPIL_2',
    	'KET_ALASAN'
    );
    //
    public $timestamps = false;
}
