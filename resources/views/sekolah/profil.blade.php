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
      <span>Profil</span>
    </div>
  </div>
<section class="blog-page-section spad pt-0">

    <div class="container">
      <div class="row">
        <div class="col-lg-8 post-list">
          <div class="box box-primary box-solid">
         <div class="box-header with-border">
              <h3 class="box-title"><a class="fa fa-exclamation-circle" > Visi Misi </a></h3>

             
              <!-- /.box-tools -->
            </div>
      <div class="box-body">
        <ol>
  <li>Visi Sekolah</li>


<p><strong><em>&nbsp;</em></strong><em>Terwujudnya lulusan berkarakter yang dilandasi&nbsp; ketaatan beragama , kepedulian terhadap lingkungan , berakar budaya bangsa dan berprilaku hidup sehat sehingga mampu hidup selaras dengan tuntutan perubahan di era global</em><em>.</em></p>

<ul>

  <ul>
    <li>Unggul dalam pembinaan karakter dan akhlaq mulia.</li>
    <li>Unggul dalam aktifitas lingkungan hidup dengan memotivasi kepribadian warga sekolah untuk peduli lingkungan dalam mendukung proses belajar yang menyenangkan</li>
    <li>Unggul dalam aktivitas pembinaan perilaku hidup sehat dan prestasi yang berkaitan dengan aktivitas hidup.</li>
    <li>Unggul dalam pembinaan budaya daerah sebagai akar budaya bangsa.</li>
    <li>Unggul dalam prestasi ICT dan IPTEK</li>
    <li>Unggul dalam pengembangan bahasa Inggris</li>
  </ul>
 
</ul>

<li>Misi Sekolah</li>

<ul>
  <li>Meningkatkkan pembinaan karakter dan akhlaq mulia.</li>
  <li>Meningkatkan partisifasi dan kepribadian warga sekolah untuk peduli lingkungan dalam mendukung proses belajar yang menyenangkan</li>
  <li>Meningkatkan aktivitas pembinaan perilaku hidup sehat dan prestasi yang berkaitan dengan aktivitas hidup.</li>
  <li>Meningkatkan pembinaan budaya daerah sebagai akar budaya bangsa.</li>
  <li>Meningkatkan prestasi IPTEK dan ICT dengan mendorong aktifitas akademis dan non akademis</li>
  <li>Meningkatkan pengembangan Bahasa Inggris</li>
</ul>
</ol>
</div>
</div>
<div class="box box-primary box-solid">
         <div class="box-header with-border">
              <h3 class="box-title"><a class="fa fa-exclamation-circle" > Tatatertib Sekolah </a></h3>

             
              <!-- /.box-tools -->
            </div>
      <div class="box-body">
        <ol>
  <p><strong>TATA TERTIB PESERTA DIDIK SMA PGRI Rancaekek</strong></p>

<p><strong>BAB&nbsp; I</strong></p>

<p><strong>PENDAHULUAN</strong></p>

<p>Sekolah adalah lembaga tempat berlangsungnya pendidikan, tempat proses belajar mengajar dan peserta didik berlatih agar kepribadian, kecerdasan dan keterampilan berkembang sesuai dengan tujuan pendidikan.</p>

<p>Untuk terlaksana dan tercapainya tujuan di atas perlu adanya usaha, itikad, pengertian dan kerjasama antara seluruh personal sekolah yaitu guru, karyawan dan peserta didik dengan orang tua dan masyarakat serta instansi terkait.</p>

<p>Aturan tata tertib dibuat untuk menciptakan suasana yang kondusif mendukung tujuan pendidikan, sehingga kegairahan peserta didik belajar dan guru mengajar dapat terjadi, sehingga tujuan pendidikan dapat tercapai.</p>

<p><strong>BAB&nbsp; II</strong></p>

<p><strong>KEHADIRAN PESERTA DIDIK DI SEKOLAH</strong></p>

