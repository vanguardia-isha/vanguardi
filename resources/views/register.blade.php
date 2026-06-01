@extends('layouts.main')

@section('title', 'Register - Product List')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

    * { box-sizing: border-box; margin: 0; padding: 0; }

    .auth-wrapper {
        min-height: 100vh;
        background: linear-gradient(160deg, #ffd6e7 0%, #ffb3d1 40%, #ff80b3 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Poppins', sans-serif;
        padding: 20px;
        position: relative;
        overflow: hidden;
    }

    .auth-wrapper::before {
        content: '';
        position: fixed;
        top: -120px; left: -120px;
        width: 350px; height: 350px;
        background: rgba(255,255,255,0.25);
        border-radius: 50%;
        pointer-events: none;
    }
    .auth-wrapper::after {
        content: '';
        position: fixed;
        bottom: -100px; right: -100px;
        width: 280px; height: 280px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        pointer-events: none;
    }

    .auth-card {
        width: 100%;
        max-width: 420px;
        background: rgba(255,255,255,0.92);
        backdrop-filter: blur(20px);
        border-radius: 32px;
        padding: 44px 36px 40px;
        box-shadow: 0 24px 64px rgba(255,80,160,0.18), 0 2px 8px rgba(0,0,0,0.06);
        position: relative;
        z-index: 1;
        animation: fadeUp 0.5s ease both;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(24px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .auth-title {
        font-size: 32px;
        font-weight: 800;
        color: #111;
        text-align: center;
        letter-spacing: -0.5px;
        margin-bottom: 8px;
    }

    .auth-subtitle {
        font-size: 13px;
        color: #999;
        text-align: center;
        line-height: 1.6;
        margin-bottom: 32px;
        padding: 0 10px;
    }

    .field-group {
        position: relative;
        margin-bottom: 16px;
    }

    .field-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #bbb;
        font-size: 15px;
        pointer-events: none;
        transition: color 0.2s;
    }

    .auth-input {
        width: 100%;
        padding: 15px 46px 15px 44px;
        background: #f5f5f7;
        border: 1.5px solid transparent;
        border-radius: 50px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        color: #333;
        outline: none;
        transition: border-color 0.2s, background 0.2s;
    }

    .auth-input::placeholder { color: #bbb; }

    .auth-input:focus {
        background: #fff;
        border-color: #ff4fa3;
    }

    .field-group:focus-within .field-icon { color: #ff4fa3; }

    .toggle-pw {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #bbb;
        cursor: pointer;
        font-size: 15px;
        transition: color 0.2s;
    }
    .toggle-pw:hover { color: #ff4fa3; }

    .btn-primary {
        width: 100%;
        padding: 16px;
        background: linear-gradient(135deg, #ff4fa3, #ff1a87);
        color: white;
        border: none;
        border-radius: 50px;
        font-size: 15px;
        font-weight: 700;
        font-family: 'Poppins', sans-serif;
        cursor: pointer;
        letter-spacing: 0.3px;
        box-shadow: 0 8px 24px rgba(255,79,163,0.4);
        transition: transform 0.15s, box-shadow 0.15s;
        margin-top: 8px;
        margin-bottom: 20px;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(255,79,163,0.5);
    }
    .btn-primary:active { transform: translateY(0); }

    .switch-link {
        text-align: center;
        font-size: 13px;
        color: #888;
        margin-bottom: 24px;
    }
    .switch-link a {
        color: #ff4fa3;
        font-weight: 700;
        text-decoration: none;
    }
    .switch-link a:hover { text-decoration: underline; }

    .divider {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }
    .divider-line { flex: 1; height: 1px; background: #eee; }
    .divider-text { font-size: 12px; color: #bbb; white-space: nowrap; }

    .social-row {
        display: flex;
        justify-content: center;
        gap: 16px;
    }

    .social-btn {
        width: 52px; height: 52px;
        border-radius: 50%;
        border: 1.5px solid #eee;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform 0.15s, box-shadow 0.15s, border-color 0.2s;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }
    .social-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        border-color: #ddd;
    }
    .social-btn img, .social-btn svg { width: 22px; height: 22px; }

    .alert-error {
        background: #fff0f5;
        border: 1px solid #ffb3d1;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 13px;
        color: #cc2060;
        margin-bottom: 20px;
    }
</style>

<div class="auth-wrapper">
    <div class="auth-card">
        <h1 class="auth-title">Create Account</h1>
        <p class="auth-subtitle">Create a new account to get started and enjoy access to our features.</p>

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="/register" method="POST">
            @csrf

            <!-- Full Name -->
            <div class="field-group">
                <input type="text" name="fullname" placeholder="Name" required class="auth-input" value="{{ old('fullname') }}">
                <span class="field-icon"><i class="bi bi-person-fill"></i></span>
            </div>

            <!-- Email -->
            <div class="field-group">
                <input type="email" name="email" placeholder="Email Address" required class="auth-input" value="{{ old('email') }}">
                <span class="field-icon"><i class="bi bi-envelope-fill"></i></span>
            </div>

            <!-- Password -->
            <div class="field-group">
                <input type="password" name="password" id="password" placeholder="Password" required class="auth-input">
                <span class="field-icon"><i class="bi bi-lock-fill"></i></span>
                <span class="toggle-pw" onclick="togglePw('password','icon1')">
                    <i class="bi bi-eye-slash" id="icon1"></i>
                </span>
            </div>

            <!-- Confirm Password -->
            <div class="field-group">
                <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required class="auth-input">
                <span class="field-icon"><i class="bi bi-lock-fill"></i></span>
                <span class="toggle-pw" onclick="togglePw('confirmpassword','icon2')">
                    <i class="bi bi-eye-slash" id="icon2"></i>
                </span>
            </div>

            <button type="submit" class="btn-primary">Create Account</button>

            <p class="switch-link">Already have an account? <a href="{{ route('login') }}">Sign In Here</a></p>

            <div class="divider">
                <div class="divider-line"></div>
                <span class="divider-text">Or Continue With Account</span>
                <div class="divider-line"></div>
            </div>

            <div class="social-row">
                <!-- Facebook -->
                <button type="button" class="social-btn">
                    <svg viewBox="0 0 24 24" fill="#1877F2"><path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.413c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/></svg>
                </button>
                <!-- Google -->
                <button type="button" class="social-btn">
                    <svg viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                </button>
                <!-- Apple -->
                <button type="button" class="social-btn">
                    <svg viewBox="0 0 24 24" fill="#000"><path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.8-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/></svg>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function togglePw(id, iconId) {
    const input = document.getElementById(id);
    const icon = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'bi bi-eye';
    } else {
        input.type = 'password';
        icon.className = 'bi bi-eye-slash';
    }
}
</script>

@endsection