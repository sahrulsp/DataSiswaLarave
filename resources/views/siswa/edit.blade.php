@extends('Layout/master')

@section('title','Edit')

@section('conten')

<div class="main">
<div class="main-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">Rubah Data</h3>
          </div>
          <div class="panel-body">
            <form action="/siswa/{{$siswa->id}}/update" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="mb-3">
                  <label for="nama_lengkap" class="form-label">Nama Depan</label>
                  <input name="nama_lengkap"
                  type="text" class="form-control" id="nama_lengkap" aria-describedby="emailHelp" 
                  placeholder="nama_lengkap" value="{{$siswa->nama_lengkap}}">   
                </div>
      
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                  <input name="nama_belakang"
                  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                  laceholder="Nama Depan" value="{{$siswa->nama_belakang}}">  
                </div>
      
                  {{-- dropdowm --}}
                  
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                  <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                    <option selected>Jenis Kelamin</option>
                    <option value="L"@if ($siswa->jenis_kelamin =='L') selected @endif>Laki-Laki</option>
                    <option value="P"@if ($siswa->jenis_kelamin =='p') selected @endif>Perempuan</option>
                  </select>
                </div>
                
                  {{-- dropdown --}}

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Agama</label>
                  <input name="Agama"
                  type="pastext" class="form-control" id="exampleInputPassword1" placeholder="agama" value="{{$siswa->agama}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1" class="form-label">Avatar</label>
                  <input type="file" name="avatar" class="form-control">
                </div>

                <label for="floatingTextarea2">Alamat</label>
                <div class="form-floating">
                  <textarea name="alamat"
                  class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{$siswa->alamat}}</textarea>
                 
                  

                </div>
                <br>
                <button type="submit" class="btn btn-warning">Update</button>
      
              </form>
          </div>
        </div>
        </div>
      </div>
    </div>
</div>
</div>
@endsection
