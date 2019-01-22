<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class files extends Model
{
    protected $fillable = [
        'register_id','akta_kelahiran', 'ijazah', 'skhun', 'kartu_keluarga', 'ktp_ortu', 'surat_kelakuan_baik'
    ];

    public function get_register()
    {
        return $this->belongsTo('App\registration', 'register_id', 'id');
    }
}
