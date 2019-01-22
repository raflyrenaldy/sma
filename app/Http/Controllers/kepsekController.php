<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\headmaster;
use Alert;
use File;
use Validator;

class kepsekController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
    	$data = headmaster::all();
    	return view('/admin.kepsek',compact('data'));
    }

    public function store(request $request)
    {
        $rules = array(
            'nama' => 'required',
            'keterangan' => 'required',
            'file' => 'required',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        );
        $validator = Validator::make ( $request->all(), $rules);
         if ($validator->fails()) {
            return redirect('/adminpage/kepsek')
                        ->withErrors($validator)
                        ->withInput();
        }else{

        	if ($request->hasFile('file')){

                $filename = $request->file->getClientOriginalName();
                $name_only = pathinfo($filename, PATHINFO_FILENAME);
                $ext_only =  $request->file->getClientOriginalExtension();

                $name = $name_only.'-'.date('His').'.'.$ext_only;
                // dd($name);
                $request->file->storeAs('public/kepsek', $name);         
             	 $kepsek = new headmaster([
        		'foto' => $name,
        	    'nama' => $request->get('nama'),
        		'keterangan' => $request->get('keterangan')
        		]);
            	$kepsek->save();
        	}
        	
        	Alert::success('Berhasil membuat data kepala sekolah','Sukses')->persistent('Ok');
        	return back();
        }
    }

    public function update(request $request)
    {
    	if ($request->hasFile('file')){

            $filename = $request->file->getClientOriginalName();
            $name_only = pathinfo($filename, PATHINFO_FILENAME);
            $ext_only =  $request->file->getClientOriginalExtension();

            $name = $name_only.'-'.date('His').'.'.$ext_only;
            // dd($name);
            
            	$kepsek = headmaster::findOrFail($request->id);  
            	 unlink(storage_path('app\public\kepsek/').$kepsek->foto);   
            	 $request->file->storeAs('public/kepsek', $name);    
         $kepsek->foto = $name;
         $kepsek->nama = $request->get('nama');
    	$kepsek->keterangan = $request->get('keterangan');
    	$kepsek->save();
    	}else{
    		$kepsek = headmaster::findOrFail($request->id);
    		$kepsek->nama = $request->get('nama');
    		$kepsek->keterangan = $request->get('keterangan');
    		$kepsek->save();
    	}
    	
    	
    	
    	Alert::success('Berhasil edit data kepala sekolah','Sukses')->persistent('Ok');
    	return back();
    }

    public function destroy(request $request)
    {
    	$kepsek = headmaster::findOrFail($request->id);
    	unlink(storage_path('app\public\kepsek/').$kepsek->foto);
    	$kepsek->delete();
    	Alert::success('Berhasil hapus data kepala sekolah','Sukses')->persistent('Ok');
    	return back();
    }
}
