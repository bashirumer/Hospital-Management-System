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
    <title>{{ $appointments->first()->doctor->Name ?? 'Doctor' }}'s Appointments</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Preloader -->
    <div class="preloader" id="preloader">
        <div class="loader">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Header -->
    <header class="header">
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
    </header>
    <!-- End Header -->

    <!-- Appointments List -->
    <div class="container my-5">
        <h1 class="text-center">
            {{ $appointments->first()->doctor->Name ?? 'Doctor' }}'s Scheduled Appointments
        </h1>
        @if ($appointments->isEmpty())
            <p class="text-center">No Scheduled Appointments Found for {{ $appointments->first()->doctor->Name ?? 'Doctor' }}.</p>
        @else
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <input type="text" id="search-appointments" class="form-control w-50" placeholder="Search by Patient Name or ID" oninput="searchAppointments()">
                <div>
                    <button class="btn btn-primary" onclick="searchAppointments()">Search</button>
                    <button class="btn btn-secondary" onclick="sortAppointments()">Sort by Date and Time</button>
                </div>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                    </tr>
                </thead>
                <tbody id="appointments-list">
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->PatientID }}</td>
                            <td>{{ $appointment->patient->Name ?? 'Unknown' }}</td>
                            <td>{{ $appointment->Date }}</td>
                            <td>{{ $appointment->Time }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Back to Dashboard Button -->
            <a href="{{ route('dashboard') }}" class="btn btn-success mt-4">Back to Dashboard</a>
        @endif
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
    <script>
        // Search Appointments
        function searchAppointments() {
            const query = document.getElementById('search-appointments').value.toLowerCase();
            const rows = document.querySelectorAll('#appointments-list tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        }

        // Sort Appointments by Date and Time
        function sortAppointments() {
            const table = document.querySelector('#appointments-list');
            const rows = Array.from(table.querySelectorAll('tr'));
            rows.sort((a, b) => {
                const dateA = new Date(`${a.cells[2].textContent} ${a.cells[3].textContent}`);
                const dateB = new Date(`${b.cells[2].textContent} ${b.cells[3].textContent}`);
                return dateA - dateB;
            });
            rows.forEach(row => table.appendChild(row));
        }
    </script>
</body>
</html>