<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Detail Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <header class="site-navbar" role="banner"  style="{{ ($blog->thumbnail !== '' && $blog->thumbnail !== null) ? 'background-image:url(' . Storage::url($blog->thumbnail) . ')' : '' }}"   data-overlay="7">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.html" class="js-logo-clone">Details Blog</a>
              </div>
            </div>

      <!--       <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>	 -->

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('home')}}">Works</a></li>
            <li><a href="{{route('home')}}">Blogs</a></li>
          </ul>
        </div>
      </nav>
    </header>


    <div class="site-section">
        <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2 col-sm-12" style="margin-bottom: 50px; margin-top: -20px;">
            <div class="post-meta mb-2">
            </div>
            <h3 class="text-orange text-center">{{ $blog->title }}</h3>
            <div class="post-author-sm mb-7 mx-auto text-center">
               <img src="/img/2.jpg"       class="post-author-img">
              <p class="post-author-title"> By Aria Samudera Elhamidy  |  
                 @if ($blog->created_at !== null)
                    {{ $blog->created_at->format('F d,  Y') }}
                @endif
            
              </p>
            </div>
          </div>
          <div class="col-md-8 offset-md-2 col-sm-12">
            <div class="section-row px-4">
              <div class="main-post">
                {!! $blog->detail !!}
              </div>
            </div>
           <hr>
            <div class="col-md-10 mb-3">
              <p class="mt-6 mb-3" style="font-size: 16px;font-weight: bold;">Tentang Saya</p>
                <div class="post-author d-flex align-items-start pl-2 pr-2">
                  <div class="post-author-thumb">
                      <img src="/img/2.jpg" >
                  </div>
                  <div class="post-author-desc pl-4">
                    <a href="#" class="author-name text-capitalize"> Aria Samudera Elhamidy </a>
                     <p >Web Programmer & UI/UX Enthusiast, </p>
                </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-lg-12  bg-white mt-10">
            <div class="aside-widget">
                <p class="mt-6 mb-3" style="font-size: 16px;font-weight: bold;">Blog Lain</p>
                <div class="row" id="blog">
                 @foreach($blogs as $blog)
                <div class="col-md-4 col-10 offset-1 d-flex align-items-stretch mb-3">
                  <div class="card">
                    <img  src="{{ ($blog->thumbnail !== '' && $blog->thumbnail !== null) ? Storage::url($blog->thumbnail) : Storage::url('work/no-image.png') }}" class="card-img-top">
                    <div class="card-body">
                      <div class="feature-blog">
                        <div class="feature-blog-meta">
                          <a class="feature-blog-category">{{ $blog->kategori->name }}</a>
                        </div>
                        <p class="feature-blog-title">
                        <a href="{{ url('blog', [$blog->created_at->month, $blog->created_at->year, $blog->slug]) }}">  {{ $blog->title }}</a>
                        </p>
                          <p class="feature-blog-date">{{ $blog->created_at->format('F d ,Y') }}</p>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="border-top">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="/js/jquery-ui.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/owl.carousel.min.js"></script>
  <script src="/js/jquery.magnific-popup.min.js"></script>
  <script src="/js/aos.js"></script>
  <script src="/js/jquery.fancybox.min.js"></script>
  <script src="/js/main-detail.js"></script>
    
  </body>
</html>