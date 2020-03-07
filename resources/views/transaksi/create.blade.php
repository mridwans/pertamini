@extends('layouts.master')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="/transaksi">Transaksi</a></li>
              <li class="breadcrumb-item active">Tambah Transaksi</li>
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
                <h3 class="card-title">Transaksi Baru</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="/transaksi/create" method="POST">
				      		{{csrf_field()}}

                 <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                     <select name="kons_id" class="form-control">
                      @foreach ($list_user as $user)
                       <option value="{{$user->id}}">{{$user->name}} &emsp;&emsp;|&emsp;&emsp; {{$user->email}}</option>
                      @endforeach
                     </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Jenis</label>
                    <div class="col-sm-10">
                      <select name="tabung_id" class="form-control">
                        @foreach ($list_tab as $tabung)
                          <option value="{{$tabung->id}}">{{$tabung->jenis}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                     <input name="lokasi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Lokasi">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                     <input name="jumlah" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jumlah">
                    </div>
                  </div>
                   <!--
                  <button onclick="getLocation()">Try It</button>
                  <p id="demo"></p>
                  -->
                <button type="submit" class="btn btn-warning">Submit</button>
                </div>
                </form>

                  
                  <script>window.getLocation()</script>
                  <p id="demo"></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->

            <!-- /.card -->
          </div>
          <!--
          <script>
          var x = document.getElementById("demo");

          function getLocation() {
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
              x.innerHTML = "Geolocation is not supported by this browser.";
            }
          }

          function showPosition(position) {
            x.innerHTML = "Latitude: " + position.coords.latitude + 
            "<br>Longitude: " + position.coords.longitude;
          }


          //POST

          $.ajaxSetup({

            headers: 
            {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')\
            }

            });

          $(".btn-submit").click(function(e){
            e.preventDefault();

            var name = $("input[name=nama]").val();

            var jenis = $("input[name=jenis]").val();

            var jumlah = $("input[name=jumlah]").val();

            var latitude = $("input[latitude=position.coords.latitude]").val();
            var longitude = $("input[longitude=position.coords.longitude]").val();

            $.ajax({

               type:'POST',

               url:'/ajaxRequest',

               data:{name:name, jenis:jenis, jumlah:jumlah},

               success:function(data)
                {

                }  

            });
          </script>
          -->

@endsection


