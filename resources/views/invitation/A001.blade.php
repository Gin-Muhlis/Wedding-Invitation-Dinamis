<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alucard & Miya</title>

    {{-- !----------> SCRIPT <----------  --}}
    <script src="https://kit.fontawesome.com/64f5e4ae10.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    {{-- !----------> STYLE <----------  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="{{ asset('assets/themes/A001/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/A001/css/style.css') }}">
</head>

<body>
    {{-- !----------> HERO <----------  --}}
    <div class="position-relative text-center section-hero d-flex align-items-center justify-content-center py-5">
        <div class="container item-hero position-relative d-flex flex-column align-items-center">
            <span class="title-hero d-inline-block fs-4 text-white mb-3 position-relative">THE WEDDING OF</span>
            <div class="frame-image-hero position-relative mb-3">
                <img src="{{ asset('assets/themes/A001/img/bingkai.png') }}" alt="bingkai" class="frame">
                <img src="{{ asset('assets/themes/A001/img/bridegroom.jpg') }}" alt="prewedding image">
            </div>
            <h1 class="bridegroom-name-hero position-relative text-white mb-4">Alucard & Miya</h1>
            <p class="date-wedding-hero text-white fs-5">Minggu, 30 November 2023</p>
        </div>
        <div class="custom-shape-divider-bottom-1689220953">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </div>

    {{-- !----------> GREETING <----------  --}}
    <div class="container-fluid text-center greeting-section position-relative">
        <img src="{{ asset('assets/themes/A001/img/bunga_kiri.png') }}" class="bunga_greeting bunga_kiri" width="300"
            alt="bunga">
        <img src="{{ asset('assets/themes/A001/img/bunga_kanan.png') }}" class="bunga_greeting bunga_kanan"
            width="300" alt="bunga">
        <div class="container">
            <p class="text-white ayat">
                Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu
                sendiri,
                supaya kamu cenderung dan merasa tenteram kepadanya, dan dijadikan-Nya diantaramu rasa kasih dan sayang.
                Sesungguhnya pada yang demikian itu benar-benar terdapat tanda-tanda bagi kaum yang berfikir.
            </p>
            <p class="fs-5 text-white surat">&lpar;Q.S Ar Rum : 21&rpar;</p>
        </div>
        <div class="custom-shape-divider-bottom-1689220953">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </div>

    {{-- !----------> BRIDEGROOM <----------  --}}
    <div class="container-fluid bridegroom-section text-center position-relative">
        <img src="{{ asset('assets/themes/A001/img/bismillah.png') }}" width="250" class="mb-4" alt="bismillah">
        <h3 class="salam mb-2">Assalamualaikum Wr. Wb</h3>
        <p class="salam-isi mb-5">Dengan memohon Rahmat dan Ridho Allah SWT, Kami bermaksud mengundang
            Bapak/Ibu/Saudara/i
            untuk hadir dalam
            pernikahan putra/putri kami</p>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5 d-flex align-items-center justify-content-end gap-3">
                <div class="bridegroom-data">
                    <h2 class="bridegroom-name mb-3">Alucard</h2>
                    <span class="bridegroom-son-text mb-2">Putri dari</span>
                    <p class="bridegroom-parent-text fst-italic">Bapak Moonton dan Ibu Moonton</p>
                    <div class="sosmed d-flex align-items-center justify-content-center gap-2">
                        <a href="#">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </div>
                </div>
                <div class="bridegroom-image p-3">
                    <img src="{{ asset('assets/themes/A001/img/bingkai.png') }}" alt="bingkai"
                        class="frame-bridegroom">
                    <img src="{{ asset('assets/themes/A001/img/bridegroom.jpg') }}" class="img" alt="mempelai">
                </div>
            </div>
            <div class="col-md-1 bridegroom-data and fs-1">
                &
            </div>
            <div class="col-md-5 d-flex align-items-center justify-content-start gap-2">
                <div class="bridegroom-data order-1">
                    <h2 class="bridegroom-name mb-3">Alucard</h2>
                    <span class="bridegroom-son-text mb-2">Putri dari</span>
                    <p class="bridegroom-parent-text fst-italic">Bapak Moonton dan Ibu Moonton</p>
                    <div class="sosmed d-flex align-items-center justify-content-center gap-2">
                        <a href="#">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </div>
                </div>
                <div class="bridegroom-image p-3 order-0">
                    <img src="{{ asset('assets/themes/A001/img/bingkai.png') }}" alt="bingkai"
                        class="frame-bridegroom">
                    <img src="{{ asset('assets/themes/A001/img/bridegroom.jpg') }}" class="img" alt="mempelai">
                </div>
            </div>
        </div>
        <div class="custom-shape-divider-bottom-1689220953">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </div>

    {{-- !----------> WEDDING <----------  --}}
    <div class="container-fluid wedding-section position-relative overflow-hidden">
        <img src="{{ asset('assets/themes/A001/img/bunga_kiri.png') }}" class="bunga_wedding bunga_kiri"
            width="300" alt="bunga">
        <img src="{{ asset('assets/themes/A001/img/bunga_kanan.png') }}" class="bunga_wedding bunga_kanan"
            width="300" alt="bunga">
        <div class="wedding-data m-auto shadow shadow-lg text-center bg-light">
            <div class="background-wedding w-100 position-relative">
                <img src="{{ asset('dummy/sampul_image.jpg') }}" alt="wedding background">
                <div
                    class="text-background-wedding text-white d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ asset('assets/themes/A001/img/grafis_tengah_putih.png') }}" alt="grafis"
                        class="mb-2">
                    <span class="fs-1">Save The Date</span>
                </div>
            </div>
            <div class="row row-cols-md-2">
                <div class="col">
                    <img src="{{ asset('assets/themes/A001/img/ring.png') }}" alt="icon wedding"
                        class="icon-wedding mb-2">
                    <h2 class="mb-2">Akad Nikah</h2>
                    <span class="date mb-1 d-block">Senin, 30 November 2024</span>
                    <span class="time d-block mb-3">Pukul 09.00 WIB s.d selesai</span>
                    <div class="countdown d-flex align-items-center justify-content-center gap-2 mb-4">
                        <div
                            class="countdown-item text-center d-flex align-items-center justify-content-center flex-column text-white">
                            <span class="countdown-day">00</span>
                            <span class="countcown-text">Hari</span>
                        </div>
                        <div
                            class="countdown-item text-center d-flex align-items-center justify-content-center flex-column text-white">
                            <span class="countdown-hour">00</span>
                            <span class="countcown-text">Jam</span>
                        </div>
                        <div
                            class="countdown-item text-center d-flex align-items-center justify-content-center flex-column text-white">
                            <span class="countdown-minute">00</span>
                            <span class="countcown-text">Menit</span>
                        </div>
                        <div
                            class="countdown-item text-center d-flex align-items-center justify-content-center flex-column text-white">
                            <span class="countdown-second">00</span>
                            <span class="countcown-text">Detik</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center gap-1 mb-4 line-home">
                        <div class="line1"></div>
                        <i class="fa-solid fa-house"></i>
                        <div class="line2"></div>
                    </div>
                    <h2>Lokasi</h2>
                    <p class="location">
                        Kediaman Mempelai Wanita, Jl. Gatot Mangkupraja, Nagrak, Cianjur
                    </p>
                </div>
                <div class="col">
                    <img src="{{ asset('assets/themes/A001/img/gate.png') }}" alt="icon wedding"
                        class="icon-wedding mb-2">
                    <h2 class="mb-2">Resepsi</h2>
                    <span class="date mb-1 d-block">Senin, 30 November 2024</span>
                    <span class="time d-block mb-3">Pukul 09.00 WIB s.d selesai</span>
                    <div class="countdown d-flex align-items-center justify-content-center gap-2 mb-4">
                        <div
                            class="countdown-item text-center d-flex align-items-center justify-content-center flex-column text-white">
                            <span class="countdown-day">00</span>
                            <span class="countcown-text">Hari</span>
                        </div>
                        <div
                            class="countdown-item text-center d-flex align-items-center justify-content-center flex-column text-white">
                            <span class="countdown-hour">00</span>
                            <span class="countcown-text">Jam</span>
                        </div>
                        <div
                            class="countdown-item text-center d-flex align-items-center justify-content-center flex-column text-white">
                            <span class="countdown-minute">00</span>
                            <span class="countcown-text">Menit</span>
                        </div>
                        <div
                            class="countdown-item text-center d-flex align-items-center justify-content-center flex-column text-white">
                            <span class="countdown-second">00</span>
                            <span class="countcown-text">Detik</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center gap-1 mb-4 line-home">
                        <div class="line1"></div>
                        <i class="fa-solid fa-house"></i>
                        <div class="line2"></div>
                    </div>
                    <h2>Lokasi</h2>
                    <p class="location">
                        Kediaman Mempelai Wanita, Jl. Gatot Mangkupraja, Nagrak, Cianjur
                    </p>
                </div>
            </div>
            <div class="maps">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d990.3831124249497!2d107.1357332!3d-6.8265733!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68525760aaa209%3A0x4a4020b1836d1a1d!2sSMK%20Negeri%201%20Cianjur!5e0!3m2!1sid!2sid!4v1689303885458!5m2!1sid!2sid"
                    height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="d-block w-100 mb-5"></iframe>
                <a href="#" class="text-center btn-map ">
                    <i class="fa-solid fa-map-location-dot"></i>
                    <span>Buka Peta</span>
                </a>
            </div>
        </div>

        <div class="custom-shape-divider-bottom-1689220953">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </div>

    {{-- !----------> STORY <----------  --}}
    <div class="container-fluid story-section position-relative">
        <div class="container content-story position-relative">
            <div class="line-story"></div>
            <div class="row justify-content-start mb-5">
                <div class="content content1 text-white position-relative">
                    <div class="icon-content d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-heart " style="color: #ffffff;"></i>
                    </div>
                    <img src="{{ asset('assets/themes/A001/img/bridegroom.jpg') }}" alt="story image"
                        class="image-story mb-3">
                    <div class="d-flex align-items-center justify-content-between w-100 mb-2">
                        <span class="title-story">Awal Bertemu</span>
                        <span class="date-story">30 November 2021</span>
                    </div>
                    <p class="content-text w-100">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus rem earum praesentium!
                        Eaque,
                        voluptate optio ea earum dolore facere et.
                    </p>
                </div>
            </div>
            <div class="row justify-content-end mb-5">
                <div class="content content2 text-white position-relative">
                    <div class="icon-content d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-heart " style="color: #ffffff;"></i>
                    </div>
                    <img src="{{ asset('assets/themes/A001/img/bridegroom.jpg') }}" alt="story image"
                        class="image-story mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="title-story">Awal Bertemu</span>
                        <span class="date-story">30 November 2021</span>
                    </div>
                    <p class="content-text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus rem earum praesentium!
                        Eaque,
                        voluptate optio ea earum dolore facere et.
                    </p>
                </div>
            </div>
            <div class="row justify-content-start mb-5">
                <div class="content content1 text-white position-relative">
                    <div class="icon-content d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-heart " style="color: #ffffff;"></i>
                    </div>
                    <img src="{{ asset('assets/themes/A001/img/bridegroom.jpg') }}" alt="story image"
                        class="image-story mb-3">
                    <div class="d-flex align-items-center justify-content-between w-100 mb-2">
                        <span class="title-story">Awal Bertemu</span>
                        <span class="date-story">30 November 2021</span>
                    </div>
                    <p class="content-text w-100">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus rem earum praesentium!
                        Eaque,
                        voluptate optio ea earum dolore facere et.
                    </p>
                </div>
            </div>
            <div class="row justify-content-end mb-5">
                <div class="content content2 text-white position-relative">
                    <div class="icon-content d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-heart " style="color: #ffffff;"></i>
                    </div>
                    <img src="{{ asset('assets/themes/A001/img/bridegroom.jpg') }}" alt="story image"
                        class="image-story mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="title-story">Awal Bertemu</span>
                        <span class="date-story">30 November 2021</span>
                    </div>
                    <p class="content-text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus rem earum praesentium!
                        Eaque,
                        voluptate optio ea earum dolore facere et.
                    </p>
                </div>
            </div>
        </div>
        <div class="custom-shape-divider-bottom-1689220953">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </div>

    {{-- !----------> GALLERY <----------  --}}
    <div class="container-fluid gallery-section position-relative overflow-hidden">
        <img src="{{ asset('assets/themes/A001/img/bunga_kiri.png') }}" class="bunga_gallery bunga_kiri"
            width="300" alt="bunga">
        <img src="{{ asset('assets/themes/A001/img/bunga_kanan.png') }}" class="bunga_gallery bunga_kanan"
            width="300" alt="bunga">
        <div class="container">
            <div class="header-gallery text-center text-white mb-5">
                <img src="{{ asset('assets/themes/A001/img/grafis_tengah_putih.png') }}" alt="grafis"
                    class="grafis-header mb-3">
                <h2 class="title-header">Our Gallery</h2>
            </div>
            <div class="row align-items-center justify-content-center">
                <a href="{{ asset('dummy/sampul_image.jpg') }}" data-fancybox="gallery" class="col-md-4 mb-4">
                    <img src="{{ asset('dummy/sampul_image.jpg') }}" class="w-100 image-gallery" />
                </a>
                <a href="{{ asset('dummy/sampul_image.jpg') }}" data-fancybox="gallery" class="col-md-4 mb-4">
                    <img src="{{ asset('dummy/sampul_image.jpg') }}" class="w-100 image-gallery" />
                </a>
                <a href="{{ asset('dummy/sampul_image.jpg') }}" data-fancybox="gallery" class="col-md-4 mb-4">
                    <img src="{{ asset('dummy/sampul_image.jpg') }}" class="w-100 image-gallery" />
                </a>
                <a href="{{ asset('dummy/sampul_image.jpg') }}" data-fancybox="gallery" class="col-md-4 mb-4">
                    <img src="{{ asset('dummy/sampul_image.jpg') }}" class="w-100 image-gallery" />
                </a>
                <a href="{{ asset('dummy/sampul_image.jpg') }}" data-fancybox="gallery" class="col-md-4 mb-4">
                    <img src="{{ asset('dummy/sampul_image.jpg') }}" class="w-100 image-gallery" />
                </a>
                <a href="{{ asset('dummy/sampul_image.jpg') }}" data-fancybox="gallery" class="col-md-4 mb-4">
                    <img src="{{ asset('dummy/sampul_image.jpg') }}" class="w-100 image-gallery" />
                </a>

            </div>
        </div>
        <div class="custom-shape-divider-bottom-1689220953">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </div>

    {{-- !----------> RSVP <----------  --}}
    <div class="container-fluid rsvp-section position-relative">
        <div class="container">
            <div class="rsvp-header text-center mb-4">
                <img src="{{ asset('assets/themes/A001/img/grafis_tengah_pink.png') }}" alt="grafis"
                    class="grafis-header mb-3">
                <h2 class="title-header title-pink">Ucapan & Doa</h2>
            </div>
            <div class="wrapper-rsvp mb-5">
                <div class="header-form d-flex align-items-center justify-content-center gap-1 py-3 text-white">
                    <i class="fa-regular fa-envelope-open"></i>
                    <p class="count-rsvp mb-0">
                        1 Ucapan
                    </p>
                </div>
                <form action="" class="form-rsvp">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama">
                    </div>
                    <div class="input-group mb-3">
                        <textarea class="form-control" placeholder="Pesan"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <label class="d-block mb-2 text-white" for="inputGroupSelect01">Konfirmasi Kehadiran</label>
                        <div class="input-group mb-3">
                            <select class="form-select" id="inputGroupSelect01">
                                <option value="hadir" selected>Hadir</option>
                                <option value="tidak hadir">Tidak Hadir</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-grop">
                        <button type="submit" class="btn btn-light">Kirim</button>
                    </div>
                </form>
                <div class="data-rsvp">
                    <div class="d-flex align-items-start justify-content-start gap-2 mb-3">
                        <div class="image d-flex align-items-center justify-content-center text-white">
                            G
                        </div>
                        <div class="text d-flex flex-column gap-1">
                            <span class="name">Gin Gin</span>
                            <span class="time text-white">1 week ago</span>
                            <span class="message text-white">Selamat atas pernikahannya</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-start justify-content-start gap-2 mb-3">
                        <div class="image d-flex align-items-center justify-content-center text-white">
                            G
                        </div>
                        <div class="text d-flex flex-column gap-1">
                            <span class="name">Gin Gin</span>
                            <span class="time text-white">1 week ago</span>
                            <span class="message text-white">Selamat atas pernikahannya</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gift-header mb-5 text-center">
                <i class="fa-solid fa-gift mb-2"></i>
                <h2 class="title-header title-pink mb-3">Amplop Digital</h2>
                <p class="mb-0">Doa Restu Anda merupakan karunia yang
                    sangat berarti bagi kami.</p>
                <p class="mb-0">
                    Dan jika memberi adalah ungkapan tanda kasih,
                    Anda dapat memberi kado secara cashless.
                </p>
            </div>
            <div class="d-flex align-items-start justify-content-center gap-3">
                <div
                    class="box-gif text-center bg-light shadow shadow-sm py-3 px-5 d-flex flex-column align-items-center justify-content-center">
                    <i class="fa-solid fa-building-columns mb-2"></i>
                    <span class="mb-4">Rekening Bank</span>
                    <button class="btn text-white">Buka Amplop</button>
                </div>
                <div
                    class="box-gif text-center bg-light shadow shadow-sm py-3 px-5 d-flex flex-column align-items-center justify-content-center">
                    <i class="fa-solid fa-wallet mb-2"></i>
                    <span class="mb-4">Dompet Digital</span>
                    <button class="btn text-white">Buka Amplop</button>
                </div>
                <div
                    class="box-gif text-center bg-light shadow shadow-sm py-3 px-5 d-flex flex-column align-items-center justify-content-center">
                    <i class="fa-solid fa-house mb-2"></i>
                    <span class="mb-4">Alamat Kado</span>
                    <button class="btn text-white">Buka Amplop</button>
                </div>
            </div>
        </div>
        <div class="custom-shape-divider-bottom-1689220953">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </div>
    <div class="popup-gift d-none">
        <i class="fa-solid fa-xmark close-popup-rekening"></i>
        <div class="card-data text-white">
            <div class="text-end mb-3">
                <img src="{{ asset('bca.png') }}" alt="logo bca" class="data-img">
            </div>
            <div class="d-flex flex-column align-items-start jusitfy-content-start">
                <img src="{{ asset('chip.png') }}" alt="logo chip" class="chip-img mb-2">
                <span class="no-rekening mb-1">0000000000</span>
                <span class="owner mb-3">Gin Gin</span>
                <span class="salin-btn">
                    <i class="fa-solid fa-clipboard"></i>
                    <span>Salin</span>
                </span>
            </div>
        </div>
        <div class="card-data text-white">
            <div class="text-end mb-3">
                <img src="{{ asset('bca.png') }}" alt="logo bca" class="data-img">
            </div>
            <div class="d-flex flex-column align-items-start jusitfy-content-start">
                <img src="{{ asset('chip.png') }}" alt="logo chip" class="chip-img mb-2">
                <span class="no-rekening mb-1">0000000000</span>
                <span class="owner mb-3">Gin Gin</span>
                <span class="salin-btn">
                    <i class="fa-solid fa-clipboard"></i>
                    <span>Salin</span>
                </span>
            </div>
        </div>
        <div class="card-data text-white">
            <div class="text-end mb-3">
                <img src="{{ asset('bca.png') }}" alt="logo bca" class="data-img">
            </div>
            <div class="d-flex flex-column align-items-start jusitfy-content-start">
                <img src="{{ asset('chip.png') }}" alt="logo chip" class="chip-img mb-2">
                <span class="no-rekening mb-1">0000000000</span>
                <span class="owner mb-3">Gin Gin</span>
                <span class="salin-btn">
                    <i class="fa-solid fa-clipboard"></i>
                    <span>Salin</span>
                </span>
            </div>
        </div>
        <div class="card-data text-white">
            <div class="text-end mb-3">
                <img src="{{ asset('bca.png') }}" alt="logo bca" class="data-img">
            </div>
            <div class="d-flex flex-column align-items-start jusitfy-content-start">
                <img src="{{ asset('chip.png') }}" alt="logo chip" class="chip-img mb-2">
                <span class="no-rekening mb-1">0000000000</span>
                <span class="owner mb-3">Gin Gin</span>
                <span class="salin-btn">
                    <i class="fa-solid fa-clipboard"></i>
                    <span>Salin</span>
                </span>
            </div>
        </div>
    </div>
    <div class="popup-gift d-none">
        <i class="fa-solid fa-xmark close-popup-rekening"></i>

        <div class="card-data text-white">
            <img src="{{ asset('bca.png') }}" alt="logo bca" class="data-img mb-2">
            <div class="d-flex flex-column align-items-start jusitfy-content-start">
                <span class="no-rekening mb-1">0000000000</span>
                <span class="owner mb-3">Gin Gin</span>
                <span class="salin-btn">
                    <i class="fa-solid fa-clipboard"></i>
                    <span>Salin</span>
                </span>
            </div>
        </div>
        <div class="card-data text-white">
            <img src="{{ asset('bca.png') }}" alt="logo bca" class="data-img mb-2">
            <div class="d-flex flex-column align-items-start jusitfy-content-start">
                <span class="no-rekening mb-1">0000000000</span>
                <span class="owner mb-3">Gin Gin</span>
                <span class="salin-btn">
                    <i class="fa-solid fa-clipboard"></i>
                    <span>Salin</span>
                </span>
            </div>
        </div>
        <div class="card-data text-white">
            <img src="{{ asset('bca.png') }}" alt="logo bca" class="data-img mb-2">
            <div class="d-flex flex-column align-items-start jusitfy-content-start">
                <span class="no-rekening mb-1">0000000000</span>
                <span class="owner mb-3">Gin Gin</span>
                <span class="salin-btn">
                    <i class="fa-solid fa-clipboard"></i>
                    <span>Salin</span>
                </span>
            </div>
        </div>
    </div>
    <div class="popup-gift d-none">
        <i class="fa-solid fa-xmark close-popup-rekening"></i>
        <div class="card-data text-white text-center">
            <i class="fa-solid fa-house mb-2 d-block mb-3 fs-1"></i>
            <span class="address-gift mb-1 d-block">Nama : Gin Gin</span>
            <span class="address-gift d-block">Alamat : Jl. Gatot Mangkupraja, Panumbangan</span>
        </div>
    </div>

    {{-- !----------> FOOTER <----------  --}}
    <footer
        class="container-fluid text-center p-5 d-flex flex-column align-items-center justify-content-center text-white">
        <img src="{{ asset('assets/themes/A001/img/grafis_tengah_putih.png') }}" class="mb-3" alt="grafis">
        <p>Atas kehadiran dan doa restu Bapak/Ibu/Saudara/i sekalian, kami mengucapkan Terima Kasih.</p>
        <p>Wassalamu'alaikum Warahmatullahi Wabarakatuh.</p>
        <p>Terimakasih atas doa restunya</p>
        <h1>Alucard & Miya</h1>

    </footer>

    {{-- !----------> SAMPUL <----------  --}}
    <div class="container-fluid position-fixed top-0 left-0 bottom-0 right-0 d-flex flex-column align-items-center justify-content-center sampul-section text-white text-center"
        style="background-image: url({{ asset('dummy/sampul_image.jpg') }});">
        <div class="text-sampul position-relative">
            <p class="title-sampul">THE WEDDING OF</p>
            <p class="name-bridegroom-sampul">Alucard & Miya</p>
            <p class="to">Kepada Yth. Bapak/Ibu/Sdr/i</p>
            <p class="name-visitor mb-5">Lancelot</p>
            <div class="open-invitation text-white">
                <i class="fa-regular fa-envelope-open"></i>
                <span>Buka Undangan</span>
            </div>
        </div>
    </div>

    {{-- !----------> SCRIPT <----------  --}}
    <script src="{{ asset('assets/themes/A001/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/themes/A001/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/themes/A001/js/script.js') }}"></script>

    <script>
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
    </script>
</body>

</html>
