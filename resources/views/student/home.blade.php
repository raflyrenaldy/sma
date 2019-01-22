@extends('layouts.school',[
  'notif' => $notif
])

@section('content')

<!-- Hero section -->
<!-- Breadcrumb section -->

<div class="site-breadcrumb">
    <div class="container">
      <a href="{{ url('home') }}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
      <span>Profile</span>
    </div>
  </div>
  </div>

  <!-- Breadcrumb section end -->
<!-- Hero section -->
<section class="blog-page-section spad pt-0">

    <div class="container">
  @if($errors->count() > 0)
<div id="ERROR_COPY" style="display:none" class="alert alert-danger">
@foreach($errors->all() as $error)
{{$error}}
@endforeach
</div>
@endif
        @if (session()->has('error_ppdb'))
              <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                
                    {{ session()->get('error_ppdb') }}
                  </div>
            @endif
            @if (session()->has('success_message'))
              <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                
                    {{ session()->get('success_message') }}
                  </div>
            @endif
@if($files != null)
            @if($files->get_register->status == 1) 
      <div class="box box-primary box-solid">
         <div class="box-header with-border">
              <h3 class="box-title"><a > Notifikasi </a></h3>
            </div>
          <div class="post-item">
            <div class="post-content">
              <h3 align="center"> 
              </h3>
              <div class="box-body">
                 <div class="post-meta">
               
              </div>
                 
                  <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>Selamat {{ Auth::guard('student')->User()->name }} Anda <b>Telah di Terima</b> Lihat info selanjutnya pada halaman hasil! </h5>
                  </div>
                  
            </div>
            </div>
          </div>
 
        </div>
        @elseif ($files->get_register->status == 2) 
        <div class="box box-primary box-solid">
         <div class="box-header with-border">
              <h3 class="box-title"><a > Notifikasi </a></h3>
            </div>
          <div class="post-item">
            <div class="post-content">
              <h3 align="center"> 
              </h3>
              <div class="box-body">
                 <div class="post-meta">
               
              </div>
                 
                  <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>Mohon Maaf {{ Auth::guard('student')->User()->name }} Anda <b>Telah di tolak</b> karena {{$files->get_register->note}} </h5>
                  </div>
                  
            </div>
            </div>
          </div>
 
        </div>
        @else
