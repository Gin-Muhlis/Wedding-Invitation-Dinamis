<div class="container my-5 py-5 px-5" id="harga">
    <div class="text-center mb-5">
        <p class="title-price">Harga</p>
        <p class="description-price">Kami memberikan harga-harga terbaik untuk anda dapat membuat undangan digital
            dengan mudah</p>
    </div>
    <div class="row row-cols-1 row-cols-md-4 mb-3 text-center">
        @foreach ($data_category as $category)
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm {{ $category->category == 'Premium' ? 'price-premium' : '' }}">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">{{ $category->category }}</h4>
                    </div>
                    <div class="card-body position-relative" style="height: 400px">
                        <h3 class="card-title pricing-card-title">Rp.
                            {{ number_format($category->price, 0, ',', '.') }}<small
                                class="text-body-secondary fw-light">/mo</small></h3>
                        <ul class="list-unstyled mt-4">
                            @foreach ($category->fiturCategories as $fitur)
                                <li class="fs-6 mb-1">
                                    <i class="fa-solid fa-check"></i>
                                    {{ $fitur->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
