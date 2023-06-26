@extends('layouts.main_layout')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Lihat Mahasiswa </h1>
        <div class="col-md-12">
            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Mahassiwa</h6>
                </div>
                <div class="card-body">
                    @if (Session::has('deleted'))
                        <div class="alert alert-danger mt-2 mr-5 ml-5 radius" role="alert">
                            {{ Session::get('deleted') }}
                        </div>
                    @endif
                    @can('create mahasiswa')
                        <a href="{{ Route('create_mahasiswa') }}" class="btn btn-primary btn-icon-split" data-toggle="tooltip"
                            data-placement="top" title="Detail?">
                            <span class="icon text-white-50">
                                <i class="fas fa-user"></i>
                                <i class="fa-solid fa-plus"></i>
                            </span>
                            <span class="text">Tambah Mahasiswa</span>
                        </a>
                        <hr>
                    @endcan
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Profil</th>
                                    <th>NIM</th>
                                    <th>Nomor Absen</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    @can('update mahasiswa')
                                        <th>Aksi</th>
                                    @endcan
                                </tr>
                            </thead>
                            @php
                                $i = 1;
                            @endphp
                            <tbody align="center">
                                @foreach ($data_mahasiswa as $data)
                                    @php
                                        $dataa = [
                                            'foto' => $data->foto,
                                            'nim' => $data->nim,
                                            'nama' => $data->nama,
                                            'nomor_absen' => $data->nomor_absen,
                                            'jeniskelamin' => $data->jeniskelamin,
                                        ];
                                        $jsonData = json_encode($dataa);
                                        $encodedData = urlencode($jsonData);
                                        $url = route('update_mahasiswa', ['data_mahasiswa' => $encodedData]);
                                    @endphp
                                    <tr>
                                        <td class="align-middle text-center"><?= $i++ ?></td>
                                        <td class="align-middle text-center"><img class="img-profile rounded-circle"
                                                style="width:50px;height:50px;" src="img/<?= $data->foto ?>"></td>
                                        <td class="align-middle text-center"><?= $data->nim ?></td>
                                        <td class="align-middle text-center"><?= $data->nomor_absen ?></td>
                                        <td class="align-middle text-center"><?= $data->nama ?></td>
                                        <td class="align-middle text-center"><?= $data->jeniskelamin ?></td>
                                        @can('update mahasiswa')
                                            <td>
                                                <a href="{{ $url }}" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                    <span class="text">Update Data</span>
                                                </a>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
