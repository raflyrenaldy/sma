<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mother_biodata extends Model
{
     protected $fillable = [
        'id_anak', 'nama_ibu', 'tahun_ibu_lahir', 'pendidikan_ibu', 'pekerjaan_ibu', 'penghasilan_bulanan_ibu', 'kebutuhan_khusus_ibu',
    ];

    public function get_biodata()
    {
        return $this->belongsTo('App\biodata', 'id_anak', 'id');
    }
}