<ol>
  <li>Peserta didik wajib hadir setiap hari di sekolah,&nbsp; 15 menit sebelum waktu belajar dimulai.</li>
  <li>Peserta didik yang terlambat hadir, wajib melapor dan meminta izin kepada guru piket / Wakasek / Kepala Sekolah.</li>
  <li>Peserta didik yang berhalangan hadir, wajib menyampaikan berita tertulis dari orang tua / wali, tidak boleh melalui peserta didik lain.</li>
  <li>Peserta didik yang selama 3 ( tiga ) hari tidak masuk sekolah tanpa alasan yang jelas akan mendapatkan : peringatan, panggilan orang tua, home visit dan upaya lain sesuai mekanisme sekolah.</li>
  <li>Apabila proses dan mekanisme sebagaimana tercantum pada poin 2.4 sudah ditempuh dan peserta didik masih melakukan pelanggaran, maka sekolah akan memberikan sanksi yang tegas.</li>
  <li>Peserta didik yang tidak dapat mengikuti kegiatan belajar mengajar sampai selesai, wajib meminta izin terlebih dahulu kepada guru mata pelajaran, guru piket dan Wakasek atau Kepala sekolah.</li>
  <li>Peserta didik yang kehadirannya tidak mencapai rata-rata 75 % dari seluruh mata pelajaran, tidak boleh mengikuti ulangan akhir semester, kecuali ada alasan yang jelas.</li>
</ol>

<p><strong>&nbsp;</strong><strong>&nbsp;</strong></p>

<p><strong>BAB&nbsp; III</strong></p>

<p><strong>KEGIATAN BELAJAR DI SEKOLAH</strong></p>

<ol>
  <li>Peserta didik wajib mengikuti seluruh kegiatan belajar yang diatur sekolah dan peserta didik wajib meninggalkan sekolah maksimal pukul 17.30.</li>
  <li>Setiap 15 menit sebelum kegiatan belajar mengajar pada jam pertama, diawali dengan berdoa, membaca Al Quran, menyanyikan lagu Indonesia Raya, membaca buku dan Pendidikan Kepramukaan; di akhir kegiatan belajar mengajar, peserta didik menyanyikan lagu wajib nasional/lagu daerah, berdoa dan membaca Al Quran/Juz Ama.</li>
  <li>Khusus untuk hari Jum&rsquo;at dipandu membaca Asma&rsquo;ul Husna, dilanjutkan dengan kegiatan sebagaimana tertera dalam poin 3.2.</li>
  <li>Peserta didik wajib mengikuti kegiatan Pendidikan Kepramukaan yang dilaksanakan pada setiap hari Jum&rsquo;at sesuai jadwal yang telah ditentukan</li>
  <li>Bagi Non Muslim melaksanakan pembelajaran Agama bersamaan pada saat solat jum&rsquo;at.</li>
  <li>Peserta didik dilarang mengerjakan tugas mata pelajaran lain atau melakukan aktivitas lain tanpa seijin guru yang sedang mengajar.</li>
  <li>Peserta didik wajib menyiapkan kebutuhan untuk kegiatan belajar termasuk tugas-tugas, buku atau sumber belajar lain yang berkaitan dengan pelajaran saat itu.</li>
  <li>Peserta didik wajib mengikuti kegiatan yang ditugaskan oleh guru untuk prestasi pribadi atau sekolah.</li>
  <li>Peserta didik wajib menjadi anggota perpustakaan sekolah dan membaca sejumlah buku di bawah koordinasi guru bahasa Indonesia.</li>
  <li>Peserta didik wajib mengikuti berbagai kegiatan yang ditugaskan oleh guru mata pelajaran untuk prestasi pribadi atau sekolah.</li>
  <li>Peserta didik dilarang beraktivitas di lingkungan sekolah pada</li>
  <li>hari Minggu dan hari Libur Nasional, kecuali seizin kepala Sekolah.</li>
</ol>

<p>&nbsp;</p>

<p><strong>BAB&nbsp; IV</strong></p>

<p><strong>KETERTIBAN, KEBERSIHAN, DAN KEINDAHAN LINGKUNGAN SEKOLAH</strong></p>

