{{-- @php
    $jsonSTringTranslations = file_get_contents(asset('lang/en.json'));
    $translations = json_decode($jsonSTringTranslations, true);
    echo var_dump($translations);
@endphp --}}
@include('logic.date')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    @vite('resources/css/app.css')
    <title>{{ __('Title ~ Absensi Kelas TI 4A', ['title' => __($title)]) }}</title>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/1423de5ca4.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/custom/absensi.js') }}"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ Route('index') }}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-university"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ __('Kelas TI 4A') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Dashboard') }}</span></a>
            </li>

            <!-- Nav Item - Charts -->
            @can('start absensi')
                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('absensi') }}">
                        <i class="fas fa-fw fa-user-check"></i>
                        <span>{{ __('Absensi') }}</span></a>
                </li>
            @endcan

            <!-- Nav Item - Charts -->
            @can('read rekapan sementara')
                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('rekapan_sementara') }}">
                        <i class="fa-solid fa-book"></i>
                        <span>{{ __('Rekapan Sementara') }}</span>
                    </a>
                </li>
            @endcan

            <!-- Nav Item - Charts -->
            @can('read rekapan tetap')
                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('rekapan_tetap') }}">
                        <i class="fa-solid fa-flag"></i>
                        <span>{{ __('Rekapan Tetap') }}</span>
                    </a>
                </li>
            @endcan


            <!-- Nav Item - Tables
            <li class="nav-item">
                <a class="nav-link" href="nilai.php">
                <i class="fas fa-fw fa-book"></i>
                <span>Nilai Tugas</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav mr-auto">
                        <li class="nav align-items-center">
                            <span
                                class="ml-2 d-none d-lg-inline text-gray-600 medium">{{ __('Hari / Tanggal : ') }}<span
                                    class="text-success" id="clock">{{ Session::get('date') }}</span></span>
                        </li>
                    </ul>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav align-items-center">
                            <span
                                class="mr-2 d-none d-lg-inline text-gray-600 medium">{{ __('Terakhir Login : ') }}<span
                                    class="text-success">{{ Session::get('admin_last_login') }}</span></span>
                        </li>
                        <li class="nav align-items-center ml-2">
                            <div class="dropdown">
                                <a class="btn btn-light dropdown-toggle" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <!-- Store the asset path in a hidden input field -->
                                    <img id="langIcon" src="{{ asset('img/asset/worldwide.png') }}" alt=""
                                        style="max-width: 20px; height:auto;" class="mr-2"><span id="lang"
                                        data-lang="{{ __('Indonesia') }}"
                                        data-lang2="{{ __('Inggris') }}">{{ __('Bahasa') }}</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a id="IdLink" class="dropdown-item" href="locale/id"><img id="IdIcon"
                                            src="{{ asset('img/asset/indonesia_flag.png') }}" class="mr-2 mb-2"
                                            alt=""
                                            style="max-width: 20px; height:auto;">{{ __('Indonesia') }}</a>
                                    <a id="EnLink" class="dropdown-item" href="locale/en"><img id="EnIcon"
                                            src="{{ asset('img/asset/united_kingdom_flag.png') }}"
                                            style="max-width: 20px; height:auto;" class="mr-2"
                                            alt="">{{ __('Inggris') }}</a>
                                </div>
                                @php
                                    if (Session::get('locale') == 'id') {
                                        echo '<script>
                                            localizationIcon(1)
                                        </script>';
                                    } else {
                                        echo '<script>
                                            localizationIcon(2)
                                        </script>';
                                    }
                                @endphp
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 medium">{{ Session::get('admin_user_name') }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('img/' . Session::get('admin_user_foto')) }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#comingModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Profil') }}
                                </a>
                                <a class="dropdown-item" href="" data-toggle="modal"
                                    data-target="#comingModal">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Pengaturan') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Keluar') }}
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Start of Main Content -->
                @yield('container')
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>{{ __('Hak Cipta') }} &copy; TI 4A {{ Session::get('admin_user_name') }}</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Coming Soon-->
        <div class="modal fade" id="comingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Segera Datang') }}</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">{{ __('Fitur ini masih belum aktif') }}</div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" data-dismiss="modal">Oke</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Yakin ingin keluar ?') }}</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">{{ __('Pilih Keluar untuk keluar') }}</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-primary" type="submit">{{ __('Keluar') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>
