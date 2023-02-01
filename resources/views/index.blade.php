@extends('layouts.app')
@section('body')
    <div class="sequence">

      <div class="seq-preloader">
        <svg width="39" height="16" viewBox="0 0 39 16" xmlns="http://www.w3.org/2000/svg" class="seq-preload-indicator"><g fill="#F96D38"><path class="seq-preload-circle seq-preload-circle-1" d="M3.999 12.012c2.209 0 3.999-1.791 3.999-3.999s-1.79-3.999-3.999-3.999-3.999 1.791-3.999 3.999 1.79 3.999 3.999 3.999z"/><path class="seq-preload-circle seq-preload-circle-2" d="M15.996 13.468c3.018 0 5.465-2.447 5.465-5.466 0-3.018-2.447-5.465-5.465-5.465-3.019 0-5.466 2.447-5.466 5.465 0 3.019 2.447 5.466 5.466 5.466z"/><path class="seq-preload-circle seq-preload-circle-3" d="M31.322 15.334c4.049 0 7.332-3.282 7.332-7.332 0-4.049-3.282-7.332-7.332-7.332s-7.332 3.283-7.332 7.332c0 4.05 3.283 7.332 7.332 7.332z"/></g></svg>
      </div>

    </div>

    <div class="logo">
        <h1 id="coffee-text">
            @auth
                 ;D
            @else
                Coffee
            @endauth
        </h1>
    </div>
    <nav class="menu">
        <ul>
            <li><a href="#1"><img src="/images/icon-1.png" alt=""> <em>خانه</em></a></li>
            <li><a href="#2"><img src="/images/icon-4.png" alt=""> <em>انتقاد و پیشنهاد</em></a></li>
        </ul>
    </nav>
    <nav class="negar-nav">
        <a href="#3">
            <p>Negar</p>
        </a>
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
            </div>
          </div>

          <div class="slide" id="2">
            <div class="content fourth-content">
                <div class="container-fluid">
                    @include('survey.form')
                </div>
            </div>
          </div>
    </div>

          <div class="slide" id="3">
            <div class="content fourth-content">
                <div class="container-fluid" >
                    <div class="row">
                        @include('auth.auth')
                    </div>
                </div>
            </div>
          </div>

    </div>

@endsection
@section('footer')
    <script type="text/javascript">
        $(document).ready(function() {
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
@endsection
