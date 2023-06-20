@extends('layouts.main_layout')

@if (Session::get('clearCountdown'))
    <script>
        localStorage.removeItem("countdown");
    </script>
    @php
        session(['clearCountdown' => false]);
    @endphp
@endif

@section('container')
    @include('logic.date_indo')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

        <div class="row">

            <!-- Lihat Mahasiswa  -->
            <div class="col-xl-6 col-md-6 mb-4 ">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a href="{{ Route('lihatmhs') }}" style="text-decoration:none;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Mahasiswa <br>yang
                                        diajarkan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_mahasiswa }}
                                        (Mahasiswa)</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Akhir Lihat Mahasiswa -->

            <!-- Rekap Absensi -->
            <div class="col-xl-6 col-md-6 mb-4 ">
                <div class="card border-left-danger shadow h-100 py-2">
                    <a href="{{ Route('lihatmatkul') }}" style="text-decoration:none;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Mata Kuliah <br> Yang
                                        diajarkan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_matkul }}
                                        (Mata Kuliah)</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Akhir Rekap Absensi -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
