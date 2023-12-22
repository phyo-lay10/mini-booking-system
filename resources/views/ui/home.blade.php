<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      {{-- <base href="/public"> --}}
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>keto</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('ui-panel/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{asset('ui-panel/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('ui-panel/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('ui-panel/images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('ui-panel/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <style>
         .spanOne{
            color: #FE0000;
         }
         .BTN {
            background-color: #f30b0b;
            color: white;
         }
         .room_img {
            display: flex;
            flex-direction: column;
         }

         .upper-image {
            flex-basis: 100%;
            margin-bottom: 5px;
         }

         .lower-images {
            display: flex;
            /* justify-content: space-between; */
            gap: 5px;
         }       
      </style>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{asset('ui-panel/images/loading.gif')}}" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="{{asset('ui-panel/images/logo.png')}}" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href="index.html">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.html">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="room.html">Our room</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="gallery.html">Gallery</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="blog.html">Blog</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.html">Contact Us</a>
                              </li>
                              {{-- <li class="nav-item">
                                 <form action="{{route('logout')}}" method="POST">@csrf
                                    <button class="ml-3 btn-sm btn btn-danger" onclick="return confirm('Are you sure?')">Logout</button>
                                 </form>
                              </li> --}}
                                 @auth
                                     <li class="nav-item dropdown">
                                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                             <span class="spanOne"><b>{{ Auth::user()->name }}</b></span>
                                         </a>
                                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                             <li><a class="dropdown-item" href="#">Profile</a></li>
                                             <li>
                                                 <form method="POST" action="{{ route('logout') }}">
                                                     @csrf
                                                     <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure?')">Logout</button>
                                                 </form>
                                             </li>
                                         </ul>
                                     </li>
                                 @else
                                     <li class="nav-item">
                                         <a class="btn btn-sm btn-info mx-3" href="{{ route('loginForm') }}">Login</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="btn btn-sm btn-info" href="{{ route('registerForm') }}">Register</a>
                                     </li>
                                 @endauth
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
         <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="first-slide" src="{{asset('ui-panel/images/banner1.jpg')}}" alt="First slide">
                  <div class="container">
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="second-slide" src="{{asset('ui-panel/images/banner2.jpg')}}" alt="Second slide">
               </div>
               <div class="carousel-item">
                  <img class="third-slide" src="{{asset('ui-panel/images/banner3.jpg')}}" alt="Third slide">
               </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
         <div class="booking_ocline">
            <div class="container">
               <div class="row">
                  <div class="col-md-5">
                     <div class="book_room">
                        <h1>Book a Room Online</h1>
                        <form class="book_now">
                           <div class="row">
                              <div class="col-md-12">
                                 <span>Arrival</span>
                                 <img class="date_cua" src="{{asset('ui-panel/images/date.png')}}">
                                 <input class="online_book" placeholder="dd/mm/yyyy" type="date" name="dd/mm/yyyy">
                              </div>
                              <div class="col-md-12">
                                 <span>Departure</span>
                                 <img class="date_cua" src="{{asset('ui-panel/images/date.png')}}">
                                 <input  class="online_book" placeholder="dd/mm/yyyy" type="date" name="dd/mm/yyyy">
                              </div>
                              <div class="col-md-12">
                                 <button class="book_btn">Book Now</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- about -->
      <div class="about">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-5">
                  <div class="titlepage">
                     <h2>About Us</h2>
                     <p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it's seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum. </p>
                     <a class="read_more" href="Javascript:void(0)"> Read More</a>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="about_img">
                     <figure><img src="{{asset('ui-panel/images/about.png')}}" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
      <!-- our_room -->
      <div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>
            <div class="row">
               @foreach ($rooms as $room)
                   <div class="col-md-6 mb-3">
                       <div id="serv_hover" class="room border
                       @if ($room->status == "available")
                        border-success
                       @else 
                        border-danger
                       @endif 
                       ">
                           <div class="room_img">
                               <div class="upper-image">
                                   <figure><img src="{{asset('storage/images/'.$room->image1)}}" class="w-100 IMG" alt="#"/></figure>
                               </div>
                               <div class="lower-images">
                                   <figure><img src="{{asset('storage/images/'.$room->image2)}}" class="IMG" alt="#"/></figure>
                                   <figure><img src="{{asset('storage/images/'.$room->image3)}}" class="IMG" alt="#"/></figure>
                                   <figure><img src="{{asset('storage/images/'.$room->image4)}}" class="IMG" alt="#"/></figure>
                               </div>
                           </div>
                           <div class="bed_room">
                               <h4 style="font-size:20px; font-weight: bold"> Room no ({{$room->no}}) &nbsp;&nbsp; | &nbsp;&nbsp; ${{$room->price}} - 1d</h4>
                               <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A iure commodi, modi voluptas, minima excepturi libero laboriosam.</p>
                           </div>
                           <button 
                              @if (!Auth::check()) 
                                    onclick="redirectToLogin()" 
                              @else 
                                    @if ($room->status == "available")
                                       data-bs-toggle="modal" data-bs-target="#exampleModal{{$room->id}}"
                                    @else 
                                       disabled
                                    @endif
                              @endif
                                    type="button" id="bookBtn{{$room->id}}" class="btn mb-4 BTN">
                              @if ($room->status == "available")
                                    Book
                              @else 
                                    Occupied
                              @endif
                           </button>
                       </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$room->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header border-0 py-0 pt-2">
                                 <h3 class="modal-title fs-5 text-dark" id="exampleModalLabel"><b>Booking</b></h3>
                                 <button type="button" class="btn-close bg-transparent" data-bs-dismiss="modal" aria-label="Close"><b style="font-size: 17px;" class="border p-1 rounded">X</b></button>
                              </div>
                              <div class="modal-body">
                                 <form method="post"> @csrf
                                    <div class="mb-3">
                                       <label for=""><b>Arrival date</b></label>
                                       <input class="form-control" placeholder="Enter arrival date" type="date" name="checkIndate">
                                    </div>
                                    <div class="mb-3">
                                       <label for=""><b>Depature date</b></label>
                                       <input class="form-control" placeholder="Enter depature date" type="date" name="checkOutdate">
                                    </div>
                                    <div class="mb-4">
                                       {{-- <label for=""><b>Duration</b></label>
                                       <input type="number" name="duration"  class="form-control" required placeholder ="Enter duration"> --}}
                                       @if (Auth::check())
                                       <input type="hidden" name="guestId" class="form-control " value="{{Auth::user()->id}}">
                                       @endif
                                       <input type="hidden" name="roomId" class="form-control"  value="{{$room->id}}"> 
                                    </div>
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                    <button formaction="{{route('books.store',$room->id)}}" class="btn btn-primary btn-sm">Submit</button>
                                 </form>
                              </div>
                           </div>
                           </div>
                        </div>
                   </div>
               @endforeach
           </div>           
         </div>
      </div>
      <!-- end our_room -->
      <!-- gallery -->
      <div  class="gallery">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>gallery</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="{{asset('ui-panel/images/gallery1.jpg')}}" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="{{asset('ui-panel/images/gallery2.jpg')}}" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="{{asset('ui-panel/images/gallery3.jpg')}}" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="{{asset('ui-panel/images/gallery4.jpg')}}" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="{{asset('ui-panel/images/gallery5.jpg')}}" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="{{asset('ui-panel/images/gallery6.jpg')}}" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="{{asset('ui-panel/images/gallery7.jpg')}}" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="{{asset('ui-panel/images/gallery8.jpg')}}" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end gallery -->
      <!-- blog -->
      <div  class="blog">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Blog</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="blog_box">
                     <div class="blog_img">
                        <figure><img src="{{asset('ui-panel/images/gallery8.jpg')}}" alt="#"/></figure>
                     </div>
                     <div class="blog_room">
                        <h3>Bed Room</h3>
                        <span>The standard chunk </span>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generatorsIf you are   </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="blog_box">
                     <div class="blog_img">
                        <figure><img src="{{asset('ui-panel/images/gallery8.jpg')}}" alt="#"/></figure>
                     </div>
                     <div class="blog_room">
                        <h3>Bed Room</h3>
                        <span>The standard chunk </span>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generatorsIf you are   </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="blog_box">
                     <div class="blog_img">
                        <figure><img src="{{asset('ui-panel/images/blog3.jpg')}}" alt="#"/></figure>
                     </div>
                     <div class="blog_room">
                        <h3>Bed Room</h3>
                        <span>The standard chunk </span>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generatorsIf you are   </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end blog -->
      <!--  contact -->
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Contact Us</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <form id="request" class="main_form">
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Name" type="type" name="Name"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="type" name="Email"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Phone Number" type="type" name="Phone Number">                          
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Message" type="type" Message="Name">Message</textarea>
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn">Send</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-6">
                  <div class="map_main">
                     <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class=" col-md-4">
                     <h3>Contact US</h3>
                     <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Address</li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> +01 1234569540</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> demo@gmail.com</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>Menu Link</h3>
                     <ul class="link_menu">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="about.html"> about</a></li>
                        <li><a href="room.html">Our Room</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>News letter</h3>
                     <form class="bottom_form">
                        <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                        <button class="sub_btn">subscribe</button>
                     </form>
                     <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        
                        <p>
                        © 2019 All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a>
                        <br><br>
                        Distributed by <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
                        </p>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="{{asset('ui-panel/js/jquery.min.js')}}"></script>
      <script src="{{asset('ui-panel/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('ui-panel/js/jquery-3.0.0.min.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('ui-panel/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('ui-panel/js/custom.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <script>
         function redirectToLogin() {
             window.location.href = "{{ url('login') }}";
         }
     </script>
   </body>
</html>