@extends('layouts.admin')

@section('content')

 <section class="content-header">
      <h1>
        Berita
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.berita')}}">Berita</a></li>
        <li class="active">Update Berita</li>
      </ol>
    </section>

  <section class="content">
<!-- /.col -->
       <!-- /.col -->
      
          <div class="box box-warning ">
            <div class="box-header with-border">
              <h3 class="box-title">Update Berita</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            @if($errors->count() > 0)
<div id="ERROR_COPY" style="display:none" class="alert alert-danger">
@foreach($errors->all() as $error)
{{$error}}
@endforeach
</div>
@endif
            <!-- /.box-header -->
            <div class="box-body">
               <form class="form-horizontal" role="form" method="post" action="{{route('news.update',$data->id)}}" enctype="multipart/form-data">
                {{method_field('patch')}}
                {{csrf_field()}}
                  <input type="hidden" id="id" name="id" value="{{$data->id}}">
                   <div class="form-group row">
                            <label class="col-sm-2 col-form-label" align="right">Pas Foto</label>
                           <div class="col-sm-8">
                              <input type="file" id="file" value="{{ old('file') }}" name="file" value="{{$data->foto}}">

                  
                         </div>
                        </div>
             <div class="form-group row">
    				<label for="inputPassword" class="col-sm-2 col-form-label" align="right">Judul Berita</label>
    					<div class="col-sm-10">
     						 <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{$data->title}}">
                 <p class="error text-center alert alert-danger hidden"></p>
   						</div>
  				</div>
  				
  				<div class="form-group row">
  					<label for="inputPassword" class="col-md-2 col-form-label" align="right">Isi Berita</label>
			<div class="col-md-10">
  	
                    <textarea id="body" name="body" value="" rows="999" cols="99999">
                                        {!! $data->body !!}   
                    </textarea>
                    <p class="error text-center alert alert-danger hidden"></p>
            </div>
            <!-- /.box-body -->
          </div>
         
          <div class="form-group row">
            <label for="inputPassword" class="col-md-2 col-form-label" align="right"></label>
      <div class="col-md-10">
          <button class="btn btn-info" type="submit" name="submit">
              <span class="glyphicon glyphicon-plus"></span> Save Post
            </button>
          </div>
          </div>
        </div>
         </form>
       
        <!-- /.col -->
      <!-- ./row -->
 </div>
      
      <!-- /.row -->
    </section>

 <script src="{{asset('js/app.js')}}"></script>
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