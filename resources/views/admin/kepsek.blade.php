@extends('layouts.admin')

@section('content')

 <section class="content-header">
      <h1>
        Data Kepala Sekolah
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Kepsek</li>
      </ol>
    </section>

  <section class="content">
<!-- /.col -->
       <!-- /.col -->
      
          
            <!-- /.box-header -->
            
                      @if($errors->count() > 0)
<div id="ERROR_COPY" style="display: none" class="alert alert-danger">
@foreach($errors->all() as $error)
{{$error}}
@endforeach
</div>
@endif
        <!-- /.col -->
      <!-- ./row -->

      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Data Kepala Sekolah</h3><br><br>
  <a href="#myModal-1" data-toggle="modal" class="btn btn-xs btn-success">
                             Tambah Kepala Sekolah <i class="fa fa-plus"></i>
                        </a>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="coba" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                <th>Nama</th>
                  <th>Foto</th>
                  <th>Keterangan</th>
                  <th width="200">Aksi</th>
                </tr>
                </thead>
                <?php $i=1; ?>
                  @foreach($data as $datas)
                <tbody>
                 <tr>
                  <td>{{$i}}</td>
                  <td>{{ $datas->nama}}</td>
                  <td>{{ $datas->foto}}</td>
                  <td>{{ str_limit(strip_tags($datas->keterangan),120)}}</td>
                  <td align="center"> 
                   
                    <button data-toggle="modal" data-target="#edit" class="btn btn-warning edit" data-id="{{$datas->id}}" data-foto="{{$datas->foto}}" data-nama="{{$datas->nama}}" data-keterangan="{{$datas->keterangan}}">Edit</button>
                    <button type="button" data-toggle="modal" data-target="#delete" class="btn btn-danger" data-id="{{$datas->id}}" data-title="{{$datas->foto}}" data-body="{{$datas->keterangan}}">Hapus</button>
               
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
    
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-1" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Add New</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post" action="{{url('/adminpage/kepsek/addkepsek')}}">
                                          {{csrf_field()}}
                                          <div class="form-group">
            <label for="" class="col-sm-4 col-form-label" align="right">Nama</label>
              <div class="col-sm-8">
                 <textarea type="text" class="form-control" id="nama" name="nama" placeholder="" value="{{ old('nama') }}"></textarea>
              </div>
          </div> 
                                            <div class="form-group">
                            <label class="col-sm-4 col-form-label" align="right">Pas Foto</label>
                           <div class="col-sm-8">
                              <input type="file" id="file" value="{{ old('file') }}" name="file">

                  
                         </div>
                        </div>
                                          <div class="form-group">
            <label for="" class="col-sm-4 col-form-label" align="right">Keterangan</label>
              <div class="col-sm-8">
                 <textarea type="text" class="form-control" id="keterangan" name="keterangan" placeholder="" value="{{ old('keterangan') }}"></textarea>
              </div>
          </div>  
                                                                      
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
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
        <form class="form-horizontal" role="modal"  action="{{route('deleteKepsek',$datas->id)}}" method="post">
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
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Edit</h4>
                                    </div>
                                    <form action="{{route('kepsek.update',$datas->id)}}" enctype="multipart/form-data" method="post" class="form-horizontal" role="form">
                                            {{method_field('patch')}}
                                            {{csrf_field()}}
                                    <div class="modal-body">

                                    <input type="hidden" name="id" id="id" value="">
                                   <div class="form-group">
            <label for="" class="col-sm-4 col-form-label" align="right">Nama</label>
              <div class="col-sm-8">
                 <textarea type="text" class="form-control" id="nama" name="nama" placeholder="" value="{{ old('nama') }}"></textarea>
              </div>
          </div> 
                                             <div class="form-group">
                            <label class="col-sm-4 col-form-label" align="right">Pas Foto</label>
                           <div class="col-sm-8">
                              <input type="file" id="file" value="{{ old('file') }}" name="file">
                         </div>
                        </div>
                                          <div class="form-group">
            <label for="" class="col-sm-4 col-form-label" align="right">Keterangan</label>
              <div class="col-sm-8">
                 <textarea type="text" class="form-control" id="keterangan" name="keterangan" placeholder="" value="{{ old('keterangan') }}"></textarea>
              </div>
          </div>                    
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                     <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
</div>
                                    </div>
</div>
                            </div>
 <script src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
  $('#edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      var foto = button.data('foto') 
      var nama = button.data('nama')
      var keterangan = button.data('keterangan') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #foto').val(foto);
      modal.find('.modal-body #keterangan').val(keterangan);
      modal.find('.modal-body #nama').val(nama);
    
})

  $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      })
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



@endsection