@if($notif > 0) 
      <div class="box box-primary box-solid">
         <div class="box-header with-border">
              <h3 class="box-title"><a > Notifikasi </a></h3>
            </div>
          <div class="post-item">
            <div class="post-content">
              <h3 align="center"> 
              </h3>
              <div class="box-body">
                 <div class="post-meta">
               
              </div>
                  @if(empty($files->akta_kelahiran))
                  <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>Harap upload ulang berkas <b>Akte Kelahiran</b> Anda {{ Auth::guard('student')->User()->name }}</h5>
                  </div>
                  @else
                  @endif

                  @if(empty($files->ijazah))
                  <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>Harap upload ulang berkas <b>Ijazah</b> Anda {{ Auth::guard('student')->User()->name }}</h5>
                  </div>
                  @else
                  @endif

                  @if(empty($files->skhun))
                  <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>Harap upload ulang berkas <b>SKHUN</b> Anda {{ Auth::guard('student')->User()->name }}</h5>
                  </div>
                  @else
                  @endif

                  @if(empty($files->kartu_keluarga))
                  <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>Harap upload ulang berkas <b>Kartu Keluarga</b> Anda {{ Auth::guard('student')->User()->name }}</h5>
                  </div>
                  @else
                  @endif

                  @if(empty($files->ktp_ortu))
                  <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>Harap upload ulang berkas <b>KTP Orang Tua</b> Anda {{ Auth::guard('student')->User()->name }}</h5>
                  </div>
                  @else
                  @endif

                  @if(empty($files->surat_kelakuan_baik))
                  <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>Harap upload ulang berkas <b>Surat Kelakuan Baik</b> Anda {{ Auth::guard('student')->User()->name }}</h5>
                  </div>
                   @else
                  @endif
            </div>
            </div>
          </div>
 
        </div>
        @else
        @endif
        @endif
      <div class="row">

        <div class="col-lg-8 post-list">
          @if($files->get_register->status == 1) 
          @elseif($files->get_register->status == 2)
          @else
          @if($notif > 0) 
         <div class="box box-primary box-solid">
         <div class="box-header with-border">
              <h3 class="box-title"><a > Unggah Berkas </a></h3>


              <!-- /.box-tools -->
            </div>
          <div class="post-item">
      
         
            <div class="post-content">
              <h3 align="center"> 
                
              </h3>
             

              <div class="box-body">
                 
                        
            @if (session()->has('error_message'))
              <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                
                    {{ session()->get('error_message') }}
                  </div>
            @endif
                <form role="form" enctype="multipart/form-data" method="post" action="{{route('user.reupload')}}">
                {{csrf_field()}}
                     @if(empty($files->akta_kelahiran))
              <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Akta Kelahiran <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                  <input type="file" id="akta_kelahiran" value="{{ old('akta_kelahiran') }}" name="akta_kelahiran">

                  <p class="help-block">Upload ulang scan akta kelahiran, Bertipe JPG/PNG.</p>
                </div>
                </div>
                @else
                @endif

                @if(empty($files->ijazah))
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Ijazah <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                  <input type="file" id="ijazah" value="{{ old('ijazah') }}" name="ijazah">

                  <p class="help-block">Upload ulang scan ijazah, Bertipe JPG/PNG.</p>
                </div>
                </div>
                @else
                @endif

                @if(empty($files->skhun))
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">SKHUN <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                  <input type="file" id="skhun" value="{{ old('skhun') }}" name="skhun">

                  <p class="help-block">Upload ulang scan surat Keterangan hasil ujian nasional, Bertipe JPG/PNG.</p>
                </div>
                </div>
                @else
                @endif

                @if(empty($files->kartu_keluarga))
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Kartu Keluarga <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                  <input type="file" id="kartu_keluarga" value="{{ old('kartu_keluarga') }}" name="kartu_keluarga">

                  <p class="help-block">Upload ulang scan kartu keluarga, Bertipe JPG/PNG.</p>
                </div>
                </div>
                @else
                @endif

                @if(empty($files->ktp_ortu))
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">KTP Ayah/Ibu <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                  <input type="file" id="ktp_ortu" value="{{ old('ktp_ortu') }}" name="ktp_ortu">

                  <p class="help-block">Upload ulang scan kartu tanda penduduk ayah/ibu, Bertipe JPG/PNG.</p>
                </div>
                </div>
                @else
                @endif

                @if(empty($files->surat_kelakuan_baik))
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Surat Kelakuan Baik <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                  <input type="file" id="surat_kelakuan_baik" value="{{ old('surat_kelakuan_baik') }}" name="surat_kelakuan_baik">

                  <p class="help-block">Upload ulang surat kelakuan baik, Bertipe JPG/PNG/DOC/DOCS/PDF.</p>
                </div>
                </div>
            @else
            @endif

          <div class="row">
                        <label for="inputPassword" class="col-sm-4 col-form-label" align="right"> <span style="color: red"></span></label>
                        <div class="col-sm-8">
                      <button id="submit" class="btn btn-info w100" type="submit"><span>Simpan</span></button>
                          
                        </div>
                      </div>
           </form>
            </div>
            </div>
          </div>
 
    </div>
    @else
    @endif
    @endif
      <div class="box box-primary box-solid">
         <div class="box-header with-border">
              <h3 class="box-title"><a > Profil Anda </a></h3>


              <!-- /.box-tools -->
            </div>
          <div class="post-item">
      
         
            <div class="post-content">
              <h3 align="center"> 
                
              </h3>
             

              <div class="box-body">
              
                        @if (session()->has('success_message'))
              <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                
                    {{ session()->get('success_message') }}
                  </div>
            @endif
            @if (session()->has('error_message'))
              <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                
                    {{ session()->get('error_message') }}
                  </div>
            @endif
                <form name="frmReg" action="{{route('user.updateprofile',Auth::guard('student')->User()->id)}}" method="POST" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     {{ method_field('patch') }}
             <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nama Lengkap <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{Auth::guard('student')->User()->name}}">
              </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">No Hp <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="nohp" name="nohp" placeholder="" value="{{Auth::guard('student')->User()->nohp}}">
              </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Email<span style="color: red">*</span></label>
              <div class="col-sm-8">
                <div>{{ Auth::guard('student')->User()->email }}</div>
              </div>
          </div>
          <div class="form-group row" style=" display: none" id="pws">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Kata Sandi Sebelumnya<span style="color: red">*</span></label>
              <div class="col-sm-8">
               <input type="password" class="form-control" id="password_before" name="password_before" placeholder="">
              </div>
          </div>
          <div class="form-group row" row" style=" display: none" id="pwss">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Kata Sandi Baru<span style="color: red">*</span></label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="password" name="password" placeholder=""  onchange="check_pass()">
              </div>
          </div>
          <div class="form-group row" style=" display: none" id="pwsss">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Konfirmasi Kata Sandi Baru<span style="color: red">*</span></label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="" onchange="check_pass()">
              </div>
          </div>
          <div class="row">
                        <div class="col-sm-4" align="right">
                          <button id="btnChange" type="button" class="btn btn-warning w100""  onclick="ChangePassword()"><span>Ganti Kata Sandi</span></button>
                        </div>
                        <div class="col-sm-8">
                      <button id="submit" class="btn btn-info w100" type="submit"><span>Simpan</span></button>
                          
                        </div>
                      </div>
           </form>
            </div>
            </div>
          </div>
 
    </div>
    @else
      <div class="row">
     <div class="col-lg-8 post-list">
