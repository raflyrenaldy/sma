<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\registration;
use App\biodata;
use App\father_biodata;
use App\mother_biodata;
use App\wali;
use App\Provinces;
use App\Regencies;
use App\Districts;
use App\Villages;
use App\files;
use Validator;
use Response;
use Alert;
use File;
use DB;
use Carbon\Carbon;
class adminppdbController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public static function ubah($tgl) {
    $dt = new  \Carbon\Carbon($tgl);
    setlocale(LC_TIME, 'IND');
        
    return $dt->formatLocalized('%A, %e %B %Y'); // Senin, 3 September 2018 00:00:00
    } 

    public function index(request $request)
    {
          $query = $request->get('nomer_pendaftaran');
          if($query == null)
          {
            $data = biodata::with('get_register','get_provinces','get_regencies','get_districts','get_villages')
        ->join('father_biodatas', 'father_biodatas.id_anak', '=', 'biodatas.id')
        ->join('mother_biodatas', 'mother_biodatas.id_anak', '=', 'biodatas.id')
        ->join('wali_biodatas','wali_biodatas.id_anak','=','biodatas.id')
        ->select('biodatas.*','biodatas.id AS biodata_id','mother_biodatas.*','mother_biodatas.id AS mother_id','father_biodatas.*','father_biodatas.id AS father_id','wali_biodatas.*','wali_biodatas.id AS wali_id')
        ->orderBy('biodatas.id','asc')
        ->paginate(1);
    }else{
          $data = biodata::with('get_register','get_provinces','get_regencies','get_districts','get_villages')
        ->join('father_biodatas', 'father_biodatas.id_anak', '=', 'biodatas.id')
        ->join('mother_biodatas', 'mother_biodatas.id_anak', '=', 'biodatas.id')
        ->join('wali_biodatas','wali_biodatas.id_anak','=','biodatas.id')
        ->select('biodatas.*','biodatas.id AS biodata_id','mother_biodatas.*','mother_biodatas.id AS mother_id','father_biodatas.*','father_biodatas.id AS father_id','wali_biodatas.*','wali_biodatas.id AS wali_id')
        ->orderBy('biodatas.id','asc')
         ->whereHas('get_register', function($q) use($query) {
       // Query the name field in status table
       $q->where('nomer_pendaftaran', '=', $query); // '=' is optional
})
        ->paginate(1);

        $files = files::with('get_register')->whereHas('get_register', function($q) use($query) {
            // Query the name field in status table
            $q->where('nomer_pendaftaran', '=', $query); // '=' is optional
     })
             ->first();
    }

    	
    	return view('admin.ppdb',compact('data','files'));
    }

    public function filter(request $request)
    {
         // dd($request->all());
       
        if($request->get('status') != null){

            if($request->get('to') != null){
                $status = $request->get('status');
        $dateto = \Carbon\Carbon::parse($request->get('to'));
        $datefrom = \Carbon\Carbon::parse($request->get('from'));
        $to = $dateto->format('Y-m-d');
        $from = $datefrom->format('Y-m-d');
        if($to == $from){
            $to = $dateto->format('d');
            // dd($to);
            $data = biodata::with('get_register','get_provinces','get_regencies','get_districts','get_villages')
        ->join('father_biodatas', 'father_biodatas.id_anak', '=', 'biodatas.id')
        ->join('mother_biodatas', 'mother_biodatas.id_anak', '=', 'biodatas.id')
        ->join('wali_biodatas','wali_biodatas.id_anak','=','biodatas.id')
        ->select('biodatas.*','biodatas.id AS biodata_id','mother_biodatas.*','mother_biodatas.id AS mother_id','father_biodatas.*','father_biodatas.id AS father_id','wali_biodatas.*','wali_biodatas.id AS wali_id')
        ->orderBy('biodatas.id','asc')
        ->whereHas('get_register', function ($query) use($to,$from,$status){
                                  $query->where('status','=',$status )
                                  ->whereDay('created_at',$to);
                                })
        ->get();
        if($status == 0){
            $status = 'Proses';
        }else if($status == 1){
            $status = 'Diterima';
        }else if($status == 3){
            $status = 'Reupload Berkas';
        }else if($status == 4){
            $status = 'Uploaded Berkas';
        }
         return view('admin.umum',compact('data'))->with('both','Filter status menurut ' .$status .' dan waktu berdasarkan tanggal ' .$to .' telah diterapkan.');
        }else{
            $data = biodata::with('get_register','get_provinces','get_regencies','get_districts','get_villages')
            ->join('father_biodatas', 'father_biodatas.id_anak', '=', 'biodatas.id')
            ->join('mother_biodatas', 'mother_biodatas.id_anak', '=', 'biodatas.id')
            ->join('wali_biodatas','wali_biodatas.id_anak','=','biodatas.id')
            ->select('biodatas.*','biodatas.id AS biodata_id','mother_biodatas.*','mother_biodatas.id AS mother_id','father_biodatas.*','father_biodatas.id AS father_id','wali_biodatas.*','wali_biodatas.id AS wali_id')
            ->orderBy('biodatas.id','asc')
            ->whereHas('get_register', function ($query) use ($status,$to,$from){
                                      $query->where('status','=',$status )
                                      ->where([
                                        ['created_at','>=',$to],
                                        ['created_at','<=',$from]
                                      ]);
                                    })
            ->get();
            if($status == 0){
            $status = 'Proses';
        }else if($status == 1){
            $status = 'Diterima';
        }else if($status == 3){
            $status = 'Reupload Berkas';
        }else if($status == 4){
            $status = 'Uploaded Berkas';
        }
             return view('admin.umum',compact('data'))->with('both','Filter status menurut ' .$status .' dan waktu dari tanggal ' .$to .' sampai ' .$from .' telah diterapkan.');
         }
       
            }else{
                $status = $request->get('status');
                $data = biodata::with('get_register','get_provinces','get_regencies','get_districts','get_villages')
        ->join('father_biodatas', 'father_biodatas.id_anak', '=', 'biodatas.id')
        ->join('mother_biodatas', 'mother_biodatas.id_anak', '=', 'biodatas.id')
        ->join('wali_biodatas','wali_biodatas.id_anak','=','biodatas.id')
        ->select('biodatas.*','biodatas.id AS biodata_id','mother_biodatas.*','mother_biodatas.id AS mother_id','father_biodatas.*','father_biodatas.id AS father_id','wali_biodatas.*','wali_biodatas.id AS wali_id')
        ->orderBy('biodatas.id','asc')
        ->whereHas('get_register', function ($query) use ($status){
                                  $query->where('status','=',$status );
                                })
        ->get();
        if($status == 0){
            $status = 'Proses';
        }else if($status == 1){
            $status = 'Diterima';
        }else if($status == 3){
            $status = 'Reupload Berkas';
        }else if($status == 4){
            $status = 'Uploaded Berkas';
        }
        // dd($status);
        return view('admin.umum',compact('data'))->with('status','Filter status menurut ' .$status .' telah diterapkan.');

            }
        }else if($request->get('to') != null){
            $dateto = \Carbon\Carbon::parse($request->get('to'));
        $datefrom = \Carbon\Carbon::parse($request->get('from'));
        $to = $dateto->format('Y-m-d');
        $from = $datefrom->format('Y-m-d');
        if($to == $from){
            $to = $dateto->format('d');
            // dd($to);
            $data = biodata::with('get_register','get_provinces','get_regencies','get_districts','get_villages')
        ->join('father_biodatas', 'father_biodatas.id_anak', '=', 'biodatas.id')
        ->join('mother_biodatas', 'mother_biodatas.id_anak', '=', 'biodatas.id')
        ->join('wali_biodatas','wali_biodatas.id_anak','=','biodatas.id')
        ->select('biodatas.*','biodatas.id AS biodata_id','mother_biodatas.*','mother_biodatas.id AS mother_id','father_biodatas.*','father_biodatas.id AS father_id','wali_biodatas.*','wali_biodatas.id AS wali_id')
        ->orderBy('biodatas.id','asc')
        ->whereHas('get_register', function ($query) use($to,$from){
                                  $query->whereDay('created_at',$to);
                                })
        ->get();
         return view('admin.umum',compact('data'))->with('time','Filter waktu untuk tanggal ' .$to .' telah diterapkan.');
        }else{
           $data = biodata::with('get_register','get_provinces','get_regencies','get_districts','get_villages')
        ->join('father_biodatas', 'father_biodatas.id_anak', '=', 'biodatas.id')
        ->join('mother_biodatas', 'mother_biodatas.id_anak', '=', 'biodatas.id')
        ->join('wali_biodatas','wali_biodatas.id_anak','=','biodatas.id')
        ->select('biodatas.*','biodatas.id AS biodata_id','mother_biodatas.*','mother_biodatas.id AS mother_id','father_biodatas.*','father_biodatas.id AS father_id','wali_biodatas.*','wali_biodatas.id AS wali_id')
        ->orderBy('biodatas.id','asc')
        ->whereHas('get_register', function ($query) use($to,$from){
                                  $query->where([
                                    ['created_at','>=',$to],
                                    ['created_at','<=',$from]
                                  ]);
                                })
        ->get(); 
        }
        
        return view('admin.umum',compact('data'))->with('time','Filter waktu dari ' .$to .'sampai ' .$from .' telah diterapkan.');
        }else if($request->get('to') == null && $request->get('status') == null){
            return redirect()->action('adminppdbController@indexumum');
        }
        // dd($data);
    }
    public function indexumum()
    {
        $data = biodata::with('get_register','get_provinces','get_regencies','get_districts','get_villages')
        ->join('father_biodatas', 'father_biodatas.id_anak', '=', 'biodatas.id')
        ->join('mother_biodatas', 'mother_biodatas.id_anak', '=', 'biodatas.id')
        ->join('wali_biodatas','wali_biodatas.id_anak','=','biodatas.id')
        ->select('biodatas.*','biodatas.id AS biodata_id','mother_biodatas.*','mother_biodatas.id AS mother_id','father_biodatas.*','father_biodatas.id AS father_id','wali_biodatas.*','wali_biodatas.id AS wali_id')
        ->orderBy('biodatas.id','asc')
        ->whereHas('get_register', function ($query){
                                  $query->whereNotIn('status',['1','2'] )->whereYear('created_at',date('Y'));
                                })
        ->get();

        return view('admin.umum',compact('data'));
    }

    public function diterima()
    {
        $data = biodata::with('get_register','get_provinces','get_regencies','get_districts','get_villages')
        ->join('father_biodatas', 'father_biodatas.id_anak', '=', 'biodatas.id')
        ->join('mother_biodatas', 'mother_biodatas.id_anak', '=', 'biodatas.id')
        ->join('wali_biodatas','wali_biodatas.id_anak','=','biodatas.id')
        ->select('biodatas.*','biodatas.id AS biodata_id','mother_biodatas.*','mother_biodatas.id AS mother_id','father_biodatas.*','father_biodatas.id AS father_id','wali_biodatas.*','wali_biodatas.id AS wali_id')
        ->orderBy('biodatas.id','asc')
        ->whereHas('get_register', function ($query){
                                  $query->whereIn('status',['1'] );
                                })
        ->get();
        $thn = biodata::join('registrations','registrations.id','=','biodatas.register_id')
        ->select('registrations.created_at as date','registrations.created_at')
            // ->select(DB::raw('registrations.created_at as data'),DB::raw("DATE_FORMAT(registrations.created_at, '%Y') as new_date"))
            
            ->get()
            ->groupBy(function($date) {
        return Carbon::parse($date->date)->format('Y'); // grouping by years
        //return Carbon::parse($date->created_at)->format('m'); // grouping by months
    });
            // ->groupBy('new_date');
           
        return view('admin.diterima',compact('data','thn'));
    }

    public function diterimathn($q)
    {
        $data = biodata::with('get_register','get_provinces','get_regencies','get_districts','get_villages')
        ->join('father_biodatas', 'father_biodatas.id_anak', '=', 'biodatas.id')
        ->join('mother_biodatas', 'mother_biodatas.id_anak', '=', 'biodatas.id')
        ->join('wali_biodatas','wali_biodatas.id_anak','=','biodatas.id')
        ->select('biodatas.*','biodatas.id AS biodata_id','mother_biodatas.*','mother_biodatas.id AS mother_id','father_biodatas.*','father_biodatas.id AS father_id','wali_biodatas.*','wali_biodatas.id AS wali_id')
        ->orderBy('biodatas.id','asc')
        ->whereHas('get_register', function ($query) use ($q){
                                  $query->whereIn('status',['1'] )->whereYear('created_at',$q);
                                })
        ->get();
        $thn = biodata::join('registrations','registrations.id','=','biodatas.register_id')
        ->select('registrations.created_at as date','registrations.created_at')
            // ->select(DB::raw('registrations.created_at as data'),DB::raw("DATE_FORMAT(registrations.created_at, '%Y') as new_date"))
            
            ->get()
            ->groupBy(function($date) {
        return Carbon::parse($date->date)->format('Y'); // grouping by years
        //return Carbon::parse($date->created_at)->format('m'); // grouping by months
    });
            // ->groupBy('new_date');
           
        return view('admin.diterima',compact('data','thn'))->with('thn2','Filter berdasarkan tahun ajaran ' .$q .' telah diterapkan.');
    }

    public function ditolak()
    {
        $data = biodata::with('get_register','get_provinces','get_regencies','get_districts','get_villages')
        ->join('father_biodatas', 'father_biodatas.id_anak', '=', 'biodatas.id')
        ->join('mother_biodatas', 'mother_biodatas.id_anak', '=', 'biodatas.id')
        ->join('wali_biodatas','wali_biodatas.id_anak','=','biodatas.id')
        ->select('biodatas.*','biodatas.id AS biodata_id','mother_biodatas.*','mother_biodatas.id AS mother_id','father_biodatas.*','father_biodatas.id AS father_id','wali_biodatas.*','wali_biodatas.id AS wali_id')
        ->orderBy('biodatas.id','asc')
        ->whereHas('get_register', function ($query){
                                  $query->whereIn('status',['2'] );
                                })
        ->get();

        return view('admin.ditolak',compact('data'));
    }
    public function cari(request $request)
    {
        $query = $request->get('nomer_pendaftaran');
       
        
      

        return view('admin.ppdb',compact('data'));
    }

    public function editregistrasi(request $request)
    {
    	$registrasi = registration::findOrFail($request->id);
    	$registrasi->jalur_pendaftaran = $request->jalur_pendaftaran;
    	$registrasi->pilihan_satu = $request->pilihan_satu;
    	$registrasi->pilihan_dua = $request->pilihan_dua;
    	$registrasi->nama_asal_sekolah = $request->nama_asal_sekolah;
    	$registrasi->alamat_asal_sekolah = $request->alamat_asal_sekolah;
    	$registrasi->nomor_ujian_nasional_sebelumnya = $request->nomor_ujian_nasional_sebelumnya;
    	$registrasi->nomo_seri_skhun_sebelumnya = $request->nomor_seri_skhun_sebelumnya;
    	$registrasi->nomor_seri_ijazah_sebelumnya = $request->nomor_seri_ijazah_sebelumnya;
    	$registrasi->prestasi_yang_pernah_diraih = $request->prestasi_yang_pernah_diraih;
    	$registrasi->save();
         Alert::success('Berhasil Edit Data Registrasi', 'Sukses')->persistent('Ok');
    	return back();
    }

    public function editbiodata(request $request)
    {
        // dd($request->all());
        $biodata = biodata::findOrFail($request->id);
        $biodata->update($request->all());
        Alert::success('Berhasil Edit Data Biodata','Sukses')->persistent('Ok');
        return back();
    }

    public function editfather(request $request)
    {
        $father = father_biodata::findOrFail($request->id);
        $father->update($request->all());
        Alert::success('Berhasil Edit Data Biodata Ayah','Sukses')->persistent('Ok');
        return back();
    }
    public function editmother(request $request)
    {
        $mother = mother_biodata::findOrFail($request->id);
        $mother->update($request->all());
        Alert::success('Berhasil Edit Data Biodata Ibu','Sukses')->persistent('Ok');
        return back();
    }
    public function editwali(request $request)
    {
        $wali = wali_biodata::findOrFail($request->id);
        $wali->update($request->all());
        Alert::success('Berhasil Edit Data Biodata Wali','Sukses')->persistent('Ok');
        return back();
    }

    public function deleteRegistrasi(request $request){
        $post = registration::findOrFail($request->id);
        $biodata = biodata::select('foto')->where('register_id','=',$post->id)->first();
        Storage::deleteDirectory('public/picture/' .$post->nomer_pendaftaran );
        // unlink(storage_path('app\public\picture/').$biodata->foto);
        $post->delete();
        Alert::success('Berhasil Hapus Data','Sukses')->persistent('Ok');
        if($post->status == 1){
            return redirect()->action('adminppdbController@diterima');
        }else if($post->status == 2){
        return redirect()->action('adminppdbController@ditolak');
        }else{
            return redirect()->action('adminppdbController@index');
        }
    }

        public function update(request $request)
        {
            // dd($request->all());
            $registrasi = registration::findOrFail($request->id);
            $registrasi->status = $request->get('status');
            if($request->get('status') == 2){
                 $rules = array(
             'note' => 'required',
            ); 

                 $message = ([
                    'note.required' => 'Alasan Ditolak tidak boleh kosong!',
                ]);
        $validator = Validator::make ( $request->all(), $rules,$message);
         if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }else{
            $registrasi->note = $request->get('note');
        }
            }
            $registrasi->save();
            if($request->get('status') == 1)
            {
                Alert::success('Siswa Diterima','Sukses')->persistent('Ok');
                return back();
            }else{
                Alert::warning('Siswa Tidak Diterima','Sukses')->persistent('Ok');
                return back();
            }
            
            
        }
    
    public function deleteAkta($id)
    {
        // dd($id);
        $file = files::with('get_register')->findOrFail($id);
        $registrasi = registration::findOrFail($file->get_register->id);
        $registrasi->status = 3;
        $registrasi->save();
        unlink(storage_path('app\public\picture/') .$file->get_register->nomer_pendaftaran .'/' .$file->akta_kelahiran);
        $file->akta_kelahiran = "";
        if($file->save()){
            Alert::success('Berhasil Hapus Berkas Akta Siswa','Sukses')->persistent('Ok');
            return back();
        }else{
            Alert::warning('Gagal Hapus Berkas Akta Siswa','Sukses')->persistent('Ok');
            return back();
        }
        
    }

    public function deleteIjazah($id)
    {
        // dd($id);
        $file = files::with('get_register')->findOrFail($id);
        $registrasi = registration::findOrFail($file->get_register->id);
        $registrasi->status = 3;
        $registrasi->save();
        unlink(storage_path('app\public\picture/') .$file->get_register->nomer_pendaftaran .'/' .$file->ijazah);
        $file->ijazah = "";
        if($file->save()){
            Alert::success('Berhasil Hapus Berkas Ijazah Siswa','Sukses')->persistent('Ok');
            return back();
        }else{
            Alert::warning('Gagal Hapus Berkas Ijazah Siswa','Sukses')->persistent('Ok');
            return back();
        }
        
    }

    public function deleteSkhun($id)
    {
        // dd($id);
        $file = files::with('get_register')->findOrFail($id);
        $registrasi = registration::findOrFail($file->get_register->id);
        $registrasi->status = 3;
        $registrasi->save();
        unlink(storage_path('app\public\picture/') .$file->get_register->nomer_pendaftaran .'/' .$file->skhun);
        $file->skhun = "";
        if($file->save()){

            Alert::success('Berhasil Hapus Berkas SKHUN Siswa','Sukses')->persistent('Ok');
            return back();
        }else{
            Alert::warning('Gagal Hapus Berkas SKHUN Siswa','Sukses')->persistent('Ok');
            return back();
        }
        
    }

    public function deleteKK($id)
    {
        // dd($id);
        $file = files::with('get_register')->findOrFail($id);
        $registrasi = registration::findOrFail($file->get_register->id);
        $registrasi->status = 3;
        $registrasi->save();
        unlink(storage_path('app\public\picture/') .$file->get_register->nomer_pendaftaran .'/' .$file->kartu_keluarga);
        $file->kartu_keluarga = "";
        if($file->save()){
            Alert::success('Berhasil Hapus Berkas Kartu Keluarga Siswa','Sukses')->persistent('Ok');
            return back();
        }else{
            Alert::warning('Gagal Hapus Berkas Kartu Keluarga Siswa','Sukses')->persistent('Ok');
            return back();
        }
        
    }

    public function deleteKtp($id)
    {
        // dd($id);
        $file = files::with('get_register')->findOrFail($id);
        $registrasi = registration::findOrFail($file->get_register->id);
        $registrasi->status = 3;
        $registrasi->save();
        unlink(storage_path('app\public\picture/') .$file->get_register->nomer_pendaftaran .'/' .$file->ktp_ortu);
        $file->ktp_ortu = "";
        if($file->save()){
            Alert::success('Berhasil Hapus Berkas KTP Orang Tua Siswa','Sukses')->persistent('Ok');
            return back();
        }else{
            Alert::warning('Gagal Hapus Berkas KTP Orang Tua Siswa','Sukses')->persistent('Ok');
            return back();
        }
        
    }

    public function deleteSkb($id)
    {
        // dd($id);
        $file = files::with('get_register')->findOrFail($id);
        $registrasi = registration::findOrFail($file->get_register->id);
        $registrasi->status = 3;
        $registrasi->save();
        unlink(storage_path('app\public\picture/') .$file->get_register->nomer_pendaftaran .'/' .$file->surat_kelakuan_baik);
        $file->surat_kelakuan_baik = "";
        if($file->save()){
            Alert::success('Berhasil Hapus Berkas Surat Kelakuan Baik Siswa','Sukses')->persistent('Ok');
            return back();
        }else{
            Alert::warning('Gagal Hapus Berkas Surat Kelakuan Baik Siswa','Sukses')->persistent('Ok');
            return back();
        }
        
    }
}
