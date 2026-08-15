<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Pengelolaan Sampah</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;

            font-family: Arial, Helvetica, sans-serif;

            background: #eeeeee;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 20px;
        }


        /* ==============================
           CONTAINER UTAMA
        ============================== */

        .login-container {
            width: 100%;
            max-width: 900px;

            height: 545px;

            background: white;

            display: flex;

            border-radius: 6px;

            overflow: hidden;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.18);
        }


        /* ==============================
           BAGIAN KIRI - POSTER
        ============================== */

        .poster-section {
            width: 50%;

            height: 100%;

            position: relative;

            overflow: hidden;
        }


        .poster-section img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            display: block;
        }


        /* ==============================
           BAGIAN KANAN
        ============================== */

        .form-section {
            width: 50%;

            height: 100%;

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 35px 50px;
        }


        .form-content {
            width: 100%;

            max-width: 315px;

            text-align: center;
        }


        /* ==============================
           LOGO
        ============================== */

        .login-logo {
            width: 78px;
            height: 78px;

            margin: 0 auto 12px;

            border-radius: 50%;

            border: 1px solid #dddddd;

            background: #ffffff;

            display: flex;

            align-items: center;
            justify-content: center;

            box-shadow:
                0 2px 5px rgba(0, 0, 0, 0.04);
        }


        .login-logo img {
            width: 52px;
            height: 52px;

            object-fit: contain;
        }


        /* ==============================
           JUDUL
        ============================== */

        .welcome-title {
            font-size: 20px;

            font-weight: 700;

            color: #111111;

            margin-bottom: 5px;
        }


        .welcome-subtitle {
            font-size: 12px;

            color: #aaaaaa;

            margin-bottom: 27px;
        }


        /* ==============================
           FORM
        ============================== */

        .form-group {
            text-align: left;

            margin-bottom: 18px;
        }


        .form-group label {
            display: block;

            font-size: 13px;

            font-weight: 600;

            color: #222222;

            margin-bottom: 6px;
        }


        .input-wrapper {
            position: relative;

            width: 100%;
        }


        .input-icon {
            position: absolute;

            left: 10px;

            top: 50%;

            transform: translateY(-50%);

            color: #aaaaaa;

            font-size: 16px;

            z-index: 2;
        }


        .form-control {
            width: 100%;

            height: 30px;

            border: 1px solid #cccccc;

            border-radius: 2px;

            background: #ffffff;

            padding: 0 35px;

            font-size: 12px;

            outline: none;

            transition: 0.2s;
        }


        .form-control:focus {
            border-color: #087c27;

            box-shadow:
                0 0 0 2px rgba(8, 124, 39, 0.08);
        }


        .form-control::placeholder {
            color: #bdbdbd;
        }


        /* ==============================
           PASSWORD TOGGLE
        ============================== */

        .password-toggle {
            position: absolute;

            right: 9px;

            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            color: #aaaaaa;

            cursor: pointer;

            font-size: 14px;
        }


        .password-toggle:hover {
            color: #087c27;
        }


        /* ==============================
           REMEMBER + LUPA PASSWORD
        ============================== */

        .form-options {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-top: 4px;

            margin-bottom: 18px;
        }


        .remember {
            display: flex;

            align-items: center;

            gap: 5px;

            font-size: 11px;

            color: #555555;

            cursor: pointer;
        }


        .remember input {
            width: 13px;
            height: 13px;

            cursor: pointer;

            accent-color: #087c27;
        }


        .forgot-password {
            font-size: 11px;

            color: #087c27;

            text-decoration: none;
        }


        .forgot-password:hover {
            text-decoration: underline;
        }


        /* ==============================
           TOMBOL LOGIN
        ============================== */

        .login-button {
            width: 100%;

            height: 35px;

            border: none;

            border-radius: 2px;

            background: #007b16;

            color: white;

            font-size: 13px;

            font-weight: 700;

            cursor: pointer;

            transition: 0.2s;
        }


        .login-button:hover {
            background: #006412;
        }


        .login-button i {
            margin-right: 5px;
        }


        /* ==============================
           ATAU LOGIN
        ============================== */

        .or-login {
            margin: 17px 0 12px;

            font-size: 11px;

            color: #aaaaaa;
        }


        /* ==============================
           GOOGLE
        ============================== */

        .google-button {
            width: 100%;

            height: 33px;

            border: 1px solid #cccccc;

            border-radius: 3px;

            background: #ffffff;

            color: #222222;

            font-size: 12px;

            font-weight: 600;

            cursor: pointer;

            transition: 0.2s;
        }


        .google-button:hover {
            background: #f7f7f7;
        }


        .google-button i {
            margin-right: 7px;

            color: #4285f4;
        }


        /* ==============================
           ADMINISTRATOR
        ============================== */

        .register-text {
            margin-top: 20px;

            font-size: 11px;

            color: #aaaaaa;
        }


        .register-text a {
            color: #087c27;

            text-decoration: none;

            font-weight: 600;
        }


        .register-text a:hover {
            text-decoration: underline;
        }


        /* ==============================
           ALERT
        ============================== */

        .alert {
            text-align: left;

            padding: 8px 10px;

            margin-bottom: 15px;

            border-radius: 3px;

            font-size: 11px;
        }


        .alert-success {
            color: #155724;

            background: #d4edda;

            border: 1px solid #c3e6cb;
        }


        .alert-danger {
            color: #721c24;

            background: #f8d7da;

            border: 1px solid #f5c6cb;
        }


        .error-list {
            margin-top: 4px;

            padding-left: 17px;
        }


        /* ==============================
           RESPONSIVE
        ============================== */

        @media (max-width: 750px) {

            body {
                padding: 10px;
            }


            .login-container {
                height: auto;

                min-height: 600px;

                max-width: 420px;
            }


            .poster-section {
                display: none;
            }


            .form-section {
                width: 100%;

                padding: 40px;
            }

        }


        @media (max-width: 400px) {

            .form-section {
                padding: 30px 25px;
            }

        }

    </style>

