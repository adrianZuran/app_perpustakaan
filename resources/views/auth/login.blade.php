<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Perpustakaan</title>

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px; }
        .login-container { background-color: white; width: 100%; max-width: 400px; padding: 35px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); }
        h1 { text-align: center; margin-bottom: 10px; font-size: 25px; color: #333; }
        .subtitle { text-align: center; color: #777; margin-bottom: 25px; font-size: 14px; }
        label { display: block; margin-bottom: 8px; font-size: 14px; color: #333; }
        input[type="email"], input[type="password"] { width: 100%; padding: 11px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px; }
        input:focus { outline: none; border-color: #2563eb; }
        .checkbox-row { display: flex; align-items: center; gap: 8px; margin-bottom: 20px; }
        .checkbox-row input { cursor: pointer; }
        .checkbox-row label { margin-bottom: 0; cursor: pointer; }
        .btn { width: 100%; padding: 12px; border: none; border-radius: 5px; background-color: #2563eb; color: white; font-size: 15px; cursor: pointer; }
        .btn:hover { background-color: #1d4ed8; }
        .alert-success { background-color: #d1fae5; color: #065f46; padding: 10px; border-radius: 5px; margin-bottom: 15px; font-size: 14px; }
        .error { color: #dc2626; font-size: 13px; margin-top: -10px; margin-bottom: 15px; }
        .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #999; }
        @media (max-width: 480px) { .login-container { padding: 25px; } h1 { font-size: 22px; } }
    </style>
</head>
<body>

    <div class="login-container">
        <h1>📚 Login Admin</h1>
        <p class="subtitle">Sistem Informasi Perpustakaan</p>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan email" required autofocus>

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Masukkan password" required>

            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="checkbox-row">
                <input type="checkbox" name="remember" id="remember" value="1">
                <label for="remember">Ingat saya</label>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>

        <div class="footer">
            &copy; 2026 Sistem Informasi Perpustakaan
        </div>
    </div>

</body>
</html>
```