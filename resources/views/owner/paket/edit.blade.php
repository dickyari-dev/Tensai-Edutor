@extends('owner.dashboard')

@section('section')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Paket</h5>
                <form action="{{ route('paket.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $paket->id }}">
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" name="nama_paket" class="form-control" required placeholder="Nama Paket" value="{{ $paket->nama_paket }}">
                    </div>
                    <div class="form-group">
                        <label for="harga_pertemuan">Harga Per Pertemuan</label>
                        <input type="number" name="harga_pertemuan" class="form-control" placeholder="Rp. ***** / Pertemuan" required value="{{ $paket->harga_per_pertemuan }}">
                    </div>
                    <div class="form-group">
                        <label for="harga_bulanan">Harga Paket Bulanan</label>
                        <input type="number" name="harga_bulanan" class="form-control" placeholder="Rp. ***** / Bulan" required value="{{ $paket->harga_paket }}">
                    </div>
                    <div class="form-group">
                        <label for="frekuensi">Frekuensi</label>
                        <input type="number" name="frekuensi" class="form-control" required placeholder="Frekuensi" value="{{ $paket->frekuensi }}">
                    </div>
                    <div class="form-group">
                        <label for="durasi">Durasi</label>
                        <input type="number" name="durasi" class="form-control" required placeholder="1 Jam" value="{{ $paket->durasi }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
