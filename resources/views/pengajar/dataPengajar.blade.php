@extends('owner.dashboard')

@section('section')

<div class="container-fluid">

    <!-- Table -->
    <br>
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col">
                    <h5 class="card-title">Data Pengajar</h5>
                </div>
                <div class="col">
                    <a href="{{ route('pengajar.create') }}" class="btn btn-primary float-right">Tambah Pengajar</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Usia</th>
                                <th>Nomor Telepon</th>
                                <th>Tingkat Pendidikan</th>
                                <th>Sesi Kosong</th>
                                <th>Mata Pelajaran</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($pengajar as $pj)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pj->nama_pengajar }}</td>
                                <td><a href="{{ asset('images/' . $pj->foto) }}" target="_blank"><img src="{{ asset('images/' . $pj->foto) }}" alt="" style="max-width: 100%; height: 100px;"></a></td>
                                <td>{{ $pj->usia }}</td>
                                <td>{{ $pj->nomor_telepon }}</td>
                                <td>{{ $pj->tingkat_pendidikan }}</td>
                                <td>{{ $pj->sesi_kosong }}</td>
                                <td>{{ $pj->mata_pelajaran }}</td>
                                <td>{{ $pj->alamat }}</td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- fungsi js --}}
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="#">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                @if(session()->has('message'))
                <div class="alert alert-{{ session()->get('type') }} alert-dismissible fade show">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                    <button class="close" type="button" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->


        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('backend/js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('backend/vendor/chart.js/Chart.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('backend/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('backend/js/demo/chart-pie-demo.js') }}"></script>
    </div>
</div>
</div>
</div>
@endsection