@extends('layouts.admin')

@section('content')

 <section class="content">
{{ csrf_field() }}
  @if ($data->count())
@foreach($data as $datas)
      <div class="register{{$datas->get_register->id}} row">
        <div class="col-md-4">
 @if($errors->count() > 0)
<div id="ERROR_COPY" style="display: none" class="alert alert-danger">
@foreach($errors->all() as $error)
{{$error}}
@endforeach
</div>
@endif
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="tes-aja box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('storage/picture/'.$datas->get_register->nomer_pendaftaran .'/' .$datas->foto)}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$datas->nama_lengkap}}</h3>

              <p class="text-muted text-center">{{$datas->get_register->nomer_pendaftaran}}</p>
              @if($datas->get_register->status == 0)
              <p ><h2 class="text-muted text-center text-aqua" >BELUM DIVERIFIKASI</h2></p>
              @elseif ($datas->get_register->status == 1)
              <p ><h2 class="text-muted text-center text-green" >DITERIMA</h2></p>
                @elseif ($datas->get_register->status == 2)
              <p ><h2 class="text-muted text-center text-red" >DITOLAK</h2></p>
              @elseif ($datas->get_register->status == 3)
              <p ><h2 class="text-muted text-center text-yellow" >REUPLOAD BERKAS</h2></p>
              @elseif ($datas->get_register->status == 4)
              <p ><h2 class="text-muted text-center text-yellow" >UPLOADED BERKAS</h2></p>
              @endif
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Jalur Pendaftaran</b> <a class="pull-right">{{$datas->get_register->jalur_pendaftaran }}</a>
                </li>
                <li class="list-group-item">
                  <b>Pilihan Satu</b> <a class="pull-right">{{$datas->get_register->pilihan_satu }}</a>
                </li>
                <li class="list-group-item">
                  <b>Pilihan Dua</b> <a class="pull-right">{{$datas->get_register->pilihan_dua }}</a>
                </li>
                <li class="list-group-item">
                  <b>Asal Sekolah</b> <a class="pull-right">{{$datas->get_register->nama_asal_sekolah }}</a>
                </li>
                <li class="list-group-item">
                  <b>Alamat Asal Sekolah</b> <a class="pull-right">{{$datas->get_register->alamat_asal_sekolah }}</a>
                </li>
                <li class="list-group-item">
                  <b>No Ujian Nasional</b> <a class="pull-right">{{$datas->get_register->nomor_ujian_nasional_sebelumnya }}</a>
                </li>
                <li class="list-group-item">
                  <b>No Seri SKHUN</b> <a class="pull-right">{{$datas->get_register->nomo_seri_skhun_sebelumnya }}</a>
                </li>
                <li class="list-group-item">
                  <b>No Seri Ijazah</b> <a class="pull-right">{{$datas->get_register->nomor_seri_ijazah_sebelumnya }}</a>
                </li>
                 <li class="list-group-item">
                  <b>Prestasi</b> <a class="pull-right">{{$datas->get_register->prestasi_yang_pernah_diraih }}</a>
                </li>
               <li class="list-group-item">
                  <b>Waktu Registrasi</b> <a class="pull-right">{{$datas->get_register->created_at->format('l, d - F - Y') }}</a>
                </li>
              </ul>
              <form method="post" action="{{route('siswa.update', $datas->get_register->id)}}">
          {{ csrf_field() }}
    {{ method_field('patch') }}
    @if ($datas->get_register->status == '0' || $datas->get_register->status == '3' || $datas->get_register->status == '4')
                    <input type="hidden" name="id" id="id" value="{{ $datas->get_register->id}}">
              <a data-toggle="modal" data-target="#edit1" class="edit-modal btn btn-info btn-block" data-id="{{ $datas->get_register->id }}" data-jalur="{{ $datas->get_register->jalur_pendaftaran }}" data-satu="{{ $datas->get_register->pilihan_satu }}" data-dua="{{ $datas->get_register->pilihan_dua }}" data-nama="{{ $datas->get_register->nama_asal_sekolah }}" data-alamat="{{ $datas->get_register->alamat_asal_sekolah }}" data-nusn="{{ $datas->get_register->nomor_ujian_nasional_sebelumnya }}" data-skhun="{{ $datas->get_register->nomo_seri_skhun_sebelumnya }}" data-ijazah="{{ $datas->get_register->nomor_seri_ijazah_sebelumnya }}" data-prestasi="{{ $datas->get_register->prestasi_yang_pernah_diraih }}">Edit Registrasi</a>
             <a data-toggle="modal" data-target="#delete"class="delete-modal btn btn-danger btn-block" data-id="{{$datas->get_register->id}}">
              Hapus Data</a>
             <button class="update btn btn-success btn-block" id="status" name="status" value="1">
              Diterima</button>
              <button type="button" data-toggle="modal" data-target="#tolak" class="update btn btn-warning btn-block" id="status" name="status" value="2" data-id="{{ $datas->get_register->id }}" data-value="2">
              Ditolak</button>
              @elseif ($datas->get_register->status == '1')
              <input type="hidden" name="id" id="id" value="{{ $datas->get_register->id}}">
              <a data-toggle="modal" data-target="#edit1" class="edit-modal btn btn-info btn-block" data-id="{{ $datas->get_register->id }}" data-jalur="{{ $datas->get_register->jalur_pendaftaran }}" data-satu="{{ $datas->get_register->pilihan_satu }}" data-dua="{{ $datas->get_register->pilihan_dua }}" data-nama="{{ $datas->get_register->nama_asal_sekolah }}" data-alamat="{{ $datas->get_register->alamat_asal_sekolah }}" data-nusn="{{ $datas->get_register->nomor_ujian_nasional_sebelumnya }}" data-skhun="{{ $datas->get_register->nomo_seri_skhun_sebelumnya }}" data-ijazah="{{ $datas->get_register->nomor_seri_ijazah_sebelumnya }}" data-prestasi="{{ $datas->get_register->prestasi_yang_pernah_diraih }}">Edit Registrasi</a>
             <a data-toggle="modal" data-target="#delete"class="delete-modal btn btn-danger btn-block" data-id="{{$datas->get_register->id}}">
              Hapus Data</a>
                <button class="update btn btn-success btn-block" id="status" name="status" value="1" disabled>
              Diterima</button>
               @elseif ($datas->get_register->status == '2')
                <input type="hidden" name="id" id="id" value="{{ $datas->get_register->id}}">
              <a data-toggle="modal" data-target="#edit1" class="edit-modal btn btn-info btn-block" data-id="{{ $datas->get_register->id }}" data-jalur="{{ $datas->get_register->jalur_pendaftaran }}" data-satu="{{ $datas->get_register->pilihan_satu }}" data-dua="{{ $datas->get_register->pilihan_dua }}" data-nama="{{ $datas->get_register->nama_asal_sekolah }}" data-alamat="{{ $datas->get_register->alamat_asal_sekolah }}" data-nusn="{{ $datas->get_register->nomor_ujian_nasional_sebelumnya }}" data-skhun="{{ $datas->get_register->nomo_seri_skhun_sebelumnya }}" data-ijazah="{{ $datas->get_register->nomor_seri_ijazah_sebelumnya }}" data-prestasi="{{ $datas->get_register->prestasi_yang_pernah_diraih }}">Edit Registrasi</a>
             <a data-toggle="modal" data-target="#delete"class="delete-modal btn btn-danger btn-block" data-id="{{$datas->get_register->id}}">
              Hapus Data</a>
              <button class="update btn btn-warning btn-block" id="status" name="status" value="2" disabled>
              Ditolak</button>
              @endif
            </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#biodata" data-toggle="tab">Biodata</a></li>
              <li><a href="#ayah" data-toggle="tab">Ayah</a></li>
              <li><a href="#ibu" data-toggle="tab">Ibu</a></li>
              @if ($datas->nama_wali == null)
              @else
              <li><a href="#wali" data-toggle="tab">Wali</a></li>
              @endif
              <li><a href="#berkas" data-toggle="tab">Berkas</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="biodata">
                 <div class="row">
                    <div class="col-sm-5">
                <ul class="list-group list-group-unbordered">
                 
                <li class="list-group-item">
                  <b>Nama Lengkap</b> <a class="pull-right">{{$datas->nama_lengkap }}</a>
                </li>
                <li class="list-group-item">
                  <b>Jenis Kelamin</b> <a class="pull-right">{{$datas->jenis_kelamin }}</a>
                </li>
                 <li class="list-group-item">
                  <b>Hobi</b> <a class="pull-right">{{$datas->get_register->hobi }}</a>
                </li>
                <li class="list-group-item">
                  <b>Cita - Cita</b> <a class="pull-right">{{$datas->get_register->cita_cita }}</a>
                </li>
                <li class="list-group-item">
                  <b>NISN</b> <a class="pull-right">{{$datas->nisn }}</a>
                </li>
                <li class="list-group-item">
                  <b>NIK</b> <a class="pull-right">{{$datas->nik }}</a>
                </li>
                <li class="list-group-item">
                  <b>Tempat Lahir</b> <a class="pull-right">{{$datas->tempat_lahir }}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Lahir</b> <a class="pull-right">{{$datas->tanggal_lahir }}</a>
                </li>
                <li class="list-group-item">
                  <b>Agama</b> <a class="pull-right">{{$datas->agama }}</a>
                </li>
                <li class="list-group-item">
                  <b>Kebutuhan Khusus</b> <a class="pull-right">{{$datas->kebutuhan_khusus }}</a>
                </li>
                 <li class="list-group-item">
                  <b>Alamat</b> <a class="pull-right">{{$datas->alamat }}</a>
                </li>
                <li class="list-group-item">
                  <b>Provinsi</b> <a class="pull-right">{{$datas->get_provinces->name }}</a>
                </li>
                <li class="list-group-item">
                  <b>Kota/Kab</b> <a class="pull-right">{{$datas->get_regencies->name }}</a>
                </li>
                <li class="list-group-item">
                  <b>Kecamatan</b> <a class="pull-right">{{$datas->get_districts->name }}</a>
                </li>
                <li class="list-group-item">
                  <b>Kelurahan</b> <a class="pull-right">{{$datas->get_villages->name }}</a>
                </li>
                <li class="list-group-item">
                  <b>Kode Pos</b> <a class="pull-right">{{$datas->kode_pos }}</a>
                </li>
              </div>
              <div class="col-sm-7">
                 <li class="list-group-item">
                  <b>Tempat Tinggal</b> <a class="pull-right">{{$datas->tempat_tinggal }}</a>
                </li>
                 <li class="list-group-item">
                  <b>Transportasi</b> <a class="pull-right">{{$datas->transportasi }}</a>
                </li>
                 <li class="list-group-item">
                  <b>Nomor Handphone</b> <a class="pull-right">{{$datas->nomor_handphone }}</a>
                </li>
                 <li class="list-group-item">
                  <b>Nomor Telepon</b> <a class="pull-right">{{$datas->nomor_telepon }}</a>
                </li>
                 <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{$datas->email }}</a>
                </li>
                </li>
                <li class="list-group-item">
                  <b>Nomor SKTM</b> <a class="pull-right">{{$datas->sktm }}</a>
                </li>
                <li class="list-group-item">
                  <b>Kewarganegaraan</b> <a class="pull-right">{{$datas->kewarganegaraan }}</a>
                </li>
                <li class="list-group-item">
                  <b>Tinggi Badan</b> <a class="pull-right">{{$datas->tinggi_badan }} CM</a>
                </li>
                <li class="list-group-item">
                  <b>Berat Badan</b> <a class="pull-right">{{$datas->berat_badan }} KG</a>
                </li>
                 <li class="list-group-item">
                  <b>Jumlah Saudara Kandung</b> <a class="pull-right">{{$datas->jumlah_saudara_kandung }}</a>
                </li>
                 <li class="list-group-item">
                  <b>Jarak Tempat Tinggal Ke Sekolah (KM)</b> <a class="pull-right">{{$datas->jarak_tempat_tinggal_ke_sekolah }}</a>
                </li>

              </div>

               </div>
                <button data-toggle="modal" data-target="#edit2" class="btn btn-info btn-block" data-id="{{ $datas->biodata_id }}" data-nama="{{$datas->nama_lengkap }}" data-jenis="{{ $datas->jenis_kelamin }}" data-nisn="{{$datas->nisn}}" data-nik="{{$datas->nik }}" data-tempat="{{$datas->tempat_lahir }}" data-tanggal="{{$datas->tanggal_lahir}}" data-agama="{{$datas->agama}}" data-kebutuhan="{{$datas->kebutuhan_khusus}}" data-alamat="{{$datas->alamat}}" data-provinces="{{$datas->get_provinces->id}}" data-districts="{{$datas->get_districts->id}}" data-regencies="{{$datas->get_regencies->id}}" data-villages="{{$datas->get_villages->id}}" data-kode="{{$datas->kode_pos}}" data-tinggal="{{$datas->tempat_tinggal}}" data-transportasi="{{$datas->transportasi}}" data-hp="{{$datas->nomor_handphone}}" data-telp="{{$datas->nomor_telepon}}" data-email="{{$datas->email}}" data-kis="{{$datas->nomor_kartu_kesehatan_kis}}" data-kip = "{{$datas->nomor_kartu_indonesia_pintar}}" data-kps="{{$datas->nomor_kartu_pra_sejahtera}}" data-kks="{{$datas->nomor_kartu_keluarga_sejahtera}}" data-sktm="{{$datas->sktm}}" data-kewarganegaraan="{{$datas->kewarganegaraan}}" data-foto="{{$datas->foto}}" data-tinggi="{{$datas->tinggi_badan}}" data-berat="{{$datas->berat_badan}}" data-jumlah="{{$datas->jumlah_saudara_kandung}}" data-jarak="{{$datas->jarak_tempat_tinggal_ke_sekolah}}" data-reg="{{$datas->register_id}}" >Edit Biodata</button>
                    
              </ul>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="ayah">
                <!-- The timeline -->
                <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nama Ayah</b> <a class="pull-right">{{ $datas->nama_ayah }}</a>
                </li>
                <li class="list-group-item">
                  <b>Tahun Lahir Ayah</b> <a class="pull-right">{{ $datas->tahun_ayah_lahir }}</a>
                </li>
                <li class="list-group-item">
                  <b>Pendidikan Ayah</b> <a class="pull-right">{{ $datas->pendidikan_ayah }}</a>
                </li>
                <li class="list-group-item">
                  <b>Pekerjaan Ayah</b> <a class="pull-right">{{ $datas->pekerjaan_ayah }}</a>
                </li>
                <li class="list-group-item">
                  <b>Penghasilan Bulanan Ayah</b> <a class="pull-right">{{ $datas->penghasilan_bulanan_ayah }}</a>
                </li>
                <li class="list-group-item">
                  <b>Kebutuhan Khusus Ayah</b> <a class="pull-right">{{ $datas->kebutuhan_khusus_ayah }}</a>
                </li>
                 <button data-toggle="modal" data-target="#edit3" class="btn btn-info btn-block" data-id="{{$datas->father_id}}" data-nama="{{$datas->nama_ayah}}" data-tahun="{{$datas->tahun_ayah_lahir}}" data-pendidikan="{{$datas->pendidikan_ayah}}" data-pekerjaan="{{$datas->pekerjaan_ayah}}" data-penghasilan="{{$datas->penghasilan_bulanan_ayah}}" data-kebutuhan="{{$datas->kebutuhan_khusus_ayah}}"><b>Edit Biodata Ayah</b></button>
              </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="ibu">
                 <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nama Ibu</b> <a class="pull-right">{{ $datas->nama_ibu }}</a>
                </li>
                <li class="list-group-item">
                  <b>Tahun Lahir Ibu</b> <a class="pull-right">{{ $datas->tahun_ibu_lahir }}</a>
                </li>
                <li class="list-group-item">
                  <b>Pendidikan Ibu</b> <a class="pull-right">{{ $datas->pendidikan_ibu }}</a>
                </li>
                <li class="list-group-item">
                  <b>Pekerjaan Ibu</b> <a class="pull-right">{{ $datas->pekerjaan_ibu }}</a>
                </li>
                <li class="list-group-item">
                  <b>Penghasilan Bulanan Ibu</b> <a class="pull-right">{{ $datas->penghasilan_bulanan_ibu }}</a>
                </li>
                <li class="list-group-item">
                  <b>Kebutuhan Khusus Ibu</b> <a class="pull-right">{{ $datas->kebutuhan_khusus_ibu }}</a>
                </li>
                 <button data-toggle="modal" data-target="#edit4" class="btn btn-info btn-block" data-id="{{$datas->mother_id}}" data-nama="{{$datas->nama_ibu}}" data-tahun="{{$datas->tahun_ibu_lahir}}" data-pendidikan="{{$datas->pendidikan_ibu}}" data-pekerjaan="{{$datas->pekerjaan_ibu}}" data-penghasilan="{{$datas->penghasilan_bulanan_ibu}}" data-kebutuhan="{{$datas->kebutuhan_khusus_ibu}}"><b>Edit Biodata Ibu</b></button>
              </ul>
              </div>
            <div class="tab-pane" id="wali">
                <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nama Wali</b> <a class="pull-right">{{ $datas->nama_wali }}</a>
                </li>
                <li class="list-group-item">
                  <b>Tahun Lahir Wali</b> <a class="pull-right">{{ $datas->tahun_wali_lahir }}</a>
                </li>
                <li class="list-group-item">
                  <b>Pendidikan Wali</b> <a class="pull-right">{{ $datas->pendidikan_wali }}</a>
                </li>
                <li class="list-group-item">
                  <b>Pekerjaan Wali</b> <a class="pull-right">{{ $datas->pekerjaan_wali }}</a>
                </li>
                <li class="list-group-item">
                  <b>Penghasilan Bulanan Wali</b> <a class="pull-right">{{ $datas->penghasilan_bulanan_wali }}</a>
                </li>
                <li class="list-group-item">
                  <b>Kebutuhan Khusus Wali</b> <a class="pull-right">{{ $datas->kebutuhan_khusus_wali }}</a>
                </li>
                 <button data-toggle="modal" data-target="#edit5" class="btn btn-info btn-block" data-id="{{$datas->wali_id}}" data-nama="{{$datas->nama_wali}}" data-tahun="{{$datas->tahun_wali_lahir}}" data-pendidikan="{{$datas->pendidikan_wali}}" data-pekerjaan="{{$datas->pekerjaan_wali}}" data-penghasilan="{{$datas->penghasilan_bulanan_wali}}" data-kebutuhan="{{$datas->kebutuhan_khusus_wali}}"><b>Edit Biodata Wali</b></button>
              </ul>
              </div>
              <div class="tab-pane" id="berkas">
                <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                <form action="{{ route('admin.delete.akta',$files->id) }}" id="formDeleteAkta" method="POST">
                  {{ csrf_field() }}
                <b>Akta Kelahiran</b>
                @if(empty($files->akta_kelahiran))
                <div class="pull-right"> Telah dihapus</div>
                @else
                 <button type="submit" class="btn btn-danger pull-right fa fa-close deleteakta" style="
                 padding-top: 4px;" data-id="{{$files->id }}" onclick="deleteAkta()"></button>
                @endif
                  <a class="pull-right" href="{{asset('storage/picture/'.$datas->get_register->nomer_pendaftaran .'/' .$files->akta_kelahiran)}}" target="_blank">{{ $files->akta_kelahiran}}</a>
                </form>
                </li>

                <li class="list-group-item">
                   <form action="{{ route('admin.delete.ijazah',$files->id) }}" method="POST">
                  {{ csrf_field() }}
                @if(empty($files->ijazah))
                <div class="pull-right"> Telah dihapus</div>
                @else
                 <button type="submit" class="btn btn-danger pull-right fa fa-close deleteakta" style="
                 padding-top: 4px;" data-id="{{$files->id }}" onclick="deleteIjazah()"></button>
                @endif
                  <b>Ijazah</b> <a class="pull-right" href="{{asset('storage/picture/'.$datas->get_register->nomer_pendaftaran .'/' .$files->ijazah)}}" target="_blank">{{ $files->ijazah}}</a>
                  </form>
                </li>
                

                <li class="list-group-item">
                  <form action="{{ route('admin.delete.skhun',$files->id) }}" method="POST">
                  {{ csrf_field() }}
                @if(empty($files->skhun))
                <div class="pull-right"> Telah dihapus</div>
                @else
                 <button type="submit" class="btn btn-danger pull-right fa fa-close deleteakta" style="
                 padding-top: 4px;" data-id="{{$files->id }}" onclick="deleteSkhun()"></button>
                @endif
                  <b>SKHUN</b> <a class="pull-right" href="{{asset('storage/picture/'.$datas->get_register->nomer_pendaftaran .'/' .$files->skhun)}}" target="_blank">{{ $files->skhun}}</a>
                  </form>
                </li>

                <li class="list-group-item">
                  <form action="{{ route('admin.delete.kk',$files->id) }}" method="POST">
                  {{ csrf_field() }}
                @if(empty($files->kartu_keluarga))
                <div class="pull-right"> Telah dihapus</div>
                @else
                 <button type="submit" class="btn btn-danger pull-right fa fa-close deleteakta" style="
                 padding-top: 4px;" data-id="{{$files->id }}" onclick="deleteKK()"></button>
                @endif
                  <b>Kartu Keluarga</b> <a class="pull-right" href="{{asset('storage/picture/'.$datas->get_register->nomer_pendaftaran .'/' .$files->kartu_keluarga)}}" target="_blank">{{ $files->kartu_keluarga}}</a>
                </form>
                </li>

                <li class="list-group-item">
                  <form action="{{ route('admin.delete.ktp',$files->id) }}" method="POST">
                  {{ csrf_field() }}
                @if(empty($files->ktp_ortu))
                <div class="pull-right"> Telah dihapus</div>
                @else
                <button type="submit" class="btn btn-danger pull-right fa fa-close deleteakta" style="
                 padding-top: 4px;" data-id="{{$files->id }}" onclick="deleteKTP()"></button>
                @endif
                  <b>KTP Orang Tua</b> <a class="pull-right" href="{{asset('storage/picture/'.$datas->get_register->nomer_pendaftaran .'/' .$files->ktp_ortu)}}" target="_blank">{{ $files->ktp_ortu}}</a>
                </form>
                </li>

                <li class="list-group-item">
                  <form action="{{ route('admin.delete.skb',$files->id) }}" method="POST">
                  {{ csrf_field() }}
                @if(empty($files->surat_kelakuan_baik))
                <div class="pull-right"> Telah dihapus</div>
                @else
                <button type="submit" class="btn btn-danger pull-right fa fa-close deleteakta" style="
                 padding-top: 4px;" data-id="{{$files->id }}" onclick="deleteSKB()"></button>
                @endif
                  <b>Surat Kelakuan Baik</b> <a class="pull-right" href="{{asset('storage/picture/'.$datas->get_register->nomer_pendaftaran .'/' .$files->surat_kelakuan_baik)}}" target="_blank">{{ $files->surat_kelakuan_baik}}</a>
                </form>
                </li>
                
              </ul>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
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
     
<div id="edit5" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Biodata Orang Tua</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal" method="post" action="{{route('wali.update', $datas->wali_id)}}">
           {{method_field('patch')}}
                                            {{csrf_field()}}
      <input type="hidden" name="id" id="id" value="">
       <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nama Wali</label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="nama_wali" name="nama_wali" placeholder="" >
              </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Tahun Lahir Wali</label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="tahun_wali_lahir" name="tahun_wali_lahir" placeholder="Tahun Lahir Wali Kandung, Contoh : 1955">
              </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Pendidikan Wali</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="pendidikan_wali" name="pendidikan_wali">
                    <option>Pilih</option>
                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                    <option value="Putus SD">Putus SD</option>
                    <option value="SD Sederajat">SD Sederajat</option>
                    <option value="SMP Sederajat">SMP Sederajat</option>
                    <option value="SMA Sederajat">SMA Sederajat</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4/S1">D4/S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                  </select>
              </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Pekerjaan Wali</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="pekerjaan_wali" name="pekerjaan_wali">
                    <option>Pilih</option>
                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                    <option value="Nelayan">Nelayan</option>
                    <option value="Petani">Petani</option>
                    <option value="Peternak">Peternak</option>
                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                    <option value="Pedagang Besar">Pedagang Besar</option>
                    <option value="Wiraswasta">Wiraswasta</option>
                    <option value="Wirausaha">Wirausaha</option>
                    <option value="Buruh">Buruh</option>
                    <option value="Pensiunan">Pensiunan</option>
                    <option value="Lain-Lain">Lain-Lain</option>
                  </select>
              </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Penghasilan Bulanan Wali</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="penghasilan_bulanan_wali" name="penghasilan_bulanan_wali">
                    <option>Pilih</option>
                    <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                    <option value="500.000 - 999.999">500.000 - 999.999</option>
                    <option value="1 Juta - 1.999.999">1 Juta - 1.999.999</option>
                    <option value="2 Juta - 4.999.999">2 Juta - 4.999.999</option>
                    <option value="5 Juta - 20 Juta">5 Juta - 20 Juta</option>
                    <option value="Lebih dari 20 Juta">Lebih dari 20 Juta</option>
                  </select>
              </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Kebutuhan Khusus Wali</label>
                  <div class="col-sm-8">
                <select name="kebutuhan_khusus_wali" class="form-control form-control-lg" id="kebutuhan_khusus_wali">
                    <option value="Tidak">Tidak</option>
                    <option value="Tuna Netra">Tuna Netra</option>
                    <option value="Tuna Rungu">Tuna Rungu</option>
                    <option value="Tuna Grahita ringan">Tuna Grahita ringan</option>
                    <option value="Tuna Grahita Sedang">Tuna Grahita Sedang</option>
                    <option value="Tuna Daksa Ringan">Tuna Daksa Ringan</option>
                    <option value="Tuna Daksa Sedang">Tuna Daksa Sedang</option>
                    <option value="Tuna Laras">Tuna Laras</option>
                    <option value="Tuna Wicara">Tuna Wicara</option>
                    <option value="Tuna ganda">Tuna ganda</option>
                    <option value="Hiper aktif">Hiper aktif</option>
                    <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                    <option value="Bakat Istimewa">Bakat Istimewa</option>
                    <option value="Kesulitan Belajar">Kesulitan Belajar</option>
                    <option value="Narkoba">Narkoba</option>
                    <option value="Indigo">Indigo</option>
                    <option value="Down Sindrome">Down Sindrome</option>
                    <option value="Autis">Autis</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
              </div>
          </div>
       
                {{-- Form Delete Post --}}
     
      </div>
      <div class="modal-footer">

        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="fa fa-close"></span>
        </button>

        <button type="submit" name="submit" class="btn btn-warning" >
          Sumbit
        </button>
 </form>
      </div>
    </div>
  </div>
</div>
<div id="edit4" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Biodata Orang Tua</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal" method="post" action="{{route('mother.update', $datas->mother_id)}}">
           {{method_field('patch')}}
                                            {{csrf_field()}}
      <input type="hidden" name="id" id="id" value="">
       <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nama Ibu</label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="" >
              </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Tahun Lahir Ibu</label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="tahun_ibu_lahir" name="tahun_ibu_lahir" placeholder="Tahun Lahir Ibu Kandung, Contoh : 1955">
              </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Pendidikan Ibu</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="pendidikan_ibu" name="pendidikan_ibu">
                    <option>Pilih</option>
                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                    <option value="Putus SD">Putus SD</option>
                    <option value="SD Sederajat">SD Sederajat</option>
                    <option value="SMP Sederajat">SMP Sederajat</option>
                    <option value="SMA Sederajat">SMA Sederajat</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4/S1">D4/S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                  </select>
              </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Pekerjaan Ibu</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="pekerjaan_ibu" name="pekerjaan_ibu">
                    <option>Pilih</option>
                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                    <option value="Nelayan">Nelayan</option>
                    <option value="Petani">Petani</option>
                    <option value="Peternak">Peternak</option>
                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                    <option value="Pedagang Besar">Pedagang Besar</option>
                    <option value="Wiraswasta">Wiraswasta</option>
                    <option value="Wirausaha">Wirausaha</option>
                    <option value="Buruh">Buruh</option>
                    <option value="Pensiunan">Pensiunan</option>
                    <option value="Lain-Lain">Lain-Lain</option>
                  </select>
              </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Penghasilan Bulanan Ibu</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="penghasilan_bulanan_ibu" name="penghasilan_bulanan_ibu">
                    <option>Pilih</option>
                    <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                    <option value="500.000 - 999.999">500.000 - 999.999</option>
                    <option value="1 Juta - 1.999.999">1 Juta - 1.999.999</option>
                    <option value="2 Juta - 4.999.999">2 Juta - 4.999.999</option>
                    <option value="5 Juta - 20 Juta">5 Juta - 20 Juta</option>
                    <option value="Lebih dari 20 Juta">Lebih dari 20 Juta</option>
                  </select>
              </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Kebutuhan Khusus Ibu</label>
                  <div class="col-sm-8">
                <select name="kebutuhan_khusus_ibu" class="form-control form-control-lg" id="kebutuhan_khusus_ibu">
                    <option value="Tidak">Tidak</option>
                    <option value="Tuna Netra">Tuna Netra</option>
                    <option value="Tuna Rungu">Tuna Rungu</option>
                    <option value="Tuna Grahita ringan">Tuna Grahita ringan</option>
                    <option value="Tuna Grahita Sedang">Tuna Grahita Sedang</option>
                    <option value="Tuna Daksa Ringan">Tuna Daksa Ringan</option>
                    <option value="Tuna Daksa Sedang">Tuna Daksa Sedang</option>
                    <option value="Tuna Laras">Tuna Laras</option>
                    <option value="Tuna Wicara">Tuna Wicara</option>
                    <option value="Tuna ganda">Tuna ganda</option>
                    <option value="Hiper aktif">Hiper aktif</option>
                    <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                    <option value="Bakat Istimewa">Bakat Istimewa</option>
                    <option value="Kesulitan Belajar">Kesulitan Belajar</option>
                    <option value="Narkoba">Narkoba</option>
                    <option value="Indigo">Indigo</option>
                    <option value="Down Sindrome">Down Sindrome</option>
                    <option value="Autis">Autis</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
              </div>
          </div>
       
                {{-- Form Delete Post --}}
     
      </div>
      <div class="modal-footer">

        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="fa fa-close"></span>
        </button>

        <button type="submit" name="submit" class="btn btn-warning" >
          Sumbit
        </button>
 </form>
      </div>
    </div>
  </div>
</div>
             <div id="edit3" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Biodata Orang Tua</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal" method="post" action="{{route('father.update', $datas->father_id)}}">
           {{method_field('patch')}}
                                            {{csrf_field()}}
      <input type="hidden" name="id" id="id" value="">
       <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nama Ayah</label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="" >
              </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Tahun Lahir Ayah</label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="tahun_ayah_lahir" name="tahun_ayah_lahir" placeholder="Tahun Lahir Ayah Kandung, Contoh : 1955">
              </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Pendidikan Ayah</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="pendidikan_ayah" name="pendidikan_ayah">
                    <option>Pilih</option>
                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                    <option value="Putus SD">Putus SD</option>
                    <option value="SD Sederajat">SD Sederajat</option>
                    <option value="SMP Sederajat">SMP Sederajat</option>
                    <option value="SMA Sederajat">SMA Sederajat</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4/S1">D4/S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                  </select>
              </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Pekerjaan Ayah</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="pekerjaan_ayah" name="pekerjaan_ayah">
                    <option>Pilih</option>
                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                    <option value="Nelayan">Nelayan</option>
                    <option value="Petani">Petani</option>
                    <option value="Peternak">Peternak</option>
                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                    <option value="Pedagang Besar">Pedagang Besar</option>
                    <option value="Wiraswasta">Wiraswasta</option>
                    <option value="Wirausaha">Wirausaha</option>
                    <option value="Buruh">Buruh</option>
                    <option value="Pensiunan">Pensiunan</option>
                    <option value="Lain-Lain">Lain-Lain</option>
                  </select>
              </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Penghasilan Bulanan Ayah</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="penghasilan_bulanan_ayah" name="penghasilan_bulanan_ayah">
                    <option>Pilih</option>
                    <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                    <option value="500.000 - 999.999">500.000 - 999.999</option>
                    <option value="1 Juta - 1.999.999">1 Juta - 1.999.999</option>
                    <option value="2 Juta - 4.999.999">2 Juta - 4.999.999</option>
                    <option value="5 Juta - 20 Juta">5 Juta - 20 Juta</option>
                    <option value="Lebih dari 20 Juta">Lebih dari 20 Juta</option>
                  </select>
              </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Kebutuhan Khusus Ayah</label>
                  <div class="col-sm-8">
                <select name="kebutuhan_khusus_ayah" class="form-control form-control-lg" id="kebutuhan_khusus_ayah">
                    <option value="Tidak">Tidak</option>
                    <option value="Tuna Netra">Tuna Netra</option>
                    <option value="Tuna Rungu">Tuna Rungu</option>
                    <option value="Tuna Grahita ringan">Tuna Grahita ringan</option>
                    <option value="Tuna Grahita Sedang">Tuna Grahita Sedang</option>
                    <option value="Tuna Daksa Ringan">Tuna Daksa Ringan</option>
                    <option value="Tuna Daksa Sedang">Tuna Daksa Sedang</option>
                    <option value="Tuna Laras">Tuna Laras</option>
                    <option value="Tuna Wicara">Tuna Wicara</option>
                    <option value="Tuna ganda">Tuna ganda</option>
                    <option value="Hiper aktif">Hiper aktif</option>
                    <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                    <option value="Bakat Istimewa">Bakat Istimewa</option>
                    <option value="Kesulitan Belajar">Kesulitan Belajar</option>
                    <option value="Narkoba">Narkoba</option>
                    <option value="Indigo">Indigo</option>
                    <option value="Down Sindrome">Down Sindrome</option>
                    <option value="Autis">Autis</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
              </div>
          </div>
       
                {{-- Form Delete Post --}}
     
      </div>
      <div class="modal-footer">

        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="fa fa-close"></span>
        </button>

        <button type="submit" name="submit" class="btn btn-warning" >
          Sumbit
        </button>
 </form>
      </div>
    </div>
  </div>
</div>
             <div id="edit2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Biodata</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal" method="post" action="{{route('biodata.update', $datas->biodata_id)}}">
           {{method_field('patch')}}
                                            {{csrf_field()}}
      <input type="hidden" name="id" id="id" value="">
      <input type="hidden" name="register_id" id="register_id" value="">
       <input type="hidden" name="provinces" id="provinces" value="">
       <input type="hidden" name="regencies" id="regencies" value="">
       <input type="hidden" name="districts" id="districts" value="">
       <input type="hidden" name="villages" id="villages" value="">
       <input type="hidden" name="foto" id="foto" value="">
         <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nama Lengkap</label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="" >
              </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Jenis Kelamin</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="jenis_kelamin" name="jenis_kelamin">
                    <option>Pilih</option>
                    <option  value="pria">Pria</option>
                    <option  value="wanita">Wanita</option>
                  </select>
              </div>
                </div>
                <div class="form-group ">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">NISN</label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Nomor Induk Sekolah Nasional">
              </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">NIK</label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="nik" name="nik" placeholder="Nomor Induk Kependudukan">
              </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Tempat Lahir</label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="" >
              </div>
          </div>
           <div class="form-group">
                <label class="col-sm-4 col-form-label" align="right">Tanggal Lahir</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control pull-right" id="tanggal_lahir" name="tanggal_lahir" placeholder="mm/dd/yyyy">
                  </div>
                </div>
                <div class="form-group ">
            <label for="" class="col-sm-4 col-form-label" align="right">Agama</label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="agama" name="agama" placeholder="">
              </div>
          </div>
           <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Kebutuhan Khusus</label>
                  <div class="col-sm-8">
                <select name="kebutuhan_khusus" class="form-control form-control-lg" id="kebutuhan_khusus">
                    <option value="Tidak">Tidak</option>
                    <option value="Tuna Netra">Tuna Netra</option>
                    <option value="Tuna Rungu">Tuna Rungu</option>
                    <option value="Tuna Grahita ringan">Tuna Grahita ringan</option>
                    <option value="Tuna Grahita Sedang">Tuna Grahita Sedang</option>
                    <option value="Tuna Daksa Ringan">Tuna Daksa Ringan</option>
                    <option value="Tuna Daksa Sedang">Tuna Daksa Sedang</option>
                    <option value="Tuna Laras">Tuna Laras</option>
                    <option value="Tuna Wicara">Tuna Wicara</option>
                    <option value="Tuna ganda">Tuna ganda</option>
                    <option value="Hiper aktif">Hiper aktif</option>
                    <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                    <option value="Bakat Istimewa">Bakat Istimewa</option>
                    <option value="Kesulitan Belajar">Kesulitan Belajar</option>
                    <option value="Narkoba">Narkoba</option>
                    <option value="Indigo">Indigo</option>
                    <option value="Down Sindrome">Down Sindrome</option>
                    <option value="Autis">Autis</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
              </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-4 col-form-label" align="right">Alamat</label>
              <div class="col-sm-8">
                 <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder=""></textarea>
              </div>
</div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Kode Pos</label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="kode_pos" name="kode_pos" placeholder="">
              </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Tempat Tinggal</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="tempat_tinggal" name="tempat_tinggal" >
                    <option>Pilih</option>
                    <option value="Bersama Orang Tua">Bersama Orang Tua</option>
                    <option value="Wali">Wali</option>
                    <option value="Kos">Kos</option>
                    <option value="Asrama">Asrama</option>
                    <option value="Panti Asuhan">Panti Asuhan</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
              </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Transportasi</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="transportasi" name="transportasi" >
                    <option>Pilih</option>
                    <option value="Jalan Kaki">Jalan Kaki</option>
                    <option value="Kendaraan Pribadi">Kendaraan Pribadi</option>
                    <option value="Kendaraan Umum / Angkot / Pete - pete">Kendaraan Umum / Angkot / Pete - pete</option>
                    <option value="Jemputan Sekolah">Jemputan Sekolah</option>
                    <option value="Kereta Api">Kereta Api</option>
                    <option value="Andong / Bendi / Sado / Dokar / Delman / Beca">Andong / Bendi / Sado / Dokar / Delman / Beca</option>
                    <option value="Perahu Penyebrangan / Rakit / Getek">Perahu Penyebrangan / Rakit / Getek</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
              </div>
          </div>
           <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nomor Handphone</label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="nomor_handphone" name="nomor_handphone" placeholder="">
              </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nomor Telepon</label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="">
              </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Email</label>
              <div class="col-sm-8">
                 <input type="email" class="form-control" id="email" name="email" placeholder="" >
              </div>
          </div>
           
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nomor Surat Keterangan Tidak Mampu (SKTM)</label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="sktm" name="sktm" placeholder="">
              </div>
          </div>
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Kewarganegaraan</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="kewarganegaraan" name="kewarganegaraan">
                    <option>Pilih</option>
                    <option value="Warga Negara Indonesia (WNI)">Warga Negara Indonesia (WNI)</option>
                    <option value="Warga Negara Asing (WNA)">Warga Negara Asing (WNA)</option>
                  </select>
              </div>
          </div>
         
         <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Tinggi Badan (CM)</label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" placeholder="">
              </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Berat Badan (KG)</label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="berat_badan" name="berat_badan" placeholder="">
              </div>
          </div>
            <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Jumlah Saudara Kandung</label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="jumlah_saudara_kandung" name="jumlah_saudara_kandung" placeholder="">
              </div>
          </div>
           <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Jarak Tempat Tinggal Ke Sekolah (KM)</label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="jarak_tempat_tinggal_ke_sekolah" name="jarak_tempat_tinggal_ke_sekolah" placeholder="">
              </div>
          </div>
       
                {{-- Form Delete Post --}}
     
      </div>
      <div class="modal-footer">

        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="fa fa-close"></span>
        </button>

        <button type="submit" name="submit" class="btn btn-warning" >
          Sumbit
        </button>
 </form>
      </div>
    </div>
  </div>
</div>
      <!-- /.row -->
 <div id="edit1" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Registrasi</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal" method="post" action="{{route('registrasi.update', $datas->get_register->id)}}">
           {{method_field('patch')}}
                                            {{csrf_field()}}
      <input type="hidden" name="id" id="id" value="">
          <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Jalur Pendaftaran</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="jalur_pendaftaran" name="jalur_pendaftaran">
                    <option>Pilih</option>
                    <option value="Umum (Reguler)">Umum (Reguler)</option>
                    <option value="SKHUN">SKHUN</option>
                    <option value="Bidik Mutu (Prestasi)">Bidik Mutu (Prestasi)</option>
                  </select>
              </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Pilihan 1 (Satu)</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="pilihan_satu" name="pilihan_satu">
                    <option>Pilih</option>
                    <option value="IPA">IPA</option>
                    <option value="IPS">IPS</option>
                    <option value="TES">TES</option>
                  </select>
              </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-form-label" align="right">Pilihan 2 (Dua)</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="pilihan_dua" name="pilihan_dua" >
                    <option>Pilih</option>
                    <option value="IPA">IPA</option>
                    <option value="IPS">IPS</option>
                    <option value="TES">TES</option>
                  </select>
              </div>
                </div>
                <div class="form-group">
            <label  class="col-sm-4 col-form-label" align="right">Nama Asal Sekolah</label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="nama_asal_sekolah" name="nama_asal_sekolah" placeholder="" >
              </div>
          </div>
           <div class="form-group">
            <label  class="col-sm-4 col-form-label" align="right">Alamat Asal Sekolah</label>
              <div class="col-sm-8">
                 <textarea type="text" class="form-control" id="alamat_asal_sekolah" name="alamat_asal_sekolah" placeholder="" ></textarea>
              </div>
          </div>
                <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nomor Ujian Nasional Sebelumnya</label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="nomor_ujian_nasional_sebelumnya" name="nomor_ujian_nasional_sebelumnya" placeholder="J – TT – PP – KK – SSS – III – C" >
              </div>
          </div>
           <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nomor Seri SKHUN Sebelumnya</label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="nomor_seri_skhun_sebelumnya" name="nomor_seri_skhun_sebelumnya" placeholder="">
              </div>
          </div>
           <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nomor Seri Ijazah Sebelumnya</label>
              <div class="col-sm-8"text>
                 <input type="text" class="form-control" id="nomor_seri_ijazah_sebelumnya" name="nomor_seri_ijazah_sebelumnya" placeholder="" >
              </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Prestasi Yang Pernah di Raih</label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="prestasi_yang_pernah_diraih" name="prestasi_yang_pernah_diraih" placeholder="">
              </div>
          </div>
       
                
     
      </div>
      <div class="modal-footer">

        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="fa fa-close"></span>
        </button>

        <button type="submit" name="submit" class="btn btn-warning" >
          Sumbit
        </button>
 </form>
      </div>
    </div>
  </div>
</div>
<div id="delete"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfimasi Hapus</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal"  action="{{route('deleteRegistrasi','$datas->get_register->id')}}" method="post">
 {{method_field('delete')}}
            {{csrf_field()}}
          <input type="hidden" id="id" name="id" value"">
 
          <h5>Anda yakin menghapus data ini?</h5>

      </div>
      <div class="modal-footer">

        <button type="submit" name="submit" class="btn actionBtn" >
          <span id="footer_action_button" class="glyphicon"></span>Hapus
        </button>

        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>close
        </button>
       </form>
             
      </div>
    </div>
  </div>
</div>
<div id="tolak"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Tolak</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal"  action="{{route('siswa.update', $datas->get_register->id)}}" method="post">
            {{ csrf_field() }}
    {{ method_field('patch') }}
          <input type="hidden" id="id" name="id" value="{{$datas->get_register->id}}">
          <input type="hidden" id="status" name="status" value="2">
 
          <div class="form-group">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Alasan Ditolak</label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="note" name="note" placeholder="">
              </div>
          </div>

      </div>
      <div class="modal-footer">

        <button type="submit" name="submit" class="btn actionBtn" >
          <span id="footer_action_button" class="glyphicon"></span>Konfirmasi Tolak
        </button>

        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>Batal
        </button>
       </form>
             
      </div>
    </div>
  </div>
</div>
    </section>

     <script src="{{asset('js/app.js')}}"></script>
 <script>
  $('#edit1').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('id')
     var jalur = button.data('jalur')
     var satu = button.data('satu')
     var dua = button.data('dua')
     var nama = button.data('nama')
     var alamat = button.data('alamat')
     var nusn = button.data('nusn')
     var skhun = button.data('skhun')
     var ijazah = button.data('ijazah')
     var prestasi = button.data('prestasi')
     var modal = $(this)
     modal.find('.modal-body #id').val(id);
     modal.find('.modal-body #jalur_pendaftaran').val(jalur);
     modal.find('.modal-body #pilihan_satu').val(satu);
     modal.find('.modal-body #pilihan_dua').val(dua);
     modal.find('.modal-body #nama_asal_sekolah').val(nama);
     modal.find('.modal-body #alamat_asal_sekolah').val(alamat);
     modal.find('.modal-body #nomor_ujian_nasional_sebelumnya').val(nusn);  
     modal.find('.modal-body #nomor_seri_skhun_sebelumnya').val(skhun);  
     modal.find('.modal-body #nomor_seri_ijazah_sebelumnya').val(ijazah); 
      modal.find('.modal-body #prestasi_yang_pernah_diraih').val(prestasi); 
  })

    $('#edit2').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('id')
     var nama = button.data('nama')
     var jenis = button.data('jenis')
     var nisn = button.data('nisn')
     var nik = button.data('nik')
     var tempat = button.data('tempat')
     var tanggal = button.data('tanggal')
     var agama = button.data('agama')
     var kebutuhan = button.data('kebutuhan')
     var alamat = button.data('alamat')
     var provinces = button.data('provinces')
     var regencies = button.data('regencies')
     var districts = button.data('districts')
     var villages = button.data('villages')
     var kode = button.data('kode')
     var tinggal = button.data('tinggal')
     var transportasi = button.data('transportasi')
     var hp = button.data('hp')
     var telp = button.data('telp')
     var email = button.data('email')
     var kis = button.data('kis')
     var kip = button.data('kip')
     var kps = button.data('kps')
     var kks = button.data('kks')
     var sktm = button.data('sktm')
     var kewarganegaraan = button.data('kewarganegaraan')  
     var foto = button.data('foto')
     var tinggi = button.data('tinggi')  
     var berat = button.data('berat')
     var jumlah = button.data('jumlah')
     var jarak = button.data('jarak')
     var reg = button.data('reg')
      var modal = $(this)

     modal.find('.modal-body #id').val(id);
     modal.find('.modal-body #register_id').val(reg);
     modal.find('.modal-body #nama_lengkap').val(nama);
     modal.find('.modal-body #jenis_kelamin').val(jenis);
     modal.find('.modal-body #nisn').val(nisn);
     modal.find('.modal-body #nik').val(nik);
     modal.find('.modal-body #tempat_lahir').val(tempat);
     modal.find('.modal-body #tanggal_lahir').val(tanggal);  
     modal.find('.modal-body #agama').val(agama);  
     modal.find('.modal-body #kebutuhan_khusus').val(kebutuhan); 
     modal.find('.modal-body #alamat').val(alamat); 
     modal.find('.modal-body #provinces').val(provinces);
     modal.find('.modal-body #regencies').val(regencies);
     modal.find('.modal-body #districts').val(districts);
     modal.find('.modal-body #villages').val(villages);
     modal.find('.modal-body #kode_pos').val(kode);
     modal.find('.modal-body #tempat_tinggal').val(tinggal);
     modal.find('.modal-body #transportasi').val(transportasi);
     modal.find('.modal-body #nomor_handphone').val(hp);
     modal.find('.modal-body #nomor_telepon').val(telp);
     modal.find('.modal-body #email').val(email);
     modal.find('.modal-body #nomor_kartu_kesehatan_kis').val(kis);
     modal.find('.modal-body #nomor_kartu_indonesia_pintar').val(kip);
     modal.find('.modal-body #nomor_kartu_pra_sejahtera').val(kps);
      modal.find('.modal-body #nomor_kartu_keluarga_sejahtera').val(kks);
     modal.find('.modal-body #sktm').val(sktm);
     modal.find('.modal-body #kewarganegaraan').val(kewarganegaraan);
     modal.find('.modal-body #foto').val(foto);
     modal.find('.modal-body #tinggi_badan').val(tinggi);
     modal.find('.modal-body #berat_badan').val(berat);
     modal.find('.modal-body #jumlah_saudara_kandung').val(jumlah);
     modal.find('.modal-body #jarak_tempat_tinggal_ke_sekolah').val(jarak);
  })

    $('#edit3').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('id')
     var nama = button.data('nama')
     var tahun = button.data('tahun')
     var pendidikan = button.data('pendidikan')
     var pekerjaan = button.data('pekerjaan')
     var penghasilan = button.data('penghasilan')
     var kebutuhan = button.data('kebutuhan')
     var modal = $(this)
     modal.find('.modal-body #id').val(id);
     modal.find('.modal-body #nama_ayah').val(nama);
     modal.find('.modal-body #tahun_ayah_lahir').val(tahun);
     modal.find('.modal-body #pendidikan_ayah').val(pendidikan);
     modal.find('.modal-body #pekerjaan_ayah').val(pekerjaan);
     modal.find('.modal-body #penghasilan_bulanan_ayah').val(penghasilan);
     modal.find('.modal-body #kebutuhan_khusus_ayah').val(kebutuhan);  
  })
    $('#edit4').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('id')
     var nama = button.data('nama')
     var tahun = button.data('tahun')
     var pendidikan = button.data('pendidikan')
     var pekerjaan = button.data('pekerjaan')
     var penghasilan = button.data('penghasilan')
     var kebutuhan = button.data('kebutuhan')
     var modal = $(this)
     modal.find('.modal-body #id').val(id);
     modal.find('.modal-body #nama_ibu').val(nama);
     modal.find('.modal-body #tahun_ibu_lahir').val(tahun);
     modal.find('.modal-body #pendidikan_ibu').val(pendidikan);
     modal.find('.modal-body #pekerjaan_ibu').val(pekerjaan);
     modal.find('.modal-body #penghasilan_bulanan_ibu').val(penghasilan);
     modal.find('.modal-body #kebutuhan_khusus_ibu').val(kebutuhan);  
  })
    $('#edit5').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('id')
     var nama = button.data('nama')
     var tahun = button.data('tahun')
     var pendidikan = button.data('pendidikan')
     var pekerjaan = button.data('pekerjaan')
     var penghasilan = button.data('penghasilan')
     var kebutuhan = button.data('kebutuhan')
     var modal = $(this)
     modal.find('.modal-body #id').val(id);
     modal.find('.modal-body #nama_wali').val(nama);
     modal.find('.modal-body #tahun_wali_lahir').val(tahun);
     modal.find('.modal-body #pendidikan_wali').val(pendidikan);
     modal.find('.modal-body #pekerjaan_wali').val(pekerjaan);
     modal.find('.modal-body #penghasilan_bulanan_wali').val(penghasilan);
     modal.find('.modal-body #kebutuhan_khusus_wali').val(kebutuhan);  
  })

     $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      })
</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
$('#formDeleteAkta').on('submit', function(e){    
    var form = this;
    e.preventDefault();
    swal({
      title: 'Hapus data ?',
      text: "Klik Hapus untuk menghapus data !",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      content: "input"
    }).then((result) => {
      if (result.value) {
        return form.submit();
      }
    })
});

function deleteAkta() {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
      title: 'Hapus data ?',
      text: "Klik Hapus untuk menghapus data !",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
},
function(isConfirm){
  if (isConfirm) {
    form.submit();          // submitting the form when user press yes
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
}

function deleteIjazah() {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
      title: 'Hapus data ?',
      text: "Klik Hapus untuk menghapus data !",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
},
function(isConfirm){
  if (isConfirm) {
    form.submit();          // submitting the form when user press yes
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
}

function deleteSkhun() {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
      title: 'Hapus data ?',
      text: "Klik Hapus untuk menghapus data !",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
},
function(isConfirm){
  if (isConfirm) {
    form.submit();          // submitting the form when user press yes
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
}

function deleteKK() {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
      title: 'Hapus data ?',
      text: "Klik Hapus untuk menghapus data !",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
},
function(isConfirm){
  if (isConfirm) {
    form.submit();          // submitting the form when user press yes
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
}

function deleteKTP() {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
      title: 'Hapus data ?',
      text: "Klik Hapus untuk menghapus data !",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
},
function(isConfirm){
  if (isConfirm) {
    form.submit();          // submitting the form when user press yes
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
}

function deleteSKB() {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
      title: 'Hapus data ?',
      text: "Klik Hapus untuk menghapus data !",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
},
function(isConfirm){
  if (isConfirm) {
    form.submit();          // submitting the form when user press yes
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
}

@if($errors->count() > 0)
      swal({
  title: "Error!",
  text: jQuery("#ERROR_COPY").html(),
  icon: "error",
    @endif
        
});
</script>


    @endsection

      