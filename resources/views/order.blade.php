<!DOCTYPE html>
<html lang="en">

<head>

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
        <script src="https://kit.fontawesome.com/64f5e4ae10.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="{{ asset('user/css/order.css') }}">
    </head>
</head>

<body>
    <div class="container-fluid order-section d-flex align-items-center justify-content-center">
        <div class="container wrapper-order position-relative">
            <div class="row gap-2 shadow shadow-lg h-100">
                <div class="col-md-4 px-0">
                    <img src="{{ asset("assets/themes/{$theme->theme_code}/preview.png") }}" class="w-100"
                        alt="preview image">
                </div>
                <div class="col p-4 h-100">
                    <h3 class="text-white mb-4">Konfirmasi Order</h3>
                    <form action="{{ route('order.make') }}" method="POST"
                        class="row align-content-between h-100 form-order">
                        @csrf
                        <div class="col-md-6 form-group mb-3">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="phone">No Telepon</label>
                            <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="col-md-12 form-group mb-3">
                            <label for="domain">Domain</label>
                            <input type="text" id="domain" name="domain" class="form-control" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="d-flex justify-content-end w-100">
                                <button type="submit" class="btn btn-light">Konfirmasi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- button home --}}
    <div class="btn-home d-flex align-items-center justify-content-center ">
        <i class="fa-solid fa-house"></i>
    </div>

    {{-- ---------> SCRIPTS <--------- --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $(".form-order").on("submit", () => {
                let inputHidden = $("<input>");
                $(inputHidden).attr("type", "hidden")
                $(inputHidden).attr("name", "theme_id")
                $(inputHidden).val(@json($theme->id))

                $(".form-order").append(inputHidden);
            })

            $("#domain").on("input", (event) => {
                let value = $(event.target).val()

                const regex = /[^a-zA-Z&]*$/;

                if (!regex.test(value)) {
                    value = value.replace("/[^a-zA-Z&]/g", '')
                }
                $("#domain").val(value)
            })

        })
    </script>
</body>

</html>
