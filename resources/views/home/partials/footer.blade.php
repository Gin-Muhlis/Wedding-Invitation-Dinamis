 <footer id="kontak">
     <div class="container mt-5 pt-5 pb-4">
         <div class="row justify-content-between mb-5">
             <div class="col-md-6 mb-4 mb-sm-0">
                 <div class="logo-area mb-3 d-flex align-items-center justify-content-start gap-1">
                     <img src="{{ \Storage::url($data_website->website_logo) }}" alt="Logo" width="40"
                         height="40" class="d-inline-block align-text-top">
                     <span class="brand-web fs-4 text-white">{{ $data_website->website_name }}</span>
                 </div>
                 <p class="text-footer m-0">
                     {{ $data_website->description }}
                 </p>
             </div>
             <div class="col-md-3 mb-4 mb-sm-0">
                 <h3 class="text-white mb-3">Hubungi Kami</h3>
                 <div class="menus d-flex flex-column align-items-start justify-content-start gap-2">
                     <p class="m-0 text-white fs-6 d-flex align-items-center jusitfy-content-start gap-1">
                         <i class="fa-solid fa-envelope" style="color: #ffffff;"></i>
                         <span>{{ $data_website->email }}</span>
                     </p>
                     <p class="m-0 text-white fs-6 d-flex align-items-center jusitfy-content-start gap-1">
                         <i class="fa-solid fa-phone" style="color: #ffffff;"></i>
                         <span>{{ $data_website->whatsapp_number }}</span>
                     </p>
                     <p class="m-0 text-white fs-6 d-flex align-items-center jusitfy-content-start gap-1">
                         <i class="fa-solid fa-location-dot" style="color: #ffffff;"></i>
                         <span>{{ $data_website->address }}</span>
                     </p>
                 </div>
             </div>
             <div class="col-md-3">
                 <h3 class="text-white mb-4">Sosial Media</h3>
                 <div class="d-flex align-items-start justify-content-start gap-4">
                     <a href="{{ $data_website->link_instagram }}" target="_blank" class="fs-4">
                         <i class="fa-brands fa-instagram" style="color: #ffffff;"></i>
                     </a>
                     <a href="{{ $data_website->link_fb }}" target="_blank" class="fs-4">
                         <i class="fa-brands fa-facebook" style="color: #ffffff;"></i>
                     </a>
                     <a href="{{ $data_website->link_twitter }}" target="_blank" class="fs-4">
                         <i class="fa-brands fa-twitter" style="color: #ffffff;"></i>
                     </a>
                 </div>
             </div>

         </div>
         <p class="text-center fs-6 text-white m-0">Copyright &copy; {{ date('Y') }} <span class="fw-bold">Wedding
                 Invitation</span></p>
     </div>

 </footer>
