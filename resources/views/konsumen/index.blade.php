@extends('layouts.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Konsumen</li>
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
                @if(auth()->user()->role == 'sales' || auth()->user()->role == 'agen')
				<a href="/konsumen/tambah" class="btn btn-primary btn-sm float-left">Tambah Konsumen</a>
				@endif

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
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    	<th>NO</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Email</th>
						<th>Telepon</th>
						@if(auth()->user()->role == 'admin' || auth()->user()->role == 'agen')
						<th>Aksi</th>
						@endif
					</tr>
                  </thead>
                  <tbody>
                    @foreach($data_konsumen as $konsumen)
					<tr>
						<td>{{$counter}}</td>@php $counter++; @endphp
						<td>{{$konsumen->name}}</td>
						<td>{{$konsumen->jenis_kelamin}}</td>
						<td>{{$konsumen->alamat}}</td>
						<td>{{$konsumen->email}}</td>
						<td>{{$konsumen->telepon}}</td>
						@if(auth()->user()->role == 'admin' || auth()->user()->role == 'agen')
						<td>
							<a href="/transaksi/{{$konsumen->id}}/list2" class="btn btn-primary btn-sm">Transaksi</a>
							<a href="/konsumen/{{$konsumen->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
							<a href="/konsumen/{{$konsumen->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus konsumen?')">Delete</a>
						</td>
						@endif
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





@section('content1')



		@if(session('sukses'))
			<div class="alert alert-success" role="alert">
		  		{{session('sukses')}}
			</div>
		@endif
		<div class="row">
			<div class="col-6">
				<h1> Data Konsumen </h1>
			</div>
			<div class="col-6">
				
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
				  Tambah Konsumen
				</button>

				

			<!-- data isi table -->
			</div>
			<table class="table table-hover">
				<tr>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Email</th>
					<th>Telepon</th>
					<th>Aksi</th>
				</tr>
				@foreach($data_konsumen as $konsumen)
				<tr>
					<td>{{$konsumen->nama}}</td>
					<td>{{$konsumen->jenis_kelamin}}</td>
					<td>{{$konsumen->alamat}}</td>
					<td>{{$konsumen->email}}</td>
					<td>{{$konsumen->telepon}}</td>
					<td>
						<a href="/konsumen/{{$konsumen->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
						<a href="/konsumen/{{$konsumen->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus konsumen?')">Delete</a>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>



	<!-- Modal pop up tambah -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Form tambah konsumen</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        
				        <!-- form pop up tambah -->
				      	<form action="/konsumen/create" method="POST">
				      		{{csrf_field()}}
						  <div class="form-group">
						    <label for="exampleInputEmail1">Nama</label>
						    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
						  </div>
						  <div class="form-group">
						    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
						    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
						      <option value="L">Laki-laki</option>
						      <option value="P">Perempuan</option>
						    </select>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Alamat</label>
						    <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Email</label>
						    <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Telepon</label>
						    <input name="telepon" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telepon">
						  </div>
						  
						  

				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary">Submit</button>
						</form>
				      </div>
				    </div>
				  </div>
		

@endsection		