@extends('layouts.school',[
  'notif' => $notif
])

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Hero section -->
<!-- Breadcrumb section -->

<div class="site-breadcrumb">
		<div class="container">
			<a href="{{ url('home') }}"><i class="fa fa-home"></i> Home</a>
			
		</div>
	</div>
	<!-- Breadcrumb section end -->
<!-- Hero section -->
<section class="hero-section">
	<div class="container">
			
			<div class="row">
				<div class="col-lg-8">
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('blog/img/gallery/1.jpg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('blog/img/gallery/2.jpg')}}" alt="Second slide">
    </div>
  
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

		
		<br><br>
<div class="box box-primary box-solid">
				 <div class="box-header with-border">
              <h3 class="box-title"><a class="fa fa-exclamation-circle" > Berita Terbaru </a></h3>

             
              <!-- /.box-tools -->
            </div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-6">
						<!-- <div class="course-thumb">
						<img src="{{asset('storage/blog/'.$blog->foto)}}" alt="">
							
					</div> -->
					

					<div class="blog-item">

							<h4><a href="{{ url('berita/read/'.$blog->title) }}" style="color:black;">{{$blog->title}}</a></h4>
							<div class="blog-meta">
								<span><i class="fa fa-calendar-o"></i>{{$blog->created_at->format('l, d - F - Y')}}</span>
								
							</div>
							<p> {!! str_limit(strip_tags($blog->body), 500) !!}
            @if (strlen(strip_tags($blog->body)) > 500)
               <a href="{{ url('berita/read/'.$blog->title) }}" class="btn btn-info btn-sm">Read More</a>
            @endif</p>
					
					</div>
				
					</div>
						<div class="col-lg-6 post-list">
			@foreach ($blogs as $blogs1)
					
						<div class="blog-item">
						<!-- <div class="col-lg-6">
							<img style="border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    width: 150px;" src="{{asset('storage/blog/'.$blogs1->foto)}}">
						</div> -->
						
							<h4><a style="color:black;" href="{{ url('berita/read/'.$blogs1->title) }}"">{{$blogs1->title}}</a></h4>
							<div class="blog-meta">
								<span><i class="fa fa-calendar-o"></i>{{$blogs1->created_at->format('l, d - F - Y')}}</span>
						
					</div>
						
					
						

							
						
					
					</div>
				@endforeach
					</div>
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
               <a href="" class="btn btn-info btn-sm">Lihat Selengkapnya</a>
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

		
		
		
	</section>
	<!-- Blog section -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


@endsection

			
