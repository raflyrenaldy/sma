@extends('layouts.school',[
  'notif' => $notif
])

@section('content')
<div class="site-breadcrumb">
    <div class="container">
      <a href="{{ url('home') }}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
      <span>PPDB</span>
    </div>
  </div>
<section class="hero-section">
<div class="container">
 <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><a class="fa fa-exclamation-circle" > Baca Terlebih Dahulu! </a></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="list-unstyled">
                <li>1. Isi semua bidang pendaftaran online dengan data yang sebenar - benarnya</li>
                <li>2. Bertanda  <span style="color: red">*</span> wajib diisi</li>
                <li>3. Setelah selesai daftar, perhatikan akun Anda bilamana ada kesalahan berkas Anda yang mengharuskan Anda mengunggah ulang berkas tersebut.</li>
                <li>4. Untuk melihat kelanjutan pendaftaran Anda masuk kehalaman Hasil.</li>
                <li>5. Bila perlu bantuan bisa hubungi : 089662867871</li>
                <!-- <li align="right"><a href="{{ url('/ppdb/hasil') }}" class="btn bg-navy" >Cek Pendaftaran Anda</a></li> -->
              </ul>
            </div>
          </div>

          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><a class="fa fa-edit" > FORMULIR PENERIMAAN PESERTA DIDIK BARU TAHUN {{date('Y')}}</a></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @if($errors->count() > 0)
