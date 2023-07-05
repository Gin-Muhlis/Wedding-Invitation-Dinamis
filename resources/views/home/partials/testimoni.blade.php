<div class="container my-5 py-5 px-5" id="testimoni">
    <div class="text-center mb-5">
        <p class="title-testimoni">Apa Yang Mereka Katakan?</p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="owl-carousel position-relative testimonies-carousel text-center">
                @foreach ($data_testimonies as $data)
                    <div class="box-area">
                        <div class="img-area">
                            <img src="{{ \Storage::url($data->image) }}" alt="image-profile">
                        </div>
                        <p class="name-person">{{ $data->name }}</p>
                        <div class="rating">
                            <?php for ($i = 1; $i <= $data->rating; $i++) : ?>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            <?php endfor; ?>
                        </div>
                        <p class="review">
                            {{ $data->review }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
