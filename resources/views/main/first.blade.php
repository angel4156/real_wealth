<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>REAL WEALTH</title>

    {{-- <!-- favicon -->		--}}
		<link rel="shortcut icon" type="image/png" href="assets/images/mark.png">
    
    {{--  <!-- Bootstrap core CSS -->  --}}
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    {{--  <!-- Additional CSS Files -->  --}}
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    

  </head>

<body>

   
  {{--  <!--header-->  --}}
  <header class="main-header clearfix" role="header">
    <div class="logo"> 
      <a href="/"><img src="assets/images/logo.png" class="m-2" alt="logo" width="110px" height="70px"></a>
   </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a href="/">Home</a></li>
        <li><a href="#section2">Did know</a></li>
        @if (auth()->check()) 
        <li><a href="#section3">Stock Analysis</a></li>
        @endif     
        <li><a href="#section4">About</a></li>
        <li><a href="#section5">Position</a></li>   
        @if (auth()->check())     
          <li>
            <a href="/" class="log-out">Logout
            <form action="/logout" method="POST" id="logging-out">
                @csrf
            </form>
            </a>
          </li>
        @else
          <li><a  href="/login" id="logging-in">Login</a></li>
        @endif
      </ul>
    </nav>
  </header>

  {{--  <!-- ***** Main Banner Area Start ***** -->  --}}
  <section class="section main-banner" id="top" data-section="section1">
    {{--  <img src="assets/images/first.png" alt="">  --}}
    <div class="header-text">
        <div class="caption">
              <h2>Empowering You to Make<br>
                  Informed Investment Decisions
              </h2>
              <h3 style="color: white">
                Contact Us: <li><a href="#"><i class="fa fa-envelope"></i> a.4411879@gmail.com</a></li>
              </h3>
        </div>
    </div>
  </section>
  {{--  <!-- ***** Main Banner Area End ***** -->  --}}

  {{--  <!-- ***** Main Introduction Area Start *****-->  --}}
  <section class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-12">
          <div class="features-post">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa fa-pencil"></i>Step onto...</h4>
              </div>
              <div class="content-hide">
                <p>Step onto the path of true wealth with us. Our mission is to empower and inspire you to attain genuine wealth and financial freedom. Gain a comprehensive understanding of key financial and economic concepts that shape your life. While the definition of wealth varies from person to person, we view it as a consistent source of income that generates cash flow, ultimately paving the way to financial freedom, appreciating over time.</p>
                <p class="hidden-sm">Step onto the path of true wealth with us. Our mission is to empower and inspire you to attain genuine wealth and financial freedom.</p>               
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <div class="features-post second-features">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa fa-pencil"></i>Explore various...</h4>
              </div>
              <div class="content-hide">
                <p>Explore various methods and applications to diversify your portfolio, equipping you to navigate the market's highs and lows while preserving and growing your wealth. Uncover global opportunities that yield higher returns on investment than local, limited markets. Your journey to real wealth starts here, where knowledge and strategic insights guide you toward lasting financial success.
                </p>
                <p class="hidden-sm">Explore various methods and applications to diversify your portfolio, equipping you to navigate the market's highs and lows while preserving and growing your wealth.</p>
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 {{--  <!-- ***** Main Introduction Area End *****-->  --}}

 {{--  <!-- ***** Main Protfolio Area Start *****-->  --}}
  <section class="section why-us" data-section="section2" id='section2'>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>
              <span><img class = 'myIcon' src='assets/images/icons/information.png'></span>
              Information
            </h2>
          </div>
        </div>
        <div class="col-md-12">
          <div id='tabs'>
              <div class=" row col-md-12">
              <div class="slideshow-container col-md-6">
                <div class="mySlides fade didimg">
                  <img src="assets/images/didimage/work-1.jpg" width="100%">
                </div>
                <div class="mySlides fade didimg">
                  <img src="assets/images/didimage/work-2.jpg" width="100%">
                </div>
                <div class="mySlides fade">
                  <img src="assets/images/didimage/work-3.jpg" width="100%">
                </div>
                <div class="mySlides fade">
                  <img src="assets/images/didimage/work-4.jpg" width="100%">
                </div>
                <div class="mySlides fade">
                  <img src="assets/images/didimage/work-5.jpg" width="100%">
                </div>
                <div class="mySlides fade">
                  <img src="assets/images/didimage/work-6.jpg" width="100%">
                </div>
              </div>
              <section class='col-md-6'>
                @foreach ($main as $item)
                  <article class="myArticle">
                    <div class="row">
                      <div class="w-100">
                        <h4 class="mt-0 pt-0">Did you know...</h4>
                        <p>{{$item['content']}}</p>
                      </div>
                    </div>
                  </article>
                @endforeach
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 {{--  <!-- ***** Main Protfolio Area End *****-->  --}}

 {{--  <!-- ***** Main Promotion Area Start *****-->  --}}
  <section class="section video pt-0" data-section="section6">
    <div class="container">
      <div class="section-heading">
        <h2>
          <span><img class = 'myIcon' src='assets/images/icons/promotion.png'></span>
          Promotion
        </h2>
      </div>
      <div class="row" >
        <div class="col-md-6 align-self-center">
          <div class="left-content">
            <div class="item h-100">
              <div class="down-content">
                @if ($promotion != null)
                  <p class='my-promotion-article'>{{$promotion['content']}}</p>
                @else
                  <p class='my-promotion-article'></p>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 align-self-center">
          <article class="video-item" style="height: 380px">
            {{--  <div class="video-caption">
              <h4>YouTube</h4>
            </div>  --}}
            <video 
              class="aspect-video w-100 h-100"
              controls 
              title="video player"
              frameborder="0"
              @if ($promotion != null)
                src="postmovies/{{$promotion['movie']}}"
              @else
                src=""
              @endif              
              
              allowfullscreen>
            </video>
          </article>
        </div>
      </div>
    </div>
  </section>
  {{--  <!-- ***** Main Promotion Area End *****-->  --}}

  {{--  <!-- ***** Main About Area Start *****-->  --}}
  <section class="section courses" data-section="section4" id = 'section4'>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>
              <span><img class = 'myIcon' src='assets/images/icons/about.png'></span>
              About Us
            </h2>
          </div> 
        </div>
        <div class="owl-carousel owl-theme">
          @foreach ($about as $item)
          <div class="item h-100">
            <img src="postimages/{{$item['image']}}" alt="Course #1">
            <div class="down-content">
              <h4>{{$item['title']}}</h4>
              <p>{{$item['content']}}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  {{--  <!-- ***** Main About Area End *****-->  --}}

  {{--  <!-- ***** Main Stock Area Start *****-->  --}}
  @if (auth()->check()) 
  <section class="section coming-soon stock" data-section="section3" id='section3'>
    <div class="col-md-12">
      <div class="section-heading">
        
        <h2>
          <span><img class = 'myIcon' src='assets/images/icons/stock.png'></span>
          Stock Analysis
        </h2>
      </div>
    </div>
    <div class="container">    
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="deposite-content">
            <div class="deposite-table">
              <table>
                <tr>
                    <th class="top-left-border">Content</th>
                    <th width="20%">Input</th>
                    <th class="top-right-border">Result</th>                    
                </tr>
                @foreach ($stock as $item)
                <tr  class="table-rounded">           
                  <td>{{$item['question']}}</td>
                  <td><input name="name" type="number" class="myInputForm form-control" id="name" required></td>
                  <td class="myResultStatus"></td>              
                </tr>
                @endforeach
                  
              </table>
            </div>
          </div>
        </div>      
      </div>
      <button id="checkResult" class="check-button" style="btn btn-primary">Check now</button>
    </div>
  </section>
  @endif
  {{--  <!-- ***** Main Stock Area End *****-->  --}}

  {{--  <!-- ***** Main Summary Area Start *****-->  --}}
  <section class="section coming-soon summary pt-0" data-section="section7">
    <div class="container">
      <div class="section-heading">
        <h2>
          <span><img class = 'myIcon' src='assets/images/icons/summary.png'></span>
          Summary
        </h2>
      </div>
      <div class="row">
        <div class="col-md-7 col-xs-12">
          <div class="continer centerIt">
            <div>
              <h4><em>Remain Time</em></h4>
              <div class="counter">


                <div class="days">
                  <div class="value">00</div>
                  <span>Days</span>
                </div>

                <div class="hours">
                  <div class="value">00</div>
                  <span>Hours</span>
                </div>

                <div class="minutes">
                  <div class="value">00</div>
                  <span>Minutes</span>
                </div>

                <div class="seconds">
                  <div class="value">00</div>
                  <span>Seconds</span>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="right-content">
            <div class="top-content">
              <h6><em>Summary</em></h6>
            </div>
            <form id="contact" action="" method="get">
              <p class="summary">Embarking on the road to true wealth is an ongoing exploration of emerging opportunities and seizing them.<br> Having taken the initial step to explore the existing viable options for achieving genuine wealth, rest assured that this site will consistently provide updates on fresh promotions and opportunities found in the market.<br> Stay engaged, keep exploring, and keep us in your thoughts as we guide you on your journey to financial prosperity.
              </p>
             
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{--  <!-- ***** Main Summary Area End *****-->  --}} 

  {{--  <!-- ***** Main Contact Area Start *****-->  --}}
  <section class="section contact" data-section="section5" id='section5'>
    <div class="container">
      <div class="section-heading">
        <h2>
          <span><img class = 'myIcon' src='assets/images/icons/contact.png'></span>
           Position
        </h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div id="map">
            <iframe src="https://www.google.com/maps/d/embed?mid=1oj1ZZJ2L8VNT_-VELm4axOd7zGg&hl=en_US&ehbc=2E312F" width="100%" height="422px" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{--  <!-- ***** Main Contact Area End *****-->  --}}


  <footer>
    <div class="container">
      <div class="row copyright" >
          <p><i class="fa fa-copyright"></i> Copyright 2023 by Real Wealth                  
          </p>
        {{--  <div class="col-md-4 bottom-address">
              <ul>
                <li><a href="#"><i class="fa fa-envelope"></i> info@aievari4.com</a></li>
                {{--  <li><a href="#"><i class="fa fa-phone"></i> +909-654-9805</a></li>  
              </ul>
        </div>  --}}
        {{--  <div class="col-md-4 bottom-social">
              <ul>
                  <li><a href="#"><i class="fa fa-skype"></i></a></li>
                  <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              </ul> 
        </div>  --}}
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      (function(){window.scrollTo(0,0)})();
      $(".log-out").on('click', function(e) {
          e.preventDefault();
          Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#7367f0',
              cancelButtonColor: '#82868b',
              confirmButtonText: 'Yes, Log Out !'
          }).then((result) => {
              if (result.isConfirmed) {
                  $('#logging-out').submit()
              }
          })
      });
    </script>
    <script>
      $(document).ready(function() {
        $('#checkResult').on('click', function() {
        
            // Get the data from the input field
            let postData = [];
            let inputs = $('.myInputForm');
            let sw = true;
            for(let i = 0; i <  inputs.length; i++){
              console.log(inputs[i].value);
              if(!inputs[i].value){
                inputs[i].classList.add("is-invalid");
                sw = false;
              }else{
                inputs[i].classList.remove("is-invalid");
              }
              postData.push(inputs[i].value)
            }       
            if(!sw) return;  
            // Make an AJAX POST request with jQuery
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              method: 'POST',
              url: '/stock_test',
              data: { data: postData },
              success: function(response) {
                  // Handle the response
                  console.log(response.message);
                  console.log(response.data);

                  let statusLamp = document.getElementsByClassName('myResultStatus');
                  console.log(statusLamp);
                  for(let i = 0; i < statusLamp.length; i++){
                    let imgStatus = document.createElement('img');
                    imgStatus.setAttribute('width', '50px');
                    imgStatus.setAttribute('height', '50px');  
                    if(response.data[i] == true){
                        imgStatus.setAttribute('src', 'assets/images/green-flag.png');
                        statusLamp[i].appendChild(imgStatus);
                    } else{
                      imgStatus.setAttribute('src', 'assets/images/red-flag.png');
                      statusLamp[i].appendChild(imgStatus);
                    }
                  }
              },
              error: function(error) {
                  // Handle errors
                  console.error('Error making AJAX POST request:', error);
              }
          });
        });
    });
    </script>

    

    <script>
      let slideIndex = 0;
      let articleIndex = 0;

      showSlides();
      
      function showSlides() {
        let slides = document.getElementsByClassName("mySlides");
        let articles = document.getElementsByClassName("myArticle");

        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < articles.length; i++) {
          articles[i].style.display = "none";
        }
        
        slideIndex++;
        articleIndex++;
        if (articleIndex >= articles.length) {
          articleIndex = 1;
        }
        if (slideIndex >= slides.length) {
          slideIndex = 1;
        }
        articles[articleIndex-1].style.display = "block"; 
        slides[slideIndex-1].style.display = "block";  
        setTimeout(showSlides, 4000); // Change image every 2 seconds
      }
      </script>


</body>
</html>