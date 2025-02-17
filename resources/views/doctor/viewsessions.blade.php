<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Title -->
    <title>View Sessions</title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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

    <!-- Sessions List -->
    <div class="container my-5">
        <h1 class="text-center fw-bold">Your Sessions List</h1> <!-- Made bold -->
        @if ($sessions->isEmpty())
            <p class="text-center">No Sessions Found for You.</p>
        @else
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <input type="text" id="search-sessions" class="form-control w-50" placeholder="Search by Patient Name...">
                <button class="btn btn-primary ms-2" onclick="sortByDateTime()">Sort by Date and Time</button>
            </div>
            <table class="table table-striped table-bordered" id="sessions-list">
                <thead>
                    <tr>
                        <th>Session ID</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Patient Name</th>
                    </tr>
                </thead>
                <tbody>
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
        // Function to search sessions
        function searchSessions() {
            const query = document.getElementById('search-sessions').value.toLowerCase();
            const rows = document.querySelectorAll('#sessions-list tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        }

        // Function to sort sessions by date and time
        function sortByDateTime() {
            const table = document.getElementById('sessions-list');
            const rows = Array.from(table.tBodies[0].rows);

            rows.sort((rowA, rowB) => {
                const dateA = new Date(`${rowA.cells[1].textContent} ${rowA.cells[2].textContent}`);
                const dateB = new Date(`${rowB.cells[1].textContent} ${rowB.cells[2].textContent}`);
                return dateA - dateB;
            });

            rows.forEach(row => table.tBodies[0].appendChild(row));
        }
    </script>
</body>
</html>