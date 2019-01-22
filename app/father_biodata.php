<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class father_biodata extends Model
{
    protected $fillable = [
        'id_anak', 'nama_ayah', 'tahun_ayah_lahir', 'pendidikan_ayah', 'pekerjaan_ayah', 'penghasilan_bulanan_ayah', 'kebutuhan_khusus_ayah',
    ];

    public function get_biodata()
    {
        return $this->belongsTo('App\biodata', 'id_anak', 'id');
    }
}
