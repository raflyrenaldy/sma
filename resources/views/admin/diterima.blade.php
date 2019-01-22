 @extends('layouts.admin')

@section('content')

 <section class="content-header">
      <h1>
        Data Siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Siswa</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Siswa</h3>
              <div class="row">
                <div class="col-md-10">
                  
                </div>
                <div class="col-md-2">
                   <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">Pilih Tahun Ajaran
                          <span class="caret"></span>

                        </button>
                        <ul class="dropdown-menu">
                          <li><a href="{{URL::to('/adminpage/ppdb/datasiswa')}}">Semua</a></li>
                          @foreach ($thn as $date)
                          <li><a href="{{route('datasiswa.diterima',$date[0]['created_at']->format('Y'))}}">{{$date[0]['created_at']->format('Y')}}</a></li>
                       @endforeach
                        </ul>
                      </div>
                  
                </div>
              </div>
               
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 @if (!empty($thn2))
              <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                
                    {{ $thn2 }}
                  </div>
            @endif
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>No HP</th>
                  <th>Alamat</th>
                  <th>Tahun Ajaran</th>
                  <th>Aksi</th>
                </tr>
                </thead>
               
                <tbody>
                   <?php $i=1; ?>
                  @foreach($data as $datas)
                 <tr>
                  <td>{{$i}}</td>
                  <td>{{ $datas->nama_lengkap}}</td>
                  <td>{{ $datas->jenis_kelamin}}</td>
                  <td>{{ $datas->nomor_handphone}}</td>
                  <td>{{ $datas->alamat}}</td>
                  <td>{{ $datas->get_register->created_at->format('Y')}}</td>
                  <td align="center"> 
                    <form method="GET" action="{{ url('/adminpage/ppdb/datalengkap') }}">

                    <button class="btn btn-info" id="nomer_pendaftaran" name="nomer_pendaftaran" value="{{$datas->get_register->nomer_pendaftaran}}">Lihat Selengkapnya</button>
                  </form>
                  </td>
                </tr>
                  <?php $i++;
                 ?>
                 @endforeach
                
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
     <script src="{{asset('js/app.js')}}"></script>
@endsection