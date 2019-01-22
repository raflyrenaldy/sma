@extends('layouts.school')

@section('content')
<div class="site-breadcrumb">
  
  </div>
  </div>
  <!-- Breadcrumb section end -->
<!-- Hero section -->
<section class="blog-page-section spad pt-0">

    <div class="container">
        @if (session()->has('success_register'))
          <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session()->get('success_register') }}
                  </div>
        @endif


<div class="row">
    <div class="col-md-6">
        <div class="box box-primary box-solid">
         <div class="box-header with-border">
              <h3 class="box-title"><a > Login </a></h3>
            </div>
          <div class="post-item">
            <div class="post-content">
              <h3 align="center"> 
              </h3>
              <div class="box-body">
                 <div class="post-meta">
               
              </div>
             <form method="POST" action="{{ route('student.login.submit') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Kata Sandi</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                               <!--  <a class="btn btn-link" href="{{ route('student.password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a> -->
                        </div>
                    </div>
                    </form>

       

          


            

             
            </div>
            </div>
          </div>
    
        </div>
    </div>
     <div class="col-md-6">
          <div class="box box-primary box-solid">
         <div class="box-header with-border">
              <h3 class="box-title"><a > Daftar </a></h3>
            </div>
          <div class="post-item">
            <div class="post-content">
              <h3 align="center"> 
              </h3>
              <div class="box-body">
                 <div class="post-meta">
               
              </div>
            <form method="POST" action="{{ route('student.register.submit') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">No HP</label>

                            <div class="col-md-6">
                                <input id="nohp" type="text" class="form-control{{ $errors->has('nohp') ? ' is-invalid' : '' }}" name="nohp" value="{{ old('nohp') }}">

                                @if ($errors->has('nohp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nohp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email2') ? ' is-invalid' : '' }}" name="email2" value="{{ old('email2') }}">

                                @if ($errors->has('email2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Bidang isian email wajib diisi.</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Kata Sandi</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password2') ? ' is-invalid' : '' }}" name="password2">

                                @if ($errors->has('password2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Bidang isian password wajib diisi.</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Konfirmasi Kata Sandi</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
             
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
    </div>
  </section>
@endsection
