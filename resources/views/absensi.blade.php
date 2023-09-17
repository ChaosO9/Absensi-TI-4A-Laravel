@extends("layouts.main_layout")

@php
    $url_image = "img/qrcode-solid.jpg";
    function disableSubmitButton()
    {
        if (Session::get("end_session_time") > Session::get("session_time")) {
            session(["qr_created" => true]);
            return "";
        } else {
            session(["qr_created" => false]);
            session(["hash" => ""]);
            return "";
        }
    }

    function qrUrl()
    {
        if (Session::get("hash") == "") {
            return $url_image = "img/qrcode-solid.jpg";
        } else {
            return $url_image = "https://api.qrserver.com/v1/create-qr-code/?data=" . urlencode(Session::get("hash")) . "&amp;size=200x200";
        }
    }

    function startCountdown()
    {
        if (Session::get("hash") != "") {
            if (Session::get("qr_created") == false) {
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

@section("container")
    @if (session("refresh"))
        <script>
            window.location.reload();
        </script>
    @endif

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="mb-5 text-gray-800">{{ __("Absensi") }}</h1>
        <div class="row">
            <!-- Collapsable Card Example -->
            <div class="col-xl-7 col-md-7 animated--fade-in">
                <div class="card mb-4 shadow">
                    <!-- Card Header - Accordion -->
                    <a
                        class="d-block card-header py-3"
                        role="button"
                        aria-expanded="true"
                        aria-controls="absen"
                    >
                        <h6 class="font-weight-bold text-primary m-0">
                            {{ __("Menu Memulai Sesi") }}
                        </h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="card-body">
                        <form
                            id="myForm"
                            role="form"
                            action=""
                            method="post"
                            name="postform"
                        >
                            @csrf
                            <div class="form-group">
                                <label for="matkul">
                                    {{ __("mata kuliah") }}
                                </label>
                                <select
                                    id="matkul"
                                    class="form-control"
                                    name="matkul"
                                >
                                    @foreach ($data_matkul as $data)
                                        <option value="{{ $data->id_matkul }}">
                                            {{ $data->nama_matkul }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kehadiran_dosen">
                                    {{ __("Dosen hadir?") }}
                                </label>
                                <select
                                    class="form-control"
                                    name="kehadiran_dosen"
                                    id="kehadiran_dosen"
                                >
                                    <option value="Hadir">
                                        {{ __("Hadir") }}
                                    </option>
                                    <option value="Tidak Hadir">
                                        {{ __("Tidak Hadir") }}
                                    </option>
                                </select>
                            </div>
                            <button
                                type="submit"
                                name="submit"
                                id="submit"
                                class="btn btn-primary"
                                {{ Session::get("hash") == "" ? "" : "disabled" }}
                            >
                                {{ __("Buka Sesi") }}
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4 shadow">
                    <!-- Card Header - Accordion -->
                    <a
                        class="d-block card-header py-3"
                        role="button"
                        aria-expanded="true"
                        aria-controls="absen"
                    >
                        <h6 class="font-weight-bold text-primary m-0">
                            {{ __("Jadwal Perkuliahan Hari Ini") }}
                        </h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="card-body">
                        @if (! $data_jadwal->isEmpty())
                            <table
                                class="table-bordered table"
                                width="100%"
                                cellspacing="0"
                            >
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">
                                            No
                                        </th>
                                        <th class="text-center align-middle">
                                            Nama Matkul
                                        </th>
                                        <th class="text-center align-middle">
                                            Dosen
                                        </th>
                                        <th class="text-center align-middle">
                                            Jadwal
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>

                                    @foreach ($data_jadwal as $data)
                                        <tr>
                                            <td
                                                class="text-center align-middle"
                                            >
                                                {{ $i + 1 }}
                                            </td>
                                            <td
                                                class="text-center align-middle"
                                            >
                                                {{ $data->nama_matkul }}
                                            </td>
                                            <td
                                                class="text-center align-middle"
                                            >
                                                {{ $data->nama_dosen }}
                                            </td>
                                            <td
                                                class="text-center align-middle"
                                            >
                                                {{ $jadwal_jam[$i] }}
                                            </td>
                                        </tr>
                                        @php
                                            $i++
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h5 class="mx-2 my-2 text-gray-800">
                                {{ __("Tidak ada jadwal mata perkuliahan hari ini!") }}>
                            </h5>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-md-5 animated--fade-in">
                <div class="card mb-4 shadow">
                    <!-- Card Header - Accordion -->
                    <a
                        class="d-block card-header w-100 py-3"
                        role="button"
                        aria-expanded="true"
                        aria-controls="absen"
                    >
                        <h6 class="font-weight-bold text-primary m-0">
                            {{ __("Pindai QR") }}
                        </h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="card-body">
                        <p>
                            {{ __('Pastikan Anda membuka sesi matkul dengan benar dan pastikan menekan tombol "Buka Sesi" sebelum memindai QR!') }}
                        </p>
                        <img
                            id="gambar_qr"
                            class="img img-fluid"
                            style="height: 200px; width: auto"
                            src="{{ $url_image }}"
                            alt=""
                            title=""
                        />
                        @php
                            qrUrl();
                            $countdown = startCountdown();
                            echo $countdown;
                            $disableSubmitButton = disableSubmitButton();
                            echo $disableSubmitButton;
                        @endphp

                        <hr />
                        <div>
                            {{ __("Waktu Sesi Absensi Akan Berakhir dalam:") }}
                        </div>
                        <div id="countdown">00:00</div>
                        @if (request()->has("matkul"))
                            <p>
                                {{ __("Absensi Matkul Dipilih:") }}
                                {{ request()->query("matkul") }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <script
        id="indexUrl"
        src="{{ asset("js/custom/absensi.js") }}"
        data-route="{{ Route("absensi_refreshed") }}"
    ></script>
    <!-- End of Main Content -->
@endsection
