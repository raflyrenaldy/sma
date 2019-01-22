@extends('layouts.admin')

@section('content')
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <a href="{{route('admin.berita')}}"><div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$blog}}</h3>

              <p>Jumlah Berita</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            
          </div></a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
           <a href="{{route('admin.dataumumppdb')}}">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$jum}}</h3>

              <p>Jumlah Pendaftar</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            
          </div>
        </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
           <a href="{{route('admin.datasiswaditerima')}}">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$accept}}</h3>

              <p>Pendaftar Diterima</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
           
          </div>
        </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
           <a href="{{route('admin.datasiswaditolak')}}">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$reject}}</h3>

              <p>Pendaftar Ditolak</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          
          </div>
        </a>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
   
      <!-- /.row (main row) -->

    </section>
    @endsection

      