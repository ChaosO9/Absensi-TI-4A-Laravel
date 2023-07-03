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
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('Papan Dashboard') }}</h1>

        @role('Super Admin')
            <h1 class="h3 mb-4 text-gray-800">{{ __('Selamat Datang Admin') }} {{ auth()->user()->nama }}
            </h1>
            @elserole('Mahasiswa')
            <h1 class="h3 mb-4 text-gray-800">{{ __('Selamat Datang Mahasiswa') }} {{ auth()->user()->nama }}
            </h1>
        @endrole

        <div class="row">

            <!-- Lihat Mahasiswa  -->
            <div class="col-xl-6 col-md-6 mb-4 ">
                <div class="card border-left-primary shadow h-100 py-2">
                    @can('read mahasiswa')
                        <a href="{{ Route('lihatmhs') }}" style="text-decoration:none;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            {{ __('Mahasiswa') }}
                                            <br>{{ __('yang diajarkan') }}
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_mahasiswa }}
                                            ({{ __('mahasiswa') }})</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endcan
                </div>
            </div>
            <!-- Akhir Lihat Mahasiswa -->

            <!-- Rekap Absensi -->
            <div class="col-xl-6 col-md-6 mb-4 ">
                <div class="card border-left-danger shadow h-100 py-2">
                    @can('read matkul')
                        <a href="{{ Route('lihatmatkul') }}" style="text-decoration:none;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            {{ __('Mata Kuliah') }} <br>
                                            {{ __('Yang diajarkan') }}</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_matkul }}
                                            ({{ __('mata kuliah') }})</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-book fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endcan
                </div>
            </div>
            <!-- Akhir Rekap Absensi -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
