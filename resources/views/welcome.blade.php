<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;

            background:
                radial-gradient(
                    circle at 15% 20%,
                    rgba(79, 70, 229, 0.35),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 85% 80%,
                    rgba(6, 182, 212, 0.25),
                    transparent 30%
                ),
                #050816;

            color: white;
        }

        /* =========================
           BACKGROUND GRID
        ========================= */

        body::before {
            content: "";

            position: fixed;
            inset: 0;

            background-image:
                linear-gradient(
                    rgba(255, 255, 255, 0.025) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(255, 255, 255, 0.025) 1px,
                    transparent 1px
                );

            background-size: 50px 50px;

            pointer-events: none;
        }

        /* =========================
           BACKGROUND GLOW
        ========================= */

        .orb {
            position: fixed;

            border-radius: 50%;

            filter: blur(90px);

            pointer-events: none;
        }

        .orb-one {
            width: 300px;
            height: 300px;

            background: #4f46e5;

            top: -120px;
            left: -120px;

            opacity: 0.35;
        }

        .orb-two {
            width: 300px;
            height: 300px;

            background: #06b6d4;

            right: -120px;
            bottom: -120px;

            opacity: 0.25;
        }

        /* =========================
           LOGIN CARD
        ========================= */

        .login-card {
            position: relative;

            width: 430px;

            padding: 50px 48px;

            background: rgba(15, 23, 42, 0.78);

            border: 1px solid rgba(255, 255, 255, 0.1);

            border-radius: 26px;

            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);

            box-shadow:
                0 30px 80px rgba(0, 0, 0, 0.55),
                inset 0 1px 0 rgba(255, 255, 255, 0.06);

            animation: appear 0.7s ease;
        }

        @keyframes appear {
            from {
                opacity: 0;
                transform: translateY(25px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* =========================
           LOGO
        ========================= */

        .logo {
            width: 90px;
            height: 90px;

            margin: 0 auto 25px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: transparent;

            border: none;

            box-shadow: none;
        }

        .logo img {
            width: 100%;
            height: 100%;

            object-fit: contain;

            background: transparent;

            filter:
                drop-shadow(
                    0 0 20px
                    rgba(255, 50, 50, 0.35)
                );
        }

        /* =========================
           WELCOME
        ========================= */

        .welcome {
            text-align: center;

            margin-bottom: 35px;
        }

        .welcome h1 {
            font-size: 32px;

            font-weight: 800;

            letter-spacing: -1px;
        }

        /* =========================
           ERROR MESSAGE
        ========================= */

        .error-message {
            margin-bottom: 22px;

            padding: 12px 14px;

            border: 1px solid rgba(248, 113, 113, 0.25);

            border-radius: 12px;

            background: rgba(127, 29, 29, 0.2);

            color: #fca5a5;

            font-size: 13px;

            line-height: 1.5;
        }

        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;

            margin-bottom: 9px;

            color: #cbd5e1;

            font-size: 14px;

            font-weight: 600;
        }

        .input-wrapper {
            position: relative;
        }

        /* Icon kiri */

        .input-icon {
            position: absolute;

            left: 17px;
            top: 50%;

            transform: translateY(-50%);

            color: #64748b;

            font-size: 17px;

            pointer-events: none;
        }

        /* Input */

        input {
            width: 100%;

            height: 54px;

            padding:
                0
                50px
                0
                48px;

            border-radius: 13px;

            border: 1px solid rgba(255, 255, 255, 0.1);

            background: rgba(2, 6, 23, 0.65);

            color: white;

            outline: none;

            font-size: 14px;

            transition: 0.25s ease;
        }

        input::placeholder {
            color: #475569;
        }

        input:focus {
            border-color: #6366f1;

            box-shadow:
                0 0 0 3px rgba(99, 102, 241, 0.12),
                0 0 25px rgba(99, 102, 241, 0.08);
        }

        /* =========================
           SHOW / HIDE PASSWORD
        ========================= */

        .toggle-password {
            position: absolute;

            right: 15px;
            top: 50%;

            transform: translateY(-50%);

            width: 32px;
            height: 32px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: none;

            border-radius: 8px;

            background: transparent;

            color: #64748b;

            font-size: 18px;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .toggle-password:hover {
            color: #a5b4fc;

            background: rgba(99, 102, 241, 0.1);
        }

        .toggle-password:active {
            transform:
                translateY(-50%)
                scale(0.9);
        }

        /* =========================
           LOGIN BUTTON
        ========================= */

        .login-button {
            width: 100%;

            height: 54px;

            margin-top: 8px;

            border: none;

            border-radius: 13px;

            background:
                linear-gradient(
                    135deg,
                    #6366f1,
                    #4f46e5
                );

            color: white;

            font-size: 15px;

            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 12px 30px
                rgba(79, 70, 229, 0.35);

            transition: all 0.25s ease;
        }

        .login-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 18px 40px
                rgba(79, 70, 229, 0.5);
        }

        .login-button:active {
            transform: translateY(0);
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 500px) {

            .login-card {
                width: calc(100% - 30px);

                padding:
                    45px 25px;
            }

            .welcome h1 {
                font-size: 28px;
            }

        }
    </style>
</head>

<body>

    <!-- Background Glow -->

    <div class="orb orb-one"></div>

    <div class="orb orb-two"></div>


    <!-- Login Card -->

    <div class="login-card">

        <!-- Logo -->

        <div class="logo">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo"
            >

        </div>


        <!-- Welcome -->

        <div class="welcome">

            <h1>
                Welcome
            </h1>

        </div>


        <!-- Login Error -->

        @if ($errors->any())

            <div class="error-message">

                {{ $errors->first() }}

            </div>

        @endif


        <!-- Login Form -->

        <form
            method="POST"
            action="{{ route('login.process') }}"
        >

            @csrf


            <!-- Email -->

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        ◉
                    </span>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        autocomplete="email"
                        required
                        autofocus
                    >

                </div>

            </div>


            <!-- Password -->

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        ◆
                    </span>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >


                    <!-- Show / Hide Password -->

                    <button
                        type="button"
                        class="toggle-password"
                        onclick="togglePassword()"
                        aria-label="Show password"
                        title="Show password"
                    >
                        👁
                    </button>

                </div>

            </div>


            <!-- Login Button -->

            <button
                type="submit"
                class="login-button"
            >
                Sign In
            </button>

        </form>

    </div>


    <!-- Password Script -->

    <script>

        function togglePassword() {

            const password =
                document.getElementById('password');

            const button =
                document.querySelector('.toggle-password');


            if (password.type === 'password') {

                password.type = 'text';

                button.textContent = '🙈';

                button.setAttribute(
                    'aria-label',
                    'Hide password'
                );

                button.setAttribute(
                    'title',
                    'Hide password'
                );

            } else {

                password.type = 'password';

                button.textContent = '🐵';

                button.setAttribute(
                    'aria-label',
                    'Show password'
                );

                button.setAttribute(
                    'title',
                    'Show password'
                );

            }

        }

    </script>

</body>

</html>