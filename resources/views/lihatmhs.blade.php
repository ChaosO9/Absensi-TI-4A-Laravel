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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody align="center">
                                @foreach ($data_mahasiswa as $data)
                                    <tr>
                                        <td class="align-middle text-center"><?= $i++ ?></td>
                                        <td class="align-middle text-center"><img class="img-profile rounded-circle"
                                                style="width:50px;height:50px;" src="img/<?= $data->foto ?>">
                                        </td>
                                        <td class="align-middle text-center"><?= $data->nim ?></td>
                                        <td class="align-middle text-center"><?= $data->nomor_absen ?></td>
                                        <td class="align-middle text-center"><?= $data->nama ?></td>
                                        <td class="align-middle text-center"><?= $data->jeniskelamin ?></td>
                                        <td><a href="#" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                                <span class="text">Lihat Detail</span>
                                            </a></td>
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
