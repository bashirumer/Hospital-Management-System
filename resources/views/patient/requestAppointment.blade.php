<!doctype html>
<html lang="zxx">
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
    </header>

    <!-- Appointment Section -->
    <section class="appointment">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>We Are Always Ready to Help You. Book An Appointment</h2>
                        <img src="{{ asset('img/section-img.png') }}" alt="Appointment Section Image">
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. Pretiumts</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <form id="appointment-form" action="{{ route('patient.requestAppointment') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Appointment Date -->
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="appointment_date">Appointment Date</label>
                                    <input type="date" id="appointment_date" name="appointment_date" class="form-control" required>
                                </div>
                            </div>

                            <!-- Appointment Time -->
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="appointment_time">Appointment Time</label>
                                    <input type="time" id="appointment_time" name="appointment_time" class="form-control" required>
                                </div>
                            </div>

                            <!-- Receptionist Dropdown -->
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="receptionist_id">Receptionist</label>
                                    <select id="receptionist_id" name="receptionist_id" class="form-control" required>
                                        <option value="" disabled selected>Select a Receptionist</option>
                                        @foreach ($receptionists as $receptionist)
                                            <option value="{{ $receptionist->ReceptionistID }}">{{ $receptionist->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Doctor Dropdown -->
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="doctor_id">Doctor</label>
                                    <select id="doctor_id" name="doctor_id" class="form-control" required>
                                        <option value="" disabled selected>Select a Doctor</option>
                                        @foreach ($doctors as $doctor)
                                            <option value="{{ $doctor->DoctorID }}">{{ $doctor->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-lg-12 col-12">
                                <button type="submit" class="btn btn-primary">Request Appointment</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-12 ">
                    <div class="appointment-image">
                        <img src="{{ asset('img/contact-img.png') }}" alt="Contact Image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Appointment Section -->

    <!-- Footer Area -->
		<footer id="footer" class="footer ">
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
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Contact Us</a></li>	
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Open Hours</h2>
								<p>Lorem ipsum dolor sit ame consectetur adipisicing elit do eiusmod tempor incididunt.</p>
								<ul class="time-sidual">
									<li class="day">Monday - Fridayp <span>8.00-20.00</span></li>
									<li class="day">Saturday <span>9.00-18.30</span></li>
									<li class="day">Monday - Thusday <span>9.00-15.00</span></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Newsletter</h2>
								<p>subscribe to our newsletter to get allour news in your inbox.. Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
								<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
									<input name="email" placeholder="Email Address" class="common-input" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Your email address'" required="" type="email">
									<button class="button"><i class="icofont icofont-paper-plane"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Footer Top -->
			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<div class="copyright-content">
								<p>© Copyright 2018  |  All Rights Reserved by <a href="https://www.wpthemesgrid.com" target="_blank">wpthemesgrid.com</a> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		</footer>
		<!--/ End Footer Area -->

        <!-- Scripts -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery-migrate-3.0.0.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/easing.js') }}"></script>
        <script src="{{ asset('js/colors.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('js/jquery.nav.js') }}"></script>
        <script src="{{ asset('js/slicknav.min.js') }}"></script>
        <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('js/niceselect.js') }}"></script>
        <script src="{{ asset('js/tilt.jquery.min.js') }}"></script>
        <script src="{{ asset('js/owl-carousel.js') }}"></script>
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('js/steller.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
