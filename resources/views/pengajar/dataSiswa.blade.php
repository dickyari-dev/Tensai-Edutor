@extends('owner.dashboard')

@section('section')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Data Siswa</h4>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">Data Siswa
                        Anda</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link ms-3" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Data Siswa
                        Kosong</button>
                </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Data Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Asal Sekolah</th>
                                    <th>Waktu Bimbel</th>
                                    <th>Mata Pelajaran</th>
                                    <th>No Telp Siswa</th>
                                    <th>No Telp Orang Tua</th>
                                    <th>Nama Pengajar</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $sw)
                                <!-- Menggunakan $siswa untuk masing-masing item -->
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">{{ $sw->nama_siswa }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $sw->jenis_kelamin}}</td>
                                    <td>{{ $sw->asal_sekolah }}</td>
                                    <td>{{ $sw->pilihan_hari }} - {{ $sw->pilihan_waktu }}</td>
                                    <td>{{ $sw->mata_pelajaran }}</td>
                                    <td>{{ $sw->nomor_telepon_siswa }}</td>
                                    <td>{{ $sw->nomor_telepon_orang_tua }}</td>
                                    <td>{{ $sw->pengajar->nama_pengajar }}</td>
                                    <td>
                                        <a href="{{ route('siswa.kosongkan', $sw->id) }}"
                                            class="btn btn-danger btn-sm">Kosongkan</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Data Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Asal Sekolah</th>
                                    <th>Waktu Bimbel</th>
                                    <th>Mata Pelajaran</th>
                                    <th>No Telp Siswa</th>
                                    <th>No Telp Orang Tua</th>
                                    <th>Nama Pengajar</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($siswaKosong as $sk)
                                <!-- Menggunakan $siswa untuk masing-masing item -->
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">{{ $sk->nama_siswa }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $sk->jenis_kelamin}}</td>
                                    <td>{{ $sk->asal_sekolah }}</td>
                                    <td>{{ $sk->pilihan_hari }} - {{ $sk->pilihan_waktu }}</td>
                                    <td>{{ $sk->mata_pelajaran }}</td>
                                    <td>{{ $sk->nomor_telepon_siswa }}</td>
                                    <td>{{ $sk->nomor_telepon_orang_tua }}</td>
                                    <td>{{ $sk->pengajar->nama_pengajar ?? 'Tidak ada pengajar' }}</td>
                                    <td>
                                        <a href="{{ route('siswa.ambil', $sk->id) }}"
                                            class="btn btn-success btn-sm">Ambil Alih Siswa</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection