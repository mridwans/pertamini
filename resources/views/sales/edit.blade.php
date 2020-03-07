@extends('layouts.master')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="/sales">Sales</a></li>
              <li class="breadcrumb-item active">Edit Sales</li>
            </ol>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    	@if(session('sukses'))
			<div class="alert alert-success" role="alert">
		  		{{session('sukses')}}
			</div>
		@endif

		<div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Sales</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="/sales/{{$sales->id}}/update" method="POST">
				      		{{csrf_field()}}

                 <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input name="name" type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{$sales->name}}">
                      @if($errors->has('nama'))
                        <span class="help-block" style="color: #e83e8c;">{{$errors->first('nama')}}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input name="email" type="text" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{$sales->email}}">
                      @if($errors->has('email'))
                        <span class="help-block" style="color: #e83e8c;">{{$errors->first('email')}}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                      <input name="password" type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password">
                      @if($errors->has('password'))
                        <span class="help-block" style="color: #e83e8c;">{{$errors->first('password')}}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                      <select name="jenis_kelamin" class="form-control {{$errors->has('jenis_kelamin') ? 'is-invalid' : ''}}">
                          <option value="L" @if($sales->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                          <option value="P" @if($sales->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                        </select>
                        @if($errors->has('jenis_kelamin'))
                        <span class="help-block" style="color: #e83e8c;">{{$errors->first('jenis_kelamin')}}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <input name="alamat" type="text" class="form-control {{$errors->has('alamat') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat" value="{{$sales->alamat}}">
                      @if($errors->has('alamat'))
                        <span class="help-block" style="color: #e83e8c;">{{$errors->first('alamat')}}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                      <input name="telepon" type="text" class="form-control {{$errors->has('telepon') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telepon" value="{{$sales->telepon}}">
                      @if($errors->has('telepon'))
                        <span class="help-block" style="color: #e83e8c;">{{$errors->first('telepon')}}</span>
                      @endif
                    </div>
                  </div>
                <button type="submit" class="btn btn-warning">Submit</button>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->

            <!-- /.card -->
          </div>


@endsection