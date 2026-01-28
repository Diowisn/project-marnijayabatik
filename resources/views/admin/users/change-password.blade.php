@extends('layouts.admin')

@section('title', 'Ganti Password')
@section('page-title', 'Ganti Password')

@section('page-actions')
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-brown">
        <i class="bi bi-arrow-left me-2"></i>Kembali ke Dashboard
    </a>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header card-header-custom">
                <h5 class="mb-0">
                    <i class="bi bi-shield-lock me-2"></i>Keamanan Akun
                </h5>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    <div class="avatar-lg mx-auto rounded-circle d-flex align-items-center justify-content-center mb-3" 
                         style="background: linear-gradient(135deg, #8b4513 0%, #a0522d 100%); width: 80px; height: 80px;">
                        <i class="bi bi-person-fill text-white display-5"></i>
                    </div>
                    <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                    <p class="text-muted">{{ Auth::user()->username }}</p>
                    <small class="text-muted">Terakhir login: {{ Auth::user()->updated_at->diffForHumans() }}</small>
                </div>
                
                <form action="{{ route('admin.change-password.update') }}" method="POST" id="changePasswordForm">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="current_password" class="form-label fw-bold" style="color: #8b4513;">
                            <i class="bi bi-lock me-1"></i>Password Saat Ini
                        </label>
                        <div class="input-group">
                            <input type="password" 
                                   class="form-control @error('current_password') is-invalid @enderror" 
                                   id="current_password" 
                                   name="current_password"
                                   placeholder="Masukkan password saat ini"
                                   required>
                            <button class="btn btn-outline-secondary" type="button" id="toggleCurrentPassword">
                                <i class="bi bi-eye"></i>
                            </button>
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="new_password" class="form-label fw-bold" style="color: #8b4513;">
                            <i class="bi bi-key me-1"></i>Password Baru
                        </label>
                        <div class="input-group">
                            <input type="password" 
                                   class="form-control @error('new_password') is-invalid @enderror" 
                                   id="new_password" 
                                   name="new_password"
                                   placeholder="Minimal 6 karakter"
                                   required>
                            <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
                                <i class="bi bi-eye"></i>
                            </button>
                            @error('new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="progress mt-2" style="height: 5px;">
                            <div class="progress-bar" id="passwordStrength" role="progressbar" style="width: 0%"></div>
                        </div>
                        <small class="text-muted" id="passwordStrengthText">Kekuatan password: -</small>
                    </div>
                    
                    <div class="mb-4">
                        <label for="new_password_confirmation" class="form-label fw-bold" style="color: #8b4513;">
                            <i class="bi bi-key-fill me-1"></i>Konfirmasi Password Baru
                        </label>
                        <div class="input-group">
                            <input type="password" 
                                   class="form-control" 
                                   id="new_password_confirmation" 
                                   name="new_password_confirmation"
                                   placeholder="Ulangi password baru"
                                   required>
                            <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        <div id="passwordMatch" class="mt-2"></div>
                    </div>
                    
                    <div class="mt-4 pt-3 border-top">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-brown btn-lg" id="submitBtn">
                                <i class="bi bi-check-circle me-2"></i>Perbarui Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body">
                <h6 class="mb-3" style="color: #8b4513;">
                    <i class="bi bi-lightbulb me-2"></i>Tips Password yang Aman
                </h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Minimal 8 karakter</small>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Kombinasi huruf besar & kecil</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Gunakan angka dan simbol</small>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Jangan gunakan informasi pribadi</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    const toggleCurrentPassword = document.getElementById('toggleCurrentPassword');
    const toggleNewPassword = document.getElementById('toggleNewPassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    
    const currentPassword = document.getElementById('current_password');
    const newPassword = document.getElementById('new_password');
    const confirmPassword = document.getElementById('new_password_confirmation');
    
    toggleCurrentPassword.addEventListener('click', function() {
        const type = currentPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        currentPassword.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
    });
    
    toggleNewPassword.addEventListener('click', function() {
        const type = newPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        newPassword.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
    });
    
    toggleConfirmPassword.addEventListener('click', function() {
        const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassword.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
    });
    
    // Check password strength
    function checkPasswordStrength(password) {
        let strength = 0;
        const strengthBar = document.getElementById('passwordStrength');
        const strengthText = document.getElementById('passwordStrengthText');
        
        if (password.length >= 8) strength += 25;
        if (/[a-z]/.test(password)) strength += 25;
        if (/[A-Z]/.test(password)) strength += 25;
        if (/[0-9]/.test(password) || /[^A-Za-z0-9]/.test(password)) strength += 25;
        
        strengthBar.style.width = strength + '%';
        
        if (strength < 50) {
            strengthBar.className = 'progress-bar bg-danger';
            strengthText.textContent = 'Kekuatan password: Lemah';
            strengthText.className = 'text-danger';
        } else if (strength < 75) {
            strengthBar.className = 'progress-bar bg-warning';
            strengthText.textContent = 'Kekuatan password: Sedang';
            strengthText.className = 'text-warning';
        } else {
            strengthBar.className = 'progress-bar bg-success';
            strengthText.textContent = 'Kekuatan password: Kuat';
            strengthText.className = 'text-success';
        }
    }
    
    newPassword.addEventListener('keyup', function() {
        checkPasswordStrength(this.value);
        checkPasswordMatch();
    });
    
    // Check password match
    function checkPasswordMatch() {
        const passwordMatch = document.getElementById('passwordMatch');
        const submitBtn = document.getElementById('submitBtn');
        
        if (newPassword.value && confirmPassword.value) {
            if (newPassword.value === confirmPassword.value) {
                passwordMatch.innerHTML = '<span class="text-success"><i class="bi bi-check-circle-fill me-1"></i>Password baru cocok</span>';
                submitBtn.disabled = false;
            } else {
                passwordMatch.innerHTML = '<span class="text-danger"><i class="bi bi-x-circle-fill me-1"></i>Password tidak cocok</span>';
                submitBtn.disabled = true;
            }
        } else {
            passwordMatch.innerHTML = '';
            submitBtn.disabled = true;
        }
    }
    
    confirmPassword.addEventListener('keyup', checkPasswordMatch);
    
    // Form validation
    document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
        if (newPassword.value !== confirmPassword.value) {
            e.preventDefault();
            alert('Password baru dan konfirmasi password tidak cocok!');
            return false;
        }
        
        if (newPassword.value.length < 6) {
            e.preventDefault();
            alert('Password baru minimal 6 karakter!');
            return false;
        }
        
        if (newPassword.value === currentPassword.value) {
            e.preventDefault();
            alert('Password baru tidak boleh sama dengan password lama!');
            return false;
        }
        
        // Show loading
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Memproses...';
        submitBtn.disabled = true;
    });
});
</script>

<style>
.avatar-lg {
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.progress-bar {
    transition: width 0.5s ease;
}

.input-group .btn-outline-secondary {
    border-color: #ced4da;
}

.input-group .btn-outline-secondary:hover {
    background-color: #f8f9fa;
    border-color: #8b4513;
}

#submitBtn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
</style>
@endsection