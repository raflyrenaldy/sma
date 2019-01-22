@extends('layouts.school',[
  'notif' => $notif
])

@section('content')

<div class="site-breadcrumb">
    <div class="container">
      <a href="{{ url('home') }}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
      <span>About</span>
    </div>
  </div>
<section class="blog-page-section spad pt-0">

    <div class="container">
      <div class="row">
        <div class="col-lg-8 post-list">
          @foreach($kepsek as $kepseks)
      <div class="box box-primary box-solid">
         <div class="box-header with-border">
              <h3 class="box-title"><a > Sambutan Kepala Sekolah </a></h3>

             
              <!-- /.box-tools -->
            </div>
          <div class="post-item">
             <center><img style="border: 1px solid #ddd;

    border-radius: 4px;
    padding: 5px ;
    width: 250px;" src="{{asset('storage/kepsek/'.$kepseks->foto)}}"></center>
         
            <div class="post-content">
              <h3 align="center"> {{ $kepseks->nama}}
                
              </h3>
             

              <div class="box-body">
                 <div class="post-meta">
                <span><i class="fa fa-calendar-o"></i>  {{$kepseks->created_at->format('l, d - F - Y')}}</span>
              </div>
             <p> {!! $kepseks->keterangan !!}</p>
           
            </div>
            </div>
          </div>
  @endforeach
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