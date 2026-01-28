<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Marni Jaya Batik</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/Logomarnijaya-polos.png') }}" type="image/x-icon">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom Styles -->
    <style>
        :root {
            --primary-brown: #8b4513;
            --light-brown: #a0522d;
            --dark-brown: #654321;
            --cream: #f5deb3;
            --light-cream: #fff8dc;
            --gold: #daa520;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5deb3 0%, #fff8dc 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-container {
            width: 100%;
            max-width: 420px;
        }
        
        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(139, 69, 19, 0.15);
            overflow: hidden;
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(139, 69, 19, 0.2);
        }
        
        .login-header {
            background: linear-gradient(135deg, var(--dark-brown) 0%, var(--primary-brown) 100%);
            padding: 40px 30px 30px;
            text-align: center;
            position: relative;
        }
        
        .logo-container {
            display: flex;
            flex-direction: column;
            position: relative;
            margin-bottom: 20px;
        }
        
        .logo-wrapper {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border: 5px solid var(--cream);
            position: relative;
            overflow: hidden;
        }
        
        .logo-placeholder {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary-brown) 0%, var(--light-brown) 100%);
            border-radius: 50%;
            color: white;
        }
        
        .logo-img {
            /* max-width: 80px; */
            max-height: 80px;
            object-fit: contain;
        }
        
        .login-title {
            color: white;
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 5px;
            letter-spacing: 0.5px;
        }
        
        .login-subtitle {
            color: var(--cream);
            font-size: 0.95rem;
            opacity: 0.9;
        }
        
        .login-body {
            padding: 40px 35px;
        }
        
        .form-label {
            color: var(--dark-brown);
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 8px;
        }
        
        .form-control {
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-brown);
            box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.25);
        }
        
        .input-group {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            z-index: 10;
        }
        
        .password-toggle:hover {
            color: var(--primary-brown);
        }
        
        .btn-login {
            background: linear-gradient(135deg, var(--primary-brown) 0%, var(--light-brown) 100%);
            border: none;
            color: white;
            padding: 14px;
            font-weight: 600;
            font-size: 1.1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(139, 69, 19, 0.2);
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(139, 69, 19, 0.3);
            background: linear-gradient(135deg, var(--light-brown) 0%, var(--dark-brown) 100%);
            color: white;
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .login-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #f0f0f0;
        }
        
        .footer-text {
            color: #6c757d;
            font-size: 0.85rem;
        }
        
        .brand-name {
            color: var(--primary-brown);
            font-weight: 700;
        }
        
        .error-message {
            background: linear-gradient(135deg, #fee 0%, #fff5f5 100%);
            border-left: 4px solid #dc3545;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
        }
        
        .error-message i {
            color: #dc3545;
        }
        
        .copyright {
            position: fixed;
            bottom: 20px;
            width: 100%;
            text-align: center;
            color: #6c757d;
            font-size: 0.8rem;
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .login-card {
            animation: fadeIn 0.6s ease-out;
        }
        
        /* Responsive */
        @media (max-width: 576px) {
            .login-card {
                border-radius: 15px;
            }
            
            .login-header {
                padding: 30px 20px 25px;
            }
            
            .login-body {
                padding: 30px 25px;
            }
            
            .logo-wrapper {
                width: 80px;
                height: 80px;
            }
            
            .logo-placeholder,
            .logo-img {
                width: 60px;
                height: 60px;
            }
            
            .login-title {
                font-size: 1.5rem;
            }
        }
        
        /* Loading animation */
        .btn-loading {
            position: relative;
            color: transparent !important;
        }
        
        .btn-loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.8s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Header with Logo -->
            <div class="login-header">
                <div class="logo-container">
                    <img src="{{ asset('assets/images/Marnijayalogo.png') }}" alt="Marni Jaya Batik" class="logo-img">
                    <p class="login-subtitle">Admin Panel Dashboard</p>
                </div>
            </div>
            
            <!-- Login Form -->
            <div class="login-body">
                @if($errors->any())
                    <div class="error-message">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <div>
                                <strong class="d-block mb-1">Login Gagal</strong>
                                @foreach($errors->all() as $error)
                                    <small class="d-block">{{ $error }}</small>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="error-message">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <div>
                                <strong class="d-block mb-1">Error</strong>
                                <small class="d-block">{{ session('error') }}</small>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" id="loginForm">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="username" class="form-label">
                            <i class="bi bi-person-circle me-1"></i>Username
                        </label>
                        <div class="input-group">
                            <input type="text" 
                                   class="form-control @error('username') is-invalid @enderror" 
                                   id="username" 
                                   name="username" 
                                   value="{{ old('username') }}"
                                   placeholder="Masukkan username Anda"
                                   required
                                   autofocus>
                            <span class="input-group-text bg-transparent border-0">
                                <i class="bi bi-person" style="color: #8b4513;"></i>
                            </span>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">
                            <i class="bi bi-lock me-1"></i>Password
                        </label>
                        <div class="input-group">
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   placeholder="Masukkan password Anda"
                                   required>
                            <button type="button" class="password-toggle" id="togglePassword">
                                <i class="bi bi-eye"></i>
                            </button>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-login" id="loginButton">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Masuk ke Dashboard
                        </button>
                    </div>
                </form>
                
                <div class="login-footer">
                    <p class="footer-text">
                        <i class="bi bi-shield-check me-1"></i>
                        Sistem Admin <span class="brand-name">Marni Jaya Batik</span>
                    </p>
                    <small class="text-muted">
                        Hak Cipta © {{ date('Y') }} - Versi 1.0.0
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const loginButton = document.getElementById('loginButton');
            const loginForm = document.getElementById('loginForm');
            
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
            });
            
            // Form validation and loading state
            loginForm.addEventListener('submit', function(e) {
                const username = document.getElementById('username').value.trim();
                const password = document.getElementById('password').value.trim();
                
                if (!username || !password) {
                    e.preventDefault();
                    showAlert('Harap lengkapi username dan password!', 'warning');
                    return false;
                }
                
                // Show loading state
                loginButton.innerHTML = '';
                loginButton.classList.add('btn-loading');
                loginButton.disabled = true;
                
                // Add small delay for better UX
                setTimeout(() => {
                    loginButton.innerHTML = '<i class="bi bi-box-arrow-in-right me-2"></i>Memproses...';
                }, 500);
            });
            
            // Add animation to form inputs on focus
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('input-focused');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('input-focused');
                });
            });
            
            // Auto-focus username field
            document.getElementById('username').focus();
            
            // Add enter key support
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' && document.activeElement.id !== 'password') {
                    document.getElementById('password').focus();
                    e.preventDefault();
                }
            });
            
            // Animation for error messages
            if (document.querySelector('.error-message')) {
                const errorMsg = document.querySelector('.error-message');
                errorMsg.style.animation = 'fadeIn 0.5s ease-out';
            }
            
            // Function to show alert (for future use)
            function showAlert(message, type = 'info') {
                // You can implement a custom alert system here
                console.log(`${type}: ${message}`);
            }
            
            // Add some interactive effects
            const loginCard = document.querySelector('.login-card');
            loginCard.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            loginCard.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
            
            // Add ripple effect to login button
            loginButton.addEventListener('click', function(e) {
                const btn = e.currentTarget;
                const circle = document.createElement('span');
                const rect = btn.getBoundingClientRect();
                
                const diameter = Math.max(btn.clientWidth, btn.clientHeight);
                const radius = diameter / 2;
                
                circle.style.width = circle.style.height = diameter + 'px';
                circle.style.left = (e.clientX - rect.left - radius) + 'px';
                circle.style.top = (e.clientY - rect.top - radius) + 'px';
                circle.classList.add('ripple');
                
                const ripple = btn.getElementsByClassName('ripple')[0];
                if (ripple) {
                    ripple.remove();
                }
                
                btn.appendChild(circle);
            });
            
            // Add CSS for ripple effect
            const style = document.createElement('style');
            style.textContent = `
                .btn-login {
                    position: relative;
                    overflow: hidden;
                }
                
                .ripple {
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.7);
                    transform: scale(0);
                    animation: ripple-animation 0.6s linear;
                }
                
                @keyframes ripple-animation {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
                
                .input-focused .form-control {
                    border-color: #8b4513;
                    box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.15);
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</body>
</html>