<ol>
  <li>Peserta didik wajib turut berpartisipasi memelihara keamanan, ketertiban, , kebersihan, keindahan, kekeluargaan, kerindangan, kesehatan keteladanan dan keterbukaan ( K-9 ) kelas dan sekolah.</li>
  <li>Peserta didik wajib menjaga suasana dan ketenangan belajar di kelasnya atau kelas lain yang sedang belajar.</li>
  <li>Peserta didik wajib membuang dan memilah sampah sesuai tempat sampah yang disediakan .</li>
  <li>Peserta didik wajib, memelihara kebersihan meja, kursi , tembok , pintu ,WC atau tempat lain yang tersedia disekolah.</li>
  <li>Peserta didik wajib memelihara kelengkapan kelas, hiasan kelas, dan tumbuh-tumbuhan yang ada sekitar kelas dan lingkungan sekolah.</li>
  <li>Pada jam terakhir peserta didik wajib membersihkan kelasnya masing-masing sesuai dengan jadwal piket.</li>
  <li>Peserta didik yang menggunakan/meminjam fasilitas sekolah wajib menjaga, memelihara dan mengembalikan sesuai dengan SOP.</li>
  <li>Peserta didik dilarang membawa kendaraan roda 4 atau kendaraan lain ke sekolah kecuali kendaraan roda 2 setelah mendapat persetujuan Kepala sekolah dan bagi yang telah memiliki SIM.</li>
  <li>Peserta didik dilarang memarkir kendaraan roda 2 pada waktu jam belajar dihalaman sekolah kecuali sepeda setelah mendapat persetujuan Kepala sekolah.</li>
</ol>

<p>&nbsp;</p>

<p><strong>BAB&nbsp; V</strong></p>

<p><strong>KETAHANAN DAN KEAMANAN SEKOLAH</strong></p>

<ol>
  <li>Peserta didik wajib memelihara ketahanan dan keamanan sekolah terhadap ancaman, gangguan baik yang datang dari luar maupun yang datang dalam lingkungan sekolah.</li>
  <li>Peserta didik dilarang membawa senjata tajam, senjata api dan alat lain yang dapat membahayakan diri sendiri atau orang lain, buku bacaan yang berkategori pornografi, rokok dan nafza.</li>
  <li>Peserta didik dilarang keras memakai kecanggihan Informasi dan Teknologi (IT) dan sejenisnya untuk perbuatan melawan hukum dan atau merusak tatanan SMA PGRI Rancaekek yang dapat membahayakan diri sendiri dan orang lain.</li>
  <li>Peserta didik dilarang menjadi anggota / simpatisan geng motor dan / sejenisnya serta organisasi lain yang secara normatif bertentangan dengan hukum dan peraturan yang berlaku dimasyarakat .</li>
  <li>Peserta didik wajib mengikuti upacara bendera / hari besar Nasional yang ditentukan sekolah atau lembaga terkait.</li>
  <li>Peserta didik dilarang keras berkelahi dan melakukan tindakan keras lain yang membahayakan diri sendiri atau orang lain.</li>
  <li>Peserta didik dilarang menerima tamu kecuali telah diizinkan oleh Kepala sekolah / Wakasek / guru piket.</li>
</ol>

<p>&nbsp;</p>

<p><strong>BAB&nbsp; VI</strong></p>

<p><strong>SIKAP PERILAKU DAN PAKAIAN PESERTA DIDIK</strong></p>

