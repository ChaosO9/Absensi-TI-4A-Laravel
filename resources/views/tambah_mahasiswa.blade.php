@extends('layouts.main_layout')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Tambah Mahasiswa</h1>
        <div class="col-md-12">
            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Mahassiwa</h6>
                </div>
                @if (Session::has('error'))
                    <div class="alert alert-danger mt-5 mr-5 ml-5 radius" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-info mt-5 mr-5 ml-5 radius" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <form class="needs-validation" action="{{ Route('create_mahasiswa_proses') }}" method="POST"
                        novalidate>
                        @csrf
                        <div class="form-group">
                            <div class="form-group ml-2 mr-5">
                                <label for="nim" class="form-label text-dark ml-2" style="font-size: 23px">Nomor Induk
                                    Mahasiswa</label>
                                <input type="text" name="nim" id="nim"
                                    class="form-control form-control-lg radius" placeholder="Contoh: 216151001" required>
                                <div class="invalid-feedback">
                                    NIM harus diisi!
                                </div>
                            </div>
                            <div class="form-group ml-2 mr-5">
                                <label for="nama" class="form-label text-dark ml-2" style="font-size: 23px">Nama</label>
                                <input type="text" name="nama" id="nama"
                                    class="form-control form-control-lg radius" placeholder="Contoh: Andika Saputra"
                                    required>
                                <div class="invalid-feedback">
                                    Nama harus diisi!
                                </div>
                            </div>
                            <div class="form-group ml-2 mr-5">
                                <label for="nomor_absen" class="form-label text-dark ml-2" style="font-size: 23px">Nomor
                                    Absen</label>
                                <input type="number" name="nomor_absen" id="nomor_absen" value="1" step="1"
                                    min="1" class="form-control form-control-lg radius" placeholder="1" required>
                                <div class="invalid-feedback">
                                    Nomor Absen harus diisi!
                                </div>
                            </div>
                            <div class="form-group ml-2 mr-5">
                                <label for="jenis_kelamin" class="form-label text-dark ml-2" style="font-size: 23px">
                                    Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin"
                                    class="form-control custom-select custom-select-lg radius" required>
                                    <option value="Laki-laki" selected>Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    Pilih jenis kelamin!
                                </div>
                            </div>
                            <div class="form-group ml-2 mr-5">
                                <label for="photo" class="form-label text-dark ml-2" style="font-size: 23px">Upload
                                    Foto</label><br>
                                <img class="ml-2" id="preview" src="{{ asset('img/placeholder.jpg') }}"
                                    alt="Selected Photo" style="max-width: 100%; height: 150px;">
                            </div>
                            {{-- <div class="form-group ml-2 mr-5">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input custom-file-input-lg" id="photo"
                                        accept="image/*" onchange="previewPhoto(event)" required>
                                    <label class="custom-file-label" for="photo">Choose file...</label>
                                    <div class="invalid-feedback">
                                        Foto harus diupload!
                                    </div>
                                </div>
                            </div> --}}
                            <div class="form-group ml-2 mr-5">
                                <input type="file" name="photo" id="photo"
                                    class="form-control form-control-file form-control-lg radius" accept="image/*"
                                    onchange="previewPhoto(event)" required>
                            </div>
                            <div class="form-group mt-4 ml-2 mr-5">
                                <button type="submit" class="btn btn-primary block radius" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
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
        // Example starter JavaScript for disabling form submissions if there are invalid fields
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
