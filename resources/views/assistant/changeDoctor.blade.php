<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Title -->
    <title>Change Supervising Doctor</title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <ul class="top-contact" style="list-style: none; display: flex; gap: 20px;">
                            <li><i class="fa fa-phone"></i>+880 1234 56789</li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:support@yourmail.com">support@yourmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->

    <!-- Change Doctor Section -->
    <div class="container my-5">
        <h1 class="text-center fw-bold">Change Supervising Doctor</h1>
        <form action="{{ route('assistant.changeDoctor') }}" method="POST" class="mt-4 p-4 rounded shadow bg-white">
            @csrf

            <!-- Doctor Dropdown -->
            <div class="mb-4">
                <label for="doctor_id" class="form-label fw-bold">Select a Doctor</label>
                <select id="doctor_id" name="doctor_id" class="form-select form-select-lg border-primary" required>
                    <option value="" disabled selected>Select a Doctor</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->DoctorID }}">{{ $doctor->Name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg">Change Doctor</button>
            </div>
        </form>

        <!-- Back to Dashboard Button -->
        <div class="d-flex justify-content-center mt-4">
            <a href="{{ route('dashboard') }}" class="btn btn-success btn-lg">Back to Dashboard</a>
        </div>
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

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>