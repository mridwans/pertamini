@extends('layouts.master')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Agen</li>
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


<div class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- Button trigger modal -->
				      <a href="/agen/tambah" class="btn btn-primary btn-sm float-left">Tambah Agen</a>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered">
                  <thead style="text-align:center;">
                    <tr>
                      <th>NO</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_agen as $agen)
          					<tr>
                      <td>{{$counter}}</td>@php $counter++; @endphp
          						<td>{{$agen->name}}</td>
          						<td>{{$agen->email}}</td>
          						<td style="text-align:center;">
                        <a href="/transaksi/{{$agen->id}}/list" class="btn btn-primary btn-sm">Transaksi</a>
                        <a href="/agen/{{$agen->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/agen/{{$agen->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus agen?')">Delete</a>
          						</td>
          					</tr>
          					@endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- Modal pop up tambah -->
				
</section>
    <!-- /.content -->

@endsection