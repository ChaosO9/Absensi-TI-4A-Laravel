@extends('layouts.main_layout')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="mb-5 text-gray-800">{{ __('Rekapan Sementara Absensi') }}</h1>
        <div class="row">
            <!-- Collapsable Card Example -->
            <div class="col-xl-4 col-md-4 animated--fade-in">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a class="d-block card-header py-3" role="button" aria-expanded="true" aria-controls="absen">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Menu Rekapan Absensi Matkul') }}</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="card-body">
                        <form id="myForm" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="postform">
                            <div class="form-group">
                                <label for="matkul">{{ __('Daftar Rekapan Sementara Absensi Matkul') }}</label>
                                <select id="matkul" class="form-control" name="matkul">
                                    @foreach ($data_matkul as $data)
                                        <option value='{{ $data->id_matkul }}'> {{ $data->nama_matkul }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" name="submit" id="submit"
                                class="btn btn-primary">{{ __('Atur Rekapan') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-8 animated--fade-in">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a class="d-block card-header w-100 py-3" role="button" aria-expanded="true" aria-controls="absen">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Daftar Rekapan Absen Sementara') }}</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="d-block card-body">
                        <p>{{ __('Perlihatkan Absen Berikut Kepada Dosen dan Menyetujui Rekapan Berikut') }}</p>
                        <form action="">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>{{ __('Nomor Absen') }}</th>
                                            <th>{{ __('Profil') }}</th>
                                            <th>{{ __('NIM') }}</th>
                                            <th>{{ __('Nama') }}</th>
                                            <th>{{ __('Aksi') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                        @foreach ($data_mahasiswa as $data)
                                            <tr>
                                                <td class="align-middle">{{ $data->nomor_absen }}</td>
                                                <td><img class="img-profile rounded-circle" style="width:50px;height:50px;"
                                                        src="img/{{ $data->foto }}">
                                                </td>
                                                <td class="align-middle">{{ $data->nim }}</td>
                                                <td class="align-middle">{{ $data->nama }}</td>
                                                <td class="align-middle">
                                                    <div class="form-group">
                                                        <select class="form-control">
                                                            <option value="Hadir">{{ __('Hadir') }}</option>
                                                            <option value="Izin">{{ __('Izin') }}</option>
                                                            <option value="Sakit">{{ __('Sakit') }}</option>
                                                            <option value="Dispen">{{ __('Dispen') }}</option>
                                                            <option value="Tidak Hadir">{{ __('Tidak Hadir') }}</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <button type="submit" name="submit" value="submit"
                                class="btn btn-primary">{{ __('Setujui Rekapan') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection
