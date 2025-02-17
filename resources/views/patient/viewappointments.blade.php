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
        <title>Mediplus - Free Medical and Doctor Directory HTML Template.</title>
		
		<!-- Favicon -->
        <link rel="icon" href="{{ asset('img/favicon.png') }}">
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="{{ asset('css/icofont.css') }}">
		<!-- Slicknav -->
		<link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{ asset('css/owl-carousel.css') }}">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
		
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
		
    </head>
    <body>
		<!-- Preloader -->
		<div class="preloader" id="preloader">
			<div class="loader">
				<div class="loader-outter"></div>
				<div class="loader-inner"></div>
				<div class="indicator"> 
					<svg width="16px" height="12px">
						<polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
						<polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
					</svg>
				</div>
			</div>
		</div>
		<!-- End Preloader -->
	
		<!-- Header Area -->
		<header class="header">
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-12" style="display: flex; justify-content: center; align-items: center;">
							<ul class="top-contact" style="list-style: none; display: flex; gap: 20px;">
								<li><i class="fa fa-phone"></i>+880 1234 56789</li>
								<li><i class="fa fa-envelope"></i><a href="mailto:support@yourmail.com">support@yourmail.com</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
	
			<!-- End Topbar -->
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<div class="logo">
									<a href="index.html"><img src="{{ asset('img/logo.png') }}" alt="Logo"></a>
								</div>
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
                                            <li><a href="{{ route('patient.dashboard') }}">My Page</a></li>
											<li><a href="{{ route('patient.dashboard') }}">Doctors</a></li>
											<li><a href="{{ route('patient.dashboard') }}">Services</a></li>
											<li><a href="{{ route('patient.dashboard') }}">Contact Us</a></li>
										</ul>
									</nav>
								</div>
							</div>
							<div class="col-lg-2 col-12">
							<div class="get-quote">
                                <div class="header-buttons d-flex" style="gap: 20px;">
                                        <a href="{{ route('patient.deleteAccount') }}" class="btn btn-profile">Delete Account</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-logout">Log Out</button>
                                        </form>
                                    </div>
								</div>
							</div>
                        </div>
						</div>
					</div>
				</div>
			</div>
		</header>


        <div class="container">
            <h1>Scheduled Appointments List</h1>
            @if ($appointments->isEmpty())
                <p>No Scheduled appointments found.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Patient Name</th>
                            <th>Doctor Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->Date }}</td>
                                <td>{{ $appointment->Time }}</td>
                                <td>{{ $appointment->patient->Name ?? 'Unknown' }}</td>
                                <td>{{ $appointment->doctor->Name ?? 'Unknown' }}</td>
                                <td>
                                    <!-- Cancel Button -->
                                    <form action="{{ route('patients.cancel', ['appointmentId' => $appointment->AppointmentID]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="btn btn-danger btn-sm">Cancel Appointment</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <!-- Footer Area -->
		<footer id="footer" class="footer">
			<!-- Footer Top -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>About Us</h2>
								<p>Lorem ipsum dolor sit am consectetur adipisicing elit do eiusmod tempor incididunt ut labore dolore magna.</p>
								<!-- Social -->
								<ul class="social">
									<li><a href="#"><i class="icofont-facebook"></i></a></li>
									<li><a href="#"><i class="icofont-google-plus"></i></a></li>
									<li><a href="#"><i class="icofont-twitter"></i></a></li>
									<li><a href="#"><i class="icofont-vimeo"></i></a></li>
									<li><a href="#"><i class="icofont-pinterest"></i></a></li>
								</ul>
								<!-- End Social -->
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer f-link">
								<h2>Quick Links</h2>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<ul>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Home</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>About Us</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Services</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Our Cases</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Other Links</a></li>	
										</ul>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<ul>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Consuling</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Finance</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Testimonials</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>FAQ</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Contact</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Contact Us</h2>
								<p>123, Main Street, Anytown, USA</p>
								<p>Email: info@mediplus.com</p>
								<p>Phone: +1 (234) 567-890</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Footer Top -->

			<!-- Footer Bottom -->
			<div class="footer-bottom">
				<div class="container">
					<p class="footer-bottom-text">© 2024 Mediplus. All Rights Reserved.</p>
				</div>
			</div>
			<!-- End Footer Bottom -->
		</footer>
		<!-- End Footer Area -->

		<!-- JavaScript Libraries -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/waypoints.min.js') }}"></script>
        <script src="{{ asset('js/nice-select.min.js') }}"></script>
        <script src="{{ asset('js/slicknav.min.js') }}"></script>
        <script src="{{ asset('js/magnific-popup.min.js') }}"></script>
        <script src="{{ asset('js/datepicker.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

    </body>
</html>

