
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
            width: 800px;
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
            text-align: center; /* Center-align the text */
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

        .form-section input, .form-section select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-section input:focus, .form-section select:focus {
            outline: none;
            border-color: #2b83ff;
            box-shadow: 0 0 4px rgba(43, 131, 255, 0.4);
        }

        .form-section .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-section .checkbox-container input {
            margin-right: 10px;
            width: auto;
            height: auto;
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
            padding: 10px;
            background-color: #2b83ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-section button:hover {
            background-color: #1a6ad1;
        }

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
    </style>

    <div class="container">
        <!-- Form Section -->
        <div class="form-section">
            <h2>Sign In</h2>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email">Email</label>
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password">Password</label>
                    <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <!-- Role Selection -->
                <div>
                    <label for="role">Role</label>
                    <select name="role" id="role" required>
                        <option value="doctor">Doctor</option>
                        <option value="assistant">Assistant</option>
                        <option value="receptionist">Receptionist</option>
                        <option value="patient">Patient</option>
                    </select>
                </div>

                <!-- Remember Me -->
                <div class="checkbox-container">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Remember me</label>
                </div>

                <!-- Forgot Password -->
                <div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot your password?</a>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit">Log In</button>
            </form>
        </div>

        <!-- Info Section -->
        <div class="info-section">
            <h1>Welcome to Our Care Center</h1>
            <p>
                Discover seamless healthcare management at your fingertips. Join us today to access patient records,
                manage schedules, and enhance your experience with a simple yet powerful tool.
            </p>
            <a href="{{ route('register') }}">Sign Up</a>
        </div>
    </div>

