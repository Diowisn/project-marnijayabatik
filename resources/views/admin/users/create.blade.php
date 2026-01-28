@extends('layouts.admin')

@section('title', 'Tambah Admin')
@section('page-title', 'Tambah Admin Baru')

@section('page-actions')
    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-brown">
        <i class="bi bi-arrow-left me-2"></i>Kembali
    </a>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header card-header-custom">
                <h5 class="mb-0">
                    <i class="bi bi-person-plus me-2"></i>Form Tambah Administrator
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.store') }}" method="POST" id="addAdminForm">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold" style="color: #8b4513;">
                            <i class="bi bi-person me-1"></i>Nama Lengkap
                        </label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}"
                               placeholder="Masukkan nama lengkap"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Nama akan ditampilkan di dashboard</small>
                    </div>
                    
                    <div class="mb-4">
                        <label for="username" class="form-label fw-bold" style="color: #8b4513;">
                            <i class="bi bi-person-badge me-1"></i>Username
                        </label>
                        <input type="text" 
                               class="form-control @error('username') is-invalid @enderror" 
                               id="username" 
                               name="username" 
                               value="{{ old('username') }}"
                               placeholder="Masukkan username untuk login"
                               required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Username harus unik dan tidak boleh mengandung spasi</small>
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="form-label fw-bold" style="color: #8b4513;">
                            <i class="bi bi-key me-1"></i>Password
                        </label>
                        <input type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               id="password" 
                               name="password" 
                               placeholder="Minimal 6 karakter"
                               required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-bold" style="color: #8b4513;">
                            <i class="bi bi-key-fill me-1"></i>Konfirmasi Password
                        </label>
                        <input type="password" 
                               class="form-control" 
                               id="password_confirmation" 
                               name="password_confirmation"
                               placeholder="Ulangi password"
                               required>
                        <div id="passwordMatch" class="mt-2"></div>
                    </div>
                    
                    <div class="mt-4 pt-3 border-top">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-brown btn-lg" id="submitBtn">
                                <i class="bi bi-person-plus me-2"></i>Tambah Admin
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-brown">
                                <i class="bi bi-x-circle me-2"></i>Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="bi bi-shield-check display-6 me-3" style="color: #8b4513; opacity: 0.7;"></i>
                    <div>
                        <h6 class="mb-1" style="color: #8b4513;">Tips Keamanan</h6>
                        <small class="text-muted">
                            • Gunakan password yang kuat dengan kombinasi huruf, angka, dan simbol<br>
                            • Pastikan username mudah diingat tapi sulit ditebak<br>
                            • Simpan informasi login dengan aman
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('password_confirmation');
    const passwordMatch = document.getElementById('passwordMatch');
    const submitBtn = document.getElementById('submitBtn');
    
    function checkPasswordMatch() {
        if (password.value && confirmPassword.value) {
            if (password.value === confirmPassword.value) {
                passwordMatch.innerHTML = '<span class="text-success"><i class="bi bi-check-circle-fill me-1"></i>Password cocok</span>';
                submitBtn.disabled = false;
            } else {
                passwordMatch.innerHTML = '<span class="text-danger"><i class="bi bi-x-circle-fill me-1"></i>Password tidak cocok</span>';
                submitBtn.disabled = true;
            }
        } else {
            passwordMatch.innerHTML = '';
            submitBtn.disabled = false;
        }
    }
    
    password.addEventListener('keyup', checkPasswordMatch);
    confirmPassword.addEventListener('keyup', checkPasswordMatch);
    
    // Form validation
    document.getElementById('addAdminForm').addEventListener('submit', function(e) {
        const name = document.getElementById('name').value.trim();
        const username = document.getElementById('username').value.trim();
        
        if (!name || !username) {
            e.preventDefault();
            alert('Harap lengkapi semua field yang wajib diisi!');
            return false;
        }
        
        if (password.value !== confirmPassword.value) {
            e.preventDefault();
            alert('Password dan konfirmasi password tidak cocok!');
            return false;
        }
        
        if (password.value.length < 6) {
            e.preventDefault();
            alert('Password minimal 6 karakter!');
            return false;
        }
        
        // Show loading
        submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Memproses...';
        submitBtn.disabled = true;
    });
});
</script>

<style>
.form-control:focus {
    border-color: #8b4513;
    box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.25);
}

#submitBtn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
</style>
@endsection