<ol>
  <li>Peserta didik wajib berlaku sopan, saling menghormati terhadap guru. karyawan dan sesama peserta didik.</li>
  <li>Peserta didik dilarang mengucapkan kata-kata kasar dan kotor.</li>
  <li>Peserta didik wajib bersikap jujur, sportif, berani bertanggung jawab, mengakui kesalahan dan menerima setiap sanksi yang diberikan sebagai akibat dari kesalahan atau perbuatan yang dilakukannya.</li>
  <li>Peserta didik wajib mengenakan pakaian yang benar dan sopan menurut ketentuan peraturan</li>
  <li>Peserta didik putri wajib berpakaian PSAS lengkap dengan rok panjang warna abu-abu dengan rempel 3 pada bagian depan dan bentuk span pada bagian belakang yang tidak ketat. Panjang kemeja tidak kurang dari 20 Cm di bawah ikat</li>
  <li>Peserta didik putri muslim wajib berpakaian jilbab pada setiap hari Senin dan hari Jum&rsquo;at / hari lain pada saat pelaksanaan pelajaran PAI dan / pada saat pelaksanaan Ujian/ulangan yang dilaksanakan oleh sekolah secara paralel.</li>
  <li>Peserta didik putra wajib berpakaian PSAS lengkap dengan celana panjang warna abu-abu dengan memiliki lingkar celana sebesar 7 Cm dari tulang kering, dengan kemeja putih lengan pendek , Panjang kemeja tidak kurang dari 20 Cm di bawah ikat</li>
  <li>Peserta didik dilarang memakai tindik dan sejenisnya baik sebagian maupun pada setiap bagian anggota tubuh, baik terlihat maupun bekas tindikan, kecuali bagian telinga peserta didik putri.</li>
  <li>Peserta didik putra maupun putri dilarang memakai tatto , bercat rambut, cat kuku, sambung rambut dan sejenisnya baik permanen maupun tidak.</li>
  <li>Peserta didik putra wajib berambut rapi dan sopan, bagi peserta didik putri yang berambut panjang wajib diikat.</li>
  <li>Peserta didik putri dilarang menggunakan perhiasan yang berlebihan dan make up termasuk pewarna bibir, lensa kontak mata berwarna.</li>
  <li>Peserta didik putra dilarang menggunakan gelang dan kalung.</li>
  <li>Peserta didik wajib menjaga barang-barang yang dibawa kesekolah.</li>
</ol>

<p>&nbsp;</p>

<p><strong>BAB&nbsp;&nbsp; VII</strong></p>

<p><strong>ORGANISASI PESERTA DIDIK</strong></p>

<ol>
  <li>Di sekolah hanya ada satu organisasi peserta didik ( OSIS ) dimana setiap peserta didik wajib menjadi anggota aktif OSIS.</li>
  <li>Peserta didik wajib mematuhi tata tertib keanggotaan OSIS sesuai AD / ART OSIS yang berlaku.</li>
  <li>Setiap kegiatan OSIS dikoordinasikan oleh masing-masing bidang dengan persetujuan Ketua OSIS .</li>
</ol>

<p>&nbsp;</p>

<p><strong>BAB VIII</strong></p>

<p><strong>&nbsp;EKSTRAKURIKULER</strong></p>

<p><strong>&nbsp;</strong></p>

<ol>
  <li>Setiap pendirian ekstrakrikuler baru wajib disetujui oleh pihak sekolah.</li>
  <li>Setiap&nbsp; Ekstra kurikuler di sekolah wajib berada dalam&nbsp;&nbsp; koordinasi OSIS atau menjadi unit sesuai AD / ART OSIS yang berlaku.</li>
  <li>Setiap organisasi ekstrakurikuler membuat program/rancangan kegiatan yang disetujui oleh pihak Sekolah, berkoordinasi dengan OSIS dan dipublikasikan untuk diketahui oleh seluruh anggota civitas SMA PGRI Rancaekek.</li>
  <li>Setiap kegiatan ekstrakurikuler baik di dalam ataupun di luar lingkungan sekolah harus diketahui/disetujui oleh pihak sekolah.</li>
  <li>Setiap peserta didik maksimal memilih 2 (dua) jenis ekstrakurikuler serta 1 (satu) Kelompok Pencinta Mata Pelajaran (KPMP).</li>
  <li>Setiap kegiatan ekstrakurikuler yang membutuhkan dana dari sekolah, sekolah maksimal membiayai 2 (dua) kegiatan per tahun.</li>
  <li>Setiap kegiatan ekstrakurikuler yang memerlukan izin wajib diketahui/disetujui oleh pihak sekolah.</li>
  <li>Setiap kegiatan ekstrakurikuler yang mendapat hadiah kejuaraan berupa financial , pembagiannya sebagai berikut :</li>
  <li>Bilamana sumber dananya dari Sekolah, maka 60 % untuk siswa,&nbsp; 20 % untuk dana pengembangan, 20 % untuk Pembinaan.</li>
  <li>Bilamana sumber dananya bukan dari Sekolah, maka 80 % untuk siswa, 10 % untuk dana pengembangan,10 % untuk Pembinaan.</li>
  <li>Bilamana sumber dananya bukan dari Sekolah tetapi dari perorangan maka hadiahnya&nbsp; 90 % untuk siswa, 5 % untuk dana pengembangan, 5 % untuk Pembinaan.</li>
</ol>

<p>&nbsp;</p>

<p><strong>BAB&nbsp;&nbsp; IX</strong></p>

<p><strong>HUBUNGAN ANTARA PESERTA DIDIK, GURU, DAN KARYAWAN</strong></p>

<p><strong>&nbsp;</strong></p>

<ol>
  <li>Hubungan antara peserta didik bersifat kemitraan dan persaudaraan yang akrab dan harmonis secara kekeluargaan.</li>
  <li>Hubungan peserta didik dengan guru /&nbsp; karyawan bersifat sebagai, pelindung dan fasilitator antara orang tua / wali dengan anak didik.</li>
</ol>

<p>&nbsp;</p>

<p><strong>BAB&nbsp; X</strong></p>

<p><strong>KEWAJIBAN ADMINISTRASI SEKOLAH</strong></p>

<ol>
  <li>Peserta didik wajib memberikan data pribadi / administrasi yang sebenarnya untuk keperluan data dan administrasi sekolah .</li>
  <li>Peserta didik wajib memenuhi kewajiban administrasi keuangan tepat waktu dan apabila keterlambatan atau hal lain sebagai bentuk penyimpangan , wajib melaporkan alasannya kepada petugas pemungut iuran atau Kepala sekolah / Wakasek./BK/WK.</li>
</ol>

<p>&nbsp;</p>

<p><strong>BAB&nbsp;&nbsp; XI</strong></p>

<p><strong>HAK DAN KEWAJIBAN</strong></p>

<ol>
  <li>Setiap peserta didik wajib mematuhi tata tertib sekolah atau norma lain yang berlaku di masyarakat dan berhak mendapat pelayanan , pengayoman pendidikan yang sama dan sebaik-baiknya sesuai standar sekolah.</li>
  <li>Setiap peserta didik berhak mendapat pelayanan pendidikan yang sama dan sebaik-baiknya sesuai standar sekolah.</li>
  <li>Peserta didik dilindungi haknya oleh sekolah dari tindakan lain yang sewenang-wenang yang dapat merugikan pribadinya maupun sekolah.</li>
  <li>Peserta didik berhak mengadukan masalah, menyampaikan keluhan secara lisan&nbsp; / tulisan kepada walikelas, BK, Wakasek, dan Kepala sekolah untuk mendapat tanggapan dan perhatian serta tindak lanjut sesuai dengan kondisi dan kemampuan sekolah</li>
  <li>Peserta didik wajib menerima segala sanksi yang dikenakan sebagai akibat dari perilaku dan perbuatan yang bertentangan dengan tata tertib sekolah sesuai mekanisme dan ketetntuan yang ditetapkan oleh Kepala Sekolah</li>
</ol>

<p>&nbsp;</p>

<p><strong>BAB&nbsp;&nbsp; XII</strong></p>

<p><strong>&nbsp;&nbsp; PELANGGARAN DAN SANKSI</strong></p>

<ol>
  <li>Pelanggaran dari tata tertib ini akan berakibat pada pemanggilan &nbsp;&nbsp;orang tua / wali setelah melalui proses mekanisme dan ketentuan sekolah.</li>
  <li>Peserta didik yang melanggar tata tertib dikenakan sanksi sesuai ketentuan Sekolah atau kesepakatan dan persetujuan antara orang tua /Wali dengan Kepala Sekolah .</li>
  <li>Peserta didik yang melanggar tata tertib dan mencemarkan nama baik Sekolah dikenakan sanksi sesuai dengan aturan yang berlaku.</li>
</ol>

<p><strong>&nbsp;</strong></p>

<p><strong>BAB&nbsp;&nbsp; XIII</strong></p>

<p><strong>LAIN &ndash; LAIN</strong></p>

<ol>
  <li>Hal-hal lain yang belum tercantum dalam tata&nbsp; tertib ini akan ditentukan / disosialisasikan dan&nbsp; diatur secara khusus melalui keputusan kepala sekolah.</li>
</ol>

</div>
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
              <h3 class="box-title"><a class="fa fa-exclamation-circle" > Kepala Sekolah </a></h3>

             
              <!-- /.box-tools -->
            </div>
          <!-- widget -->
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