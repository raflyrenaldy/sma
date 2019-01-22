<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\biodata;
use App\mother_biodata;
use App\father_biodata;
use App\wali_biodata;
use App\registration;
use App\Provinces;
use App\Regencies;
use App\Districts;
use App\Villages;
use App\files;
use Validator;
use Alert;
use Gate;
use File;
use Auth;
use Carbon\Carbon;
class ppdbController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $provinces = Provinces::all();
        $query = Auth::guard('student')->User()->id;
        $files = files::with('get_register')->whereHas('get_register', function($q) use($query) {
            // Query the name field in status table
            $q->where('id_student', '=',$query ); // '=' is optional
     })
             ->first();
        if(!is_null($files)){
            return redirect()->action('studentController@index')->with('error_ppdb','Anda sudah mendaftar PPDB, hanya boleh mendaftar 1x!');
            if(empty($files->akta_kelahiran)){
                $akta_kelahiran = 1;
            }else{
                $akta_kelahiran = 0;
            }
            if(empty($files->ijazah)){
                $ijazah = 1;
            }else{
                $ijazah = 0;
            }
            if(empty($files->skhun)){
                $skhun = 1;
            }else{
                $skhun = 0;
            }

            if(empty($files->kartu_keluarga)){
                $kartu_keluarga = 1;
            }else{
                $kartu_keluarga = 0;
            }
            if(empty($files->ktp_ortu)){
                $ktp_ortu = 1;
            }else{
                $ktp_ortu = 0;
            }
            if(empty($files->surat_kelakuan_baik)){
                $surat_kelakuan_baik = 1;
            }else{
                $surat_kelakuan_baik = 0;
            }

            $notif = $akta_kelahiran + $ijazah + $skhun + $kartu_keluarga + $ktp_ortu + $surat_kelakuan_baik;
        }else{
            $notif = 0;
        }
        return view('/sekolah.ppdb',compact('provinces','notif'));
    }

    public function store(request $request)
    {
                  
         $rules = array(
            'jalur_pendaftaran' => 'required',
            'pilihan_satu' => 'required',
            'pilihan_dua' => 'required',
            'nama_asal_sekolah' => 'required',
            'alamat_asal_sekolah' => 'required',
            'nomor_ujian_nasional_sebelumnya' => 'required',
            'nomor_seri_skhun_sebelumnya' => 'required',
            'nomor_seri_ijazah_sebelumnya' => 'required',
            'hobi' => 'required',
            'cita_cita' => 'required',

            'jenis_kelamin' => 'required',
            'nisn' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'kebutuhan_khusus' => 'required',
            'alamat' => 'required',
            'provinces' => 'required',
            'regencies' => 'required',
            'districts' => 'required',
            'villages' => 'required',
            'kode_pos' => 'required',
            'tempat_tinggal' => 'required',
            'transportasi' => 'required',
            'nomor_telepon' => 'required',
            'kewarganegaraan' => 'required',
            'file' => 'required|image:jpg,png|max:5000',
            'akta_kelahiran' => 'required|image:jpg,png|max:5000',
            'ijazah' => 'required|image:jpg,png|max:5000',
            'skhun' => 'required|image:jpg,png|max:5000',
            'kartu_keluarga' => 'required|image:jpg,png|max:5000',
            'ktp_ortu' => 'required|image:jpg,png|max:5000',
            'surat_kelakuan_baik' => 'required|mimes:doc,pdf,docx,jpg,png|max:5000',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'jumlah_saudara_kandung' => 'required',
            'jarak_tempat_tinggal_ke_sekolah' => 'required',

            
            'nama_ayah' => 'required',
            'tahun_ayah_lahir' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_bulanan_ayah' => 'required',
            'kebutuhan_khusus_ayah' => 'required',

             'nama_ibu' => 'required',
            'tahun_ibu_lahir' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_bulanan_ibu' => 'required',
            'kebutuhan_khusus_ibu' => 'required',

    ); 
        $validator = Validator::make ( $request->all(), $rules);
         if ($validator->fails()) {
            return redirect('/ppdb')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $checkFirst = registration::where('id_student','=',Auth::guard('student')->User()->id)->first();
       if(!empty($checkFirst)){
            Alert::warning('Anda sudah mendaftar cek halaman Anda!','Gagal')->persistent('Ok');
            return back();
       }else{
        do{
            $random = str_random(25);
            $random = strtoupper($random);
            $registration = registration::where('nomer_pendaftaran',$random)->get();
        }  while(!$registration->isEmpty());

          $registration = new registration([
            'id_student' => Auth::guard('student')->User()->id,
            'jalur_pendaftaran' => $request->get('jalur_pendaftaran'),
            'pilihan_satu' => $request->get('pilihan_satu'),
            'pilihan_dua' => $request->get('pilihan_dua'),
            'nomer_pendaftaran' => $random,
            'nama_asal_sekolah' => $request->get('nama_asal_sekolah'),
            'alamat_asal_sekolah' => $request->get('alamat_asal_sekolah'),
            'nomor_ujian_nasional_sebelumnya' => $request->get('nomor_ujian_nasional_sebelumnya'),
            'nomo_seri_skhun_sebelumnya' => $request->get('nomor_seri_skhun_sebelumnya'),
            'nomor_seri_ijazah_sebelumnya' => $request->get('nomor_seri_ijazah_sebelumnya'),
            'prestasi_yang_pernah_diraih' => $request->get('prestasi_yang_pernah_diraih'),
            'hobi' => $request->get('hobi'),
            'cita_cita' => $request->get('cita_cita'),
            'status' => 0
        ]);
        
        $registration->save();
        // $registration = registration::latest()->first();

         if ($request->hasFile('file')){

            $filename1 = $request->file->getClientOriginalName();
            $name_only1 = pathinfo($filename1, PATHINFO_FILENAME);
            $ext_only1 =  $request->file->getClientOriginalExtension();
            $name1 = $name_only1.'-'.date('His').'.'.$ext_only1;
            $filename2 = $request->akta_kelahiran->getClientOriginalName();
            $name_only2 = pathinfo($filename2, PATHINFO_FILENAME);
            $ext_only2 =  $request->akta_kelahiran->getClientOriginalExtension();
            $akta_kelahiran = $name_only2.'-'.date('His').'.'.$ext_only2;
            $filename3 = $request->ijazah->getClientOriginalName();
            $name_only3 = pathinfo($filename3, PATHINFO_FILENAME);
            $ext_only3 =  $request->ijazah->getClientOriginalExtension();
            $ijazah = $name_only3.'-'.date('His').'.'.$ext_only3;
            $filename4 = $request->skhun->getClientOriginalName();
            $name_only4 = pathinfo($filename4, PATHINFO_FILENAME);
            $ext_only4 =  $request->skhun->getClientOriginalExtension();
            $skhun = $name_only4.'-'.date('His').'.'.$ext_only4;
            $filename5 = $request->kartu_keluarga->getClientOriginalName();
            $name_only5 = pathinfo($filename5, PATHINFO_FILENAME);
            $ext_only5 =  $request->kartu_keluarga->getClientOriginalExtension();
            $kartu_keluarga = $name_only5.'-'.date('His').'.'.$ext_only5;
            $filename6 = $request->ktp_ortu->getClientOriginalName();
            $name_only6 = pathinfo($filename6, PATHINFO_FILENAME);
            $ext_only6 =  $request->ktp_ortu->getClientOriginalExtension();
            $ktp_ortu = $name_only6.'-'.date('His').'.'.$ext_only6;
            $filename7 = $request->surat_kelakuan_baik->getClientOriginalName();
            $name_only7 = pathinfo($filename7, PATHINFO_FILENAME);
            $ext_only7 =  $request->surat_kelakuan_baik->getClientOriginalExtension();
            $surat_kelakuan_baik = $name_only7.'-'.date('His').'.'.$ext_only7;
            // dd($name);
            $request->file->storeAs('public/picture/' .$registration->nomer_pendaftaran , $name1);     
            $request->akta_kelahiran->storeAs('public/picture/' .$registration->nomer_pendaftaran , $akta_kelahiran);     
            $request->ijazah->storeAs('public/picture/' .$registration->nomer_pendaftaran , $ijazah);     
            $request->skhun->storeAs('public/picture/' .$registration->nomer_pendaftaran , $skhun);     
            $request->kartu_keluarga->storeAs('public/picture/' .$registration->nomer_pendaftaran , $kartu_keluarga);     
            $request->ktp_ortu->storeAs('public/picture/' .$registration->nomer_pendaftaran , $ktp_ortu);     
            $request->surat_kelakuan_baik->storeAs('public/picture/' .$registration->nomer_pendaftaran , $surat_kelakuan_baik);   
            
            $files = new files([
                'register_id' => $registration->id,
                'akta_kelahiran' => $akta_kelahiran,
                'ijazah' => $ijazah,
                'skhun' => $skhun,
                'kartu_keluarga' => $kartu_keluarga,
                'ktp_ortu' => $ktp_ortu,
                'surat_kelakuan_baik' => $surat_kelakuan_baik
            ]);
            $files->save();
          $biodata = new biodata([
            'register_id' => $registration->id,
            'nama_lengkap' => Auth::guard('student')->User()->name,
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'nisn' => $request->get('nisn'),
            'nik' => $request->get('nik'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'agama' => $request->get('agama'),
            'kebutuhan_khusus' => $request->get('kebutuhan_khusus'),
            'alamat' => $request->get('alamat'),
            'provinces' => $request->get('provinces'),
            'regencies' => $request->get('regencies'),
            'districts' => $request->get('districts'),
            'villages' => $request->get('villages'),
            'kode_pos' => $request->get('kode_pos'),
            'tempat_tinggal' => $request->get('tempat_tinggal'),
            'transportasi' => $request->get('transportasi'),
            'nomor_handphone' => Auth::guard('student')->User()->nohp,
            'nomor_telepon' => $request->get('nomor_telepon'),
            'email' => Auth::guard('student')->User()->email,
            'kewarganegaraan' => $request->get('kewarganegaraan'),
            'foto' => $name1,
            'tinggi_badan' => $request->get('tinggi_badan'),
            'berat_badan' => $request->get('berat_badan'),
            'jumlah_saudara_kandung' => $request->get('jumlah_saudara_kandung'),
            'jarak_tempat_tinggal_ke_sekolah' => $request->get('jarak_tempat_tinggal_ke_sekolah')
        ]);
        }
        $biodata->save();
        $biodata = biodata::latest()->first();
        $father = new father_biodata([
            'id_anak' => $biodata->id,
            'nama_ayah' => $request->get('nama_ayah'),
            'tahun_ayah_lahir' => $request->get('tahun_ayah_lahir'),
            'pendidikan_ayah' => $request->get('pendidikan_ayah'),
            'pekerjaan_ayah' => $request->get('pekerjaan_ayah'),
            'penghasilan_bulanan_ayah' => $request->get('penghasilan_bulanan_ayah'),
            'kebutuhan_khusus_ayah' => $request->get('kebutuhan_khusus_ayah')
        ]);
        $father->save();
        $mother = new mother_biodata([
            'id_anak' => $biodata->id,
            'nama_ibu' => $request->get('nama_ibu'),
            'tahun_ibu_lahir' => $request->get('tahun_ibu_lahir'),
            'pendidikan_ibu' => $request->get('pendidikan_ibu'),
            'pekerjaan_ibu' => $request->get('pekerjaan_ibu'),
            'penghasilan_bulanan_ibu' => $request->get('penghasilan_bulanan_ibu'),
            'kebutuhan_khusus_ibu' => $request->get('kebutuhan_khusus_ibu')
        ]);
        $mother->save();
        if($request->get('nama_wali') == null){
            $wali = new wali_biodata([
            'id_anak' => $biodata->id
        ]);
             $wali->save();
        }else{
            $wali = new wali_biodata([
            'id_anak' => $biodata->id,
            'nama_wali' => $request->get('nama_wali'),
            'tahun_wali_lahir' => $request->get('tahun_wali_lahir'),
            'pendidikan_wali' => $request->get('pendidikan_wali'),
            'pekerjaan_wali' => $request->get('pekerjaan_wali'),
            'penghasilan_bulanan_wali' => $request->get('penghasilan_bulanan_wali'),
            'kebutuhan_khusus_wali' => $request->get('kebutuhan_khusus_wali')
        ]);
        $wali->save();
        }
        Alert::success('Harap Tetap Lihat Informasi pada Akun Anda untuk Kelanjutan Pendaftaran Anda.','Berhasil Mendaftar!')->persistent('Ok');
        return redirect()->action('studentController@index');
    }
}
    }   

    public function regencies(){
      $provinces_id = Input::get('province_id');
      $regencies = Regencies::where('province_id', '=', $provinces_id)->get();
      return response()->json($regencies);
    }

    public function districts(){
      $regencies_id = Input::get('regencies_id');
      $districts = Districts::where('regency_id', '=', $regencies_id)->get();
      return response()->json($districts);
    }

    public function villages(){
      $districts_id = Input::get('districts_id');
       $villages = DB::table('Villages')->where('district_id', '=' , $districts_id)->get();
      //$villages = Villages::where('district_id', '=', $districts_id)->get();
      return response()->json($villages);
    }
}
