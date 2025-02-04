@extends('layouts.index')

@section('title', 'Admin Page - Dashboard')
@section('content')
    <div class="row">
        <!-- Books Statistics -->
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Books Statistics</h5>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <h2 class="mb-2">{{ $bookcount }}</h2>
                            <span>Total Books</span>
                        </div>
                        <div id="orderStatisticsChart"></div>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="row">
                                @foreach ($latest_books as $item)
                                    <div class=" mb-2 d-flex align-items-center justify-content-between">
                                        <div class="avatar ">
                                            {{-- <span class="avatar-initial rounded bg-label-primary"><i
                                                    class="bx bxs-book"></i></span> --}}
                                            <img src="{{ asset('storage/backend/' . $item->cover) }}" alt="">
                                        </div>
                                        <div class="">
                                            <h6 class="mb-0">{{ $item->judul }}</h6>
                                            <small class="text-muted mb-3">{{ $item->created_at }}</small>
                                        </div>
                                        <div class="user-progress">
                                            <small class="fw-semibold"></small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--/ Books Statistics -->

        <!-- Categories Overview -->
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2"> Categories Statistics</h5>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <h2 class="mb-2">{{ $categorycount }}</h2>
                            <span>Total Categories</span>
                        </div>
                        <div id="orderStatisticsChart"></div>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="row">
                                @foreach ($latest_categories as $item)
                                    <div class=" mb-2 d-flex align-items-center justify-content-between">
                                        <div class="avatar ">
                                            <span class="avatar-initial rounded bg-label-primary"><i
                                                    class="bx bx-category"></i></span>
                                            {{-- <img src="{{ asset('storage/backend/' . $item->cover) }}" alt=""> --}}
                                        </div>
                                        <div class="">
                                            <h6 class="mb-0">{{ $item->kategori }}</h6>
                                            <small class="text-muted mb-3">{{ $item->created_at }}</small>
                                        </div>
                                        <div class="user-progress">
                                            <small class="fw-semibold"></small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--/ Categories Overview -->

        <!-- User -->
        @if (auth()->user()->role == 'Admin')

            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2"> User Statistics</h5>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <h2 class="mb-2">{{ $usercount }}</h2>
                                <span>Total Users</span>
                            </div>
                            <div id="orderStatisticsChart"></div>
                        </div>
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <div class="row">
                                    @foreach ($latest_user as $item)
                                        <div class=" mb-2 d-flex align-items-center justify-content-between">
                                            <div class="avatar ">
                                                <span class="avatar-initial rounded bg-label-primary"><i
                                                        class="bx bx-user"></i></span>
                                                {{-- <img src="{{ asset('storage/backend/' . $item->cover) }}" alt=""> --}}
                                            </div>
                                            <div class="">
                                                <h6 class="mb-0">{{ $item->name }}</h6>
                                                <small class="text-muted mb-3">{{ $item->role }}</small>
                                            </div>
                                            <div class="user-progress">
                                                <small class="fw-semibold"></small>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <!--/ User -->
    </div>
    <!-- / Content -->

@endsection
