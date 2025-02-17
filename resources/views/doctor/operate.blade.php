<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Conduct a Session</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-inner">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset('img/logo.png') }}" alt="Logo"></a>
                    </div>
                    <!-- Navigation Menu and Contact Info -->
                    <nav class="navigation d-flex align-items-center flex-wrap gap-3">
                        <ul class="nav menu d-flex align-items-center gap-3 mb-0">
                            <li><a href="{{ route('dashboard') }}">My Page</a></li>
                        </ul>
                        <ul class="top-contact d-flex align-items-center gap-3 mb-0">
                            <li><i class="fa fa-phone"></i> +880 1234 56789</li>
                            <li><i class="fa fa-envelope"></i> <a href="mailto:support@yourmail.com">support@yourmail.com</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->

    <!-- Operate Session Form -->
    <div class="container my-5">
        <h1 class="text-center fw-bold">Schedule a Session</h1>
        <form action="{{ route('doctor.operate') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="patient_id" class="form-label">Patient</label>
                <select id="patient_id" name="patient_id" class="form-select w-auto" required>
                    <option value="" disabled selected>Select a Patient</option>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->PatientID }}">{{ $patient->Name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="session_date" class="form-label">Session Date</label>
                <input type="date" id="session_date" name="session_date" class="form-control w-auto" required>
            </div>
            <div class="mb-3">
                <label for="session_time" class="form-label">Session Time</label>
                <input type="time" id="session_time" name="session_time" class="form-control w-auto" required>
            </div>
            <button type="submit" class="btn btn-primary">Schedule Session</button>
        </form>
    </div>

    <!-- Footer -->
    <footer id="footer" class="footer mt-auto">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer">
                            <h2>About Us</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, dolore.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer">
                            <h2>Quick Links</h2>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer">
                            <h2>Contact Us</h2>
                            <p>123, Main Street, Anytown, USA</p>
                            <p>Email: info@example.com</p>
                            <p>Phone: +1 (234) 567-890</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p class="text-center">Â© 2024 Mediplus. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
</body>
</html>