@extends('layout/master')

@section('title','Dashboard')
    

@section('conten')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
    <div class="col-md-12">
  <!-- TABLE STRIPED -->
  <div class="panel panel-headline">
    <div class="panel-heading">
      <h3 class="panel-title">Jumlah Siswa Di Sman 1 Cikidang</h3>
      <p class="panel-subtitle">Period: 15-januari-2021</p>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-3">
          <div class="metric">
            <span class="icon"><i class="lnr lnr-user"></i></span>
            <p>
              <span class="number">{{$totalsiswa}}</span>
              <span class="title">Siswa</span>
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="metric">
            <span class="icon"><i class="lnr lnr-user"></i></span>
            <p>
              <span class="number">{{$siswalaki}}</span>
              <span class="title">Siswi</span>
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="metric">
            <span class="icon"><i class="lnr lnr-user"></i></span>
            <p>
              <span class="number">{{$siswiperempuan}}</span>
              <span class="title">Guru Dan Staff</span>
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="metric">
            <span class="icon"><i class="lnr lnr-user"></i></span>
            <p>
              <span class="number">35%</span>
              <span class="title">Conversions</span>
            </p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  <!-- END TABLE STRIPED -->
</div>
</div>
</div>
</div>


@endsection