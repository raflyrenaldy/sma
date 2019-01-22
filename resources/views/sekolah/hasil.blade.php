<!DOCTYPE html>
<html lang="en">
<head>
  <title>SMA PGRI RANCAEKEK</title>
  <meta charset="UTF-8">
  <meta name="description" content="Unica University Template">
  <meta name="keywords" content="event, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->   
  <link href="{{ asset('blog/img/favicon.ico')}}" rel="shortcut icon"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- bootstrap wysihtml5 - text editor -->
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ asset('blog/css/bootstrap.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('blog/css/font-awesome.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('blog/css/themify-icons.css') }}"/>
  <link rel="stylesheet" href="{{ asset('blog/css/magnific-popup.css') }}"/>
  <link rel="stylesheet" href="{{ asset('blog/css/animate.css') }}"/>
  <link rel="stylesheet" href="{{ asset('blog/css/owl.carousel.css') }}"/>
  <link rel="stylesheet" href="{{ asset('blog/css/style.css') }}"/>
   <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/skins/_all-skins.min.css')}}">
    <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('admin/plugins/timepicker/bootstrap-timepicker.min.css')}}">
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  

</head>
<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- header section -->

  
  <!-- Header section  -->
  <nav class="nav-section">
    <div class="container">
      <div class="nav-right">
        @auth('student')
        <span class="">
              
            </span><li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Auth::guard('student')->User()->name}}</a>
              @if($notif > 0)
              <small class="label pull-right bg-green">{{$notif}}</small>
              @else
              @endif
        <ul class="dropdown-menu" style="background-color: #020031;">
          <li><a href="{{url('/profile')}}">Profile</a></li>
          <li><a href="{{route('logout')}}">Logout</a></li>
        </ul>
      </li>
      <!--  <li class="dropdown">
                <span class="">
              <small class="label pull-right bg-green">15</small>
            </span><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"></a>
                <ul class="dropdown-menu" style="background-color: #020031;">
                  <li><a href="#">Profile</a></li>
                  <li><a href="#">Logout</a></li>
                  
                </ul>
              </li> -->
    <!--   <a href="{{url('/profile')}}"><i class="fa fa-user"></i> {{Auth::guard('student')->User()->name}}</a> <span class="pull-right-container">
              <small class="label pull-right bg-green">15</small>
            </span> -->
        @endauth
        @guest('student')
      <a href="{{route('student.login')}}"><i class="fa fa-sign-in"></i> Login</a>
        @endauth
        
      </div>
      <ul class="main-menu">
        <img src="{{ asset('blog/img/logoo.png') }}" alt="">
        <li class=""><a href="{{ URL::to('/home') }}">Dashboard</a>

        </li>
        <li><a href="{{URL::to('/profil')}}">Profil</a></li>
        <li><a href="{{URL::to('/programkesiswaan')}}">Program Kesiswaan</a></li>
        <li><a href="{{URL::to('/berita')}}">Berita</a></li>
        <li><a href="{{URL::to('/ppdb')}} ">Daftar Online</a></li>
        <li><a href="{{URL::to('/about')}} ">About</a></li>
        <li><a href="{{URL::to('/hasil')}} ">Hasil</a></li>
      </ul>
    </div>
  </nav>

  <!-- Header section end -->
  <!-- header section end-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
        <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Hero section -->
<!-- Breadcrumb section -->
<div class="site-breadcrumb">
    <div class="container">
      <a href="{{ url('home') }}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
      <span>Hasil</span>
    </div>
  </div>
  <!-- Breadcrumb section end -->
<!-- Hero section -->

    <!-- Blog section -->
  <section class="event-section spad pt-0">
    <div class="container">
      <div class="row">
      <div class="col-lg-8">
     <div class="box box-primary box-solid">
         <div class="box-header with-border">
              <h3 class="box-title">Hasil Pendaftaran</h3>

             
              <!-- /.box-tools -->
            </div>
            <div class="box-body">
<h2>Untuk periode tahun {{date('Y')}}</h2>
            <table class="table table-bordered" id="table">
               <thead>
                  <tr>
                     <th>Nama</th>
                     <th>No Hp</th>
                     <th>Alamat</th>
                     <th>Status Hasil</th>
                     <th>Keterangan</th>
                  </tr>
               </thead>
            </table>
           <p ><b> Bagi yang sudah diterima di SMA PGRI Rancaekek dimohon untuk menghadiri pertemuan awal bagi calon siswa/siswi dan wali dari siswa/siswi pada tanggal 20 Mei 2019 hari Selasa pukul 10.00 WIB, diruangan aula.</b></p>
            
      </div>
        </div>
      </div>



        <div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
          <!-- widget -->
          <div class="widget">
            <form class="search-widget" action="{{ url('search') }}" method="GET">
              <input type="text" name="q" placeholder="Search...">
              <button><i class="ti-search"></i></button>
            </form>
          </div>
          <!-- widget -->
          <div class="widget">
            <div class="box box-primary box-solid">
         <div class="box-header with-border">
              <h3 class="box-title"><a class="fa fa-exclamation-circle" > Kepala Sekolah </a></h3>

             
              <!-- /.box-tools -->
            </div>
            
            <div class="recent-post-widget">
              <!-- recent post -->
            
                      
      
            
          </div>
          <div class="course-info">
          <div class="post-item">
            <center><img style="border: 1px solid #ddd;

    border-radius: 4px;
    padding: 5px ;
    width: 170px;" src="{{asset('storage/kepsek/'.$data->foto)}}"></center>
                  <p align="center"></i> {{$data->created_at->format('l, d - F - Y')}}</p>
                  <h2 align="center">{{$data->nama}}</h2>
                  <h4 align="center">{!! str_limit(strip_tags($data->keterangan), 250) !!}
            @if (strlen(strip_tags($data->keterangan)) > 250)
               <a href="{{ url('about') }}" class="btn btn-info btn-sm">Lihat Selengkapnya</a>
            @endif</h4>
                  
                
        
              </div>
            </div>
          </div>
        </div>
        
          <!-- widget -->
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
    
  </section>
  <!-- Blog section -->


  <!-- Footer section -->
  <footer class="footer-section">
    
    <!-- copyright -->
    <div class="copyright">
      <div class="container">
        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | ITC SMA PGRI RANCAEKEK</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      </div>    
    </div>
  </footer>
  <!-- Footer section end-->



  <!--====== Javascripts & Jquery ======-->
  <script src="{{ asset('blog/js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('blog/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('blog/js/jquery.countdown.js') }}"></script>
  <script src="{{ asset('blog/js/masonry.pkgd.min.js') }}"></script>
  <script src="{{ asset('blog/js/magnific-popup.min.js') }}"></script>
  <script src="{{ asset('blog/js/main.js') }}"></script>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script>
         $(function() {
               $('#table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{{ url('datahasil') }}',
               columns: [
                        { data: 'nama_lengkap', name: 'nama_lengkap' },
                        { data: 'nomor_handphone', name: 'nomor_handphone' },
                        { data: 'alamat', name: 'alamat' },
                        { data: 'get_register.status', name: 'status' },
                        { data: 'get_register.note', name: 'note' }
                     ],
                columnDefs : [
        { targets : [3],
          render : function (data, type, row) {
             switch(data) {
               case '1' : return 'Diterima'; break;
               case '2' : return 'Ditolak'; break;
               case '3' : return 'Verifikasi Berkas'; break;
               case '0' : return 'Proses'; break;
               case '4' : return 'Proses'; break;
               default  : return 'N/A';
            }
          }
        }
   ]
            });
         });
         </script>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@include('sweet::alert')
</html>
      
