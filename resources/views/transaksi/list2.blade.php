@extends('layouts.master')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2"> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Transaksi</li>
            </ol>
          </div>
          <div class="col-sm-6 float-sm-right">
            <h1></h1>
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
                <h5 class="float-left card-title">
                   Transaksi Pembelian
                </h5>
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
                      <th>Tanggal</th>
                      <th>Nama Penjual</th>
                      <th>Jenis</th>
                      <th>Jumlah</th>
                      <th>Lokasi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data_beli as $transaksi)
                    <tr>
                      <td>{{$counter2}}</td>@php $counter2++; @endphp
                      <td>{{$transaksi->created_at}}</td>
                      <td>{{$transaksi->user->name}}</td>
                      <td>{{$transaksi->tabung->jenis}}</td>
                      <td>{{$transaksi->jumlah}}</td>
                      <td>{{$transaksi->lokasi}}</td>
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