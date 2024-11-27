@extends('owner.dashboard')

@section('section')
  <div class="container">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Data Paket</h5>
        <a href="{{ route('paket.create') }}" class="btn btn-primary mb-3">Tambah Paket</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Harga Per Pertemuan</th>
                        <th>Harga Paket Bulanan</th>
                        <th>Frekuensi</th>
                        <th>Durasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pakets as $paket)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $paket->nama_paket }}</td>
                            <td>Rp. {{ number_format($paket->harga_per_pertemuan, 0, ',', '.') }} / Pertemuan</td>
                            <td>Rp. {{ number_format($paket->harga_paket, 0, ',', '.') }} / Bulan</td>
                            <td>{{ $paket->frekuensi }} / Minggu</td>
                            <td>{{ $paket->durasi }} Jam</td>
                            <td>
                                <a href="{{ route('paket.edit', $paket->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('paket.destroy', $paket->id) }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
@endsection
