<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\blog;
use Alert;
use Purifier;
use Illuminate\Support\Facades\Input;
class newsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
    	$data = blog::orderBy('id','dsc')->get();
    	return view('/admin.news',compact('data'));
    }
    public function addnews()
    {
        return view('/admin.addnews',compact('data'));
    }
    public function updatenews(request $request)
    {
        $data = blog::findOrFail($request->id);
        return view('/admin.updatenews',compact('data'));
    }
    public function store(request $request)
    {
    	$rules = array(
             'title' => 'required|unique:blogs',
             'body' => 'required'
        );
        $validator = Validator::make ( $request->all(), $rules);
         if ($validator->fails()) {
            return redirect('/adminpage/addnews')
                        ->withErrors($validator)
                        ->withInput();
        }else{  
            if ($request->hasFile('file')){

                $filename = $request->file->getClientOriginalName();
                $name_only = pathinfo($filename, PATHINFO_FILENAME);
                $ext_only =  $request->file->getClientOriginalExtension();

                $name = $name_only.'-'.date('His').'.'.$ext_only;
                    // dd($name);
                $request->file->storeAs('public/blog', $name);         
                $post = new blog([
                    'foto' => $name,
                    'title' => $request->get('title'),
                    'body' => $request->get('body')
                 ]);
                $post->save();
                Alert::success('Tambah Berita Berhasil','Sukses')->persistent('Ok');
            }else{
                $post = new blog([
                 
                    'title' => $request->get('title'),
                    'body' => $request->get('body')
                 ]);
                $post->save();
                Alert::success('Tambah Berita Berhasil','Sukses')->persistent('Ok');
                }
             return redirect()->action('newsController@index');
            }
    }
   
    
    
  

    public function destroy(request $request)
    {
    	$news = blog::findOrFail($request->id);
    	$news->delete();
    	Alert::success('Hapus Berita Berhasil','Sukses')->persistent('Ok');
    	return redirect()->action('newsController@index');
    }
    public function edit(request $request)
    {
        $rules = array(
             'title' => 'required',
             'body' => 'required'
        );
        $validator = Validator::make ( $request->all(), $rules);
         if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }else{ 
           if ($request->hasFile('file')){

                $filename = $request->file->getClientOriginalName();
                $name_only = pathinfo($filename, PATHINFO_FILENAME);
                $ext_only =  $request->file->getClientOriginalExtension();

                $name = $name_only.'-'.date('His').'.'.$ext_only;
                // dd($name);
                 $news = blog::findOrFail($request->id);
                 if($news->foto == null){
                    $request->file->storeAs('public/blog', $name);  
                 }else{
                     unlink(storage_path('app\public\blog/').$news->foto);  
                     $request->file->storeAs('public/blog', $name);   
                 }
                $news->foto =$name;       
                 $news->title = $request->get('title');
                 $news->body = $request->get('body');
                $news->save();
            }else{
                $news = blog::findOrFail($request->id);
            $news->title = $request->get('title');
            $news->body = $request->get('body');
            $news->save();
            }
        	
        	Alert::success('Edit Berita Berhasil','Sukses')->persistent('Ok');
        	return redirect()->action('newsController@index');
        }
    }
}
