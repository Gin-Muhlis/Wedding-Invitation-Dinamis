    <div class="container my-5 py-3" id="fitur">
        <div class="text-center mb-5">
            <p class="title-fitur mb-3">Fitur Yang Kami Sediakan</p>
            <p class="description-fitur">Beragam fitur yang dapat anda manfaatkan untuk meningkatkan dan mempercantik
                informasi undangan digital
                yang
                Anda.</p>
        </div>
        <div class="row row-cols-lg-5 px-5 gap-3 justify-content-center">
            @foreach ($data_fitur as $fitur)
                <div
                    class="col-md-2 px-2 rounded shadow-lg text-center d-flex align-items-center justify-content-center flex-col gap-2 col-fitur">
                    <div class="icon-field text-white">
                        {!! $fitur->icon !!}
                    </div>
                    <p class="text-white text-fitur">{{ $fitur->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
