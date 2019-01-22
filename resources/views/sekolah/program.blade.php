@extends('layouts.school',[
  'notif' => $notif
])

@section('content')
<style type="text/css">
ol {
    list-style-type: decimal;
    margin: 8px;
    padding-left: 25px;
}


li{
}


 table {
        width: 100%;
    }

    .header-row > td {
        width: 100px;
    }

    td.rhead {
        width: 300px
    }

</style>
<div class="site-breadcrumb">
    <div class="container">
      <a href="{{ url('home') }}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
      <span>Program Kesiswaan</span>
    </div>
  </div>
<section class="blog-page-section spad pt-0">

    <div class="container">
      <div class="row">
        <div class="col-lg-8 post-list">
          <div class="box box-primary box-solid">
         <div class="box-header with-border">
              <h3 class="box-title"><a class="fa fa-exclamation-circle" > Program Kesiswaan </a></h3>

             
              <!-- /.box-tools -->
            </div>
      <div class="box-body">
       
  <p>Program pembinaan kesiswaan terintegrasi dalam program pengembangan diri, meliputi;</p>

<ol>
  <li>Organisasi Siswa Intra Sekolah (OSIS)</li>
  <li>Latihan Dasar Kepemimpinan Siswa (LDKS)</li>
  <li>Latihan Kepemimpinan Siswa (LKS)</li>
  <li>ESKTRAKURIKULER</li>
</ol>

<p>Kegiatan Ekstra Kurikuler, sebagai media pembinaan, media kreatifitas dan media aktualisasi siswa, terdiri dari Ekstra kurikuler non akademik.</p>

<table border="1">
  <tbody>
    <tr>
      <td colspan="6">
      <p><strong>Eskul Non Akademik</strong></p>
      </td>
    </tr>
    <tr>
      <td>1.</td>
      <td>DKM</td>
      <td>6.</td>
      <td>Karate</td>
    </tr>
    <tr>
      <td>2.</td>
      <td>Pramuka</td>
      <td>7.</td>
      <td>Bulu Tangkis</td>
    </tr>
    <tr>
      <td>3.</td>
      <td>PMR</td>
      <td>8.</td>
      <td>Bola Basket</td>

    </tr>
    <tr>
      <td>4.</td>
      <td>Paskibra</td>
       <td>9.</td>
      <td>Paduan Suara</td>
    </tr>
    <tr>
      <td>5.</td>
      <td>Futsal</td>
     
    </tr>
    <tr>

    </tr>
    <tr>


    </tr>
    <tr>

    </tr>
    <tr>

    </tr>
  </tbody>
</table>

<p>&nbsp;</p>


<ol>
  <li>WAWASAN WIYATA MANDALA</li>
</ol>

<ul>
  
  <li style="margin: 8px;"><strong>Menumbuhkan Sikap Disiplin Siswa</strong></li>
</ul>

<p>Aspek pembinaan meliputi :</p>

<ol>
  <li>Penanganan siswa yang kesiangan</li>
  <li>Penertiban pakaian seragam siswa</li>
  <li>Penertiban Rambut</li>
</ol>

<p>Pelaksanaan Pembinaan:</p>

<p>Piket penyambutan siswa:</p>

<ol>
  <li>Aktivitas rutin meliputi : Penanganan siswa yang kesiangan dll</li>
  <li>Membangun partisipasi Guru</li>
</ol>

<ul>
  <li style="margin: 8px;"><strong>Menumbuhkan sikap kepedulian siswa terhadap kebersihan</strong></li>
</ul>

<p>Aspek pembinaan meliputi :</p>

<ol>
  <li style="margin: 8px;">Penumbuhan kepedulian dan aksi nyata siswa dalam penanganan kebersihan dan keasrian kelas</li>
</ol>

<p>Pelaksanaan pembinaan</p>

<ol>
  <li>Pengorganisasian dan pengkoordinasian aktifitas organisasi kelas</li>
  <li>Optimalisasi kontribusi guru pengajar, diantaranya dengan mencatat/menilai keadaan kelas</li>
  <li>Pengembangan program kelas berkarakter</li>
</ol>

<ul>
  <li style="margin: 8px;"><strong>Antisipasi Kerawanan Siswa</strong></li>
</ul>

<p>Aspek Pembinaan :</p>

<ol>
  <li>Narkoba</li>
  <li>Pornografi</li>
  <li>Tawuran</li>
  <li>Aliran Sesat</li>
  <li>Brandalan bermotor dsb</li>
</ol>

<p>Pelaksanaan Pembinaan :</p>

<ol>
  <li>Penyuluhan dari instansi / lembaga terkait</li>
  <li>Pembinaan Wali Kelas</li>
  <li>Razia</li>
</ol>

<p>Perangkat Pendukung :</p>

<ol>
  <li>Buku Catatan Kegiatan</li>
  <li>Program Penyuluhan</li>
  <li>Program Razia Kelas</li>
</ol>


</div>
</div>

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
              <h3 class="box-title"><a class="fa fa-exclamation-circle" > Kepala Sekolah </a></h3>

             
              <!-- /.box-tools -->
            </div>
          <!-- widget -->
          <div class="recent-post-widget">
              <!-- recent post -->
            @foreach ($data as $datas) 
                      
      
            
          </div>
          <div class="course-info">
          <div class="post-item">
            <center><img style="border: 1px solid #ddd;

    border-radius: 4px;
    padding: 5px ;
    width: 170px;" src="{{asset('storage/kepsek/'.$datas->foto)}}"></center>
                  <p align="center"></i> {{$datas->created_at->format('l, d - F - Y')}}</p>
                  <h2 align="center">{{$datas->nama}}</h2>
                  <h4 align="center">{!! str_limit(strip_tags($datas->keterangan), 250) !!}
            @if (strlen(strip_tags($datas->keterangan)) > 250)
               <a href="" class="btn btn-info btn-sm">Lihat Selengkapnya</a>
            @endif</h4>
                  
                
        
              </div>
            </div>
          </div>
        </div>
        @endforeach
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

   
           
	@endsection