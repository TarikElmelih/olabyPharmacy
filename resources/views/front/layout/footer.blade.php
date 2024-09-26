<footer class="three" style="background-image:url(assets/img/Untitled\ design\ \(3\).png);">
  <div class="container">
      <div class="row">
          <div class="col-lg-3 col-md-6">
              <div class="widget-title">
                  <img src="{{ asset('assets/img/logo-test1.png') }}" alt="logo">
                @php
                    $contents = \App\Models\Content::first();
                @endphp
                <ul class="social-media">
                    <li><a href="{{ $contents->facebook_link }}"><i class="fab fa-facebook-f icon"></i></a></li>
                    <li><a href="{{ $contents->instagram_link }}"><i class="fab fa-instagram icon"></i></a></li>
                    <li><a href="{{ $contents->whatsapp_link }}"><i class="fab fa-whatsapp icon"></i></a></li>
                    {{-- <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li> --}}
                </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="widget-title">
                  <h3>الروابط</h3>
                  <ul class="links">
                      <li><i class="fa-solid fa-caret-right"></i><a href="{{ $contents->whatsapp_link }}">تواصل معنا</a></li>
                      <li><i class="fa-solid fa-caret-right"></i><a href="{{ url('/admin/dashboard') }}">الدخول لحسابي</a></li>
                      <li><i class="fa-solid fa-caret-right"></i><a href="{{route('product')}}">المتجر</a>
                      </li>
                      <li><i class="fa-solid fa-caret-right"></i><a href="{{route('about')}}">من نحن</a></li>
                  </ul>
              </div>
          </div>
          <div class="col-lg-6 ">

              <div class="row">
                  <div class="col-lg-6 col-md-6">
                      <div class="footer-number">
                          <i>
                              <svg version="1.1" xml:space="preserve" width="682.66669" height="682.66669"
                                  viewBox="0 0 682.66669 682.66669" xmlns="http://www.w3.org/2000/svg">
                                  <defs>
                                      <clipPath clipPathUnits="userSpaceOnUse">
                                          <path d="M 0,512 H 512 V 0 H 0 Z"></path>
                                      </clipPath>
                                  </defs>
                                  <g transform="matrix(1.3333333,0,0,-1.3333333,0,682.66667)">
                                      <g>
                                          <g clip-path="url(#clipPath3824)">
                                              <g transform="translate(409.9102,69.6396)">
                                                  <path
                                                      d="m 0,0 c 0,-32.939 -26.7,-59.64 -59.641,-59.64 h -64.599 c -22.59,0 -43.24,12.76 -53.34,32.97 L -190.92,0 -220.74,-59.64 -250.561,0 -280.38,-59.64 -310.2,0 -340.021,-59.64 -369.84,0 -399.66,-59.64"
                                                      style="fill:none;stroke:#ffffff;stroke-width:20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1">
                                                  </path>
                                              </g>
                                              <g transform="translate(266.25,246)">
                                                  <path
                                                      d="m 0,0 c 0,-5.522 -4.478,-10 -10,-10 -5.522,0 -10,4.478 -10,10 0,5.522 4.478,10 10,10 C -4.478,10 0,5.522 0,0"
                                                      style="fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none">
                                                  </path>
                                              </g>
                                              <g transform="translate(224.9414,278.2939)">
                                                  <path
                                                      d="m 0,0 c -12.175,14.184 -23.106,28.649 -32.062,42.666 -7.379,11.54 -5.149,26.83 4.541,36.521 l 33.66,33.659 c 7.24,7.24 7.24,18.98 0,26.22 l -79.21,79.21 c -7.241,7.24 -18.981,7.24 -26.231,0 l -20.04,-20.05 c -32.529,-32.53 -41.33,-82.16 -20.909,-123.39 36.34,-73.35 123.1,-197.78 267.149,-268.41 41.34,-20.27 91.92,-11.67 124.481,20.88 l 20.5,20.5 c 7.239,7.25 7.239,18.99 0,26.23 l -79.91,79.2 c -7.25,7.25 -18.99,7.25 -26.231,0 l -33.66,-33.65 c -9.68,-9.69 -24.97,-11.92 -36.519,-4.54 -10.185,6.506 -20.61,14.058 -30.994,22.375"
                                                      style="fill:none;stroke:#ffffff;stroke-width:20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1">
                                                  </path>
                                              </g>
                                          </g>
                                      </g>
                                  </g>
                              </svg>
                          </i>
                          <div>
                              <h4>رقم الهاتف</h4>
                              <a href="callto:+{{ $contents->phone }}">{{ $contents->phone }}</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <div class="footer-number">
                          <div><i>
                              <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                  xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                  style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                  <path
                                      d="M485.743,85.333H26.257C11.815,85.333,0,97.148,0,111.589V400.41c0,14.44,11.815,26.257,26.257,26.257h459.487
                          c14.44,0,26.257-11.815,26.257-26.257V111.589C512,97.148,500.185,85.333,485.743,85.333z M475.89,105.024L271.104,258.626
                          c-3.682,2.802-9.334,4.555-15.105,4.529c-5.77,0.026-11.421-1.727-15.104-4.529L36.109,105.024H475.89z M366.5,268.761
                          l111.59,137.847c0.112,0.138,0.249,0.243,0.368,0.368H33.542c0.118-0.131,0.256-0.23,0.368-0.368L145.5,268.761
                          c3.419-4.227,2.771-10.424-1.464-13.851c-4.227-3.419-10.424-2.771-13.844,1.457l-110.5,136.501V117.332l209.394,157.046
                          c7.871,5.862,17.447,8.442,26.912,8.468c9.452-0.02,19.036-2.6,26.912-8.468l209.394-157.046v275.534L381.807,256.367
                          c-3.42-4.227-9.623-4.877-13.844-1.457C363.729,258.329,363.079,264.534,366.5,268.761z" />
                              </svg>

                          </i></div>
                          <div>
                              <h4>البريد الالكتروني</h4>
                              <a href="mailto:{{ $contents->email }}">{{ $contents->email }}</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="footer-bottom">
      <div class="container">
          <div class="footer-bottom-text">
              <p>Copyright © 2024 جميع الحقوق محفوظة , برمجة طارق المليح</p>
              
          </div>
      </div>
  </div>
 
</footer>
<!-- search-popup -->
<div class="search-popup">
  <button class="close-search"><i class="fa-solid fa-xmark"></i></button>
  <form method="post" action="#">
      <div class="form-group">
          <input type="search" name="search-field" value="" placeholder="Search Here" required="">
          <button type="submit"><i class="fa fa-search"></i></button>
      </div>
  </form>
</div>
<!-- search-popup end -->
<!-- progress -->
<div id="progress">
  <span id="progress-value"><i class="fa-solid fa-up-long"></i></span>
</div>
