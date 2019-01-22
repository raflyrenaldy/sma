<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registration extends Model
{
    protected $fillable = [
        'id_student','jalur_pendaftaran', 'pilihan_satu', 'pilihan_dua', 'nomer_pendaftaran', 'nama_asal_sekolah', 'alamat_asal_sekolah', 'nomor_ujian_nasional_sebelumnya','nomo_seri_skhun_sebelumnya','nomor_seri_ijazah_sebelumnya','prestasi_yang_pernah_diraih','hobi','cita_cita','status','note',
    ];
    public function get_student()
    {
        return $this->belongsTo('App\student', 'id_student', 'id');
    }
}
