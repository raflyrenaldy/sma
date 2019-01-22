<?php

namespace App\Http\Controllers;

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
use App\Student;
use App\blog;
use DB;
use Alert;
use Gate;
use File;
use Auth;
class studentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:student');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Auth::guard('student')->User()->id;
        $files = files::with('get_register')->whereHas('get_register', function($q) use($query) {
            // Query the name field in status table
            $q->where('id_student', '=',$query ); // '=' is optional
     })
             ->first();
        if(!is_null($files)){
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
            
         $date =  blog::select(DB::raw('count(title) as count'),DB::raw('MONTH(created_at) as month'))->groupBy('month')->get();

          
        return view('student.home',compact('notif','files','date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $rules = array(
            'name' => 'required',
            'nohp' => 'required|min:9|max:14',
        );
        $validator = Validator::make ( $request->all(), $rules);
         if ($validator->fails()) {
            return redirect('/profile')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $user = Auth::guard('student')->User();
            $user_id = Auth::guard('student')->User()->id;
            $allUser = Student::all();
            foreach ($allUser as $key) {
               if($key->nohp == $request->get('nohp')){

                if($user->nohp == $request->get('nohp')){

                }else{
                return back()->with('error_message','No HP sudah terdaftar!');

                }
            }
            }
            
            // dd($user);
            $student = biodata::with('get_register','get_provinces','get_regencies','get_districts','get_villages')->whereHas('get_register', function ($query) use ($user_id){
                                  $query->where('id_student','=',$user_id );
                                })
                            ->first();
           if(empty($student)){
                            // dd($student);

                if($request->get('password') == null){
                      $user->name = $request->get('name');
                      $user->nohp = $request->get('nohp');
                  }else{
                        $rules = array(
                            'password' => 'required|confirmed|min:6',
                            'password_before' => 'required',
                        );

                        $message = ([
                            'password.required' => 'Kata sandi baru tidak boleh kosong!',
                            'password.confirmed' => 'Kata sandi baru tidak sama!',
                            'password.min' => 'Minimal kata sandi 6 digit!',
                            'password_before.required' => 'Kata sandi sebelumnya tidak boleh kosong!',
                        ]);
                        $validator = Validator::make ( $request->all(), $rules, $message);
                         if ($validator->fails()) {
                            return redirect('/profile')
                                        ->withErrors($validator)
                                        ->withInput();
                        }else{
                            if (Hash::check($request->get('password_before'), $user->password)){
                              if(Hash::check($request->get('password'), $user->password)){
                                return back()->with('error_message','Kata sandi masih sama dengan kata sandi sebelumnya! harap berbeda!');
                              }else{
                                $user->name = $request->get('name');
                                $user->nohp = $request->get('nohp');
                                $user->password = Hash::make($request->get('password'));
                              }
                            }else{
                              return back()->with('error_message','Kata sandi sebelumnya salah!');
                            }
                        }
                  }
           }else{
            // dd($student);
            if($request->get('password') == null){
                      $user->name = $request->get('name');
                      $user->nohp = $request->get('nohp');
                      $student->nama_lengkap = $request->get('name');
                      $student->nomor_handphone = $request->get('nohp');
                      $student->save();
                      // dd($student);
                  }else{
                        $rules = array(
                            'password' => 'required|confirmed|min:6',
                            'password_before' => 'required',
                        );

                        $message = ([
                            'password.required' => 'Kata sandi baru tidak boleh kosong!',
                            'password.confirmed' => 'Kata sandi baru tidak sama!',
                            'password.min' => 'Minimal kata sandi 6 digit!',
                            'password_before.required' => 'Kata sandi sebelumnya tidak boleh kosong!',
                        ]);
                        $validator = Validator::make ( $request->all(), $rules, $message);
                         if ($validator->fails()) {
                            return redirect('/profile')
                                        ->withErrors($validator)
                                        ->withInput();
                        }else{
                            if (Hash::check($request->get('password_before'), $user->password)){
                              if(Hash::check($request->get('password'), $user->password)){
                           Alert::error('Kata sandi masih sama dengan kata sandi sebelumnya! harap berbeda!','Gagal')->persistent('Ok');        
                                return back();
                              }else{
                                $user->name = $request->get('name');
                                $user->nohp = $request->get('nohp');
                                $user->password = Hash::make($request->get('password'));
                                $student->nama_lengkap = $request->get('name');
                                $student->nomor_handphone = $request->get('nohp');
                                $student->save();
                              }
                            }else{
                           Alert::error('Kata sandi sebelumnya salah!','Gagal')->persistent('Ok');        
                              return back();
                            }
                        }
                  }
           }
           $user->save();
        Alert::success('Berhasil Edit profile!','Sukses')->persistent('Ok');
           return back();
        }

    }

    public function reupload(request $request)
    {
        $registration = registration::where('id_student','=',Auth::guard('student')->User()->id)->first();
        $files = files::where('register_id','=',$registration->id)->first();
        if ($request->hasFile('akta_kelahiran')){
          $rules = array(
            'akta_kelahiran' => 'image:jpg,png|max:5000'
        );
        $validator = Validator::make ( $request->all(), $rules);
         if ($validator->fails()) {
            return redirect('/profile')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $filename2 = $request->akta_kelahiran->getClientOriginalName();
            $name_only2 = pathinfo($filename2, PATHINFO_FILENAME);
            $ext_only2 =  $request->akta_kelahiran->getClientOriginalExtension();
            $akta_kelahiran = $name_only2.'-'.date('His').'.'.$ext_only2;
            $request->akta_kelahiran->storeAs('public/picture/' .$registration->nomer_pendaftaran , $akta_kelahiran);
            $files->akta_kelahiran = $akta_kelahiran;
          }
        }
        if ($request->hasFile('ijazah')){
          $rules = array(
            'ijazah' => 'image:jpg,png|max:5000'
        );
        $validator = Validator::make ( $request->all(), $rules);
         if ($validator->fails()) {
            return redirect('/profile')
                        ->withErrors($validator)
                        ->withInput();
        }else{
             $filename3 = $request->ijazah->getClientOriginalName();
            $name_only3 = pathinfo($filename3, PATHINFO_FILENAME);
            $ext_only3 =  $request->ijazah->getClientOriginalExtension();
            $ijazah = $name_only3.'-'.date('His').'.'.$ext_only3;
            $request->ijazah->storeAs('public/picture/' .$registration->nomer_pendaftaran , $ijazah);
            $files->ijazah = $ijazah;
          }
        }
        if ($request->hasFile('skhun')){
          $rules = array(
                'skhun' => 'image:jpg,png|max:5000'
            );
            $validator = Validator::make ( $request->all(), $rules);
             if ($validator->fails()) {
                return redirect('/profile')
                            ->withErrors($validator)
                            ->withInput();
            }else{
             $filename4 = $request->skhun->getClientOriginalName();
            $name_only4 = pathinfo($filename4, PATHINFO_FILENAME);
            $ext_only4 =  $request->skhun->getClientOriginalExtension();
            $skhun = $name_only4.'-'.date('His').'.'.$ext_only4;
            $request->skhun->storeAs('public/picture/' .$registration->nomer_pendaftaran , $skhun);
            $files->skhun = $skhun;
          }
        }
        if ($request->hasFile('kartu_keluarga')){
          $rules = array(
                'kartu_keluarga' => 'image:jpg,png|max:5000'
            );
            $validator = Validator::make ( $request->all(), $rules);
             if ($validator->fails()) {
                return redirect('/profile')
                            ->withErrors($validator)
                            ->withInput();
            }else{
            $filename5 = $request->kartu_keluarga->getClientOriginalName();
            $name_only5 = pathinfo($filename5, PATHINFO_FILENAME);
            $ext_only5 =  $request->kartu_keluarga->getClientOriginalExtension();
            $kartu_keluarga = $name_only5.'-'.date('His').'.'.$ext_only5;
            $request->kartu_keluarga->storeAs('public/picture/' .$registration->nomer_pendaftaran , $kartu_keluarga);
            $files->kartu_keluarga = $kartu_keluarga;
          }
        }
        if ($request->hasFile('ktp_ortu')){
          $rules = array(
                'ktp_ortu' => 'image:jpg,png|max:5000'
            );
            $validator = Validator::make ( $request->all(), $rules);
             if ($validator->fails()) {
                return redirect('/profile')
                            ->withErrors($validator)
                            ->withInput();
            }else{
            $filename6 = $request->ktp_ortu->getClientOriginalName();
            $name_only6 = pathinfo($filename6, PATHINFO_FILENAME);
            $ext_only6 =  $request->ktp_ortu->getClientOriginalExtension();
            $ktp_ortu = $name_only6.'-'.date('His').'.'.$ext_only6;
            $request->ktp_ortu->storeAs('public/picture/' .$registration->nomer_pendaftaran , $ktp_ortu); 
            $files->ktp_ortu = $ktp_ortu;
          }
        }
        if ($request->hasFile('surat_kelakuan_baik')){
          $rules = array(
                'surat_kelakuan_baik' => 'mimes:doc,pdf,docx,jpg,png|max:5000'
            );
            $validator = Validator::make ( $request->all(), $rules);
             if ($validator->fails()) {
                return redirect('/profile')
                            ->withErrors($validator)
                            ->withInput();
            }else{
             $filename7 = $request->surat_kelakuan_baik->getClientOriginalName();
            $name_only7 = pathinfo($filename7, PATHINFO_FILENAME);
            $ext_only7 =  $request->surat_kelakuan_baik->getClientOriginalExtension();
            $surat_kelakuan_baik = $name_only7.'-'.date('His').'.'.$ext_only7;
            $request->surat_kelakuan_baik->storeAs('public/picture/' .$registration->nomer_pendaftaran , $surat_kelakuan_baik); 
            $files->surat_kelakuan_baik = $surat_kelakuan_baik;
          }
        }

        $files->save();
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

            $check = $akta_kelahiran + $ijazah + $skhun + $kartu_keluarga + $ktp_ortu + $surat_kelakuan_baik;
            if($check == 0){
                $registration->status = 4;
                $registration->save();
            }
        Alert::success('Berhasil Unggah Berkas','Sukses')->persistent('Ok');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
