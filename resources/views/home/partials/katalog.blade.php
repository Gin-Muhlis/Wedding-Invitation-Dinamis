  <div class="container my-5 py-5 px-5" id="katalog">
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
                              @foreach ($data_katalog['theme_with_foto'] as $theme)
                                  <div class="col-md-4 mb-4">
                                      <div class="card">
                                          <div class="card-header">
                                              <img src="{{ asset('assets/themes/' . $theme->theme_code . '/preview.png') }}"
                                                  alt="preview image">
                                          </div>
                                          <div
                                              class="card-body py-4 d-flex align-items-center justify-content-center gap-2 w-100">
                                              <a href="demo/{{ $theme->theme_code }}/?to=Nama Tamu"
                                                  class="btn text-light text-decoration-none text-white btn-theme">
                                                  <i class="fa-solid fa-eye"></i>
                                                  <span>Preview</span>
                                              </a>
                                              <a href="{{ route('order', \Hash::make($theme->theme_code)) }}"
                                                  class="btn text-light text-decoration-none text-white btn-theme">
                                                  <i class="fa-solid fa-cart-shopping"></i>
                                                  <span>Order</span>
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              @endforeach

                          </div>
                      </div>
                      <div class="carousel-item">
                          <div class="row">
                              @foreach ($data_katalog['theme_without_foto'] as $theme)
                                  <div class="col-md-4 mb-4">
                                      <div class="card">
                                          <div class="card-header">
                                              <img src="{{ asset('assets/themes/' . $theme->theme_code . '/preview.png') }}"
                                                  alt="">
                                          </div>
                                          <div
                                              class="card-body py-4 d-flex align-items-center justify-content-center gap-2 w-100">
                                              <a href="demo/{{ $theme->theme_code }}/?to=Nama Tamu"
                                                  class="btn text-light text-decoration-none text-white btn-theme">
                                                  <i class="fa-solid fa-eye"></i>
                                                  <span>Preview</span>
                                              </a>
                                              <a href="{{ route('order', \Hash::make($theme->theme_code)) }}"
                                                  class="btn text-light text-decoration-none text-white btn-theme">
                                                  <i class="fa-solid fa-cart-shopping"></i>
                                                  <span>Order</span>
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              @endforeach
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