<div class="box box-primary box-solid">
         <div class="box-header with-border">
              <h3 class="box-title"><a > Profil Anda </a></h3>


              <!-- /.box-tools -->
            </div>
          <div class="post-item">
      
         
            <div class="post-content">
              <h3 align="center"> 
                
              </h3>
             

              <div class="box-body">
              
                        @if (session()->has('success_message'))
              <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                
                    {{ session()->get('success_message') }}
                  </div>
            @endif
            @if (session()->has('error_message'))
              <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                
                    {{ session()->get('error_message') }}
                  </div>
            @endif
                <form name="frmReg" action="{{route('user.updateprofile',Auth::guard('student')->User()->id)}}" method="POST" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     {{ method_field('patch') }}
             <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nama Lengkap <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{Auth::guard('student')->User()->name}}">
              </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">No Hp <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="nohp" name="nohp" placeholder="" value="{{Auth::guard('student')->User()->nohp}}">
              </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Email<span style="color: red">*</span></label>
              <div class="col-sm-8">
                <div>{{ Auth::guard('student')->User()->email }}</div>
              </div>
          </div>
          <div class="form-group row" style=" display: none" id="pws">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Kata Sandi Sebelumnya<span style="color: red">*</span></label>
              <div class="col-sm-8">
               <input type="password" class="form-control" id="password_before" name="password_before" placeholder="">
              </div>
          </div>
          <div class="form-group row" row" style=" display: none" id="pwss">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Kata Sandi Baru<span style="color: red">*</span></label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="password" name="password" placeholder=""  onchange="check_pass()">
              </div>
          </div>
          <div class="form-group row" style=" display: none" id="pwsss">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Konfirmasi Kata Sandi Baru<span style="color: red">*</span></label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="" onchange="check_pass()">
              </div>
          </div>
          <div class="row">
                        <div class="col-sm-4" align="right">
                          <button id="btnChange" type="button" class="btn btn-warning w100""  onclick="ChangePassword()"><span>Ganti Kata Sandi</span></button>
                        </div>
                        <div class="col-sm-8">
                      <button id="submit" class="btn btn-info w100" type="submit"><span>Simpan</span></button>
                          
                        </div>
                      </div>
           </form>
            </div>
            </div>
          </div>
 
    </div>
    @endif
  </div>
        <!-- sidebar -->
        <div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
          <!-- widget -->
          <div class="widget">
            <form class="search-widget" action="{{ url('search') }}" method="GET">
              <input type="text" name="q" placeholder="Search...">
              <button><i class="ti-search"></i></button>
            </form>
          </div>
         
        <div class="widget">
            <div class="box box-primary box-solid">
         <div class="box-header with-border">
              <h3 class="box-title"><a class="fa fa-exclamation-circle" > Arsip </a></h3>

             
              <!-- /.box-tools -->
            </div>
            <h4 class="widget-title"></h4>
            <div class="tags" align="center">
             @foreach ($date as $dates)
                     @if($dates->month == 1)
                       <a href="{{ url('berita/arsip/'.$dates->month) }}">JANUARY({{$dates->count}})</a>
                      @elseif($dates->month == 2)
                        <a href="{{ url('berita/arsip/'.$dates->month) }}">FEBRUARY({{$dates->count}})</a>
                         @elseif($dates->month == 3)
                        <a href="{{ url('berita/arsip/'.$dates->month) }}">MARCH({{$dates->count}})</a>
                         @elseif($dates->month == 4)
                        <a href="{{ url('berita/arsip/'.$dates->month) }}">APRIL({{$dates->count}})</a>
                         @elseif($dates->month == 5)
                        <a href="{{ url('berita/arsip/'.$dates->month) }}">MAY({{$dates->count}})</a>
                         @elseif($dates->month == 6)
                        <a href="{{ url('berita/arsip/'.$dates->month) }}">JUNE({{$dates->count}})</a>
                         @elseif($dates->month == 7)
                        <a href="{{ url('berita/arsip/'.$dates->month) }}">JULY({{$dates->count}})</a>
                         @elseif($dates->month == 8)
                        <a href="{{ url('berita/arsip/'.$dates->month) }}">AUGUST({{$dates->count}})</a>
                         @elseif($dates->month == 9)
                        <a href="{{ url('berita/arsip/'.$dates->month) }}">SEPTEMBER({{$dates->count}})</a>
                         @elseif($dates->month == 10)
                        <a href="{{ url('berita/arsip/'.$dates->month) }}">OCTOBER({{$dates->count}})</a>
                         @elseif($dates->month == 11)
                        <a href="{{ url('berita/arsip/'.$dates->month) }}">NOVEMBER({{$dates->count}})</a>
                        @elseif($dates->month == 12)
                        <a href="{{ url('berita/arsip/'.$dates->month) }}">DECEMBER({{$dates->count}})</a>
                       @endif
                      @endforeach
           
           
            </div>
          </div>
            </div>
            
          </div>
              </div>
            </div>
          </div>
        </div>
    
          
        </div>
      </div>
    </div>
  </section>
  <!-- Blog section -->
<script src="{{asset('js/app.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
@if($errors->count() > 0)
      swal({
  title: "Error!",
  text: jQuery("#ERROR_COPY").html(),
  icon: "error",
    @endif
        
});

</script>
<script>
  function ChangePassword(){
        var x = document.getElementById("pws");
        var y = document.getElementById("pwss");
        var z = document.getElementById("pwsss");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "block";
        z.style.display = "block";
         document.getElementById('btnChange').innerHTML = "Batal";
    } else {
        x.style.display = "none";
         y.style.display = "none";
         z.style.display = "none";
 document.getElementById('btnChange').innerHTML = "Ganti Kata Sandi";
    }
                    }
</script>
 <script>
                   function check_pass() {
    if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('submit').disabled = true;
    }
}
                 </script>


@endsection

      
