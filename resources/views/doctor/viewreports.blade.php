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
    <title>Medical Reports</title>

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

    <!-- Reports List -->
    <div class="container my-5">
        <h1 class="text-center fw-bold">Medical Reports</h1>
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <input type="text" id="searchInput" class="form-control w-50" placeholder="Search by Patient Name or Session ID">
            <div>
                <select id="filterPatient" class="form-select w-auto" style="display: inline-block; padding: 10px; border-radius: 5px; font-size: 14px;">
                    <option value="">Filter by Patient</option>
                    @foreach ($reports->unique('patient.Name') as $report)
                        <option value="{{ strtolower($report->patient->Name ?? '') }}">{{ $report->patient->Name ?? 'Unknown' }}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary ms-2" onclick="sortReportsByDate()">Sort by Date</button>
            </div>
        </div>
        @if ($reports->isEmpty())
            <p class="text-center">No medical reports found.</p>
        @else
            <table class="table table-striped table-bordered" id="reportTable">
                <thead>
                    <tr>
                        <th onclick="sortTable(0)">Date</th>
                        <th onclick="sortTable(1)">Patient Name</th>
                        <th onclick="sortTable(2)">Session ID</th>
                        <th onclick="sortTable(3)">Content</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td>{{ $report->ReportDate }}</td>
                            <td>{{ $report->patient->Name ?? 'Unknown' }}</td>
                            <td>{{ $report->SessionID }}</td>
                            <td>{{ $report->Content }}</td>
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
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#reportTable tbody tr');
            rows.forEach(row => {
                const patientName = row.cells[1].textContent.toLowerCase();
                const sessionID = row.cells[2].textContent.toLowerCase();
                row.style.display = patientName.includes(searchValue) || sessionID.includes(searchValue) ? '' : 'none';
            });
        });

        document.getElementById('filterPatient').addEventListener('change', function() {
            const filterValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#reportTable tbody tr');
            rows.forEach(row => {
                const patientCell = row.cells[1].textContent.toLowerCase();
                row.style.display = !filterValue || patientCell === filterValue ? '' : 'none';
            });
        });

        function sortReportsByDate() {
            const table = document.getElementById('reportTable');
            const rows = Array.from(table.tBodies[0].rows);

            rows.sort((rowA, rowB) => {
                const dateA = new Date(rowA.cells[0].textContent);
                const dateB = new Date(rowB.cells[0].textContent);
                return dateA - dateB;
            });

            rows.forEach(row => table.tBodies[0].appendChild(row));
        }

        function printReport(reportId) {
            alert('Printing report with ID: ' + reportId);
            // Implement your print logic here
        }

        function downloadReport(reportId) {
            alert('Downloading report with ID: ' + reportId);
            // Implement your download logic here
        }
    </script>
</body>
</html>