<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Kasir Cafe - POS Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/pages/auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body class="bg-light">
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #e0f7fa 0%, #b3e5fc 25%, #81d4fa 50%, #4fc3f7 75%, #2196f3 100%); position: relative;">
        <div class="row w-100 justify-content-center" style="position: relative; z-index: 1;">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="card shadow-lg border-0 rounded-lg animate__animated animate__fadeInUp animate__delay-1s" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px);">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                           
                            <h1 class="display-5 text-white fw-bold mb-2 cafe-title animate__animated animate__fadeInDown animate__delay-0.5s" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">POS Cafe</h1>
                            <div class="cafe-icons mb-3 animate__animated animate__bounceIn animate__delay-0.7s">
                                <i class="bi bi-cup-hot-fill text-info me-2" style="font-size: 2.5rem; filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.5));"></i>
                                <i class="bi bi-shop text-info" style="font-size: 2.5rem; filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.5));"></i>
                            </div>
                            <h2 class="card-title mt-3 text-dark fw-bold animate__animated animate__fadeInLeft animate__delay-1.2s">Login Kasir</h2>
                            <p class="text-muted lead animate__animated animate__fadeInRight animate__delay-1.4s">Masuk ke Sistem POS Cafe dengan Email dan Kata Sandi Anda</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}" class="user animate__animated animate__fadeInUp animate__delay-1.6s">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="Email Kasir" required autocomplete="email" autofocus>
                                <label for="email"><i class="bi bi-person me-2"></i>Email Kasir</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" required
                                    autocomplete="current-password" placeholder="Kata Sandi Kasir">
                                <label for="password"><i class="bi bi-shield-lock me-2"></i>Kata Sandi Kasir</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Masuk sebagai Kasir
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
