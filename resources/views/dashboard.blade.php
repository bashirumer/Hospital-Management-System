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
            <!-- Preloader  -->
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

            <!-- Navigation -->
            <div>
                @include('layouts.navigation')
            </div>
        
            <!-- Header Area -->
        
            <!-- End Topbar -->
                @if (Auth::guard('patient')->check())
                <!-- Header Inner -->
                <header class="header">
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
                                                <li><a href="{{ route ('dashboard') }}">My Page</a></li>
                                                <li><a href="{{ route ('dashboard')}}">Doctors</a></li>
                                                <li><a href="{{ route ('dashboard')}}">Services</a></li>
                                                <li><a href="{{ route ('dashboard')}}">Contact Us</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <!-- Profile and Logout Buttons -->

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
                <div class="col-lg-2 col-12"></div>
                @elseif (Auth::guard('doctor')->check())
                <header class="header">
                <div class="header-inner">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <!-- Logo -->
                        <div class="col-auto">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('img/logo.png') }}" alt="Mediplus Logo"></a>
                            </div>
                        </div>
                        <!-- Contact Info -->
                        <div class="col-auto">
                            <ul class="top-contact d-flex align-items-center gap-3 mb-0">
                                <li><i class="fa fa-phone"></i> +880 1234 56789</li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:support@yourmail.com">support@yourmail.com</a></li>
                            </ul>
                        </div>
                        <!-- Profile and Logout Buttons -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="col-auto">
                                <div class="header-buttons d-flex" style="gap: 20px;">
                                    <a href="{{ route('doctor.deleteAccount') }}" class="btn btn-profile">Delete Account</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-logout">Log Out</button>
                                    </form>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
                </header>

                @elseif (Auth::guard('assistant')->check())
                <header class="header">
                <div class="header-inner">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <!-- Logo -->
                        <div class="col-auto">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('img/logo.png') }}" alt="Mediplus Logo"></a>
                            </div>
                        </div>
                        <!-- Contact Info -->
                        <div class="col-auto">
                            <ul class="top-contact d-flex align-items-center gap-3 mb-0">
                                <li><i class="fa fa-phone"></i> +880 1234 56789</li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:support@yourmail.com">support@yourmail.com</a></li>
                            </ul>
                        </div>
                        <!-- Profile and Logout Buttons -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="col-auto">
                                <div class="header-buttons d-flex" style="gap: 20px;">
                                    <a href="{{ route('assistant.deleteAccount') }}" class="btn btn-profile">Delete Account</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-logout">Log Out</button>
                                    </form>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
                </header>

                @elseif (Auth::guard('receptionist')->check())
                <header class="header">
                <div class="header-inner">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <!-- Logo -->
                        <div class="col-auto">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('img/logo.png') }}" alt="Mediplus Logo"></a>
                            </div>
                        </div>
                        <!-- Contact Info -->
                        <div class="col-auto">
                            <ul class="top-contact d-flex align-items-center gap-3 mb-0">
                                <li><i class="fa fa-phone"></i> +880 1234 56789</li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:support@yourmail.com">support@yourmail.com</a></li>
                            </ul>
                        </div>
                        <!-- Profile and Logout Buttons -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="col-auto">
                                <div class="header-buttons d-flex" style="gap: 20px;">
                                    <a href="{{ route('receptionist.deleteAccount') }}" class="btn btn-profile">Delete Account</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-logout">Log Out</button>
                                    </form>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
                </header>
            @else
            <p class="text-center text-gray-500">No specific role detected. Please contact support.</p>
            @endif


            <section class="Feautes section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                        </div>
                    </div>
                </section>

            <!-- Start Schedule Area -->
            <section class="schedule py-12">
                <div class="container">
                    <div class="schedule-inner">
                        <div class="row">
                            {{-- Role-Specific Buttons --}}
                            @if (Auth::guard('doctor')->check())
                            <section class="schedule">
    <div class="container">
        <div class="doctor-buttons-grid">
            <!-- Button 1 -->
            <div class="single-schedule">
                <div class="inner">
                    <div class="icon"><i class="icofont-user"></i></div>
                    <h4>Scheduled Appointments</h4>
                    <p>Check all your scheduled appointments</p>
                    <a href="{{ route('doctor.viewAllAppointments') }}" class="btn">View</a>
                </div>
            </div>
            <!-- Button 2 -->
            <div class="single-schedule">
                <div class="inner">
                    <div class="icon"><i class="icofont-hospital"></i></div>
                    <h4>View Patients</h4>
                    <p>Manage your patient records</p>
                    <a href="{{ route('doctor.viewPatients') }}" class="btn">View</a>
                </div>
            </div>
            <!-- Button 3 -->
            <div class="single-schedule">
                <div class="inner">
                    <div class="icon"><i class="icofont-file-document"></i></div>
                    <h4>Create Reports</h4>
                    <p>Create medical reports for patients</p>
                    <a href="{{ route('doctor.showCreateReportForm') }}" class="btn">View</a>
                </div>
            </div>
            <!-- Button 4 -->
            <div class="single-schedule">
                <div class="inner">
                    <div class="icon"><i class="icofont-hospital"></i></div>
                    <h4>View Medical Reports</h4>
                    <p>Access and view patient medical reports</p>
                    <a href="{{ route('doctor.viewReports') }}" class="btn">View</a>
                </div>
            </div>
            <!-- Button 5 -->
            <div class="single-schedule">
                <div class="inner">
                    <div class="icon"><i class="icofont-surgeon"></i></div>
                    <h4>Conduct Session</h4>
                    <p>Perform medical procedures or consultations</p>
                    <a href="{{ route('doctor.showOperateForm') }}" class="btn">Start</a>
                </div>
            </div>
            <!-- Button 6 -->
            <div class="single-schedule">
                <div class="inner">
                    <div class="icon"><i class="icofont-team"></i></div>
                    <h4>View Assistants</h4>
                    <p>Manage and view medical assistants</p>
                    <a href="{{ route('doctor.viewAssistants') }}" class="btn">View</a>
                </div>
            </div>
            <div class="single-schedule">
                    <div class="inner">
                        <div class="icon"><i class="icofont-user"></i></div>
                        <h4>View Session</h4>
                        <p>Manage and view Sessions</p>
                        <a href="{{ route('doctor.viewSessions') }}" class="btn">View</a>
                    </div>
                </div>
        </div>
    </div>
</section>

                            @elseif (Auth::guard('assistant')->check())
                            <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-schedule first">
                                        <div class="inner">
                                            <div class="icon">
                                                <i class="icofont-calendar"></i>
                                            </div>
                                            <div class="single-content">
                                                <h4>View Appointments</h4>
                                                <p>Manage all appointment requests</p>
                                                <a href="{{ route('assistant.viewAllAppointments') }}" class="btn">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-schedule middle">
                                        <div class="inner">
                                            <div class="icon">
                                                <i class="icofont-stethoscope"></i>
                                            </div>
                                            <div class="single-content">
                                                <h4>View Sessions</h4>
                                                <p>Check the current sessions</p>
                                                <a href="{{ route('assistant.viewSessions') }}" class="btn">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12 col-12">
                                    <div class="single-schedule last">
                                        <div class="inner">
                                            <div class="icon">
                                                <i class="icofont-doctor"></i>
                                            </div>
                                            <div class="single-content">
                                                <h4>Change Doctor</h4>
                                                <p>Request to change doctor if needed</p>
                                                <a href="{{ route('assistant.changeDoctorForm') }}" class="btn">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif (Auth::guard('receptionist')->check())
                            <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-schedule first">
                                        <div class="inner">
                                            <div class="icon">
                                                <i class="icofont-clock-time"></i>
                                            </div>
                                            <div class="single-content">
                                                <h4>View Appointment Requests</h4>
                                                <p>Manage patient appointment requests</p>
                                                <a href="{{ route('receptionists.viewAppointments') }}" class="btn">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-schedule middle">
                                        <div class="inner">
                                            <div class="icon">
                                                <i class="icofont-calendar"></i>
                                            </div>
                                            <div class="single-content">
                                                <h4>Scheduled Appointments</h4>
                                                <p>Check all your scheduled appointments</p>
                                                <a href="{{ route('receptionists.viewAllAppointments') }}" class="btn">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                            @elseif (Auth::guard('patient')->check())
                            <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-schedule first">
                                        <div class="inner">
                                            <div class="icon">
                                                <i class="icofont-hospital"></i>
                                            </div>
                                            <div class="single-content">
                                                <h4>Scheduled Appointments</h4>
                                                <p>Check all your scheduled appointments</p>
                                                <a href="{{ route('patients.viewAppointments') }}" class="btn">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-schedule middle">
                                        <div class="inner">
                                            <div class="icon">
                                                <i class="icofont-calendar"></i>
                                            </div>
                                            <div class="single-content">
                                                <h4>Request Appointment</h4>
                                                <p>Request a new appointment</p>
                                                <a href="{{ route('patient.requestAppointmentForm') }}" class="btn">Request</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12 col-12">
                                    <div class="single-schedule last">
                                        <div class="inner">
                                            <div class="icon">
                                                <i class="icofont-file-document"></i>
                                            </div>
                                            <div class="single-content">
                                                <h4>Medical Reports</h4>
                                                <p>Check your medical reports</p>
                                                <a href="{{ route('patients.viewReports') }}" class="btn">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-schedule middle">
                                        <div class="inner">
                                            <div class="icon">
                                                <i class="icofont-calendar"></i>
                                            </div>
                                            <div class="single-content">
                                                <h4>Appointment Requests</h4>
                                                <p>View your appointment requests</p>
                                                <a href="{{ route('patients.viewAppointmentRequests') }}" class="btn">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-----Checking delete button-->
                            @else
                                <p class="text-center text-gray-500">No specific role detected. Please contact support.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Schedule Area -->
            @if (Auth::guard('doctor')->check())
<footer class="footer footer-doctor">
@else
<footer class="footer">
@endif
    <div class="container">
    </div>
</footer>

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