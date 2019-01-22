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




ul li{
     list-style-type: square; /* Remove list bullets */
    margin: 8px;
    margin-left: 5px;
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
      <span>Berita</span>
    </div>
  </div>

<section class="blog-page-section spad pt-0">

    <div class="container">

      <div class="row">
        <div class="col-lg-8 post-list">
        
          <br>
          @if ($blog->count())
            @if ($query != '0')
            <div class="alert alert-block alert-info fade in">
                                <button type="button" class="close close-sm" data-dismiss="alert">
                                    <i class="fa fa-times" ></i>
                                </button>
                                <strong>Pencarian berita '{{$query}}'</strong> 
                            </div>
                            @endif
          @foreach ($blog as $blogs)
          <div class="post-item">
            <div class="box box-primary box-solid">
         <div class="box-header with-border">
              <h3 class="box-title"><a href="{{ url('berita/read/'.$blogs->title) }}" >{{ $blogs->title}} </a></h3>

             
              <!-- /.box-tools -->
            </div>
            @if($blogs->foto == null)
            @else
            <div class="post-thumb set-bg" data-setbg="{{asset('storage/blog/'.$blogs->foto)}}"></div>
            @endif
            <div class="post-content">
              
              

              <div class="box-body" style="word-wrap: break-word;">
                
<div class="post-meta">
                <span><i class="fa fa-calendar-o"></i> {{$blogs->created_at->format('l, d - F - Y')}}</span>
              </div>
             <p> {!!$blogs->body !!}</p>
           
            </div>
            </div>
          </div>
        </div>
          @endforeach
           @else
      <div class="alert alert-block alert-danger fade in">
                                <button type="button" class="close close-sm" data-dismiss="alert">
                                    <i class="fa fa-times" ></i>
                                </button>
                                <strong><i class="fa fa-exclamation-triangle" ></i>Data yang dicari tidak ada</strong> 
                            </div>
                            @endif
          
          <ul class="site-pageination">
            {{$blog->links()}}
          </ul>
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

            </div>
          <!-- widget -->
          <div class="recent-post-widget">
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
             
               <a id="id" href="{{ url('/about') }}" name="id" value="" class="btn btn-info btn-sm">Lihat Selengkapnya</a>
            
            @endif</h4>
                  
                      </div>
            </div>
          </div>
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
    </div>
  </section>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

   
           
	@endsection