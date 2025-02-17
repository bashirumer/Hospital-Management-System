<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Reset Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #eef2f3; /* Light aesthetic background color */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            display: flex;
            width: 900px;
            max-width: 100%;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .form-section {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .info-section {
            flex: 1;
            background-color: #2b83ff;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 40px;
        }

        .info-section h1 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .info-section p {
            font-size: 16px;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .info-section a {
            text-decoration: none;
            color: #2b83ff;
            background-color: #ffffff;
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .info-section a:hover {
            background-color: #e0e0e0;
        }

        .form-section h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-section label {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }

        .form-section input,
        .form-section select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background-color: #ffffff;
            color: #333;
        }

        .form-section input:focus,
        .form-section select:focus {
            outline: none;
            border-color: #2b83ff;
            box-shadow: 0 0 4px rgba(43, 131, 255, 0.4);
        }

        .form-section a {
            font-size: 12px;
            color: #2b83ff;
            text-decoration: none;
            margin-bottom: 15px;
        }

        .form-section a:hover {
            text-decoration: underline;
        }

        .form-section button {
            width: 100%;
            padding: 15px;
            background-color: #2b83ff;
            color: #ffffff;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            text-transform: uppercase;
        }

        .form-section button:hover {
            background-color: #1a6ad1;
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(26, 106, 209, 0.4);
        }

        /* Adjustments for Responsiveness */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .info-section {
                padding: 20px;
            }

            .form-section {
                padding: 20px;
            }
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Form Section -->
        <div class="form-section">
            <h2>Register</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <label for="name">Name</label>
                <input id="name" type="text" name="name" required autofocus />

                <!-- Email -->
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required />

                <!-- Password -->
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required />

                <!-- Confirm Password -->
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required />

                <!-- Role -->
                <label for="role">Role</label>
                <select name="role" id="role" required onchange="showRoleFields()">
                    <option value="">Select Role</option>
                    <option value="doctor">Doctor</option>
                    <option value="assistant">Assistant</option>
                    <option value="receptionist">Receptionist</option>
                    <option value="patient">Patient</option>
                </select>

                <!-- Doctor Specific Fields -->
                <div id="doctor-fields" class="hidden">
                    <label for="specialization">Specialization</label>
                    <input id="specialization" type="text" name="specialization" />

                    <label for="phone">Phone</label>
                    <input id="phone" type="text" name="doctor_phone" />

                    <label for="section_name">Section Name</label>
                    <select id="section_name" name="doctor_section_name">
                        <option value="">Select Section</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->SectionID }}">{{ $section->Name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Assistant Specific Fields -->
                <div id="assistant-fields" class="hidden">
                    <label for="phone">Phone</label>
                    <input id="phone" type="text" name="assistant_phone" />

                    <label for="section_name">Section Name</label>
                    <select id="section_name" name="assistant_section_name">
                        <option value="">Select Section</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->SectionID }}">{{ $section->Name }}</option>
                        @endforeach
                    </select>

                    <label for="doctor_name">Doctor Name</label>
                    <select id="doctor_name" name="doctor_name">
                        <option value="">Select Doctor</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->DoctorID }}">{{ $doctor->Name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Patient Specific Fields -->
                <div id="patient-fields" class="hidden">
                    <label for="date_of_birth">Date of Birth</label>
                    <input id="date_of_birth" type="date" name="date_of_birth" />

                    <label for="address">Address</label>
                    <input id="address" type="text" name="address" />

                    <label for="phone">Phone</label>
                    <input id="phone" type="text" name="patient_phone" />
                </div>

                <!-- Receptionist Specific Fields -->
                <div id="receptionist-fields" class="hidden">
                    <label for="phone">Phone</label>
                    <input id="phone" type="text" name="receptionist_phone" />
                </div>

                <a href="{{ route('login') }}">Already registered? Log in</a>
                <button type="submit">Register</button>
            </form>
        </div>

        <!-- Info Section -->
        <div class="info-section">
            <h1>Join Our Care Community</h1>
            <p>Be part of a seamless healthcare experience. Register now to access personalized tools for patient management, scheduling, and more.</p>
            <a href="{{ route('login') }}">Sign In</a>
        </div>
    </div>

    <script>
        function showRoleFields() {
            const role = document.getElementById("role").value;
            document.getElementById("doctor-fields").classList.add("hidden");
            document.getElementById("assistant-fields").classList.add("hidden");
            document.getElementById("patient-fields").classList.add("hidden");
            document.getElementById("receptionist-fields").classList.add("hidden");

            if (role === "doctor") {
                document.getElementById("doctor-fields").classList.remove("hidden");
            } else if (role === "assistant") {
                document.getElementById("assistant-fields").classList.remove("hidden");
            } else if (role === "patient") {
                document.getElementById("patient-fields").classList.remove("hidden");
            } else if (role === "receptionist") {
                document.getElementById("receptionist-fields").classList.remove("hidden");
            }
        }
    </script>
</body>
</html>