@include('frontend.header-library')

<body>
    <div class="container-xxl bg-white p-0">

        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">DGital</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="{{ url('') }}" class="nav-item nav-link">Home</a>
                        <a href="{{ url('library') }}" class="nav-item nav-link active">Library</a>
                    </div>
                    <a href="{{ url('login') }}" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Login</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-primary hero-header">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-12 text-center">
                            <h1 class="text-white animated slideInDown">Library</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Projects Start -->
        <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>Our
                        Books<span></span></p>
                </div>

                <div class="row portfolio-container">
                    @foreach ($latest_posts as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                            <div class="rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <img class="img-fluid" src="{{ asset('storage/backend/' . $item->cover) }}"
                                        alt="">
                                    <div class="portfolio-overlay">
                                        <a class="btn btn-square btn-outline-light mx-1"
                                            href="{{ asset('storage/backend/' . $item->cover) }}"
                                            data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="bg-light p-4">
                                    <p class="text-primary fw-medium mb-2">{{ $item->kategori->kategori }}</p>
                                    <h5 class="lh-base mb-0">{{ $item->judul }}</h5>
                                    <a href="{{ url('library') }}"
                                        class="btn btn-primary py-sm-3 px-sm-5 rounded-pill mt-3">
                                        Borrow</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- paginate --}}
                <hr>
                <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="col-12 text-center">
                        {{ $latest_posts->links() }}
                    </div>
                </div>
                {{-- end paginate --}}
            </div>
        </div>
        <!-- Projects End -->




        <!-- Footer Start -->
        @include('frontend.footer-library')
        <!-- Footer End -->
