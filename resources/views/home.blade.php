<!DOCTYPE html>
<html>
<head>
    <title>Elhamidy</title>
    <link href="css/materialize.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/res-main.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
<body>
        <div id="cbp-fbscroller" class="cbp-fbscroller">
            <nav>
                <a href="#fbsection1" class="cbp-fbcurrent"></a>
                <a href="#fbsection2"></a>
                <a href="#fbsection3"></a>
                <a href="#fbsection4"></a>
                <a href="#fbsection5"></a>
                <a href="#fbsection6"></a>
            </nav>
        </div>

    <div id="wrapper" class="wrapper">
        <section id="fbsection1"></section>
            <div class="row" style="height : 100%;margin-bottom: 0;" id="">
            <div class="bg-black"></div>
            <div class="parallax-background col s12 m12 l12  valign-wrapper" >
                <div class="middle-text col s12 m6 l6 offset-m3  offset-l3 valign center-align " style="padding : 15px 10px 25px 10px;">
                    <h2 >HELLO</h2>
                    <p>I'AM ASE</p>
                    <p>Web Developer, Junior UI/UX Designer dan Android Developer </p>
                </div>
                <div class="single-menu valign center-align col s12 m12 l6 offset-l3" id="double-links">
                        <a class="waves-effect waves-light  N/A transparent button-middle"  style="display:none;" href="#fbsection1">Tentang Saya</a>
                        <a class="waves-effect waves-light  N/A transparent button-middle"  href="#fbsection2">Tentang Saya</a>
                        <a class="waves-effect waves-light  N/A transparent button-middle"  href="#fbsection3">Kemampuan</a>
                        <a class="waves-effect waves-light  N/A transparent button-middle"  href="#fbsection4">Portofolio</a>
                        <a class="waves-effect waves-light  N/A transparent button-middle"  href="#fbsection5">Blog</a>
                        <a class="waves-effect waves-light  N/A transparent button-middle"  href="#fbsection6">Contact</a>
                </div>
            </div>
            </div>

        <section id="fbsection2"></section>
            <div class="row" id="">
                <div class="main-con col s12 m12 l6 (one half) post" >
                    <h4> Tentang Saya </h4>
                    <h3> Aria Samudera Elhamidy</h3>
                    <h5> Web Developer dan  UI/UX Designer</h5>
                    <p>Hello, perkenalkan nama saya Aria Samudera Elhamidy, saya bertempat tinggal di depok dan menjalani pendidikan di Universitas Gunadarma jurusan Sistem Informasi.</p>
                    <p>Keahlian saya terdapat dalam bidang web programming, Design User Interface dan sedikit mengenai android programming   </p>
                    <span >
                        <a href="https://www.facebook.com/aria.elhamidy" _blank><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        <a href="https://github.com/bbliong"><i class="fa fa-github-alt" aria-hidden="true"></i></a>
                    <a href="https://plus.google.com/u/0/110443096905319258182">    <i class="fa fa-google-plus-official" aria-hidden="true"></i></a>
                    <a href="https://www.behance.net/ariaelhami1f78">   <i class="fa fa-behance" aria-hidden="true"></i></a>
                    <a href=""> <i class="fa fa-telegram" aria-hidden="true"></i></a>
                    </span>
                </div>
                <div class="col s12 m12 l6 (one half) img" >
                    <img src="img/back.png" class="back-user  ">
                </div>
            </div>

        <section id="fbsection3"></section>
            <div class="asymmetric " id="">
            <div class="row ">
                <div class="col s12 m12 l12 transparent center-align ">
                    <div class="col s12 m12 l12 skill  transparent post">
                        <h4 class="center-align title-skill"> SKILLS </h4>
                        <span class="line"></span>
                    </div>
                    <div class="col s12 m12 l4 skill  transparent post">
                         <canvas id="Web" height="150" width="150"></canvas>
                         <h5> Web Programming </h5>
                         <p>Biasa menggunakan Php native dan Laravel Framework</p>
                    </div>
                        <div class="col s12 m12 l4 skill  transparent post">
                         <canvas id="Linux" height="150" width="150"></canvas>
                          <h5> UI/UX </h5>
                             <p>Membuat design user interface mobile dan website</p>
                    </div>
                    <div class="col s12 m12 l4 skill  transparent post">
                         <canvas id="Networking" height="150" width="150"></canvas>
                         <h5> Android Programming </h5>
                         <p>Membuat aplikasi android dengan java menggunakan android studio</p>
                    </div>

                </div>
            </div>
            </div>

        <section id="fbsection4"></section>
            <div class="row works"  id="" style="position: relative;">
                    <div class="col s12 m12 l12">
                        <div class="col s12 m12 l12 center-align">
                            <h4 class=" title">My Works</h4>
                            <span class="line"></span>
                        </div>
                        <div class="col s12 m12 l12 center-align">
                            <div class="menu">
                                <ul>
                                    <li><a href="#" data-rel="all" class="actived fill">All</a></li>
                                    @foreach ($kategoris as $kategori)
                                        <li><a href="#" data-rel="{{$kategori->id}}" class="fill">{{$kategori->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="container">
                                <div class="portofolio">
                                    @foreach ($works as $work)
                                       <div class="child-porto tile scale all {{$work->kategori->id}} ">
                                        <a href="{{ route('show-work', $work->slug) }}">
                                            <img src="{{ ($work->thumbnail !== '' && $work->thumbnail !== null) ? Storage::url($work->thumbnail) : Storage::url('public/work/no-image.png') }}"></a>
                                        <p> {{$work->name}} </p>
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        <section id="fbsection5"></section>
            <div class="row  main-blog center-align"  id="">
                <div class="col s12 m12 l12   transparent center-align post" style="margin-bottom: 100px;">
                    <h4 class=" title"> FROM THE BLOG</h4>
                    <span class="line"></span>
                </div>
                <div class="col s12 m12 l12 content-blog">
                    <div class="container">
                          @foreach ($blogs as $blog)
                            <div class="col s12 m6 l6">
                            <div class="card hover-reveal post">
                                <div class="card-image waves-effect waves-light">
                                    <img src="{{ ($blog->thumbnail !== '' && $blog->thumbnail !== null) ? Storage::url($blog->thumbnail) : Storage::url('public/blog/no-image.png') }}" class="activator responsive-img" alt="" />
                                </div>
                                <div class="card-reveal">
                                    <div class="hu">
                                     <a href="{{ route('show-blog', $blog->slug) }}" class="clicked"></a>
                                    <div class="card-title"><h5> {{$blog->title}}</h5> </div>

                                  <p>{{ strip_tags($blog->detail)}}</p>
                                    </div>
                                </div>
                                 <div class="card-content">

                                  <p>{{$blog->kategori->name}}</p>
                                  <h6> {{$blog->title}}</h6>
                                  <p>{{strip_tags($blog->detail)}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach                      
                    </div>
                </div>
            </div>
        </div>
        
        <section id="fbsection6"></section>
        <div class="contact">
            <div class="bg-black"></div>
                <h2>Want to work together?</h2>
                <h5>I'm currently accepting new projects and would love to hear about yours. Please take a few minutes to tell me about it.</h5>
                <button class="waves-effect waves-light" href="#">Contact Me </button>
                <section>
                    <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-github-alt" aria-hidden="true"></i></a>
                </section>
                <div class="footer" style="">
                    <p>Made With
                    <i class="material-icons" style="color: #F6B041;font-size: 16px">whatshot</i>
                    by Elhamidy </p>
                </div>
        </div>

    </div>


<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
<script type="text/javascript" src="js/jquery.viewportchecker.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/chart.js"></script>
<script type="text/javascript" src="js/skill.js"></script>
<script type="text/javascript" src="js/jquery.debouncedresize.js"></script>
<script type="text/javascript" src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/waypoints.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/cbpFixedScrollLayout.js"></script>
<!-- <script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/owl.lazyload.js"></script> -->
<script type="text/javascript" src="js/main.js"></script>

</body>
</html>
