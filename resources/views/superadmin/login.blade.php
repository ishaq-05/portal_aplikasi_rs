<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Super Admin</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

<div class="login-container">

    <div class="login-card">

        <div class="logo">
            🏥
        </div>

        <h1>Super Admin</h1>

        <p class="subtitle">
            Login untuk mengelola Portal Aplikasi
        </p>

        <form
            method="POST"
            action="{{ route('superadmin.login.submit') }}"
        >

            @csrf

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required
                    autofocus
                >

                @error('email')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <div class="password-wrapper">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        onclick="togglePassword()"
                    >
                        👁
                    </button>

                </div>

                @error('password')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <button type="submit">
                Login
            </button>

        </form>

        <a
            href="{{ route('applications.index') }}"
            class="back"
        >
            ← Kembali ke Portal
        </a>

    </div>

</div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const button = document.querySelector('.toggle-password');

        if (password.type === 'password') {
            password.type = 'text';
            button.textContent = '🙈';
        } else {
            password.type = 'password';
            button.textContent = '👁';
        }
    }
</script>

</body>

</html>