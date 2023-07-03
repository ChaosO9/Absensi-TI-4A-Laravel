@extends('layouts.main_layout')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Pembaruan Data Mahasiswa</h1>
        <div class="col-md-12">
            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Pembaruan Data Mahassiwa</h6>
                </div>
                @if (Session::has('error'))
                    <div class="alert alert-danger mt-5 mr-5 ml-5 radius" role="alert">
                        {{ __(Session::get('error')) }}
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-info mt-5 mr-5 ml-5 radius" role="alert">
                        {!! __(Session::get('success')) !!}
                    </div>
                @endif
                @if (Session::has('success2'))
                    <div class="alert alert-info mt-1 mr-5 ml-5 radius" role="alert">
                        {!! __(Session::get('success2')) !!}
                    </div>
                    <div class="mt-2 ml-2 mr-5">
                        <div class="d-flex justify-content-between">
                            <a href="{{ Route('lihatmhs') }}"
                                class="btn btn-info block radius ml-auto">{{ __('Kembali') }}</a>
                        </div>
                    </div>
                @endif
                <div class="card-body">
                    <form class="needs-validation" enctype="multipart/form-data"
                        action="{{ Route('update_mahasiswa_proses', ['nim_asal' => $nim]) }}" method="POST" novalidate>
                        @csrf
                        <div class="form-group">
                            <div class="form-group ml-2 mr-5">
                                <label for="nim" class="form-label text-dark ml-2"
                                    style="font-size: 23px">{{ __('Nomor Induk Mahasiswa') }}</label>
                                <input type="text" name="nim" id="nim"
                                    class="form-control form-control-lg radius" placeholder="{{ __('Contoh') }}: 216151001"
                                    value="{{ $nim }}" readonly required>
                                <div class="invalid-feedback">
                                    {{ __('NIM harus diisi!') }}
                                </div>
                            </div>
                            <div class="form-group ml-2 mr-5">
                                <label for="nama" class="form-label text-dark ml-2"
                                    style="font-size: 23px">{{ __('Nama') }}</label>
                                <input type="text" name="nama" id="nama"
                                    class="form-control form-control-lg radius"
                                    placeholder="{{ __('Contoh') }}: Andika Saputra" value="{{ $nama }}" required>
                                <div class="invalid-feedback">
                                    {{ __('Nama harus diisi!') }}
                                </div>
                            </div>
                            <div class="form-group ml-2 mr-5">
                                <label for="nomor_absen" class="form-label text-dark ml-2"
                                    style="font-size: 23px">{{ __('Nomor Absen') }}</label>
                                <input type="number" name="nomor_absen" id="nomor_absen" step="1" min="1"
                                    class="form-control form-control-lg radius" placeholder="1" value="{{ $nomor_absen }}"
                                    required>
                                <div class="invalid-feedback">
                                    {{ __('Nomor Absen harus diisi!') }}
                                </div>
                            </div>
                            <div class="form-group ml-2 mr-5">
                                <label for="jenis_kelamin" class="form-label text-dark ml-2" style="font-size: 23px">
                                    {{ __('Jenis Kelamin') }}</label>
                                <select name="jenis_kelamin" id="jenis_kelamin"
                                    class="form-control custom-select custom-select-lg radius" required>
                                    <option value="Laki-laki" {{ $jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                        {{ __('Laki-laki') }}
                                    </option>
                                    <option value="Perempuan" {{ $jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                        {{ __('Perempuan') }}</option>
                                </select>
                                <div class="invalid-feedback">
                                    {{ __('Pilih jenis kelamin!') }}
                                </div>
                            </div>
                            <div class="form-group ml-2 mr-5">
                                <label for="photo" class="form-label text-dark ml-2"
                                    style="font-size: 23px">{{ __('Unggah Foto') }}</label><br>
                                <img class="ml-2" id="preview" src="{{ asset('img/' . $foto) }}" alt="Selected Photo"
                                    style="max-width: 100%; height: 150px;">
                            </div>
                            <div class="form-group ml-2 mr-5">
                                <input type="file" name="photo" id="photo"
                                    class="form-control form-control-file form-control-lg radius" accept=".jpg, .png, .gif"
                                    onchange="previewPhoto(event)">
                                <label for="photo" class="form-label text-dark mt-3 ml-2">Format: jpg/png</label>
                            </div>
                            <div class="mt-4 ml-2 mr-5">
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary block radius mr-3"
                                        name="submit">{{ __('Perbarui Data') }}</button>
                                    <button type="button" class="btn btn-danger block radius" data-toggle="modal"
                                        data-target="#deleteModal">{{ __('Hapus Data') }}</button>
                                    <a href="{{ Route('lihatmhs') }}"
                                        class="btn btn-info block radius ml-auto">{{ __('Batal') }}</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Modal-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Yakin ingin menghapus data?') }}</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">{{ __('Pilih Hapus untuk menghapus data') }}</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button"
                            data-dismiss="modal">{{ __('Batal') }}</button>
                        <form action="{{ Route('hapus_mahasiswa', ['nim' => $nim]) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">{{ __('Hapus') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewPhoto(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var preview = document.getElementById('preview');
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields in Bootstrap 4
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
