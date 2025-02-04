@include('frontend.header')

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        @include('frontend.navbar')

        {{-- Landing Page Start --}}
        <div class="container-xxl py-7 bg-primary hero-header">
            <div class="container" id="home">
                <div class="row ">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="text-white mb-4 animated slideInDown">Digital Library Management System</h1>
                        <p class="text-white pb-3 animated slideInDown">Perpustakaan online yang akan memudahkan
                            pekerjaanmu dimanapun dan kapanpun 😊</p>
                        <a href=""
                            class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Search
                            Book</a>
                        <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Go
                            Through 😃</a>
                    </div>
                    <div class="col-lg-6 text-center text-lg-start">
                        <img class="img-fluid animated zoomIn"
                            src="{{ asset('frontend/img/deal-img-removebg-preview.png') }}" width="1500"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Landing Page End -->

    <!-- About Start -->
    <div class="container py-2 px-lg-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <p class="section-title text-secondary" id="about">About Us<span></span></p>
                <h1 class="mb-5">#1 Digital Online Library Management System with any categories and any books</h1>
                <p class="mb-4">
                    ini merupakan satu-satunya sistem perpusatakaan online (digital) yang dibuat khusus untuk memudahkan
                    kebutuhan dari pelajar dan pemuda di Indonesia. dengan hadirnya <i>Library Management System</i> ini
                    diharapkan dapat mencerdaskan kehidupan bangsa
                </p>
                <a href="{{ url('library') }}" class="btn btn-primary py-sm-3 px-sm-5 rounded-pill mt-3">Go through with
                    us 😊</a>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{ asset('frontend/img/blog-3.jpg') }}">
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-xxl bg-primary fact py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 px-lg-5" id="inNumber">
            <div class="row g-3">
                {{-- <div class="col-md-4 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-certificate fa-3x text-secondary mb-3"></i>
                    <h1 class="text-white mb-2" data-toggle="counter-up">1234</h1>
                    <p class="text-white mb-0">Years Experience</p>
                </div> --}}
                <div class="col-md-4 col-lg-4 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-users fa-3x text-secondary mb-3"></i>
                    <h1 class="text-white mb-2" data-toggle="counter-up">{{ $usercount }}</h1>
                    <p class="text-white mb-0">Members</p>
                </div>
                <div class="col-md-4 col-lg-4 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-regular fa-book fa-3x text-secondary mb-3"></i>
                    <h1 class="text-white mb-2" data-toggle="counter-up">{{ $bookcount }}</h1>
                    <p class="text-white mb-0">Books</p>
                </div>
                <div class="col-md-4 col-lg-4 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="fa fa-regular fa-hashtag fa-3x text-secondary mb-3"></i>
                    <h1 class="text-white mb-2" data-toggle="counter-up">{{ $categorycount }}</h1>
                    <p class="text-white mb-0">Categories</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->

    <!-- Projects Start -->
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center" id="Library"><span></span>Our
                Books<span></span></p>
            <h1 class="text-center mb-5">Here is our newest books on our library😊</h1>
        </div>
        <div class="row g-4 portfolio-container">
            @foreach ($latest_post as $item)
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('storage/backend/' . $item->cover) }}" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1"
                                    href="{{ asset('storage/backend/' . $item->cover) }}" data-lightbox="portfolio"><i
                                        class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ url('library') }}"><i
                                        class="fa fa-paper-plane"></i></a>
                            </div>
                        </div>
                        <div class="bg-light p-4">
                            <p class="text-primary fw-medium mb-2">{{ $item->kategori->kategori }}</p>
                            <h5 class="lh-base mb-0">{{ $item->judul }}</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- Projects End -->
    @include('frontend.footer')
