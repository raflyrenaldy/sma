<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\registration;
use App\Provinces;
use App\Regencies;
use App\Districts;
use App\Villages;
class biodata extends Model
{
     protected $primaryKey = 'id';
    protected $fillable = [
        'register_id', 'nama_lengkap', 'jenis_kelamin', 'nisn', 'nik', 'tempat_lahir', 'tanggal_lahir','agama','kebutuhan_khusus','alamat','provinces','regencies','districts','villages','kode_pos','tempat_tinggal','transportasi','nomor_handphone','nomor_telepon','email','nomor_kartu_kesehatan_kis','nomor_kartu_indonesia_pintar','nomor_kartu_pra_sejahtera','nomor_kartu_keluarga_sejahtera','sktm','kewarganegaraan','foto','tinggi_badan','berat_badan','jumlah_saudara_kandung','jarak_tempat_tinggal_ke_sekolah'
    ];

     public function get_register()
    {
        return $this->belongsTo('App\registration', 'register_id', 'id');
    }
    public function get_provinces()
    {
        return $this->belongsTo('App\Provinces', 'provinces', 'id');
    }
    public function get_regencies()
    {
        return $this->belongsTo('App\Regencies', 'regencies', 'id');
    }
    public function get_districts()
    {
        return $this->belongsTo('App\Districts', 'districts', 'id');
    }

    public function get_villages()
    {
        return $this->belongsTo('App\Villages', 'villages', 'id');
    }
}
