


<table class="table" style="border:1px solid rgb(3, 3, 3)"  >
  
  <thead>
      <tr>
          <th>Nama Lengkap</th>
          <th>Nama Belakang</th>
          <th>Jenis Kelamin</th>
          <th>Agama</th>
          <th>Alamat</th>
      </tr>
</thead>
<tbody>
@foreach ($siswa as $s)
    <tr>
      <td>{{$s->nama_lengkap}}</td>
      <td>{{$s->nama_belakang}}</td>
      <td>{{$s->jenis_kelamin}}</td>
      <td>{{$s->agama}}</td>
      <td>{{$s->alamat}}</td>
    </tr>
@endforeach


</tbody>




</table>

