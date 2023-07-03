<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{ __('Registrasi Admin ~ Sistem Absensi TI 4A') }}</title>
</head>

<body class="login">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="{{ route('registerAdmin') }}" class="panel" method="post">
                    @csrf
                    <h3 class="mb-4 text-center text-uppercase">{{ __('Registrasi Admin') }}</h3>
                    @if (Cache::has('failed'))
                        <div class="alert alert-danger">{{ __('Gagal') }} {{ __(Cache::get('failed')) }}</div>
                    @elseif(Cache::has('success'))
                        <div class="alert alert-success">{{ __('Sukses') }} {{ __(Cache::get('success')) }}</div>
                    @endif
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ __($error) }}</div>
                    @endforeach
                    <div class="form-group ml-5 mr-5">
                        <input type="text" name="nim" id="nim" class="form-control form-control-lg radius"
                            placeholder="{{ __('NIM') }}">
                    </div>

                    <div class="form-group ml-5 mr-5">
                        <input type="password" name="password" id="password"
                            class="form-control form-control-lg radius" placeholder="{{ __('Kata Sandi') }}">
                    </div>
                    <div class="form-group ml-5 mr-5">
                        <input type="password" name="password2" id="password2"
                            class="form-control form-control-lg radius" placeholder="{{ __('Konfirmasi Password') }}">
                    </div>
                    <div class="form-group ml-5 mr-5">
                        <input type="password" name="token" id="token" class="form-control form-control-lg radius"
                            placeholder="{{ __('Token') }}">
                    </div>
                    <div class="form-group mt-4 ml-5 mr-5">
                        <button type="submit" class="btn btn-info btn-login block radius"
                            name="register">{{ __('Register') }}</button>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <a href="locale/id"><img src="{{ asset('img/asset/indonesia_flag.png') }}" class="ml-5"
                                    style="max-width: 30px; height: auto;"></a>
                        </div>
                        <div class="border-right"></div>
                        <div class="col-md-4">
                            <a href="locale/en"><img src="{{ asset('img/asset/united_kingdom_flag.png') }}"
                                    style="max-width: 30px; height: auto;"></a>
                        </div>
                        <div class="col-auto align-content-end">
                            <div class="ml-4">
                                <a href="{{ Route('login') }}"
                                    class="text-primary text">{{ __('Sudah memiliki akun?') }}</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
