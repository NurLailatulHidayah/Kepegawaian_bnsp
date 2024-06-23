@extends('layout.main')

@section('title', 'Data Pegawai')

@section('content')
<div class="container mt-2">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <h2>Data Pegawai</h2>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Posisi Jabatan</th>
          <th>Gaji</th>
          <th>Tanggal Rekrutmen</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kepegawaian as $pegawai)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $pegawai->nama }}</td>
          <td>{{ $pegawai->email }}</td>
          <td>{{ $pegawai->posisi }}</td>
          <td>{{ number_format($pegawai->gaji, 2) }}</td>
          <td>{{ $pegawai->tgl_rekrutmen }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection