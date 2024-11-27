@extends('owner.dashboard')

@section('section')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Pengajar</h5>
            <form action="{{ route('pengajar.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $pengajar->id }}">
                <div class="form-group">
                    <label>Nama Pengajar</label>
                    <input type="text" name="nama_pengajar" class="form-control" value="{{ $pengajar->nama_pengajar }}" required>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control" value="{{ $pengajar->foto }}">
                    <img src="{{ asset('images/' . $pengajar->foto) }}" alt="Foto Pengajar" class="img-fluid mt-2" style="width: 100px; height: 100px; object-fit: cover;">
                </div>
                <div class="form-group">
                    <label>Usia</label>
                    <input type="number" name="usia" class="form-control" value="{{ $pengajar->usia }}" required>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" class="form-control" value="{{ $pengajar->nomor_telepon }}" required>
                </div>
                <div class="form-group">
                    <label>Tingkat Pendidikan</label>
                    <input type="text" name="tingkat_pendidikan" class="form-control" value="{{ $pengajar->tingkat_pendidikan }}" required>
                </div>
                <div class="form-group">
                    <label>Sesi Kosong</label>
                    <input type="text" name="sesi_kosong" class="form-control" value="{{ $pengajar->sesi_kosong }}" required>
                </div>
                <div class="form-group">
                    <label>Mata Pelajaran yang Diajarkan</label>
                    <input type="text" name="mata_pelajaran" class="form-control" value="{{ $pengajar->mata_pelajaran }}" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $pengajar->alamat }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