<div id="ERROR_COPY" style="display: none" class="alert alert-danger">
@foreach($errors->all() as $error)
{{$error}}
@endforeach
</div>
@endif
            	<h3 align="">Registrasi Calon Siswa / Siswi</h3>
              <form role="form" enctype="multipart/form-data" method="post" action="{{url('ppdb/add')}}">
                {{csrf_field()}}
                <!-- text input -->
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Jalur Pendaftaran <span style="color: red">*</span></label>
                  <div class="col-sm-8">
     						 <select class="form-control form-control-lg" id="jalur_pendaftaran" name="jalur_pendaftaran" value="{{ old('jalur_pendaftaran') }}">
                    <option>Pilih</option>
                    <option value="Umum (Reguler)">Umum (Reguler)</option>
                    <option value="SKHUN">SKHUN</option>
                    <option value="Bidik Mutu (Prestasi)">Bidik Mutu (Prestasi)</option>
                  </select>
   						</div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Pilihan 1 (Satu) <span style="color: red">*</span></label>
                  <div class="col-sm-8">
     						 <select class="form-control form-control-lg" id="pilihan_satu" name="pilihan_satu" value="{{ old('pilihan_satu') }}">
                    <option>Pilih</option>
                    <option value="IPA">IPA</option>
                    <option value="IPS">IPS</option>
                    <option value="BAHASA">BAHASA</option>
                  </select>
   						</div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Pilihan 2 (Dua) <span style="color: red">*</span></label>
                  <div class="col-sm-8">
     						 <select class="form-control form-control-lg" id="pilihan_dua" name="pilihan_dua" value="{{ old('pilihan_dua') }}">
                    <option>Pilih</option>
                    <option value="IPA">IPA</option>
                    <option value="IPS">IPS</option>
                    <option value="BAHASA">BAHASA</option>
                  </select>
   						</div>
                </div>
                <div class="form-group row">
    				<label  class="col-sm-4 col-form-label" align="right">Nama Asal Sekolah <span style="color: red">*</span></label>
    					<div class="col-sm-8">
     						 <input type="text" class="form-control" id="nama_asal_sekolah" name="nama_asal_sekolah" placeholder="" value="{{ old('nama_asal_sekolah') }}">
   						</div>
  				</div>
  				 <div class="form-group row">
    				<label  class="col-sm-4 col-form-label" align="right">Alamat Asal Sekolah <span style="color: red">*</span></label>
    					<div class="col-sm-8">
     						 <textarea type="text" class="form-control" id="alamat_asal_sekolah" name="alamat_asal_sekolah" placeholder="" value="{{ old('alamat_asal_sekolah') }}"></textarea>
   						</div>
  				</div>
                <div class="form-group row">
    				<label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nomor Ujian Nasional Sebelumnya <span style="color: red">*</span></label>
    					<div class="col-sm-8">
     						 <input type="text" class="form-control" id="nomor_ujian_nasional_sebelumnya" name="nomor_ujian_nasional_sebelumnya" placeholder="J – TT – PP – KK – SSS – III – C" value="{{ old('nomor_ujian_nasional_sebelumnya') }}">
   						</div>
  				</div>
  				 <div class="form-group row">
    				<label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nomor Seri SKHUN Sebelumnya <span style="color: red">*</span></label>
    					<div class="col-sm-8">
     						 <input type="text" class="form-control" id="nomor_seri_skhun_sebelumnya" name="nomor_seri_skhun_sebelumnya" placeholder="" value="{{ old('nomor_seri_skhun_sebelumnya') }}">
   						</div>
  				</div>
  				 <div class="form-group row">
    				<label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nomor Seri Ijazah Sebelumnya <span style="color: red">*</span></label>
    					<div class="col-sm-8"text>
     						 <input type="text" class="form-control" id="nomor_seri_ijazah_sebelumnya" name="nomor_seri_ijazah_sebelumnya" placeholder="" value="{{ old('nomor_seri_ijazah_sebelumnya') }}">
   						</div>
  				</div>
  				<div class="form-group row">
    				<label for="inputPassword" class="col-sm-4 col-form-label" align="right">Prestasi Yang Pernah di Raih</label>
    					<div class="col-sm-8">
     						 <input type="text" class="form-control" id="prestasi_yang_pernah_diraih" name="prestasi_yang_pernah_diraih" placeholder="" value="{{ old('prestasi_yang_pernah_diraih') }}">
   						</div>
  				</div>
  				<div class="form-group row">
    				<label for="inputPassword" class="col-sm-4 col-form-label" align="right">Hobi <span style="color: red">*</span></label>
    					<div class="col-sm-8">
     						 <input type="text" class="form-control" id="hobi" name="hobi" placeholder="" value="{{ old('hobi') }}">
   						</div>
  				</div>
  				<div class="form-group row">
    				<label for="inputPassword" class="col-sm-4 col-form-label" align="right">Cita - Cita <span style="color: red">*</span></label>
    					<div class="col-sm-8">
     						 <input type="text" class="form-control" id="cita_cita" name="cita_cita" placeholder="" value="{{ old('cita_cita') }}">
   						</div>
  				</div>
                <!-- Select multiple-->
                <h3 align="">Biodata Calon Siswa/Siswi</h3>
				<div class="form-group row">
    				<label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nama Lengkap <span style="color: red">*</span></label>
    					<div class="col-sm-8">
     						 <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="" value="{{Auth::guard('student')->User()->name}}" disabled>
              <a href="{{route('user.profile')}}">Ubah Nama Anda disini jika tidak sesuai.</a>

   						</div>
  				</div>
  				<div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Jenis Kelamin <span style="color: red">*</span></label>
                  <div class="col-sm-8">
     						 <select class="form-control form-control-lg" id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                    <option>Pilih</option>
                    <option  value="pria">Pria</option>
                    <option  value="wanita">Wanita</option>
                  </select>
   						</div>
                </div>
                <div class="form-group row">
    				<label for="inputPassword" class="col-sm-4 col-form-label" align="right">NISN <span style="color: red">*</span></label>
    					<div class="col-sm-8">
     						 <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Nomor Induk Sekolah Nasional" value="{{ old('nisn') }}">
   						</div>
  				</div>
  				<div class="form-group row">
    				<label for="inputPassword" class="col-sm-4 col-form-label" align="right">NIK <span style="color: red">*</span></label>
    					<div class="col-sm-8">
     						 <input type="text" class="form-control" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" value="{{ old('nik') }}">
   						</div>
  				</div>
  				<div class="form-group row">
    				<label for="inputPassword" class="col-sm-4 col-form-label" align="right">Tempat Lahir <span style="color: red">*</span></label>
    					<div class="col-sm-8">
     						 <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="" value="{{ old('tempat_lahir') }}">
   						</div>
  				</div>
  				 <div class="form-group row">
                <label class="col-sm-4 col-form-label" align="right">Tanggal Lahir <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_lahir" placeholder="mm/dd/yyyy" value="{{ old('tanggal_lahir') }}">
                  </div>
                </div>
                <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" align="right">Agama <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="agama" name="agama" placeholder="" value="{{ old('agama') }}">
              </div>
          </div>
           <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Kebutuhan Khusus <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                <select name="kebutuhan_khusus" class="form-control form-control-lg" id="kebutuhan_khusus" value="{{ old('kebutuhan_khusus') }}">
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
          <div class="form-group row">
            <label  class="col-sm-4 col-form-label" align="right">Alamat <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="" value="{{ old('alamat') }}"></textarea>
              </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" align="right">Provinsi <span style="color: red">*</span></label>
            <div class="col-sm-8">
            <select class="form-control form-control-lg" name="provinces" id="provinces" value="{{ old('provinces') }}">
              <option value="0" disable="true" selected="true">Pilih</option>
                @foreach ($provinces as $key => $value)
                  <option value="{{$value->id}}">{{ $value->name }}</option>
                @endforeach
            </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" align="right">Kota/Kabupaten <span style="color: red">*</span></label>
            <div class="col-sm-8">
            <select class="form-control form-control-lg" name="regencies" id="regencies" value="{{ old('regencies') }}">
              <option value="0" disable="true" selected="true">Pilih</option>
            </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" align="right">Kecamatan <span style="color: red">*</span></label>
            <div class="col-sm-8">
            <select class="form-control form-control-lg" name="districts" id="districts" value="{{ old('districts') }}">
              <option value="0" disable="true" selected="true">Pilih</option>
            </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" align="right">Kelurahan <span style="color: red">*</span></label>
            <div class="col-sm-8">
            <select class="form-control form-control-lg" name="villages" id="villages" value="{{ old('villages') }}">
              <option value="0" disable="true" selected="true">Pilih</option>
            </select>
          </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Kode Pos <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="kode_pos" name="kode_pos" placeholder="" value="{{ old('kode_pos') }}">
              </div>
          </div>
          <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Tempat Tinggal <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="tempat_tinggal" name="tempat_tinggal" value="{{ old('tempat_tinggal') }}">
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
          <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Transportasi <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="transportasi" name="transportasi" value="{{ old('transportasi') }}">
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
           <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nomor Handphone <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="nomor_handphone" name="nomor_handphone" placeholder="" value="{{Auth::guard('student')->User()->nohp}}" disabled>
              <a href="{{route('user.profile')}}">Ubah No HP Anda disini jika tidak sesuai.</a>

              </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nomor Telepon <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="" value="{{ old('nomor_telepon') }}">
              </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Email <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{Auth::guard('student')->User()->email}}" disabled>
              <a href="{{route('user.profile')}}">Email Anda saat mendaftar pertama.</a>
              </div>
          </div>  
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nomor Surat Keterangan Tidak Mampu (SKTM)</label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="sktm" name="sktm" placeholder="" value="{{ old('sktm') }}">
              </div>
          </div>
          <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Kewarganegaraan <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="kewarganegaraan" name="kewarganegaraan" value="{{ old('kewarganegaraan') }}">
                    <option>Pilih</option>
                    <option value="Warga Negara Indonesia (WNI)">Warga Negara Indonesia (WNI)</option>
                    <option value="Warga Negara Asing (WNA)">Warga Negara Asing (WNA)</option>
                  </select>
              </div>
          </div>
          <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Pas Foto <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                  <input type="file" id="file" value="{{ old('file') }}" name="file">

                  <p class="help-block">Berukuran 4x6 Warna Background Merah, Bertipe JPG/PNG, Maksimal Ukuran 1 Mb.</p>
                </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Akta Kelahiran <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                  <input type="file" id="akta_kelahiran" value="{{ old('akta_kelahiran') }}" name="akta_kelahiran">

                  <p class="help-block">Upload scan akta kelahiran, Bertipe JPG/PNG.</p>
                </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Ijazah <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                  <input type="file" id="ijazah" value="{{ old('ijazah') }}" name="ijazah">

                  <p class="help-block">Upload scan ijazah, Bertipe JPG/PNG.</p>
                </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">SKHUN <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                  <input type="file" id="skhun" value="{{ old('skhun') }}" name="skhun">

                  <p class="help-block">Upload scan surat Keterangan hasil ujian nasional, Bertipe JPG/PNG.</p>
                </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Kartu Keluarga <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                  <input type="file" id="kartu_keluarga" value="{{ old('kartu_keluarga') }}" name="kartu_keluarga">

                  <p class="help-block">Upload scan kartu keluarga, Bertipe JPG/PNG.</p>
                </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">KTP Ayah/Ibu <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                  <input type="file" id="ktp_ortu" value="{{ old('ktp_ortu') }}" name="ktp_ortu">

                  <p class="help-block">Upload scan kartu tanda penduduk ayah/ibu, Bertipe JPG/PNG.</p>
                </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Surat Kelakuan Baik <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                  <input type="file" id="surat_kelakuan_baik" value="{{ old('surat_kelakuan_baik') }}" name="surat_kelakuan_baik">

                  <p class="help-block">Upload surat kelakuan baik, Bertipe JPG/PNG/DOC/DOCS/PDF.</p>
                </div>
                </div>
         <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Tinggi Badan (CM) <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" placeholder="" value="{{ old('tinggi_badan') }}">
              </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Berat Badan (KG) <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="berat_badan" name="berat_badan" placeholder="" value="{{ old('berat_badan') }}">
              </div>
          </div>
            <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Jumlah Saudara Kandung <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="jumlah_saudara_kandung" name="jumlah_saudara_kandung" placeholder="" value="{{ old('jumlah_saudara_kandung') }}">
              </div>
          </div>
           <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Jarak Tempat Tinggal Ke Sekolah (KM) <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="jarak_tempat_tinggal_ke_sekolah" name="jarak_tempat_tinggal_ke_sekolah" placeholder="" value="{{ old('jarak_tempat_tinggal_ke_sekolah') }}">
              </div>
          </div>
                <h3 align="">Biodata Ayah</h3>
                <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nama Ayah <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder=""  value="{{ old('nama_ayah') }}">
              </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Tahun Lahir Ayah <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="tahun_ayah_lahir" name="tahun_ayah_lahir" placeholder="Tahun Lahir Ayah Kandung, Contoh : 1955" value="{{ old('tahun_ayah_lahir') }}">
              </div>
          </div>
          <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Pendidikan Ayah <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="pendidikan_ayah" name="pendidikan_ayah" value="{{ old('pendidikan_ayah') }}">
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
          <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Pekerjaan Ayah <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}">
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
          <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Penghasilan Bulanan Ayah <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="penghasilan_bulanan_ayah" name="penghasilan_bulanan_ayah" value="{{ old('penghasilan_bulanan_ayah') }}">
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
          <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Kebutuhan Khusus Ayah <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                <select name="kebutuhan_khusus_ayah" class="form-control form-control-lg" id="kebutuhan_khusus_ayah" value="{{ old('kebutuhan_khusus_ayah') }}">
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
          <h3 align="">Biodata Ibu</h3>
                <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nama Ibu <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="" value="{{ old('nama_ibu') }}">
              </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Tahun Lahir Ibu <span style="color: red">*</span></label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="tahun_ibu_lahir" name="tahun_ibu_lahir" placeholder="Tahun Lahir ibu Kandung, Contoh : 1955" value="{{ old('tahun_ibu_lahir') }}">
              </div>
          </div>
          <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Pendidikan Ibu <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="pendidikan_ibu" name="pendidikan_ibu" value="{{ old('pendidikan_ibu') }}">
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
          <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Pekerjaan Ibu <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}">
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
          <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Penghasilan Bulanan Ibu <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="penghasilan_bulanan_ibu" name="penghasilan_bulanan_ibu" value="{{ old('penghasilan_bulanan_ibu') }}">
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
          <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Kebutuhan Khusus Ibu <span style="color: red">*</span></label>
                  <div class="col-sm-8">
                <select name="kebutuhan_khusus_ibu" class="form-control form-control-lg" id="kebutuhan_khusus_ibu" value="{{ old('kebutuhan_khusus_ibu') }}">
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
          <h3 align="">Biodata Wali</h3>
                <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Nama Wali</label>
              <div class="col-sm-8">
                 <input type="text" class="form-control" id="nama_wali" name="nama_wali" placeholder="" value="{{ old('nama_wali') }}">
              </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Tahun Lahir Wali</label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="tahun_wali_lahir" name="tahun_wali_lahir" placeholder="Tahun Lahir wali Kandung, Contoh : 1955" value="{{ old('tahun_wali_lahir') }}">
              </div>
          </div>
          <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Pendidikan Wali</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="pendidikan_wali" name="pendidikan_wali" value="{{ old('pendidikan_wali') }}">
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
          <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Pekerjaan Wali</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="pekerjaan_wali" name="pekerjaan_wali" value="{{ old('pekerjaan_wali') }}">
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
          <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Penghasilan Bulanan Wali</label>
                  <div class="col-sm-8">
                 <select class="form-control form-control-lg" id="penghasilan_bulanan_wali" name="penghasilan_bulanan_wali" value="{{ old('penghasilan_bulanan_wali') }}">
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
          <div class="form-group row">
                  <label class="col-sm-4 col-form-label" align="right">Kebutuhan Khusus wali</label>
                  <div class="col-sm-8">
                <select name="kebutuhan_khusus_wali" class="form-control form-control-lg" id="kebutuhan_khusus_wali" value="{{ old('kebutuhan_khusus_wali') }}">
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
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label" align="right">Pernyataan</label>
              <div class="col-sm-8">
                <input class="form-check-input" onchange="handleChange(this);" type="checkbox" value="" id="defaultCheck1">
                <input type="checkbox"  name="declaration" id="declaration"> Saya menyatakan dengan sesungguhnya bahwa isian data dalam formulir ini adalah benar. Apabila ternyata data tersebut tidak benar / palsu, maka saya bersedia menerima sanksi berupa <strong>PEMBATALAN</strong> sebagai <strong>CALON PESERTA DIDIK</strong> SMA PGRI RANCAEKEK </label>
              </div>
          </div>
          <div class="form-group row">
             <label for="inputPassword" class="col-sm-4 col-form-label" align="right"></label>
             <div class="col-sm-8">
       <button type="submit" id="submit" name="submit" class="btn btn-primary" disabled>SIMPAN FORMULIR PENDAFTARAN</button>
       </div>
       </div>

                <!-- /.input group -->
              </div>
              </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      </section>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
function handleChange(checkbox) {
    if(checkbox.checked == true){
        document.getElementById("submit").removeAttribute("disabled");
    }else{
        document.getElementById("submit").setAttribute("disabled", "disabled");
   }
}
</script>
    <script type="text/javascript">
      $('#provinces').on('change', function(e){
        console.log(e);
        var province_id = e.target.value;
        $.get('/json-regencies?province_id=' + province_id,function(data) {
          console.log(data);
          $('#regencies').empty();
          $('#regencies').append('<option value="0" disable="true" selected="true">Pilih</option>');

          $('#districts').empty();
          $('#districts').append('<option value="0" disable="true" selected="true">Pilih</option>');

          $('#villages').empty();
          $('#villages').append('<option value="0" disable="true" selected="true">Pilih</option>');

          $.each(data, function(index, regenciesObj){
            $('#regencies').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.name +'</option>');
          })
        });
      });

      $('#regencies').on('change', function(e){
        console.log(e);
        var regencies_id = e.target.value;
        $.get('/json-districts?regencies_id=' + regencies_id,function(data) {
          console.log(data);
          $('#districts').empty();
          $('#districts').append('<option value="0" disable="true" selected="true">Pilih</option>');

          $.each(data, function(index, districtsObj){
            $('#districts').append('<option value="'+ districtsObj.id +'">'+ districtsObj.name +'</option>');
          })
        });
      });

      $('#districts').on('change', function(e){
        console.log(e);
        var districts_id = e.target.value;
        $.get('/json-village?districts_id=' + districts_id,function(data) {
          console.log(data);
          $('#villages').empty();
          $('#villages').append('<option value="0" disable="true" selected="true">Pilih</option>');

          $.each(data, function(index, villagesObj){
            $('#villages').append('<option value="'+ villagesObj.id +'">'+ villagesObj.name +'</option>');
          })
        });
      });

    </script>
    <script>
@if($errors->count() > 0)
      swal({
  title: "Error!",
  text: jQuery("#ERROR_COPY").html(),
  icon: "error",
    @endif
        
});

</script>
           
	@endsection