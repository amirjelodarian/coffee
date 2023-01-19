<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Earth - Free HTML5 Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/css/fontawesome.css">
    <link rel="stylesheet" href="/css/tooplate-main.css">
    <link rel="stylesheet" href="/css/owl.css">

  </head>
<!--
Tooplate 2113 Earth
https://www.tooplate.com/view/2113-earth
-->
  <body>

    <div class="sequence">

      <div class="seq-preloader">
        <svg width="39" height="16" viewBox="0 0 39 16" xmlns="http://www.w3.org/2000/svg" class="seq-preload-indicator"><g fill="#F96D38"><path class="seq-preload-circle seq-preload-circle-1" d="M3.999 12.012c2.209 0 3.999-1.791 3.999-3.999s-1.79-3.999-3.999-3.999-3.999 1.791-3.999 3.999 1.79 3.999 3.999 3.999z"/><path class="seq-preload-circle seq-preload-circle-2" d="M15.996 13.468c3.018 0 5.465-2.447 5.465-5.466 0-3.018-2.447-5.465-5.465-5.465-3.019 0-5.466 2.447-5.466 5.465 0 3.019 2.447 5.466 5.466 5.466z"/><path class="seq-preload-circle seq-preload-circle-3" d="M31.322 15.334c4.049 0 7.332-3.282 7.332-7.332 0-4.049-3.282-7.332-7.332-7.332s-7.332 3.283-7.332 7.332c0 4.05 3.283 7.332 7.332 7.332z"/></g></svg>
      </div>

    </div>

        <div class="logo">
            <h1>Coffee</h1>
        </div>
        <nav class="menu">
          <ul>
            <li><a href="#1"><img src="/images/icon-1.png" alt=""> <em>خانه</em></a></li>
            <li><a href="#2"><img src="/images/icon-4.png" alt=""> <em>انتقاد و پیشنهاد</em></a></li>
          </ul>
        </nav>

        <div class="slides">
          <div class="slide" id="1">
            <div id="slider-wrapper">
                <div id="image-slider">
                  <div class="coffee"></div>
                  <ul class="list">
                    <li>
                      <a href="/images/menu.jpg">
                          <h2 class="btn btn-menu btn-show-menu">
                            <img src="/images/icon-5.png" alt="">
                            مشاهده منو
                          </h2>
                      </a>
                    </li>
                    <li>
                      <nav class="btn-survey-nav">
                        <a href="#2">
                          <h2 class="btn btn-menu btn-survey">
                            <img src="/images/icon-4.png" alt="">
                            ثبت انتقاد و پیشنهاد
                          </h2>
                        </a>
                      </nav>
                    </li>

                  </ul>
                </div>
                <!-- <div id="thumbnail">
                  <ul>
                    <li class="active"><img src="assets/images/thumb-01.jpg" alt="کافه نگار" /></li>
                    <li><img src="assets/images/thumb-02.jpg" alt="Meeting" /></li>
                    <li><img src="assets/images/thumb-03.jpg" alt="Smart" /></li>
                  </ul>
                </div> -->
              </div>
        </div>

        <div class="slide" id="2">
            <div class="content fourth-content">
                <div class="container-fluid">
                    <form id="contact" action="{{ route('survey-store') }}" method="post">
                        @csrf
                        <div class="row">
                          <div class="col-md-12">
                            <h2>انتقاد و پیشنهاد</h2>
                          </div>
                          <div class="col-md-3"></div>
                          <div class="col-md-6">
                            <fieldset>
                              <input name="name" type="text" class="form-control" id="name" placeholder="نام دلخواه" >
                            </fieldset>
                          </div>
                          <div class="col-md-3"></div>
                          <div class="col-md-12">
                            <fieldset>
                              <textarea name="message" rows="6" class="form-control" id="message" placeholder="انتقاد یا پیشنهاد خود را بنویسید..." required=""></textarea>
                            </fieldset>
                          </div>
                          <div class="col-md-12">
                            <fieldset>
                              <button type="button" id="form-submit" class="button">تایید</button>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="/js/owl.js"></script>
    <script src="/js/accordations.js"></script>
    <script src="/js/main.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#form-submit').click(function(){
                $.ajax({
                    method: "POST",
                    url: "{{ route('survey-store') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: $('#name').val(),
                        message:  $('#message').val()
                    },
                    success: function (data){
                        window.alert('با موفقیت ارسال شد ;)');
                    },
                });
            });
            // navigation click actions
            $('.scroll-link').on('click', function(event){
                event.preventDefault();
                var sectionID = $(this).attr("data-id");
                scrollToID('#' + sectionID, 750);
            });
            // scroll to top action
            $('.scroll-top').on('click', function(event) {
                event.preventDefault();
                $('html, body').animate({scrollTop:0}, 'slow');
            });
            // mobile nav toggle
            $('#nav-toggle').on('click', function (event) {
                event.preventDefault();
                $('#main-nav').toggleClass("open");
            });
        });
        // scroll function
        function scrollToID(id, speed){
            var offSet = 0;
            var targetOffset = $(id).offset().top - offSet;
            var mainNav = $('#main-nav');
            $('html,body').animate({scrollTop:targetOffset}, speed);
            if (mainNav.hasClass("open")) {
                mainNav.css("height", "1px").removeClass("in").addClass("collapse");
                mainNav.removeClass("open");
            }
        }
        if (typeof console === "undefined") {
            console = {
                log: function() { }
            };
        }
    </script>

  </body>
</html>
