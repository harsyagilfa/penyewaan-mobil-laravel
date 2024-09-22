<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link rel="stylesheet" href="{{ asset('customer/css/register.css') }}">
</head>
<body>
    <div class="register-container">
        <div class="register-box">
            <h2>Register</h2>
            <form action="" method="post" >
                @csrf
                <div class="row">
                    <div class="column">
                        <div class="input-group">
                            <label>Nama Customer</label>
                            <input type="text" id="nama_customer" name="nama_customer" required>
                        </div>
                        <div class="input-group">
                            <label>Usia</label>
                            <input type="number" id="usia" name="usia" required>
                        </div>
                        <div class="input-group">
                            <label>No Telepon</label>
                            <input type="number" id="no_telepon" name="no_telepon" required>
                        </div>
                    </div>
                    <div class="column">
                        <div class="input-group">
                            <label>Username</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div class="input-group">
                            <label>Password</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat" id="alamat" cols="10" rows="3" required></textarea>
                </div>
                <button type="submit">Register</button>
                <div class="daftar-disini">
                    <p>Sudah memiliki akun? <a href="{{ route('customer.login') }}"  >Silahkan Login</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
