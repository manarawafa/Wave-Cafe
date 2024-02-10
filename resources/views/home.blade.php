@extends('layouts.app')

@section('content')


<div class="tm-container">
    <div class="tm-row">

        <!-- Site Header -->
        <div class="tm-left">
            <div class="tm-left-inner">
                <div class="tm-site-header">
                    <i class="fas fa-coffee fa-3x tm-site-logo"></i>
                    <h1 class="tm-site-name">Wave Cafe</h1>
                </div>
                <nav class="tm-site-nav">
                    <ul class="list-unstyled tm-site-nav-ul">
                        <div class="row">

                            <div class="col-6">
                                <li class="tm-page-nav-item">
                                    <a href="{{route('drink')}}" class="tm-page-link active">
                                        <i class="fas fa-mug-hot tm-page-link-icon"></i>
                                        <span>Drink Menu</span>
                                    </a>
                                </li>
                            </div>
                            <div class="col-6">
                                <li class="tm-page-nav-item">
                                    <a href="{{route('about')}}" class="tm-page-link">
                                        <i class="fas fa-users tm-page-link-icon"></i>
                                        <span>About Us</span>
                                    </a>
                                </li>
                            </div>
                            <div class="col-6">
                                <li class="tm-page-nav-item">
                                    <a href="{{route('special')}}" class="tm-page-link">
                                        <i class="fas fa-glass-martini tm-page-link-icon"></i>
                                        <span>Special Items</span>
                                    </a>
                                </li>
                            </div>
                            <div class="col-6">
                                <li class="tm-page-nav-item">
                                    <a href="{{route('contact')}}" class="tm-page-link">
                                        <i class="fas fa-comments tm-page-link-icon"></i>
                                        <span>Contact</span>
                                    </a>
                                </li>
                            </div>

                        </div>




                    </ul>
                </nav>
            </div>
        </div>
        <div class="tm-right">
            <main class="tm-main">

                <!-- page content -->

                @yield('contentt')
            </main>
        </div>
    </div>
    <footer class="tm-site-footer">
        <p class="tm-black-bg tm-footer-text">Copyright 2020 Wave Cafe

            | Design: <a href="https://www.tooplate.com" class="tm-footer-link" rel="sponsored"
                target="_parent">Tooplate</a></p>
    </footer>
</div>
<!-- Background video -->
<div class="tm-video-wrapper">
    <i id="tm-video-control-button" class="fas fa-pause"></i>
    <video autoplay muted loop id="tm-video">
        <source src="{{asset('video/wave-cafe-video-bg.mp4')}}" type="video/mp4">
    </video>
</div>
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script>

    function setVideoSize() {
        const vidWidth = 1920;
        const vidHeight = 1080;
        const windowWidth = window.innerWidth;
        const windowHeight = window.innerHeight;
        const tempVidWidth = windowHeight * vidWidth / vi
        const tempVidHeight = windowWidth * vidHeight / vidWidth;
        const newVidWidth = tempVidWidth > windowWidth ? tempVidWidth : windowWidth;
        const newVidHeight = tempVidHeight > windowHeight ? tempVidHeight : windowHeight;
        const tmVideo = $('#tm-video');

        tmVideo.css('width', newVidWidth);
        tmVideo.css('height', newVidHeight);
    }

    function openTab(evt, id) {
        $('.tm-tab-content').hide();
        $('#' + id).show();
        $('.tm-tab-link').removeClass('active');
        $(evt.currentTarget).addClass('active');
    }

    function initPage() {
        let pageId = location.hash;

        if (pageId) {
            highlightMenu($(`.tm-page-link[href^="${pageId}"]`));
            showPage($(pageId));
        }
        else {
            pageId = $('.tm-page-link.active').attr('href');
            showPage($(pageId));
        }
    }

    function highlightMenu(menuItem) {
        $('.tm-page-link').removeClass('active');
        menuItem.addClass('active');
    }

    function showPage(page) {
        $('.tm-page-content').hide();
        page.show();
    }

    $(document).ready(function () {

        /***************** Pages *****************/

        initPage();

        $('.tm-page-link').click(function (event) {

            if (window.innerWidth > 991) {
                event.preventDefault();
            }

            highlightMenu($(event.currentTarget));
            showPage($(event.currentTarget.hash));
        });


        /***************** Tabs *******************/

        $('.tm-tab-link').on('click', e => {
            e.preventDefault();
            openTab(e, $(e.target).data('id'));
        });

        $('.tm-tab-link.active').click(); // Open default tab


        /************** Video background *********/

        setVideoSize();

        // Set video background size based on window size
        let timeout;
        window.onresize = function () {
            clearTimeout(timeout);
            timeout = setTimeout(setVideoSize, 100);
        };

        // Play/Pause button for video background      
        const btn = $("#tm-video-control-button");

        btn.on("click", function (e) {
            const video = document.getElementById("tm-video");
            $(this).removeClass();

            if (video.paused) {
                video.play();
                $(this).addClass("fas fa-pause");
            } else {
                video.pause();
                $(this).addClass("fas fa-play");
            }
        });
    });

</script>
@endsection




<!-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->