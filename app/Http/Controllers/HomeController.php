<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use App\headmaster;
use DB;
use Purifier;
use App\registration;
use App\biodata;
use App\father_biodata;
use App\mother_biodata;
use Datatables;
use App\User;
use Auth;
use App\files;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = biodata::with('get_provinces','get_regencies','get_districts','get_villages')
                            ->join('father_biodatas','father_biodatas.id_anak','=','biodatas.id')
                            ->join('mother_biodatas','mother_biodatas.id_anak','=','biodatas.id')
                            ->join('registrations','registrations.id','=','biodatas.register_id')
                            ->join('students','students.id','=','registrations.id_student')
                            ->first();
                           // dd($student);
        if(Auth::guard('student')->check()){
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
        }else{
            $notif = 0;
        }
        $blog = blog::latest()->first();
        $data = headmaster::orderBy('id','dsc')->take(1)->get();
      
        $blogs = blog::orderBy('id','dsc')
        ->skip(1)
        ->take(3)
        ->get();
        $date =  blog::select(DB::raw('count(title) as count'),DB::raw('MONTH(created_at) as month'))->groupBy('month')->get();
        return view('/sekolah.home',compact('blog','data','blogs','date','notif'));
    }

    public function program()
    {
        $data = headmaster::orderBy('id','dsc')->take(1)->get();
        $date =  blog::select(DB::raw('count(title) as count'),DB::raw('MONTH(created_at) as month'))->groupBy('month')->get();
        if(Auth::guard('student')->check()){
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
        }else{
            $notif = 0;
        }
        return view('/sekolah.program',compact('data','date','notif'));
    }
    public function profil()
    {
         $data = headmaster::orderBy('id','dsc')->take(1)->get();
        $date =  blog::select(DB::raw('count(title) as count'),DB::raw('MONTH(created_at) as month'))->groupBy('month')->get();
        if(Auth::guard('student')->check()){
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
        }else{
            $notif = 0;
        }
        return view('/sekolah.profil',compact('data','date','notif'));
    }

    public function berita(request $request)
    {
        if(Auth::guard('student')->check()){
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
        }else{
            $notif = 0;
        }
        $blog = blog::orderBy('id','dsc')->paginate(5);
        $data = headmaster::orderBy('id','dsc')->first();
        $date =  blog::select(DB::raw('count(title) as count'),DB::raw('MONTH(created_at) as month'))->groupBy('month')->get();
        $query = 0;
        return view('/sekolah.berita',compact('blog','data','date','notif','query'));
    }

    public function display(request $request)
    {
        $blog = blog::where('title','=',$request->title)->paginate(1);
         $data = headmaster::orderBy('id','dsc')->first();
           $date =  blog::select(DB::raw('count(title) as count'),DB::raw('MONTH(created_at) as month'))->groupBy('month')->get();
           if(Auth::guard('student')->check()){
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
        }else{
            $notif = 0;
        }
        $query = 0;
        return view('/sekolah.berita',compact('blog','data','date','notif','query'));
    }

    public function about()
    {
        $kepsek = headmaster::orderBy('id','dsc')->take(1)->get();
        $date =  blog::select(DB::raw('count(title) as count'),DB::raw('MONTH(created_at) as month'))->groupBy('month')->get();
        if(Auth::guard('student')->check()){
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
        }else{
            $notif = 0;
        }
        return view('sekolah.about',compact('kepsek','date','notif'));
    }

    public function arsip(request $request)
    {
        

        $arsip = blog::whereRaw('MONTH(created_at) = ?',$request->month)
            ->get();
        $month = blog::whereRaw('MONTH(created_at) = ?',$request->month)
            ->first();
        $data = headmaster::orderBy('id','dsc')->take(1)->get();
        $date =  blog::select(DB::raw('count(title) as count'),DB::raw('MONTH(created_at) as month'))->groupBy('month')->get();
        if(Auth::guard('student')->check()){
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
        }else{
            $notif = 0;
        }
        return view('sekolah.arsip',compact('arsip','data','date','month','notif'));
    }

    public function search(request $request)
    {
          $query = $request->get('q');        
        $blog = blog::where('title', 'like', '%' . $query . '%')
        ->orWhere('body', 'like', '%' . $query . '%')->paginate(5);
         $data = headmaster::orderBy('id','dsc')->first();
        $date =  blog::select(DB::raw('count(title) as count'),DB::raw('MONTH(created_at) as month'))
        ->groupBy('month')->get();        
        if(Auth::guard('student')->check()){
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
        }else{
            $notif = 0;
        }
        return view('/sekolah.berita', compact('blog','data','date','notif','query'));
    }

    public function hasil()
    {
         $data = headmaster::orderBy('id','dsc')->take(1)->first();
        $date =  blog::select(DB::raw('count(title) as count'),DB::raw('MONTH(created_at) as month'))
        ->groupBy('month')->get();        
        if(Auth::guard('student')->check()){
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
        }else{
            $notif = 0;
        }
        return view('sekolah.hasil',compact('date','data','notif'));
    }

    public function datahasil()
    {
        $query = biodata::with('get_register','get_provinces','get_regencies','get_districts','get_villages')
                            ->join('father_biodatas','father_biodatas.id_anak','=','biodatas.id')
                            ->join('mother_biodatas','mother_biodatas.id_anak','=','biodatas.id')
                             ->whereHas('get_register', function ($query){
                                  $query->whereYear('created_at',date('Y'));
                                })
                            ->get();
        return Datatables::of($query)
        ->toJson();
    }

    public function carihasil(request $request)
    {
        $query = $request->get('nomer_pendaftaran');
            $datas = biodata::with('get_register','get_provinces','get_regencies','get_districts','get_villages')
        ->join('father_biodatas', 'father_biodatas.id_anak', '=', 'biodatas.id')
        ->join('mother_biodatas', 'mother_biodatas.id_anak', '=', 'biodatas.id')
        ->join('wali_biodatas','wali_biodatas.id_anak','=','biodatas.id')
        ->select('biodatas.*','biodatas.id AS biodata_id','mother_biodatas.*','mother_biodatas.id AS mother_id','father_biodatas.*','father_biodatas.id AS father_id','wali_biodatas.*','wali_biodatas.id AS wali_id')
        ->orderBy('biodatas.id','asc')
         ->whereHas('get_register', function($q) use($query) {
       // Query the name field in status table
       $q->where('nomer_pendaftaran', '=', $query); // '=' is optional
})
        ->first();
           $data = headmaster::orderBy('id','dsc')->take(1)->get();
        $date =  blog::select(DB::raw('count(title) as count'),DB::raw('MONTH(created_at) as month'))
        ->groupBy('month')->get(); 
        if(Auth::guard('student')->check()){
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
        }else{
            $notif = 0;
        }
          return view('/sekolah.hasil',compact('datas','data','date','notif'));
    }
      
    

}
