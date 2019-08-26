<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Detail Work</title>
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
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.html" class="js-logo-clone">Details Work</a>
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
            <li><a href="{{route('work')}}">Blogs</a></li>
          </ul>
        </div>
      </nav>
    </header>


    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
          	<img class="img-fluid" src="{{ ($work->thumbnail !== '' && $work->thumbnail !== null) ? Storage::url($work->thumbnail) : Storage::url('work/no-image.png') }}">
                 <div class="row">
		          <div class="col-md-12 p-0">
		            <div class="nonloop-block-3 owl-carousel">
		               	@foreach ($work->images as $image)
						    <div class="item">
				                <div class="block-4 text-center">
				                  <figure class="block-4-image">
				                  	   <a href="{{Storage::url($image->url)}}"  data-fancybox="images" ><img src="{{Storage::url($image->url)}}" class="img-fluid" alt="" title=""/></a>
				                  </figure>
				                </div>
				              </div>
						@endforeach
		            </div>
          		</div>
        		</div>
          </div>
          <div class="col-md-7">
            <h2 class="text-black">{{$work->title}}</h2>
            {!! $work->description !!}
            <p><a href="{{$work->url}}" target="_blank" class="buy-now btn btn-sm orange">Menuju Website</a></p>

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