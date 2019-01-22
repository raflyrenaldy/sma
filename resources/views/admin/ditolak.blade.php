 @extends('layouts.admin')

@section('content')

 <section class="content-header">
      <h1>
        Data Siswa yang ditolak
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
                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>No HP</th>
                  <th>Alamat</th>
                  <th>Tahun Ajaran</th>
                  <th>Alasan Ditolak</th>
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
                  <td>{{ $datas->get_register->note}}</td>
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
@endsection