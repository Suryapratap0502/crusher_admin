<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-bs-theme="light" data-body-image="img-1" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Forgot Password | Udhaar Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Udhaar Admin Panel" name="description" />
    <meta content="Maisha Infotech" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden card-bg-fill border-0 card-border-effect-none">
                            <div class="row justify-content-center g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                                <a href="{{ url('/') }}" class="d-block">
                                                    <img src="{{ asset('assets/images/logo.jpg')}}" alt="" height="60">
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
                                                            <p class="fs-15 fst-italic">" Empowering Financial Success: Your Path to Effortless Accounting "</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" Simplify Your Finances, Amplify Your Success: Accounting Made Easy"</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" Unlocking Financial Clarity: Navigate Your Numbers with Confidence "</p>
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
                                        <h5 class="text-primary">Forgot Password?</h5>
                                        <p class="text-muted">Reset password with Udhar Admin Control</p>

                                        <div class="mt-2 text-center">
                                            <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#8c68cd" class="avatar-xl">
                                            </lord-icon>
                                        </div>

                                        <div class="alert border-0 alert-warning text-center mb-2 mx-2" role="alert">
                                            Enter your registered email and instructions will be sent to you!
                                        </div>
                                        <div class="p-2">
                                            <form id="validate_email">
                                                @csrf()
                                                <div class="mb-4">
                                                    <label class="form-label">Email <b class="text-danger">*</b></label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                                                    <span id="email_error" class="text-danger"></span>
                                                </div>

                                                <div class="text-center mt-4">
                                                    <input class="btn btn-primary w-100 text-replace" type="submit" value="Send Mail">
                                                </div>
                                                                                                
                                                <!-- <div class="text-center mt-4">
                                                    <input class="btn btn-primary w-100" type="button" data-bs-toggle="modal" data-bs-target="#loginModals" value="Validate Key">
                                                </div> -->
                                                </a>
                                            </form><!-- end form -->
                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="mb-0">Wait, I remember my password... <a href="{{ url('/') }}" class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
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

        <div id="loginModals" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 overflow-hidden">
                    <div id="response_key">
                    </div>
                    <div class="modal-body p-5">
                        <h5 class="mb-3">Enter Key</h5>
                        <form id="validate_key">
                            @csrf()
                            <div class="mb-3">
                                <input type="text" class="form-control" id="validator_key" name="validator_key" placeholder="Enter your Key">
                                <span id="validator_key_error" class="text-danger"></span>
                            </div>
                            <!-- <button type="submit" class="btn btn-primary w-100">Submit</button> -->
                            <div class="hstack gap-2 justify-content-center">
                                <!-- <a href="javascript:void(0);" class="btn btn-danger" data-bs-dismiss="modal"></i> Close</a> -->
                                <input type="submit" name="submit" id="validate_key" value="Validate Key" class="btn btn-primary text-replace">
                                <!-- <a href="javascript:void(0);" class="btn btn-primary">Validate Key</a> -->
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Udhar. Crafted with <i class="mdi mdi-heart text-danger"></i> by Maisha Infotech
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
</body>

</html>