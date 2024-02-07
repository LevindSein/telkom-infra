<!DOCTYPE html>
<html>

<head>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

    {{-- Global Theme Styles (used by all pages) --}}
    @foreach(config('master.resources.css') as $style)
       <link href="{{ asset($style) }}" rel="stylesheet" type="text/css" />
    @endforeach

    <meta name="viewport" content="width=device-width, initial-scale=0.9">

    <style>
        @media only screen and (min-width: 768px) {
            .main-content {
                padding-right: 15vh;
                padding-left: 15vh;
            }
        }

        #post {
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        ::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #888;
        }
        ::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }
        ::-webkit-scrollbar {
            width: 4px;
            height: 3px;
        }

        .image-container {
            position: relative;
            width: 100%; /* Adjust according to your image dimensions */
            height: 100px; /* Adjust according to your image dimensions */
        }

        .skeleton-loader {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, #f0f0f0 0%, #d0d0d0 50%, #f0f0f0 100%);
            background-size: 200% 100%;
            animation: shimmer 1s infinite;
        }

        @keyframes shimmer {
            0% { background-position: -100px 0; }
            100% { background-position: 100px 0; }
        }
    </style>
</head>

<body>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Header -->
        <div class="header pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="align-items-center py-4 d-flex justify-content-between">
                        <a href="{{url('')}}">
                            <img src="{{asset('images/new_kepo.png')}}" width="35" alt="logo kepo">
                        </a>
                        <div class="media align-items-center">
                            <div class="media-body mr-2 d-none d-lg-block">
                                <span
                                    class="mb-0 text-sm font-weight-bold">John Doe Si Lorem Ipsum</span>
                            </div>
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="{{asset('images/user.jpg')}}">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-4">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="card py-4 px-4" style="width:100%; max-height: 40vh; overflow-y: auto">
                                <div class="form-group">
                                    <textarea id="post" class="form-control" rows="2" style="width: 100%" placeholder="Bagikan Knowledge hari ini"></textarea>
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <button class="btn btn-sm"><img src="{{asset('images/image.png')}}" width="15"> Gambar</button>
                                    <button class="btn btn-sm"><img src="{{asset('images/video.png')}}" width="15"> Video</button>
                                    <button class="btn btn-sm"><img src="{{asset('images/document.png')}}" width="15"> Dokumen</button>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary" style="width: 100px; border-radius: 20px">Post</button>
                                </div>
                            </div>
                            <h5 class="card-title">Popular Post</h5>
                            <div class="card py-4 px-4" style="width:100%; max-height: 42.5vh; overflow-y: auto">
                                @for($i = 0; $i < 5; $i++)
                                <div class="form-group">
                                    <div class="card card-profile">
                                        <div class="image-container">
                                            <div class="skeleton-loader"></div>
                                            <img src="{{asset("images/banner.png")}}" height="100" alt="Image" class="image card-img-top">
                                        </div>
                                        <div class="p-2" >
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <small class="mr-1"><i class="fas fa-thumbs-up text-primary"></i> 120</small>
                                                    <small class="mr-1"><i class="fal fa-comment"></i> 270</small>
                                                    <small class="mr-1"><i class="fal fa-share"></i> 5</small>
                                                </div>
                                                <small class="mr-1"><i class="far fa-eye"></i> 1.5K</small>
                                            </div>
                                        </div>
                                        <div class="card-body pt-2" >
                                            <div class="h5 mt-4">
                                                Title Post {{$i}}
                                            </div>
                                            <small>
                                                Content Description {{$i}} ...
                                            </small>
                                            <a href="#" class="d-flex justify-content-end">
                                                <small>Lihat selengkapnya >></small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="d-flex justify-content-between">
                            <form class="navbar-search navbar-search-light" id="navbar-search-main">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Search" type="text">
                                    </div>
                                </div>
                          </form>
                          <h5 class="card-title" style="align-self: flex-end">Recent Post</h5>
                    </div>
                    <div class="card py-4 px-4" style="max-height: 73vh; overflow-y: auto">
                        @for ($i = 0; $i < 20; $i++)
                            <div class="row lazy-load-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="card card-profile">
                                            <div class="image-container">
                                                <div class="skeleton-loader"></div>
                                                <img src="{{asset("images/banner.png")}}" height="100" alt="Image" class="image card-img-top">
                                            </div>
                                            <div class="p-2" >
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <small class="mr-1"><i class="fas fa-thumbs-up text-primary"></i> 120</small>
                                                        <small class="mr-1"><i class="fal fa-comment"></i> 270</small>
                                                        <small class="mr-1"><i class="fal fa-share"></i> 5</small>
                                                    </div>
                                                    <small class="mr-1"><i class="far fa-eye"></i> 1.5K</small>
                                                </div>
                                            </div>
                                            <div class="card-body pt-2" >
                                                <div class="h5 mt-4">
                                                    Title Post {{$i}}
                                                </div>
                                                <small>
                                                    Content Description {{$i}} ...
                                                </small>
                                                <a href="#" class="d-flex justify-content-end">
                                                    <small>Lihat selengkapnya >></small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="card card-profile">
                                            <div class="image-container">
                                                <div class="skeleton-loader"></div>
                                                <img src="{{asset("images/banner.png")}}" height="100" alt="Image" class="image card-img-top">
                                            </div>
                                            <div class="p-2" >
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <small class="mr-1"><i class="fal fa-thumbs-up"></i> 120</small>
                                                        <small class="mr-1"><i class="fal fa-comment"></i> 270</small>
                                                        <small class="mr-1"><i class="fal fa-share"></i> 5</small>
                                                    </div>
                                                    <small class="mr-1"><i class="far fa-eye"></i> 1.5K</small>
                                                </div>
                                            </div>
                                            <div class="card-body pt-2" >
                                                <div class="h5 mt-4">
                                                    Title Post {{$i}}
                                                </div>
                                                <small>
                                                    Content Description {{$i}} ...
                                                </small>
                                                <a href="#" class="d-flex justify-content-end">
                                                    <small>Lihat selengkapnya >></small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Argon Scripts -->
    {{-- Global Theme JS Bundle (used by all pages)  --}}
    @foreach(config('master.resources.js') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach

    <script>
        $(document).ready(function() {
            $('#post').focus();

            $('.image').on('load', function() {
                $('.skeleton-loader').hide();
            });

            $('.image').each(function() {
                if (this.complete) {
                    $(this).trigger('load');
                }
            });

            $('.lazy-load-row').each(function() {
                var observer = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            // Load the content of the card
                            $(entry.target).find(".skeleton-loader").hide();
                            observer.unobserve(entry.target);
                        }
                    });
                }, { rootMargin: "0px 0px 100px 0px" }); // Adjust the root margin as needed

                observer.observe(this);
            });
        });
    </script>
</body>

</html>
