<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="logo" aria-label="Logo"></div>

        <form method="POST" action="{{ route('login') }}" class="form-box">
            @csrf

            @error('username')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <div class="input-group">
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Sign in</button>

            <div class="login-links">
                <a href="#">Recuperar contraseña</a>
                <a href="#">Cambiar contraseña</a>
            </div>
        </form>
    </div>

    <div class="footer">Wound Care © 2014</div>
</body>
</html>
