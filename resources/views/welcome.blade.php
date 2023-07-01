<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wedding Invitation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600&family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <script src="https://kit.fontawesome.com/64f5e4ae10.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
</head>

<body>

    {{-- ---------> HERO <--------- --}}
    <div class="container-fluid border border-danger py-2 position-relative border hero-section">
        {{-- ---------> NAVBAR <--------- --}}
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand d-inline-block d-flex align-items-center gap-1" href="#">
                    <img src="{{ asset('user/image/icon.png') }}" alt="Logo" width="40" height="40"
                        class="d-inline-block align-text-top">
                    <span class="brand-web">Wedding Invitation</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-lg-flex justify-content-lg-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Fitur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Harga</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Katalog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Testimoni</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        {{-- ---------> TEXT <--------- --}}
        <div class="container py-3 mt-5 text-section">
            <div class="row justify-content-center align-items-center gap-2">
                <div class="col">
                    <h1 class="text-white text-hero-title">WEDDING</h1>
                    <p class="text-white text-hero-subtitle">Invitation</p>
                    <p class="paragraph-hero">
                        Undang teman, kerabat, atau sahabatmu ke pernikahan anda menggunakan undangan digital dan modern
                        dengan fitur-fitur yang memudahkan anda hanya di <span class="paragraph-hero-title">Wedding
                            Invitation!</span>
                    </p>
                    <a href="#tema" class="btn btn-light btn-pesan">Pesan Sekarang</a>
                </div>
                <div class="col"></div>
            </div>
        </div>


        {{-- ---------> SHAPE <--------- --}}
        <svg id="sw-js-blob-svg" class="shape1" viewBox="0 0 100 100" width="50%" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="sw-gradient" x1="0" x2="1" y1="1" y2="0">
                    <stop id="stop1" stop-color="rgba(255, 255, 255, 1)" offset="0%"></stop>
                    <stop id="stop2" stop-color="rgba(255, 255, 255, 1)" offset="100%"></stop>
                </linearGradient>
            </defs>
            <path fill="url(#sw-gradient)"
                d="M19.5,-25C24.3,-19.1,26.7,-12.1,27.4,-5.2C28.2,1.7,27.3,8.5,25.1,16.6C22.9,24.6,19.3,34,13.4,35.5C7.6,37,-0.7,30.7,-9.7,27.2C-18.6,23.6,-28.4,22.8,-33.2,17.6C-38,12.5,-37.9,2.9,-33.7,-3.3C-29.4,-9.5,-21,-12.3,-14.7,-17.9C-8.4,-23.5,-4.2,-31.9,1.6,-33.8C7.3,-35.6,14.6,-30.9,19.5,-25Z"
                width="100%" height="100%" transform="translate(50 50)" stroke-width="0"
                style="transition: all 0.3s ease 0s;"></path>
        </svg>
        <svg id="sw-js-blob-svg" class="shape2" viewBox="0 0 100 100" width="40%" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="sw-gradient" x1="0" x2="1" y1="1" y2="0">
                    <stop id="stop1" stop-color="rgba(185.629, 185.629, 185.629, 1)" offset="0%"></stop>
                    <stop id="stop2" stop-color="rgba(255, 255, 255, 1)" offset="100%"></stop>
                </linearGradient>
            </defs>
            <path fill="url(#sw-gradient)"
                d="M12.3,-20.2C18.6,-15.1,28.2,-16.2,34.2,-12.8C40.2,-9.3,42.6,-1.4,39.8,4.4C36.9,10.3,28.9,14.2,23.2,19.3C17.5,24.4,14.2,30.7,9.3,32.7C4.3,34.7,-2.2,32.3,-6,27.8C-9.8,23.4,-10.9,16.9,-12.5,12.3C-14.2,7.8,-16.4,5.2,-17.3,2.2C-18.2,-0.8,-17.8,-4.4,-17.5,-9.2C-17.1,-14,-16.9,-20,-14,-26.6C-11.2,-33.2,-5.6,-40.5,-1.3,-38.5C3,-36.4,6,-25.2,12.3,-20.2Z"
                width="100%" height="100%" transform="translate(50 50)" stroke-width="0"
                style="transition: all 0.3s ease 0s;"></path>
        </svg>
        <svg id="sw-js-blob-svg" viewBox="0 0 100 100" class="shape3" width="50%"
            xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="sw-gradient" x1="0" x2="1" y1="1" y2="0">
                    <stop id="stop1" stop-color="rgba(255, 255, 255, 1)" offset="0%"></stop>
                    <stop id="stop2" stop-color="rgba(255, 255, 255, 1)" offset="100%"></stop>
                </linearGradient>
            </defs>
            <path fill="url(#sw-gradient)"
                d="M21.2,-34.4C26.7,-33.6,29.9,-26.3,32,-19.5C34,-12.7,34.9,-6.4,35.8,0.5C36.6,7.3,37.4,14.7,33.4,18.1C29.4,21.5,20.6,21,14.2,25.1C7.9,29.2,3.9,38,-2.1,41.6C-8.1,45.3,-16.2,43.7,-21.8,39.1C-27.3,34.5,-30.3,26.9,-30.5,19.9C-30.8,12.8,-28.2,6.4,-29,-0.4C-29.7,-7.3,-33.7,-14.5,-31.8,-18.6C-29.8,-22.6,-21.9,-23.4,-15.6,-23.7C-9.3,-24.1,-4.7,-24,1.6,-26.7C7.9,-29.5,15.7,-35.2,21.2,-34.4Z"
                width="100%" height="100%" transform="translate(50 50)" stroke-width="0"
                style="transition: all 0.3s ease 0s;"></path>
        </svg>
    </div>
    <div class="custom-shape-divider-bottom-1688124164">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
            preserveAspectRatio="none">
            <path d="M598.97 114.72L0 0 0 120 1200 120 1200 0 598.97 114.72z" class="shape-fill"></path>
        </svg>
    </div>

    {{-- ---------> FITUR <--------- --}}
    <div class="container my-5 py-3">
        <div class="text-center mb-5">
            <p class="title-fitur mb-3">Fitur Yang Kami Sediakan</p>
            <p class="description-fitur">Beragam fitur yang dapat anda manfaatkan untuk meningkatkan dan mempercantik
                informasi undangan digital
                yang
                Anda.</p>
        </div>
        <div class="row row-cols-lg-5 px-5 gap-3 justify-content-center">
            <div
                class="col-md-2 px-2 rounded shadow-lg text-center d-flex align-items-center justify-content-center flex-col gap-2 col-fitur">
                <i class="fa-solid fa-paper-plane fs-4" style="color: #ffffff;"></i>
                <p class="text-white text-fitur">Bagikan Sepuasnya</p>
            </div>
            <div
                class="col-md-2 px-2 rounded shadow-lg text-center d-flex align-items-center justify-content-center flex-col gap-2 col-fitur">
                <i class="fa-solid fa-paper-plane fs-4" style="color: #ffffff;"></i>
                <p class="text-white text-fitur">Bagikan Sepuasnya</p>
            </div>
            <div
                class="col-md-2 px-2 rounded shadow-lg text-center d-flex align-items-center justify-content-center flex-col gap-2 col-fitur">
                <i class="fa-solid fa-paper-plane fs-4" style="color: #ffffff;"></i>
                <p class="text-white text-fitur">Bagikan Sepuasnya</p>
            </div>
            <div
                class="col-md-2 px-2 rounded shadow-lg text-center d-flex align-items-center justify-content-center flex-col gap-2 col-fitur">
                <i class="fa-solid fa-paper-plane fs-4" style="color: #ffffff;"></i>
                <p class="text-white text-fitur">Bagikan Sepuasnya</p>
            </div>
            <div
                class="col-md-2 px-2 rounded shadow-lg text-center d-flex align-items-center justify-content-center flex-col gap-2 col-fitur">
                <i class="fa-solid fa-paper-plane fs-4" style="color: #ffffff;"></i>
                <p class="text-white text-fitur">Bagikan Sepuasnya</p>
            </div>
            <div
                class="col-md-2 px-2 rounded shadow-lg text-center d-flex align-items-center justify-content-center flex-col gap-2 col-fitur">
                <i class="fa-solid fa-paper-plane fs-4" style="color: #ffffff;"></i>
                <p class="text-white text-fitur">Bagikan Sepuasnya</p>
            </div>
            <div
                class="col-md-2 px-2 rounded shadow-lg text-center d-flex align-items-center justify-content-center flex-col gap-2 col-fitur">
                <i class="fa-solid fa-paper-plane fs-4" style="color: #ffffff;"></i>
                <p class="text-white text-fitur">Bagikan Sepuasnya</p>
            </div>
            <div
                class="col-md-2 px-2 rounded shadow-lg text-center d-flex align-items-center justify-content-center flex-col gap-2 col-fitur">
                <i class="fa-solid fa-paper-plane fs-4" style="color: #ffffff;"></i>
                <p class="text-white text-fitur">Bagikan Sepuasnya</p>
            </div>
            <div
                class="col-md-2 px-2 rounded shadow-lg text-center d-flex align-items-center justify-content-center flex-col gap-2 col-fitur">
                <i class="fa-solid fa-paper-plane fs-4" style="color: #ffffff;"></i>
                <p class="text-white text-fitur">Bagikan Sepuasnya</p>
            </div>
            <div
                class="col-md-2 px-2 rounded shadow-lg text-center d-flex align-items-center justify-content-center flex-col gap-2 col-fitur">
                <i class="fa-solid fa-paper-plane fs-4" style="color: #ffffff;"></i>
                <p class="text-white text-fitur">Bagikan Sepuasnya</p>
            </div>
            <div
                class="col-md-2 px-2 rounded shadow-lg text-center d-flex align-items-center justify-content-center flex-col gap-2 col-fitur">
                <i class="fa-solid fa-paper-plane fs-4" style="color: #ffffff;"></i>
                <p class="text-white text-fitur">Bagikan Sepuasnya</p>
            </div>
            <div
                class="col-md-2 px-2 rounded shadow-lg text-center d-flex align-items-center justify-content-center flex-col gap-2 col-fitur">
                <i class="fa-solid fa-paper-plane fs-4" style="color: #ffffff;"></i>
                <p class="text-white text-fitur">Bagikan Sepuasnya</p>
            </div>

        </div>
    </div>

    {{-- ---------> HARGA <--------- --}}
    <div class="container my-5 py-5 px-5">
        <div class="text-center mb-5">
            <p class="title-price">Harga</p>
            <p class="description-price">Kami memberikan harga-harga terbaik untuk anda dapat membuat undangan digital
                dengan mudah</p>
        </div>
        <div class="row gap-5 justify-content-center">
            <div class="col-md-3 p-0 shadow basic categories">

                <div class="top w-100 d-flex flex-column align-items-start justify-content-start gap-3">
                    <div class="px-4 pt-3">
                        <h3 class="d-flex align-items-center justify-content-start gap-1 fs-4 title-category">
                            <i class="fa-solid fa-globe" style="color: #ffffff;"></i>
                            <span class="title-category text-white">BASIC</span>
                        </h3>
                    </div>
                    <div class="price bg-white">
                        <p class="total-price price-basic fs-3 m-0">30.000 IDR</p>
                        <span class="month price-basic fs-6">/Month</span>
                    </div>
                    <div
                        class="fiturs-category text-white px-4 d-flex flex-column align-items-start justify-content-start gap-1">
                        <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                            <span>Bagikan sepuasnya</span>
                        </p>
                        <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                            <span>Bagikan sepuasnya</span>
                        </p>
                        <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                            <span>Bagikan sepuasnya</span>
                        </p>
                        <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                            <span>Bagikan sepuasnya</span>
                        </p>
                    </div>
                    <div class="line"></div>
                </div>
                <div class="bottom w-100 pb-4 d-flex justify-content-center">
                    <a href="#tema"
                        class="text-decoration-none text-white py-2 px-4 border border-light order-button">Order
                        Now</a>
                </div>
            </div>
            <div class="col-md-3 p-0 shadow standard categories">

                <div class="top w-100 d-flex flex-column align-items-start justify-content-start gap-3">
                    <div class="px-4 pt-3">
                        <h3 class="d-flex align-items-center justify-content-start gap-1 fs-4 title-category">
                            <i class="fa-solid fa-globe" style="color: #ffffff;"></i>
                            <span class="title-category text-white">STANDARD</span>
                        </h3>
                    </div>
                    <div class="price bg-white">
                        <p class="total-price price-standard fs-3 m-0">30.000 IDR</p>
                        <span class="month price-standard fs-6">/Month</span>
                    </div>
                    <div
                        class="fiturs-category text-white px-4 d-flex flex-column align-items-start justify-content-start gap-1">
                        <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                            <span>Bagikan sepuasnya</span>
                        </p>
                        <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                            <span>Bagikan sepuasnya</span>
                        </p>
                        <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                            <span>Bagikan sepuasnya</span>
                        </p>
                        <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                            <span>Bagikan sepuasnya</span>
                        </p>
                        <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                            <span>Bagikan sepuasnya</span>
                        </p>
                    </div>
                    <div class="line"></div>
                </div>
                <div class="bottom w-100 pb-4 d-flex justify-content-center">
                    <a href="#tema"
                        class="text-decoration-none text-white py-2 px-4 border border-light order-button">Order
                        Now</a>
                </div>
            </div>
            <div class="col-md-3 p-0 shadow premium categories">

                <div class="top w-100 d-flex flex-column align-items-start justify-content-start gap-3">
                    <div class="px-4 pt-3">
                        <h3 class="d-flex align-items-center justify-content-start gap-1 fs-4 title-category">
                            <i class="fa-solid fa-globe" style="color: #ffffff;"></i>
                            <span class="title-category text-white">PREMIUM</span>
                        </h3>
                    </div>
                    <div class="price bg-white">
                        <p class="total-price price-premium fs-3 m-0">30.000 IDR</p>
                        <span class="month price-premium fs-6">/Month</span>
                    </div>
                    <div
                        class="fiturs-category text-white px-4 d-flex flex-column align-items-start justify-content-start gap-1">
                        <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                            <span>Bagikan sepuasnya</span>
                        </p>
                        <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                            <span>Bagikan sepuasnya</span>
                        </p>
                        <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                            <span>Bagikan sepuasnya</span>
                        </p>
                        <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                            <span>Bagikan sepuasnya</span>
                        </p>
                        <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                            <span>Bagikan sepuasnya</span>
                        </p>
                        <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                            <span>Bagikan sepuasnya</span>
                        </p>
                        <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                            <span>Bagikan sepuasnya</span>
                        </p>
                    </div>
                    <div class="line"></div>
                </div>
                <div class="bottom w-100 pb-4 d-flex justify-content-center">
                    <a href="#tema"
                        class="text-decoration-none text-white py-2 px-4 border border-light order-button">Order
                        Now</a>
                </div>
            </div>
        </div>
    </div>

    {{-- ---------> KATALOG <--------- --}}
    <div class="container my-5 py-5 px-5">
        <div class="text-center mb-5">
            <p class="title-katalog">Katalog</p>
            <p class="description-katalog">Terdapat beragam tema yang telah disediakan, sehingga Anda dapat memilih
                sesuai dengan preferensi Anda.</p>
        </div>
        <div class="row row-cols-1">
            <div class="col">

                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active btn-pakai-foto btn-indicators" aria-current="true" aria-label="Slide 1">
                            <div class="bg-indicators"></div>
                            <span class="text-katalog">Pakai
                                Foto</span>
                        </button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            class="btn-tanpa-foto btn-indicators" aria-label="Slide 2">
                            <div class="bg-indicators"></div>
                            <span class="text-katalog">Pakai
                                Foto</span>
                        </button>
                    </div>
                    <div class="carousel-inner mt-4">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-header">

                                        </div>
                                        <div
                                            class="card-body py-4 d-flex align-items-center justify-content-center gap-2 w-100">
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>Preview</span>
                                            </a>
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <span>Order</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-header">

                                        </div>
                                        <div
                                            class="card-body py-4 d-flex align-items-center justify-content-center gap-2 w-100">
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>Preview</span>
                                            </a>
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <span>Order</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-header">

                                        </div>
                                        <div
                                            class="card-body py-4 d-flex align-items-center justify-content-center gap-2 w-100">
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>Preview</span>
                                            </a>
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <span>Order</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-header">

                                        </div>
                                        <div
                                            class="card-body py-4 d-flex align-items-center justify-content-center gap-2 w-100">
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>Preview</span>
                                            </a>
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <span>Order</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-header">

                                        </div>
                                        <div
                                            class="card-body py-4 d-flex align-items-center justify-content-center gap-2 w-100">
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>Preview</span>
                                            </a>
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <span>Order</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-header">

                                        </div>
                                        <div
                                            class="card-body py-4 d-flex align-items-center justify-content-center gap-2 w-100">
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>Preview</span>
                                            </a>
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <span>Order</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-header">

                                        </div>
                                        <div
                                            class="card-body py-4 d-flex align-items-center justify-content-center gap-2 w-100">
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>Preview</span>
                                            </a>
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <span>Order</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-header">

                                        </div>
                                        <div
                                            class="card-body py-4 d-flex align-items-center justify-content-center gap-2 w-100">
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>Preview</span>
                                            </a>
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <span>Order</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-header">

                                        </div>
                                        <div
                                            class="card-body py-4 d-flex align-items-center justify-content-center gap-2 w-100">
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>Preview</span>
                                            </a>
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <span>Order</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-header">

                                        </div>
                                        <div
                                            class="card-body py-4 d-flex align-items-center justify-content-center gap-2 w-100">
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>Preview</span>
                                            </a>
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <span>Order</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-header">

                                        </div>
                                        <div
                                            class="card-body py-4 d-flex align-items-center justify-content-center gap-2 w-100">
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>Preview</span>
                                            </a>
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <span>Order</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-header">

                                        </div>
                                        <div
                                            class="card-body py-4 d-flex align-items-center justify-content-center gap-2 w-100">
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>Preview</span>
                                            </a>
                                            <a href="#"
                                                class="btn text-light text-decoration-none text-white btn-theme">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <span>Order</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ---------> TESTIMONI <--------- --}}
    <div class="container my-5 py-5 px-5">
        <div class="text-center mb-5">
            <p class="title-testimoni">Apa Yang Mereka Katakan?</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel position-relative testimonies-carousel text-center">
                    <div class="box-area">
                        <div class="img-area">

                        </div>
                        <p class="name-person">Person name</p>
                        <div class="rating">
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                        </div>
                        <p class="review">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem suscipit totam nisi id
                            tempora libero quas alias error magnam impedit.
                        </p>
                    </div>
                    <div class="box-area">
                        <div class="img-area">

                        </div>
                        <p class="name-person">Person name</p>
                        <div class="rating">
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                        </div>
                        <p class="review">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem suscipit totam nisi id
                            tempora libero quas alias error magnam impedit.
                        </p>
                    </div>
                    <div class="box-area">
                        <div class="img-area">

                        </div>
                        <p class="name-person">Person name</p>
                        <div class="rating">
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                        </div>
                        <p class="review">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem suscipit totam nisi id
                            tempora libero quas alias error magnam impedit.
                        </p>
                    </div>
                    <div class="box-area">
                        <div class="img-area">

                        </div>
                        <p class="name-person">Person name</p>
                        <div class="rating">
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                        </div>
                        <p class="review">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem suscipit totam nisi id
                            tempora libero quas alias error magnam impedit.
                        </p>
                    </div>
                    <div class="box-area">
                        <div class="img-area">

                        </div>
                        <p class="name-person">Person name</p>
                        <div class="rating">
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                        </div>
                        <p class="review">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem suscipit totam nisi id
                            tempora libero quas alias error magnam impedit.
                        </p>
                    </div>
                    <div class="box-area">
                        <div class="img-area">

                        </div>
                        <p class="name-person">Person name</p>
                        <div class="rating">
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                        </div>
                        <p class="review">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem suscipit totam nisi id
                            tempora libero quas alias error magnam impedit.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ---------> FAQ <--------- --}}
    <div class="container my-5 py-5 px-5">
        <div class="mb-5">
            <p class="title-faq">FAQ</p>
        </div>
        <div class="row faqs">
            <div class="col-md-12 box-faq py-3">
                <div class="header-faq mb-3 d-flex align-items-center justify-content-between">
                    <p class="question m-0 fs-5 fw-bold">
                        Bagaimana cara order undangan?
                    </p>
                    <i class="fa-solid fa-angle-down" style="color: #17191c;"></i>
                </div>
                <div class="body-faq">
                    <p class="answer fs-6">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident ratione sapiente vitae
                        ducimus unde atque quidem temporibus modi consectetur ea voluptas dignissimos omnis esse
                        veritatis asperiores accusantium, in dicta laborum.0
                    </p>
                </div>
                <div class="line-faq"></div>
            </div>
        </div>
    </div>

    {{-- ---------> SCRIPTS <--------- --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    {{-- ---------> SCRIPT BUTTON INDICATORS KATALOG <--------- --}}
    <script>
        $(document).ready(function() {
            $(".btn-pakai-foto").on("click", function() {
                $(this).addClass("active");
                $(".btn-tanpa-foto").removeClass("active");
            })
            $(".btn-tanpa-foto").on("click", function() {
                $(this).addClass("active");
                $(".btn-pakai-foto").removeClass("active");
            })
        })
    </script>

    {{-- ---------> SCRIPT TESTIMONIES <--------- --}}
    <script>
        $(document).ready(function() {
            $(".testimonies-carousel").owlCarousel({
                autoplay: true,
                slideSpeed: 3000,
                items: 3,
                nav: true,
                navText: [`<i class="fa-solid fa-chevron-left"></i>`,
                    `<i class="fa-solid fa-chevron-right"></i>`
                ],
                margin: 30,
                dots: false,
                responsive: {
                    360: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    },
                    1024: {
                        items: 3
                    }
                }
            })
        })
    </script>
</body>

</html>
