@extends('layout/master')

@section('title','Siswa')
@section('conten')
@if (session('sukses'))
  <div class="alert alert-primary" role="alert">
    {{session('sukses')}}
  </div>
  @endif
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Data Siswa Kelas A</h3>
              <div class="right">

                
                
              <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" ><i class="lnr lnr-plus-circle"></i>Tambah Data</button>
            </div>
          </div>
            <div class="panel-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nama lengkap</th>
                    <th>Nama Belakang</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data_siswa as $siswa)
                  <tr>
                      <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_lengkap}}</a></td>
                      <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_belakang}}</a></td>
                        
                      <td> {{$siswa->jenis_kelamin}} </td>
                        
                      <td> {{$siswa->agama}} </td>
                      
                      <td> {{$siswa->alamat}} </td> 
                
                        <td>  <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                              <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data?')">Delete</a>
                        </td>
                  </tr>
                      @endforeach
                </tbody>
              </table>
              <a href="/siswa/exportpdf" class="btn btn-sm btn-primary">Export PDF</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
   {{-- modal --}}
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
        
        </div>
        <div class="modal-body">
            
          <form action="/siswa/create" method="POST">
            {{ csrf_field() }}
            
              <div class="form-group">

                <label for="exampleInputEmail1">Nama Depan</label>
                <input name="nama_lengkap" 
                type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan"> 
              </div>
  
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                <input name="nama_belakang"
                type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" >   
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Masukan Email</label>
                <input name="email"
                type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Email">  
              </div>
  
                {{-- dropdowm --}}
                <div class="form-group">
                  <label for="exampleControlSelect1">Pilih Jenis Kelamin</label>
                  <select name="jenis_kelamin" class="form-control" id="exampleControlSelect1">
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                  </select>
              </div>
              
                {{-- dropdown --}}
  
                <div class="form-group">
                <label for="exampleInputPassword1" class="form-label">Agama</label>
                <input name="Agama"
                type="pastext" class="form-control" id="exampleInputPassword1" placeholder="Masukan Agama">
                 
              </div>
              <label for="floatingTextarea2">Alamat</label>
              <div class="form-floating">
                <textarea name="alamat"
                class="form-control" placeholder="Masukan Alamat DiSini" id="floatingTextarea2" style="height: 100px"></textarea>
                
              </div>
   
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
  
            </form>
        </div>
      </div>
    </div>
  </div>
  {{-- endmodal --}}
@endsection


