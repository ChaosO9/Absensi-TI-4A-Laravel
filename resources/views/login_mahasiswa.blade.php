<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Login Admin | Absensi Kelas TI 4A</title>
</head>

<body class="login">
    <div class="container">
        <div class="row justify-content-center form-login mt-5">
            <div class="col-md-6">
                <form action="{{ route('login_mahasiswa') }}" class="panel" method="post">
                    @csrf
                    <h3 class="mb-4 text-center text-uppercase">Login Mahasiswa Absen TI 4A</h3>
                    @if (Session::has('failed'))
                        <div class="alert alert-danger mr-5 ml-5 radius" role="alert">
                            {{ Session::get('failed') }}
                        </div>
                    @endif
                    <div class="form-group ml-5 mr-5">
                        <input type="text" name="email_or_nim" id="email"
                            class="form-control form-control-lg radius" placeholder="NIM/Email">
                    </div>
                    <div class="form-group ml-5 mr-5">
                        <input type="password" name="password" id="password"
                            class="form-control form-control-lg radius" placeholder="Password">
                    </div>
                    <div class="form-group mt-4 ml-5 mr-5">
                        <button type="submit" class="btn btn-info btn-login block radius" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
