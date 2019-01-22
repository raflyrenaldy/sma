 @extends('layouts.admin')

@section('content')

 <section class="content-header">
      <h1>
        Data Pendaftar
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pendaftar</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pendaftar</h3>
                 <form action="{{ route('admin.filterdataumum') }}" method="POST" >
                  {{csrf_field()}}
                        <button type="submit" class="btn btn-default pull-right">Terapkan</button>
                        
              <div class="col-md-4 pull-right">
              <div class="input-group">
                  <button type="button" class="btn btn-default pull-right" id="daterange-btn" >
                    <input type="hidden" name="to" id="to" value="">
                  <input type="hidden" name="from" id="from" value="">
                    <span>
                      <i class="fa fa-calendar" ></i> Filter Menurut Rentang Waktu
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
              </div>
                <div class="col-md-2 pull-right">
                <div class="input-group">
               <select class="form-control form-control-lg" id="status" name="status" value="{{ old('status') }}">
                    <option value="">Filter Status</option>
                    <option value="0">Proses</option>
                    <option value="3">Reupload Berkas</option>
                    <option value="4">Uploaded Berkas</option>
                  </select>
                </div>
                                                       
                                                    </div>
                                                   
                                          </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @if (!empty($both))
              <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                
                    {{ $both }}
                  </div>
            @endif
            @if (!empty($time))
              <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                
                    {{ $time }}
                  </div>
            @endif
            @if (!empty($status))
              <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                
                    {{ $status }}
                  </div>
            @endif
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                  <th>NISN</th>
                  <th>Kode Pendaftaran</th>
                  <th>Nama</th>
                  <th>Asal Sekolah</th>
                  <th>Jarak Ke Sekolah</th>
                  <th>Waktu Pendaftaran</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
               
                <tbody>
                   <?php $i=1; ?>
                  @foreach($data as $datas)
                 <tr>
                  <td>{{$i}}</td>
                  <td>{{ $datas->nisn}}</td>
                  <td>{{ $datas->get_register->nomer_pendaftaran}}</td>
                  <td>{{ $datas->nama_lengkap}}</td>
                  <td>{{ $datas->get_register->nama_asal_sekolah}}</td>
                  <td>{{ $datas->jarak_tempat_tinggal_ke_sekolah}} KM</td>

                  <td><?php echo App\Http\Controllers\adminppdbController::ubah($datas->created_at) ?></td>
                  @if ($datas->get_register->status == 0)
                  <td align="center"><span class="badge bg-light-blue">Proses</span></td>
                  
                  @elseif ($datas->get_register->status == 1)
                  <td align="center"><span class="badge bg-green">Diterima</span></td>
                 
                  @elseif ($datas->get_register->status == 2)
                  <td align="center"><span class="badge bg-red">Ditolak</span></td>
                 
                   @elseif ($datas->get_register->status == 3)
                  <td align="center"><span class="badge bg-black">Reupload Berkas</span></td>
                    @elseif ($datas->get_register->status == 4)
                  <td align="center"><span class="badge bg-yellow">Uploaded Berkas</span></td>
                  @endif
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