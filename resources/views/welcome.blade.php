<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-bs-theme="light" data-body-image="img-1" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Sign In | Crusher Zone Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Udhaar Admin Panel" name="description" />
    <meta content="Maisha Infotech" name="author" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

    <script src="{{ asset('assets/js/layout.js')}}"></script>
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden card-bg-fill border-0 card-border-effect-none">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                                <a href="{{ url('/') }}" class="d-block text-primary">
                                                    <img src="{{ asset('assets/images/logo.png')}}" alt="" height="60">
                                                    <!-- <span style="color: white;">CRUSHER ZONE</span> -->
                                                </a>
                                            </div>
                                            <div class="mt-auto">
                                                <div class="mb-3">
                                                    <i class="ri-double-quotes-l display-4 text-success"></i>
                                                </div>

                                                <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                                    <div class="carousel-indicators">
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                    </div>
                                                    <div class="carousel-inner text-center text-white pb-5">
                                                        <div class="carousel-item active">
                                                            <p class="fs-15 fst-italic">" Efficiency in the crushing zone is the foundation of cost-effective production. Every machine, every process, and every movement counts. "</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" A well-designed crusher zone is the heart of the quarrying industry, turning raw materials into the building blocks of our world"</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" The crusher zone represents the intersection of power and precision, transforming stone into success. "</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end carousel -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div id="response">
                                    </div>
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p class="text-muted">Sign in to continue to Crusher Zone Admin Control.</p>
                                        </div>

                                        <div class="mt-4">
                                            <form id="login">
                                                @csrf()
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username <b class="text-danger">*</b></label>
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                                                    <span id="username_error" class="text-danger"></span>
                                                </div>

                                                <div class="mb-3">
                                                    <div class="float-end">
                                                        <a href="{{ url('forgot-password') }}" class="text-muted">Forgot password?</a>
                                                    </div>
                                                    <label class="form-label" for="password-input">Password <b class="text-danger">*</b></label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" name="password" id="password">
                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                        <span id="password_error" class="text-danger"></span>
                                                    </div>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" name="remember_me" id="remember_me">
                                                    <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                                </div>

                                                <div class="mt-4">
                                                    <input class="btn btn-primary w-100 text-replace" type="submit" value="Sign In">
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> AggZon. Crafted with <i class="mdi mdi-heart text-danger"></i> by Maisha Infotech
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/auth.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{ asset('assets/js/plugins.js')}}"></script>

    <!-- password-addon init -->
    <script src="{{ asset('assets/js/pages/password-addon.init.js')}}"></script>

    <script>
        self.addEventListener('install', function(event) {
            event.waitUntil(
                caches.open('v1').then(function(cache) {
                    return cache.addAll([
                        '/index.html',
                        '/styles.css',
                        '/script.js',
                        '/images/logo.png'
                    ]);
                }).catch(function(error) {
                    console.error('Cache installation failed:', error);
                })
            );
        });

        self.addEventListener('fetch', function(event) {
            event.respondWith(
                caches.match(event.request).then(function(response) {
                    return response || fetch(event.request);
                }).catch(function(error) {
                    console.error('Cache retrieval failed:', error);
                    return fetch(event.request);
                })
            );
        });




        self.addEventListener('fetch', function(event) {

            event.respondWith(

                caches.match(event.request).then(function(response) {

                    return response || fetch(event.request);

                })

            );

        });
    </script>
</body>

</html>