@extends('owner.dashboard')

@section('section')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Paket</h5>
                <form action="{{ route('paket.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" name="nama_paket" class="form-control" required placeholder="Nama Paket">
                    </div>
                    <div class="form-group">
                        <label for="harga_pertemuan">Harga Per Pertemuan</label>
                        <input type="number" name="harga_pertemuan" class="form-control" placeholder="Rp. ***** / Pertemuan" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_bulanan">Harga Paket Bulanan</label>
                        <input type="number" name="harga_bulanan" class="form-control" placeholder="Rp. ***** / Bulan">
                    </div>
                    <div class="form-group">
                        <label for="frekuensi">Frekuensi</label>
                        <input type="number" name="frekuensi" class="form-control" required placeholder="Frekuensi">
                    </div>
                    <div class="form-group">
                        <label for="durasi">Durasi</label>
                        <input type="number" name="durasi" class="form-control" required placeholder="1 Jam">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
