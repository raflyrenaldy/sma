@extends('layouts.admin')

@section('content')

 <section class="content-header">
      <h1>
        Berita
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Berita</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Berita</h3>
                  <br><br>
              <a href="{{URL::to('/adminpage/addnews')}}" class="btn btn-success">
                           Tambah Berita </a>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                <th>Foto</th>
                  <th>Judul</th>
                  <th>Waktu</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                
                <tbody>
                  <?php $i=1; ?>
                  @foreach($data as $datas)
                 <tr>
                  <td>{{$i}}</td>
                  <td>{{$datas->foto}}</td>
                  <td>{{ $datas->title}}</td>
                  <td>{{ $datas->created_at->format('l, d - F - Y')}}</td>
                  <td align="center"> 
                    <form method="GET" action="{{ url('/adminpage/news/update') }}">
                      <input type="hidden" id="id" name="id" value="{{$datas->id}}">
                    <button  class="btn btn-warning edit" data-id="{{$datas->id}}" data-title="{{$datas->title}}" data-body="{{$datas->body}}">Edit</button>
                    <button type="button" data-toggle="modal" data-target="#delete" class="btn btn-danger" data-id="{{$datas->id}}" data-title="{{$datas->title}}" data-body="{{$datas->body}}">Hapus</button>
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
  </div>
    @if($data->count() >0)
<div id="delete"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfimasi Hapus</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal"  action="{{route('deleteNews',$datas->id)}}" method="post">
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

@else

@endif
 <script src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
  $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      })
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



@endsection