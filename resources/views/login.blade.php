<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}" />
        <link rel="stylesheet" href="{{ asset("css/style.css") }}" />
        <title>{{ __("Login Admin ~ Sistem Absensi Kelas TI 4A") }}</title>
    </head>

    <body class="login">
        <div class="container">
            <hr class="sidebar-divider" />
            <div class="row justify-content-center form-login mt-5">
                <div class="col-md-6">
                    <form
                        action="{{ route("login") }}"
                        class="needs-validation panel"
                        method="post"
                        novalidate
                    >
                        @csrf
                        <h3 class="text-uppercase mb-4 text-center">
                            {{ __("Login Sistem Absensi TI 4A") }}
                        </h3>
                        @if (Session::has("failed"))
                            <div
                                class="alert alert-danger radius ml-5 mr-5 text-center"
                                role="alert"
                            >
                                {{ __(Session::get("failed")) }}
                            </div>
                        @endif

                        <div class="form-group ml-5 mr-5">
                            <input
                                type="text"
                                name="email_or_nim"
                                id="email"
                                class="form-control form-control-lg radius"
                                placeholder="{{ __("NIM") }}/Email"
                                required
                            />
                            <div class="invalid-feedback">
                                {{ __("NIM / Email harus diisi!") }}
                            </div>
                        </div>
                        <div class="form-group ml-5 mr-5">
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control form-control-lg radius"
                                placeholder="Password"
                                required
                            />
                            <div class="invalid-feedback">
                                {{ __("Password harus diisi!") }}
                            </div>
                        </div>
                        <div class="form-group ml-5 mr-5 mt-4">
                            <button
                                type="submit"
                                class="btn btn-info btn-login radius block"
                                name="login"
                            >
                                Login
                            </button>
                        </div>
                        <div class="form-group mb-3 ml-5 mr-5 mt-4">
                            <a
                                href="{{ route("registrasiadmin") }}"
                                class="btn btn-info btn-regis radius block"
                                role="button"
                            >
                                {{ __("Registrasi Admin") }}
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <a href="locale/id">
                                    <img
                                        src="{{ asset("img/asset/indonesia_flag.png") }}"
                                        class="ml-5"
                                        style="max-width: 30px; height: auto"
                                    />
                                </a>
                            </div>
                            <div class="border-right"></div>
                            <div class="col-auto">
                                <a href="locale/en">
                                    <img
                                        src="{{ asset("img/asset/united_kingdom_flag.png") }}"
                                        style="max-width: 30px; height: auto"
                                    />
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields in Bootstrap 4
            (function () {
                "use strict";
                window.addEventListener(
                    "load",
                    function () {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms =
                            document.getElementsByClassName("needs-validation");
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(
                            forms,
                            function (form) {
                                form.addEventListener(
                                    "submit",
                                    function (event) {
                                        if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add("was-validated");
                                    },
                                    false
                                );
                            }
                        );
                    },
                    false
                );
            })();
        </script>
    </body>
</html>
