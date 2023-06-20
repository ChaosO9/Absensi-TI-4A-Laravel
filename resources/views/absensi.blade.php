@extends('layouts.main_layout')

@php
    function disableSubmitButton()
    {
        if (Session::get('end_session_time') > Session::get('session_time')) {
            session(['qr_created' => true]);
            return '';
        } else {
            session(['qr_created' => false]);
            session(['hash' => '']);
            return '';
        }
    }
    
    function qrUrl()
    {
        if (Session::get('hash') == '') {
            return 'img/qrcode-solid.jpg';
        } else {
            return 'https://api.qrserver.com/v1/create-qr-code/?data=' . urlencode(Session::get('hash')) . '&amp;size=200x200';
        }
        return $url_image;
    }
    
    function startCountdown()
    {
        if (Session::get('hash') != '') {
            if (Session::get('qr_created') == false) {
                return '
                <script>
                    localStorage.removeItem("countdown");
                </script>';
            } else {
                return '
                <script>
                    startCountdown()
                </script>';
            }
        }
    }
@endphp

@section('container')
    @if (session('refresh'))
        <script>
            window.location.reload();
        </script>
    @endif

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="mb-5 text-gray-800">Absensi</h1>
        <div class="row">
            <!-- Collapsable Card Example -->
            <div class="col-xl-4 col-md-4 animated--fade-in">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a class="d-block card-header py-3" role="button" aria-expanded="true" aria-controls="absen">
                        <h6 class="m-0 font-weight-bold text-primary">Menu Memulai Sesi</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="card-body">
                        <form id="myForm" role="form" action="" method="post" name="postform">
                            @csrf
                            <div class="form-group">
                                <label for="matkul">Mata Kuliah</label>
                                <select id="matkul" class="form-control" name="matkul">
                                    @foreach ($data_matkul as $data)
                                        <option value='{{ $data->id_matkul }}'> {{ $data->nama_matkul }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" name="submit" id="submit" class="btn btn-primary"
                                {{ Session::get('hash') == '' ? '' : 'disabled' }}>Buka
                                Sesi</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-8 animated--fade-in">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a class="d-block card-header w-100 py-3" role="button" aria-expanded="true" aria-controls="absen">
                        <h6 class="m-0 font-weight-bold text-primary">Scan QR</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="card-body">
                        <p>Pastikan Anda membuka sesi matkul dengan benar dan pastikan menekan tombol "Buka
                            Sesi" sebelum Scan QR!</p>
                        <img id="gambar_qr" class="img img-fluid w-25" @php $url_image = qrUrl(); @endphp
                            src="{{ $url_image }}" alt="" title="" />
                        @php
                            $countdown = startCountdown();
                            echo $countdown;
                            $disableSubmitButton = disableSubmitButton();
                            echo $disableSubmitButton;
                        @endphp
                        <hr>
                        <div>Waktu Sesi Absensi Akan Berakhir dalam:</div>
                        <div id="countdown">00:00</div>
                        @if (request()->has('matkul'))
                            <p>Absensi Matkul Dipilih: {{ request()->query('matkul') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <script id="indexUrl" src="{{ asset('js/custom/absensi.js') }}" data-route="{{ Route('absensi_refreshed') }}"></script>
    <!-- End of Main Content -->
@endsection
