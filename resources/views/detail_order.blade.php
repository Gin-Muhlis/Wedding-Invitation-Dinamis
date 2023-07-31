<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wedding Invitation</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <script src="https://kit.fontawesome.com/64f5e4ae10.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.midtrans_client_key') }}"></script>

        <link rel="stylesheet" href="{{ asset('user/css/order.css') }}">
    </head>
</head>

<body>
    <div class="container-fluid order-section d-flex align-items-center justify-content-center">
        <div class="container wrapper-order position-relative">
            <div class="row gap-2 shadow shadow-lg">
                <div class="col-md-4 px-0">
                    <img src="{{ asset("assets/themes/{$order->theme->theme_code}/preview.png") }}" class="w-100 h-100"
                        alt="preview image">
                </div>
                <div class="col py-3">
                    <h3 class="text-white mb-4">Konfirmasi Order</h3>
                    <div class="row align-content-between form-order" style="height: 400px;">
                        <div class="col-md-6 form-group mb-3">
                            <label for="">No Order</label>
                            <input type="text" class="form-control" value="{{ $order->no_order }}" disabled>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="">Tanggal Order</label>
                            <input type="text" class="form-control" value="{{ $order->order_date }}" disabled>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="">Domain</label>
                            <input type="text" class="form-control" value="{{ $order->domain }}" disabled>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="">Tema</label>
                            <input type="text" class="form-control" value="{{ $order->theme->theme_name }}" disabled>
                        </div>
                        <div class="col-md-12 form-group mb-3">
                            <label for="">Total Order</label>
                            <input type="text" class="form-control" value="{{ $order->total_order }}" disabled>
                        </div>
                        <div class="col-md-12 form-group mb-3">
                            <label for="">Status</label>
                            <input type="text" class="form-control" value="{{ $order->status }}" disabled>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-danger">Batalkan</button>
                            <button class="btn btn-light" id="pay-button">Bayar</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- ---------> SCRIPTS <--------- --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay(@json($snapToken), {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    alert('pembayaran berhasil')
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
</body>

</html>
