@extends('layouts.main_layout')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('Lihat Mata Kuliah') }}</h1>
        <div class="col-md-12">
            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Daftar Mata Kuliah') }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th class="align-middle text-center">{{ __('No') }}</th>
                                    <th class="align-middle text-center">{{ __('ID Matkul') }}</th>
                                    <th class="align-middle text-center">{{ __('Nama Matkul') }}</th>
                                    <th class="align-middle text-center">{{ __('Jenis Matkul') }}</th>
                                    <th class="align-middle text-center">{{ __('Dosen Pengampu') }}</th>
                                    @can('update matkul')
                                        <th class="align-middle text-center">{{ __('Aksi') }}</th>
                                    @endcan
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody align="center">
                                @foreach ($data_matkul as $data)
                                    <tr>
                                        <td class="align-middle text-center"><?= $i++ ?></td>
                                        <td class="align-middle text-center"><?= $data->id_matkul ?></td>
                                        <td class="align-middle text-center"><?= $data->nama_matkul ?></td>
                                        <td class="align-middle text-center"><?= $data->jenis_matkul ?></td>
                                        <td class="align-middle text-center"><?= $data->nama_dosen ?></td>
                                        @can('update matkul')
                                            <td class="align-middle text-center"><a href="#"
                                                    class="btn btn-success btn-icon-split" data-toggle="tooltip"
                                                    data-placement="top" title="Detail?">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-book"></i>
                                                    </span>
                                                    <span class="text">{{ __('Lihat Detail') }}</span>
                                                </a></td>
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
