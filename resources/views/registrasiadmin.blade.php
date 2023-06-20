<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Registrasi Admin | Sistem Absensi TI 4A</title>
</head>

<body class="login">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="{{ route('registerAdmin') }}" class="panel" method="post">
                    @csrf
                    <h3 class="mb-4 text-center text-uppercase">Registrasi Admin</h3>
                    @if (Cache::has('failed'))
                        <div class="alert alert-danger">Gagal</div>
                        <div class="alert alert-danger mr-5 ml-5 radius" role="alert">
                            {{ Cache::get('failed') }}
                        </div>
                    @elseif(Cache::has('success'))
                        <div class="alert alert-success">Sukses</div>
                        <div class="alert alert-success mr-5 ml-5 radius" role="alert">
                            {{ Cache::get('success') }}
                        </div>
                    @endif
                    <div class="form-group ml-5 mr-5">
                        <input type="text" name="nim" id="nim" class="form-control form-control-lg radius"
                            placeholder="NIM">
                    </div>

                    <div class="form-group ml-5 mr-5">
                        <input type="password" name="password" id="password"
                            class="form-control form-control-lg radius" placeholder="Password">
                    </div>
                    <div class="form-group ml-5 mr-5">
                        <input type="password" name="password2" id="password2"
                            class="form-control form-control-lg radius" placeholder="Konfirmasi Password">
                    </div>
                    <div class="form-group ml-5 mr-5">
                        <input type="password" name="token" id="token" class="form-control form-control-lg radius"
                            placeholder="Token">
                    </div>
                    <div class="form-group mt-4 ml-5 mr-5">
                        <button type="submit" class="btn btn-info btn-login block radius"
                            name="register">Registrasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
