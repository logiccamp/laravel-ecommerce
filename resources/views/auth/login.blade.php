<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/animate.css">

    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">

    <link rel="stylesheet" href="/assets/css/aos.css">

    <link rel="stylesheet" href="/assets/css/ionicons.min.css">

    <link rel="stylesheet" href="/assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/assets/css/jquery.timepicker.css">


    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/css/icomoon.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="{{asset('js/app.js')}}" defer></script>
</head>

<body>

    <div id="app">
        <div class="container-fluid p-0 m-0">
            <div class="login-popup" style="display: block;">
                <section class="bg-home d-flex align-items-center position-relative" style="height: 100%">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-signin p-4 bg-white rounded shadow">
                                    <form method="POST" action="{{ route('loginMain') }}">
                                        @csrf
                                        @if (Session::has('message'))
                                        <ul class="text-danger">
                                            <li>{{Session::get('message')}}</li>
                                        </ul>
                                        @endif
                                        <a href="/"><img src="images/logo-icon.png" class="avatar avatar-small mb-4 d-block mx-auto" alt=""></a>
                                        <h5 class="mb-3 text-center">Please sign in</h5>

                                        <div class="form-floating mb-2">
                                            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                            <label for="floatingInput">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                            <label for="floatingPassword">Password</label>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="forgot-pass mb-0"><a href="/password-reset" class="text-dark small fw-bold">Forgot password ?</a></p>
                                        </div>

                                        <button class="btn btn-primary w-100" type="submit">Sign in</button>

                                        <div class="col-12 text-center mt-3">
                                            <p class="mb-0 mt-3"><small class="text-dark me-2">Don't have an account ?</small>
                                                <a href="/register" class="text-dark fw-bold">Sign Up</a>
                                            </p>
                                        </div>
                                        <!--end col-->
                                    </form>
                                </div>
                                <p class="text-center">
                                    <a href="/" style="text-decoration: none; font-weight: bold" class="btn btn-link">Home</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>