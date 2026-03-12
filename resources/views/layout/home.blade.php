<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Yarn shop</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="/"><img width="140" src="{{ asset('images/logo.png') }}" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/product">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ route('single_product', 1) }}">Single Page</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/contact">Contact</a>
                        </li>
                        <li class="nav-item dropdown"> 
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">All Category <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              @forelse($categories as $object)                                 
                                    <li>
                                          <div class="categories-bars-item">
                                             <a href="{{ route('category_product', ['category' => $object->id]) }}">{{ $object->name }}</a>
                                             <span>(3)</span>
                                          </div>
                                    </li>                              
                              @empty
                                 <li><h1>Không có dữ liệu danh mục hoạt động.</h1></li>
                              @endforelse
                           </ul>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                           @if(session('customer'))
                              <span class="mr-1">
                                 {{ session('customer.name') }}
                              </span>
                              <span class="mx-1">|</span>
                              <a href="{{ route('user.logout') }}" class="nav-link p-0 text-primary">
                                 Đăng xuất
                              </a>
                           @else
                              <a href="{{ route('user.login.form') }}" class="nav-link p-0 mr-2">
                                 Đăng nhập
                              </a>
                              <span class="mx-1">|</span>
                              <a href="{{ route('user.register.form') }}" class="nav-link p-0">
                                 Đăng ký
                              </a>
                           @endif
                        </li>
                                                                        
                        <li class="nav-item d-flex align-items-center mr-3">
                           <a class="nav-link p-0" href="{{ route('cart.index') }}">
                              <i class="fa fa-shopping-cart"></i>
                           </a>
                        </li>

                        <li class="nav-item d-flex align-items-center">
                           <button class="btn nav_search-btn p-0">
                              <i class="fa fa-search"></i>
                           </button>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->
         @yield('body')
      </div>
      <!-- footer start -->
      <footer>
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                   <div class="full">
                      <div class="logo_footer">
                        <a href="#"><img width="210" src="{{ asset('images/logo.png') }}" alt="#" /></a>
                      </div>
                      <div class="information_f">
                        <p><strong>ADDRESS:</strong> 180 Cao Lỗ , Phường 4 , Quận 8 , TPHCM</p>
                        <p><strong>TELEPHONE:</strong> +84 866 496 437</p>
                        <p><strong>EMAIL:</strong> minhngoc1907204@gmail.com</p>
                      </div>
                   </div>
               </div>
               <div class="col-md-8">
                  <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                           <li><a href="{{ route('home') }}">Home</a></li>
                           <li><a href="{{ route('about') }}">About</a></li>
                           <li><a href="{{ route('product',1) }}">Products</a></li>
                           <li><a href="{{ route('single_product',1) }}">Single Product</a></li>
                           <li><a href="{{ route('contact') }}">Contact</a></li>
                           <li><a href="{{ route('product') }}">All Category</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Account</h3>
                        <ul>
                           <li><a href="#">Account</a></li>
                           <li><a href="#">Checkout</a></li>
                           <li><a href="#">Login</a></li>
                           <li><a href="#">Register</a></li>
                           <li><a href="#">Shopping</a></li>
                           <li><a href="#">Widget</a></li>
                        </ul>
                     </div>
                  </div>
                     </div>
                  </div>     
                  <div class="col-md-5">
                     <div class="widget_menu">
                        <h3>Newsletter</h3>
                        <div class="information_f">
                          <p>Subscribe by our newsletter and get update protidin.</p>
                        </div>
                        <div class="form_sub">
                           <form>
                              <fieldset>
                                 <div class="field">
                                    <input type="email" placeholder="Enter Your Mail" name="email" />
                                    <input type="submit" value="Subscribe" />
                                 </div>
                              </fieldset>
                           </form>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
      <!-- popper js -->
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('js/bootstrap.js') }}"></script>
      <!-- custom js -->
      <script src="{{ asset('js/custom.js') }}"></script>
      <script>
         let currentIndex = 0;
         const itemsPerView = 3;

         function slideRight() {
            const items = document.querySelectorAll('.featured-item');
            const maxIndex = items.length - itemsPerView;

            if (currentIndex >= maxIndex) {
               currentIndex = 0; // quay về đầu
            } else {
               currentIndex++;
            }
            updateSlide();
         }

         function slideLeft() {
            const items = document.querySelectorAll('.featured-item');
            const maxIndex = items.length - itemsPerView;

            if (currentIndex <= 0) {
               currentIndex = maxIndex; // nhảy về cuối
            } else {
               currentIndex--;
            }
            updateSlide();
         }

         function updateSlide() {
            const itemWidth = document.querySelector('.featured-item').offsetWidth;
            document.getElementById('featuredTrack').style.transform =
               `translateX(-${currentIndex * itemWidth}px)`;
         }
         </script>

   </body>
</html>