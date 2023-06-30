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
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600&family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet">
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
        <div class="container py-3 mt-5">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col">
                    <h1 class="text-white text-hero-title">WEDDING</h1>
                    <p class="text-white text-hero-subtitle">Invitation</p>
                    <p class="paragraph-hero">
                        Undang teman, kerabat, atau sahabatmu ke pernikahan anda menggunakan undangan digital dan modern
                        dengan fitur-fitur yang memudahkan anda hanya di <span class="paragraph-hero-title">Wedding
                            Invitation</span>
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

    {{-- ---------> SCRIPTS <--------- --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
