@php
    require_once app_path() . '/php/helpers.php';
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['bridegroom']->male_nickname }} & {{ $data['bridegroom']->female_nickname }}</title>

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
            <span class="title-hero d-inline-block text-white mb-3 position-relative">THE WEDDING OF</span>
            <div class="frame-image-hero position-relative mb-3">
                <img src="{{ asset('assets/themes/A001/img/bingkai.png') }}" alt="bingkai" class="frame">
                <img src="{{ asset('assets/themes/A001/img/bridegroom.jpg') }}" alt="prewedding image">
            </div>
            <h1 class="bridegroom-name-hero position-relative text-white mb-4">{{ $data['bridegroom']->male_nickname }}
                & {{ $data['bridegroom']->female_nickname }}</h1>
            @php
                $text_date_ceremony = makeTextDate($data['wedding_ceremony']->ceremony_date->toDateString());
            @endphp
            <p class="date-wedding-hero text-white">
                {{ $text_date_ceremony }}
            </p>
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
        <img src="{{ asset('assets/themes/A001/img/bunga_kiri.png') }}" class="bunga_greeting bunga_kiri"
            width="300" alt="bunga">
        <img src="{{ asset('assets/themes/A001/img/bunga_kanan.png') }}" class="bunga_greeting bunga_kanan"
            width="300" alt="bunga">
        <div class="container">
            <p class="text-white ayat">
                Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu
                sendiri,
                supaya kamu cenderung dan merasa tenteram kepadanya, dan dijadikan-Nya diantaramu rasa kasih dan sayang.
                Sesungguhnya pada yang demikian itu benar-benar terdapat tanda-tanda bagi kaum yang berfikir.
            </p>
            <p class="text-white surat">&lpar;Q.S Ar Rum : 21&rpar;</p>
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
            <div class="col-lg-5 d-flex align-items-center justify-content-end gap-3">
                <div class="bridegroom-data">
                    <h2 class="bridegroom-name mb-3">{{ $data['bridegroom']->male_fullname }}</h2>
                    <span class="bridegroom-son-text d-inline-block mb-1">Putra dari</span>
                    <p class="bridegroom-parent-text fst-italic">Bapak {{ $data['bridegroom']->male_father_name }} dan
                        Ibu {{ $data['bridegroom']->male_mother_name }}</p>
                </div>
                <div class="bridegroom-image p-3">
                    <img src="{{ asset('assets/themes/A001/img/bingkai.png') }}" alt="bingkai"
                        class="frame-bridegroom">
                    <img src="{{ \Storage::url($data['wedding_data']->male_image) }}" class="img" alt="mempelai">
                </div>
            </div>
            <div class="col-lg-1 bridegroom-data and fs-1">
                &
            </div>
            <div class="col-lg-5 d-flex align-items-center justify-content-start gap-2">
                <div class="bridegroom-data order-1">
                    <h3 class="bridegroom-name mb-3">{{ $data['bridegroom']->female_fullname }}</h3>
                    <span class="bridegroom-son-text d-inline-block mb-1">Putri dari</span>
                    <p class="bridegroom-parent-text fst-italic">Bapak {{ $data['bridegroom']->female_father_name }}
                        dan Ibu {{ $data['bridegroom']->female_mother_name }}</p>
                </div>
                <div class="bridegroom-image p-3 order-0">
                    <img src="{{ asset('assets/themes/A001/img/bingkai.png') }}" alt="bingkai"
                        class="frame-bridegroom">
                    <img src="{{ \Storage::url($data['wedding_data']->female_image) }}" class="img" alt="mempelai">
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
        <img src="{{ asset('assets/themes/A001/img/bunga_kiri.png') }}" class="bunga_wedding bunga_kiri" width="300"
            alt="bunga">
        <img src="{{ asset('assets/themes/A001/img/bunga_kanan.png') }}" class="bunga_wedding bunga_kanan"
            width="300" alt="bunga">
        <div class="wedding-data m-auto shadow shadow-lg text-center bg-light">
            <div class="background-wedding w-100 position-relative">
                <img src="{{ \Storage::url($data['wedding_data']->cover_image) }}" alt="wedding background">
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
                    <span class="date mb-1 d-block">{{ $text_date_ceremony }}</span>

                    <span class="time d-block mb-3">Pukul {{ makeTextTime($data['wedding_ceremony']->ceremony_time) }}
                        WIB s.d
                        selesai</span>
                    <div id="countdown-ceremony"
                        class="countdown d-flex align-items-center justify-content-center gap-2 mb-4">
                    </div>
                    <div class="d-flex align-items-center justify-content-center gap-1 mb-4 line-home">
                        <div class="line1"></div>
                        <i class="fa-solid fa-house"></i>
                        <div class="line2"></div>
                    </div>
                    <h2>Lokasi</h2>
                    <p class="location">
                        {{ $data['wedding_ceremony']->ceremony_address }}
                    </p>
                </div>
                <div class="col">
                    <img src="{{ asset('assets/themes/A001/img/gate.png') }}" alt="icon wedding"
                        class="icon-wedding mb-2">
                    <h2 class="mb-2">Resepsi</h2>
                    <span
                        class="date mb-1 d-block">{{ makeTextDate($data['wedding_reception']->reception_date->toDateString()) }}</span>
                    <span class="time d-block mb-3">Pukul
                        {{ makeTextTime($data['wedding_reception']->reception_time) }} WIB s.d selesai</span>
                    <div id="countdown-reception"
                        class="countdown d-flex align-items-center justify-content-center gap-2 mb-4">
                    </div>
                    <div class="d-flex align-items-center justify-content-center gap-1 mb-4 line-home">
                        <div class="line1"></div>
                        <i class="fa-solid fa-house"></i>
                        <div class="line2"></div>
                    </div>
                    <h2>Lokasi</h2>
                    <p class="location">
                        {{ $data['wedding_reception']->reception_address }}
                    </p>
                </div>
            </div>
            <div class="maps">
                <iframe
                    src="https://maps.google.com/maps?q={{ $data['wedding_data']->wedding_coordinate }}&hl=es;z=14&amp;output=embed"
                    height="300" class="d-block w-100 mb-5"></iframe>
                <a href="https://maps.google.com/maps?q={{ $data['wedding_data']->wedding_coordinate }}"
                    target="_blank" class="text-center btn-map ">
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
            @foreach ($data['stories'] as $story)
                <div class="row justify-content-{{ $loop->index % 2 == 0 ? 'start' : 'end' }} mb-5">
                    <div class="content content{{ $loop->index % 2 == 0 ? '1' : '2' }} text-white position-relative">
                        <div class="icon-content d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-heart " style="color: #ffffff;"></i>
                        </div>
                        <img src="{{ \Storage::url($story->story_image) }}" alt="story image"
                            class="image-story mb-3">
                        <div class="d-flex align-items-center justify-content-between w-100 mb-2">
                            <span class="title-story">{{ $story->story_title }}</span>
                            <span class="date-story">{{ generateDate($story->story_date->toDateString()) }}</span>
                        </div>
                        <p class="content-text w-100">
                            {{ $story->content }}
                        </p>
                    </div>
                </div>
            @endforeach
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

                @foreach ($data['albums'] as $image)
                    <a href="{{ \Storage::url($image->image) }}" data-fancybox="gallery" class="col-md-4 mb-4">
                        <img src="{{ \Storage::url($image->image) }}" class="w-100 image-gallery" />
                    </a>
                @endforeach

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
                        {{ $data['rsvps']->count() }} Ucapan
                    </p>
                </div>
                <form action="" class="form-rsvp">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="input-name" placeholder="Nama">
                    </div>
                    <div class="input-group mb-3">
                        <textarea class="form-control" id="input-comment" placeholder="Pesan"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <label class="d-block mb-2 text-white" for="inputGroupSelect01">Konfirmasi Kehadiran</label>
                        <div class="input-group mb-3">
                            <select class="form-select" id="input-kehadiran">
                                <option value="hadir" selected>Hadir</option>
                                <option value="tidak hadir">Tidak Hadir</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <button type="submit" class="btn btn-light text-center">
                            <div class="spinner-border spinner-rsvp d-none" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <span class="send-text">Kirim</span>
                        </button>
                    </div>
                </form>
                <div class="data-rsvp">
                    @if ($data['rsvps']->count() > 0)
                        @foreach ($data['rsvps'] as $rsvp)
                            <div class="position-relative mb-3">
                                <div class="d-flex align-items-start justify-content-start gap-2 mb-3">
                                    <div class="image d-flex align-items-center justify-content-center text-white"
                                        style="background-color: #{{ $rsvp->bg_profile }};">
                                        {{ strtoupper(substr($rsvp->name, 0, 1)) }}
                                    </div>
                                    <div class="text d-flex flex-column gap-1">
                                        <div class="mb-1 d-flex align-items-center justify-content-start gap-2">
                                            <span class="name text-light">{{ $rsvp->name }}</span>
                                            <span class="kehadiran text-dark">{{ $rsvp->kehadiran }}</span>

                                        </div>
                                        <span
                                            class="time text-white">{{ getTimeAgo(strtotime($rsvp->created_at)) }}</span>
                                        <span class="message text-white">{{ $rsvp->comment }}</span>
                                        <span class="btn-reply" data-rsvp="{{ $rsvp->id }}">Balas</span>
                                    </div>
                                </div>
                                <div class="wrapper-reply wrapper-reply{{ $rsvp->id }}">
                                    @if ($rsvp->replyRsvps->count() > 0)
                                        @foreach ($rsvp->replyRsvps as $reply)
                                            <div
                                                class="d-flex align-items-start justify-content-start gap-2 mb-3 reply-field">
                                                <div class="image d-flex align-items-center justify-content-center text-white"
                                                    style="background-color: #{{ $reply->bg_profile }};">
                                                    {{ strtoupper(substr($reply->name, 0, 1)) }}
                                                </div>
                                                <div class="text d-flex flex-column gap-1">
                                                    <div
                                                        class="mb-1 d-flex align-items-center justify-content-start gap-2">
                                                        <span class="name text-light">{{ $reply->name }}</span>
                                                        <span
                                                            class="kehadiran text-dark">{{ $reply->kehadiran }}</span>

                                                    </div>
                                                    <span
                                                        class="time text-white">{{ getTimeAgo(strtotime($reply->created_at)) }}</span>
                                                    <span class="message text-white">{{ $reply->reply }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif

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
                    <i class="fa-solid fa-gift mb-2"></i>
                    <span class="mb-4">Amplop Digital</span>
                    <button class="btn text-white btn-open-gift">Buka Amplop</button>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-gift d-none shadow">
        <i class="fa-solid fa-xmark close-popup"></i>
        @foreach ($data['dataForGifts'] as $gift)
            <div class="card-data text-white">
                <div class="text-end mb-3">
                    <img src="{{ \Storage::url($gift->giftPayment->icon) }}" alt="logo" class="data-img">
                </div>
                <div class="d-flex flex-column align-items-start jusitfy-content-start">
                    <img src="{{ asset('chip.png') }}" alt="logo chip" class="chip-img mb-2">
                    <span class="no-rekening mb-1">{{ $gift->no_data }}</span>
                    <span class="owner mb-3">{{ $gift->owner_name }}</span>
                    <span class="salin-btn copy-gift-data" data-clipboard-text="{{ $gift->no_data }}">
                        <span class="text-copy">
                            <i class="fa-solid fa-clipboard"></i>
                            Salin
                        </span>
                        <span class="check-copy">
                            <i class="fa-solid fa-check check-copy"></i>
                        </span>
                    </span>
                </div>
            </div>
        @endforeach

    </div>

    {{-- !----------> POP UP <----------  --}}
    <div class="alert align-items-center gap-2 popup-alert d-none" role="alert">
        <i class="fa-solid fs-5 icon-popup"></i>
        <span class="text-popup"></span>
    </div>

    {{-- !----------> FOOTER <----------  --}}
    <footer
        class="container-fluid text-center p-5 d-flex flex-column align-items-center justify-content-center text-white position-relative"
        style="background-image: url({{ \Storage::url($data['wedding_data']->cover_image) }});">
        <img src="{{ asset('assets/themes/A001/img/grafis_tengah_putih.png') }}" class="mb-3" alt="grafis">
        <p>Atas kehadiran dan doa restu Bapak/Ibu/Saudara/i sekalian, kami mengucapkan Terima Kasih.</p>
        <p>Wassalamu'alaikum Warahmatullahi Wabarakatuh.</p>
        <p>Terimakasih atas doa restunya</p>
        <h1>{{ $data['bridegroom']->male_nickname }}
            & {{ $data['bridegroom']->female_nickname }}</h1>

    </footer>

    {{-- !----------> SAMPUL <----------  --}}
    <div class="container-fluid position-fixed top-0 left-0 bottom-0 right-0 d-flex flex-column align-items-center justify-content-center sampul-section text-white text-center"
        style="background-image: url({{ \Storage::url($data['wedding_data']->cover_image) }});">
        <div class="text-sampul position-relative">
            <p class="title-sampul">THE WEDDING OF</p>
            <p class="name-bridegroom-sampul">{{ $data['bridegroom']->male_nickname }}
                & {{ $data['bridegroom']->female_nickname }}</p>
            <p class="to">Kepada Yth. Bapak/Ibu/Sdr/i</p>
            <p class="name-visitor mb-5">{{ $data['visitorName'] }}</p>
            <div class="open-invitation text-white">
                <i class="fa-regular fa-envelope-open"></i>
                <span>Buka Undangan</span>
            </div>
        </div>
    </div>

    {{-- !----------> MUSIC <----------  --}}

    <audio id="music-background" loop>
        <source src="{{ \Storage::url($data['wedding_data']->music) }}" type="audio/mp3">

    </audio>
    <div class="btn-music d-flex align-items-center justify-content-center shadow">
        <i class="fa-solid fa-pause pause-icon"></i>
    </div>

    {{-- !----------> SCRIPT <----------  --}}
    <script>
        const dateWeddingCeremony = @json($data['wedding_ceremony']->ceremony_date->toDateString());
        const dateWeddingReception = @json($data['wedding_reception']->reception_date->toDateString());
    </script>

    <script>
        const order_id = @json($data['order']->id);
    </script>

    <script src="{{ asset('assets/themes/A001/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/themes/A001/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/themes/A001/js/fancybox.js') }}"></script>
    <script src="{{ asset('simplyCountdown/simplyCountdown.js-master/dist/simplyCountdown.min.js') }}"></script>
    <script src="{{ asset('clipboard.js-master/dist/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/themes/A001/js/simplyCountdown.js') }}"></script>
    <script src="{{ asset('assets/themes/A001/js/rsvps.js') }}"></script>
    <script src="{{ asset('assets/themes/A001/js/gift.js') }}"></script>
    <script src="{{ asset('assets/themes/A001/js/clipboard.js') }}"></script>
    <script src="{{ asset('assets/themes/A001/js/cover.js') }}"></script>
    <script src="{{ asset('assets/themes/A001/js/music.js') }}"></script>



</body>

</html>
