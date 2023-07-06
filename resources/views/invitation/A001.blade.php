<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alucard & Miya</title>

    {{-- !----------> STYLE <----------  --}}
    <link rel="stylesheet" href="{{ asset('assets/themes/A001/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/A001/css/style.css') }}">
</head>

<body>
    <div class="container">
        {{-- !----------> SAMPUL <----------  --}}
        <section class="position-relative text-center section-sampul">
            <div class="text py-5 mt-5">
                <h2 class="title-sampul fs-5 mb-5">THE WEDDING OF</h2>
                <div class="frame-foto-sampul m-auto">
                    <img src="{{ asset('dummy/sampul_image.jpg') }}" alt="gambar sampul">
                </div>
                <h1 class="bridegroom-name-sampul mt-4 mb-4">Alucard & Miya</h1>
                <p class="date-wedding-sampul fw-semibold fs-5 mb-4">Minggu, 7 November 2023</p>
                <div
                    class="countdown position-relative d-flex align-items-center justify-content-center gap-4 flex-wrap text-white">
                    <div class="column-countdown py-2 rounded">
                        <span class="d-block time fs-3">00</span>
                        <span class="d-block text-time">Hari</span>
                    </div>
                    <div class="column-countdown py-2 rounded">
                        <span class="d-block time fs-3">00</span>
                        <span class="d-block text-time">Jam</span>
                    </div>
                    <div class="column-countdown py-2 rounded">
                        <span class="d-block time fs-3">00</span>
                        <span class="d-block text-time">Menit</span>
                    </div>
                    <div class="column-countdown py-2 rounded">
                        <span class="d-block time fs-3">00</span>
                        <span class="d-block text-time">Detik</span>
                    </div>
                </div>
            </div>
            <img src="{{ asset('assets/themes/A001/img/bunga_tengah.png') }}" alt="dekorasi bunga"
                class="sampul-bunga-tengah">
            <img src="{{ asset('assets/themes/A001/img/bunga_kiri.png') }}" alt="dekorasi bunga"
                class="sampul-bunga-kiri">
            <img src="{{ asset('assets/themes/A001/img/bunga_kanan.png') }}" alt="dekorasi bunga"
                class="sampul-bunga-kanan">
        </section>
    </div>

    {{-- !----------> SCRIPT <----------  --}}
    <script src="{{ asset('assets/themes/A001/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/themes/A001/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/themes/A001/js/script.js') }}"></script>
</body>

</html>
