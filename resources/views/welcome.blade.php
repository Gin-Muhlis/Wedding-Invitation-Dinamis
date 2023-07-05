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
    @include('home.partials.header')
    {{-- ---------> FITUR <--------- --}}
    @include('home.partials.fitur')

    {{-- ---------> HARGA <--------- --}}
    @include('home.partials.harga')
    {{-- ---------> KATALOG <--------- --}}
    @include('home.partials.katalog')

    {{-- ---------> TESTIMONI <--------- --}}
    @include('home.partials.testimoni')

    {{-- ---------> FAQ <--------- --}}
    @include('home.partials.faq')

    {{-- ---------> FOOTER <--------- --}}
    @include('home.partials.footer')

    {{-- ---------> BUTTON TO TOP <--------- --}}
    <a href="#" class="btn-to-top">
        <i class="fa-solid fa-arrow-up" style="color: #ffffff;"></i>
    </a>

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

    {{-- ---------> SCRIPT FAQ <--------- --}}
    <script>
        $(document).ready(function() {
            let faqs = Array.from($(".box-faq"))

            faqs.forEach(item => {
                $(item).on("click", () => {
                    $(item).toggleClass("show")
                })
            })
        })
    </script>

    {{-- ---------> SCRIPT BUTTON TO TOP <--------- --}}
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {

                if ($(this).scrollTop() > 100) {
                    $(".btn-to-top").addClass("appear")

                } else {
                    $(".btn-to-top").removeClass("appear")
                }
            })
        })
    </script>

</body>

</html>
