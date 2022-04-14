@extends('layout/master')

@section('title','Profile')

@section('conten')


<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container-fluid">
      @if (session('sukses'))
          <div class="alert alert-succes" role="alert">
        {{session('sukses')}}
      </div>
      @endif

      @if (session('error'))
      <div class="alert alert-danger" role="alert">
    {{session('error')}}
  </div>
  @endif

      <div class="panel panel-profile">
        <div class="clearfix">
          <!-- LEFT COLUMN -->
          <div class="profile-left">
            <!-- PROFILE HEADER -->
            <div class="profile-header">
              <div class="overlay"></div>
              <div class="profile-main">
                <img width="100px" height="100px"
                src="{{$siswa->getavatar()}}" class="img-circle" alt="Avatar"> 
                <h3 class="name">{{$siswa->nama_lengkap}}</h3>
                
              </div>
              <div class="profile-stat">
                <div class="row">
                  <div class="col-md-15 stat-item">
                     {{$siswa->mapel->count()}} <span>Mata Pelajaran</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- END PROFILE HEADER -->
            <!-- PROFILE DETAIL -->
            <div class="profile-detail">
              <div class="profile-info">
                <h4 class="heading">Basic Info</h4>
                <ul class="list-unstyled list-justify">
                  <li>Jenis Kelamin<span>{{$siswa->jenis_kelamin}}</span></li>
                  <li>Agama<span>{{$siswa->agama}}</span></li>
                  <li>Alamat<span>{{$siswa->alamat}}</span></li>
                </ul>
              </div>
              <div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-danger">Edit Profile</a></div>
            </div>
            <!-- END PROFILE DETAIL -->
          </div>
          <!-- END LEFT COLUMN -->
          <!-- RIGHT COLUMN -->
          <div class="profile-right">
            <h4 class="heading">{{$siswa->nama_lengkap}} {{$siswa->nama_belakang}}</h4>
            <!-- TABBED CONTENT -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Tambah Nilai
            </button>
            <div class="panel">
              <div class="panel-heading">
                <h3 class="panel-title">Mata Pelajaran</h3>
              </div>
              <div class="panel-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Semester</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($siswa->mapel as $mapel)
                        
                    <tr>
                      <td>{{$mapel->kode}}</td>
                      <td>{{$mapel->nama}}</td>
                      <td>{{$mapel->semester}}</td>
                      <td>{{$mapel->pivot->nilai}}</td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- END RIGHT COLUMN -->
        </div>
      </div>
    </div>
  </div>
  
</div>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Mata Pelajaran
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/siswa/{{$siswa->id}}/addnilai" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="mapel">Mata Pelajaran</label>
          <select class="form-control" id="mapel" name="mapel">
            @foreach ($matapelajaran as $mp)
            <option value="{{$mp->id}}">{{$mp->nama}}</option>
                
            @endforeach
            
          </select>
        </div>
        
          <div class="form-group">

            <label for="exampleInputEmail1">Nilai</label>
            <input name="nilai" 
            type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai"> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection