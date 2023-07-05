<div class="container my-5 py-5 px-5" id="harga">
    <div class="text-center mb-5">
        <p class="title-price">Harga</p>
        <p class="description-price">Kami memberikan harga-harga terbaik untuk anda dapat membuat undangan digital
            dengan mudah</p>
    </div>
    <div class="row gap-5 justify-content-center">
        @foreach ($data_category as $category)
            <div class="col-md-3 p-0 shadow {{ strtolower($category->category) }} categories">
                <div class="top w-100 d-flex flex-column align-items-start justify-content-start gap-3">
                    <div class="px-4 pt-3">
                        <h3 class="d-flex align-items-center justify-content-start gap-1 fs-4 title-category">
                            <i class="fa-solid fa-globe" style="color: #ffffff;"></i>
                            <span class="title-category text-white text-uppercase">{{ $category->category }}</span>
                        </h3>
                    </div>
                    <div class="price bg-white price-{{ strtolower($category->category) }}">
                        <p class="total-price fs-3 m-0">{{ number_format($category->price, 0, ',', '.') }}
                            IDR</p>
                        <span class="month fs-6">/Month</span>
                    </div>
                    <div
                        class="fiturs-category text-white px-4 d-flex flex-column align-items-start justify-content-start gap-1">
                        @foreach ($category->fiturCategories as $fitur)
                            <p class="m-0 d-flex align-items-center justify-content-start gap-1">
                                <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                                <span>{{ $fitur->name }}</span>
                            </p>
                        @endforeach

                    </div>
                    <div class="line"></div>
                </div>
                <div class="bottom w-100 pb-4 d-flex justify-content-center">
                    <a href="#katalog"
                        class="text-decoration-none text-white py-2 px-4 fs-6 border border-light order-button">Order
                        Now</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
