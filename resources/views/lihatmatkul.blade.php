@extends('layouts.main_layout')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Lihat Mata Kuliah </h1>
        <div class="col-md-12">
            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Mata Kuliah </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>ID Matkul</th>
                                    <th>Nama Matkul</th>
                                    <th>Jenis Matkul</th>
                                    <th>Dosen Pengampu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody align="center">
                                @foreach ($data_matkul as $data)
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $data->id_matkul ?></td>
                                        <td><?= $data->nama_matkul ?></td>
                                        <td><?= $data->jenis_matkul ?></td>
                                        <td><?= $data->nama_dosen ?></td>
                                        <td><a href="#" class="btn btn-success btn-icon-split" data-toggle="tooltip"
                                                data-placement="top" title="Detail?">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                                <span class="text">Lihat Detail</span>
                                            </a></td>
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
