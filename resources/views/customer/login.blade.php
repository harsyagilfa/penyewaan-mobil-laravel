<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ asset('customer/css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            @if (session('status'))
            <div class="alert-box">
                {{ session('message') }}
                <span class="close-btn">&times;</span>
            </div>
            @endif
            @if (session('sukses'))
            <div class="alert-box2">
                {{ session('message') }}
                <span class="close-btn">&times;</span>
            </div>
            @endif
            <form action=""  method="post">
                @csrf
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
                <div class="daftar-disini">
                    <p>Belum memiliki akun? <a href="{{ route('customer.register') }}"  >Daftar disini</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('customer/js/login.js') }}"></script>
</body>
</html>
