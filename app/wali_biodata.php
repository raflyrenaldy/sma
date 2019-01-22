<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wali_biodata extends Model
{
    protected $fillable = [
        'id_anak', 'nama_wali', 'tahun_wali_lahir', 'pendidikan_wali', 'pekerjaan_wali', 'penghasilan_bulanan_wali', 'kebutuhan_khusus_wali',
    ];

     public function get_biodata()
    {
        return $this->belongsTo('App\biodata', 'id_anak', 'id');
    }

}