</head>


<body>


<div class="login-container">


    {{-- =====================================================
         BAGIAN KIRI
    ====================================================== --}}

    <div class="poster-section">

        <img
            src="{{ asset('images/poster.png') }}"
            alt="Pengelolaan Sampah Kampung Panyalahan"
        >

    </div>



    {{-- =====================================================
         BAGIAN KANAN
    ====================================================== --}}

    <div class="form-section">

        <div class="form-content">


            {{-- LOGO --}}

            <div class="login-logo">

                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Logo Pengelolaan Sampah"
                >

            </div>


            {{-- JUDUL --}}

            <h1 class="welcome-title">
                Selamat Datang Kembali!
            </h1>

            <p class="welcome-subtitle">
                Silahkan Login untuk melanjutkan
            </p>



            {{-- SUCCESS --}}

            @if (session('success'))

                <div class="alert alert-success">

                    <i class="bi bi-check-circle"></i>

                    {{ session('success') }}

                </div>

            @endif



            {{-- ERROR --}}

            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        Login gagal
                    </strong>

                    <ul class="error-list">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif



            {{-- FORM LOGIN --}}

            <form
                action="{{ route('login.process') }}"
                method="POST"
            >

                @csrf


                {{-- USERNAME --}}

                <div class="form-group">

                    <label for="username">
                        Username
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-person-fill input-icon"></i>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            class="form-control"
                            placeholder="Masukan Username"
                            value="{{ old('username') }}"
                            autocomplete="username"
                            required
                        >

                    </div>

                    @error('username')

                        <small style="color:#dc3545;">
                            {{ $message }}
                        </small>

                    @enderror

                </div>



                {{-- PASSWORD --}}

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-key-fill input-icon"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukan Password"
                            autocomplete="current-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword()"
                        >

                            <i
                                class="bi bi-eye"
                                id="passwordIcon"
                            ></i>

                        </button>

                    </div>

                    @error('password')

                        <small style="color:#dc3545;">
                            {{ $message }}
                        </small>

                    @enderror

                </div>



                {{-- REMEMBER + LUPA PASSWORD --}}

                <div class="form-options">

                    <label class="remember">

                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            {{ old('remember') ? 'checked' : '' }}
                        >

                        <span>
                            Ingat saya
                        </span>

                    </label>


                    <a
                        href="#"
                        class="forgot-password"
                        onclick="return false;"
                    >
                        Lupa password?
                    </a>

                </div>



                {{-- LOGIN --}}

                <button
                    type="submit"
                    class="login-button"
                >

                    <i class="bi bi-box-arrow-in-right"></i>

                    LOGIN

                </button>

            </form>



            {{-- ATAU --}}

            <div class="or-login">
                atau login dengan
            </div>



            {{-- GOOGLE --}}

            <button
                type="button"
                class="google-button"
                onclick="alert('Login dengan Google belum diaktifkan.')"
            >

                <i class="bi bi-google"></i>

                Login dengan Google

            </button>



            {{-- ADMINISTRATOR --}}

            <div class="register-text">

                Belum punya akun?

                <a
                    href="#"
                    onclick="return false;"
                >
                    Hubungi administrator
                </a>

            </div>


        </div>

    </div>

</div>



<script>

    function togglePassword()
    {
        const password =
            document.getElementById('password');

        const icon =
            document.getElementById('passwordIcon');


        if (password.type === 'password') {

            password.type = 'text';

            icon.classList.remove('bi-eye');

            icon.classList.add('bi-eye-slash');

        } else {

            password.type = 'password';

            icon.classList.remove('bi-eye-slash');

            icon.classList.add('bi-eye');

        }
    }

</script>


</body>

</html>