@extends('layouts.school',[
  'notif' => $notif
])

@section('content')

<!-- Hero section -->
<!-- Breadcrumb section -->
<div class="site-breadcrumb">
    <div class="container">
      <a href="{{ url('home') }}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
      <span>Arsip</span>
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
              <h3 class="box-title"><a class="fa fa-exclamation-circle" > {{$month->created_at->format('F - Y')}} </a></h3>

             
              <!-- /.box-tools -->
            </div>
            <div class="box-body"  style="word-wrap: break-word;">
      <div class="row">
         @foreach ($arsip as $blogs)
        <div class="col-md-6 event-item">
          <div class="event-thumb">
            <img href="{{ url('berita/read/'.$blogs->title) }}" src="{{asset('storage/blog/'.$blogs->foto)}}" alt="">
           
          </div>
          <div class="event-info">
            <h4 ><a href="{{ url('berita/read/'.$blogs->title) }}""> {{ $blogs->title}}</a></h4>
            <p> {!! str_limit(strip_tags($blogs->body), 100)!!}
            @if (strlen(strip_tags($blogs->body)) > 100)
               <a href="{{ url('berita/read/'.$blogs->title) }}" class="btn btn-info btn-sm">Read More</a>
            @endif</p>
            <p><i class="fa fa-calendar-o"></i> {{$blogs->created_at->format('l, d - F - Y')}}
            
          </div>
        </div>
        @endforeach
      </div>
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
               <a href="{{ url('about') }}" class="btn btn-info btn-sm">Lihat Selengkapnya</a>
            @endif</h4>
                  
                
        
              </div>
            </div>
          </div>
        </div>
        @endforeach
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



@endsection

      
