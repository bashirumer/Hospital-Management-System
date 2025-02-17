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
    <title>{{ $sessions->first()->doctor->Name ?? 'Doctor' }}'s Sessions</title>
    
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

    <!-- Sessions List -->
    <div class="container my-5">
        <h1 class="text-center">
            {{ $sessions->first()->doctor->Name ?? 'Doctor' }}'s Scheduled Sessions
        </h1>
        @if ($sessions->isEmpty())
            <p class="text-center">No Scheduled Sessions Found for {{ $sessions->first()->doctor->Name ?? 'Doctor' }}.</p>
        @else
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <input type="text" id="search-sessions" class="form-control w-50" placeholder="Search by Patient Name or Session ID" oninput="searchSessions()">
                <div>
                    <button class="btn btn-primary" onclick="searchSessions()">Search</button>
                    <button class="btn btn-secondary" onclick="sortSessions()">Sort by Date and Time</button>
                </div>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Session ID</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Patient Name</th>
                    </tr>
                </thead>
                <tbody id="sessions-list">
                    @foreach ($sessions as $session)
                        <tr>
                            <td>{{ $session->SessionID }}</td>
                            <td>{{ $session->SessionDate }}</td>
                            <td>{{ $session->SessionTime }}</td>
                            <td>{{ $session->patient->Name ?? 'Unknown' }}</td>
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
        // Search Sessions
        function searchSessions() {
            const query = document.getElementById('search-sessions').value.toLowerCase();
            const rows = document.querySelectorAll('#sessions-list tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        }

        // Sort Sessions by Date and Time
        function sortSessions() {
            const table = document.querySelector('#sessions-list');
            const rows = Array.from(table.querySelectorAll('tr'));
            rows.sort((a, b) => {
                const dateA = new Date(`${a.cells[1].textContent} ${a.cells[2].textContent}`);
                const dateB = new Date(`${b.cells[1].textContent} ${b.cells[2].textContent}`);
                return dateA - dateB;
            });
            rows.forEach(row => table.appendChild(row));
        }
    </script>
</body>
</html>