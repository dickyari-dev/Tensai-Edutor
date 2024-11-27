@extends('owner.dashboard')

@section('section')
<div class="container">
    <h1>Edit Data Siswa</h1>
    <form action="{{ route('siswa.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $siswa->id }}">

        <div class="form-group">
            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}" required>
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nomor_telepon_siswa">Nomor Telepon Siswa</label>
            <input type="text" class="form-control" id="nomor_telepon_siswa" name="nomor_telepon_siswa" value="{{ $siswa->nomor_telepon_siswa }}" required>
        </div>

        <div class="form-group">
            <label for="nomor_telepon_orang_tua">Nomor Telepon Orang Tua</label>
            <input type="text" class="form-control" id="nomor_telepon_orang_tua" name="nomor_telepon_orang_tua" value="{{ $siswa->nomor_telepon_orang_tua }}" required>
        </div>

        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $siswa->kelas }}" required>
        </div>

        <div class="form-group">
            <label for="asal_sekolah">Asal Sekolah</label>
            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="{{ $siswa->asal_sekolah }}" required>
        </div>

        <div class="form-group">
            <label for="pilihan_hari">Pilihan Hari</label>
            <input type="text" class="form-control" id="pilihan_hari" name="pilihan_hari" value="{{ $siswa->pilihan_hari }}" required>
        </div>

        <div class="form-group">
            <label for="pilihan_waktu">Pilihan Waktu</label>
            <input type="text" class="form-control" id="pilihan_waktu" name="pilihan_waktu" value="{{ $siswa->pilihan_waktu }}" required>
        </div>

        <div class="form-group">
            <label for="mata_pelajaran">Mata Pelajaran</label>
            <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" value="{{ $siswa->mata_pelajaran }}" required>
        </div>

        <div class="form-group">
            <label for="pengajar_id">Pengajar</label>
            <select class="form-control" id="pengajar_id" name="pengajar_id" required>
                @foreach ($pengajars as $pengajar)
                    <option value="{{ $pengajar->id }}" {{ $siswa->pengajar_id == $pengajar->id ? 'selected' : '' }}>
                        {{ $pengajar->nama_pengajar }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
