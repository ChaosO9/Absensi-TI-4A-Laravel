@extends("layouts.main_layout")

@section("container")
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __("Lihat Mata Kuliah") }}</h1>
        <div class="col-md-12">
            <!-- DataTales -->
            <div class="card mb-4 shadow">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary m-0">
                        {{ __("Daftar Mata Kuliah") }}
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            class="table-bordered table"
                            id="dataTable"
                            width="100%"
                            cellspacing="0"
                        >
                            <thead>
                                <tr align="center">
                                    <th class="text-center align-middle">
                                        {{ __("No") }}
                                    </th>
                                    <th class="text-center align-middle">
                                        {{ __("ID Matkul") }}
                                    </th>
                                    <th class="text-center align-middle">
                                        {{ __("Nama Matkul") }}
                                    </th>
                                    <th class="text-center align-middle">
                                        {{ __("Jenis Matkul") }}
                                    </th>
                                    <th class="text-center align-middle">
                                        {{ __("Dosen Pengampu") }}
                                    </th>
                                    @can("update matkul")
                                        <th class="text-center align-middle">
                                            {{ __("Aksi") }}
                                        </th>
                                    @endcan
                                </tr>
                            </thead>

                            <?php $i = 1; ?>

                            <tbody align="center">
                                @foreach ($data_matkul as $data)
                                    <tr>
                                        <td class="text-center align-middle">
                                            <?= $i++ ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?= $data->id_matkul ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?= $data->nama_matkul ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?= $data->jenis_matkul ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?= $data->nama_dosen ?>
                                        </td>
                                        @can("update matkul")
                                            <td
                                                class="text-center align-middle"
                                            >
                                                <a
                                                    href="#"
                                                    class="btn btn-success btn-icon-split"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Detail?"
                                                >
                                                    <span
                                                        class="icon text-white-50"
                                                    >
                                                        <i
                                                            class="fas fa-book"
                                                        ></i>
                                                    </span>
                                                    <span class="text">
                                                        {{ __("Lihat Detail") }}
                                                    </span>
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

    <!-- End of Main Content -->
@endsection
