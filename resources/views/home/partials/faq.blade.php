   <div class="container my-5 py-5 px-5" id="faq">
       <div class="mb-2">
           <p class="title-faq">FAQ</p>
       </div>
       <div class="row faqs">
           @foreach ($data_faqs as $data)
               <div class="col-md-12 box-faq py-3">
                   <div class="header-faq mb-3 d-flex align-items-center justify-content-between">
                       <p class="question m-0 fs-5 fw-bold">
                           {{ $data->question }} </p>
                       <i class="fa-solid fa-angle-down faq-toggler" style="color: #17191c;"></i>
                   </div>
                   <div class="body-faq">
                       <p class="answer fs-6">
                           {{ $data->answer }}
                       </p>
                   </div>
                   <div class="line-faq"></div>
               </div>
           @endforeach

       </div>
   </div>
