@extends('layouts.admin')

@section('title', 'Manajemen Admin')
@section('page-title', 'Manajemen Admin')

@section('page-actions')
    <a href="{{ route('admin.users.create') }}" class="btn btn-brown">
        <i class="bi bi-plus-circle me-2"></i>Tambah Admin
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header card-header-custom">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-people me-2"></i>Daftar Administrator
                    </h5>
                    <span class="badge bg-light text-dark">{{ $admins->count() }} admin</span>
                </div>
            </div>
            <div class="card-body">
                @if($admins->isEmpty())
                    <div class="text-center py-5">
                        <i class="bi bi-people display-4 text-muted mb-3"></i>
                        <p class="text-muted">Belum ada admin terdaftar</p>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-brown">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Admin Pertama
                        </a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover table-custom">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Tanggal Bergabung</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $index => $admin)
                                <tr class="{{ Auth::id() == $admin->id ? 'table-active' : '' }}">
                                    <td class="text-center align-middle">
                                        <div class="avatar-sm mx-auto rounded-circle d-flex align-items-center justify-content-center" 
                                             style="background: linear-gradient(135deg, rgba(139, 69, 19, 0.1) 0%, rgba(139, 69, 19, 0.2) 100%); width: 40px; height: 40px;">
                                            <span class="fw-bold" style="color: #8b4513;">{{ $index + 1 }}</span>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-3 rounded-circle d-flex align-items-center justify-content-center" 
                                                 style="background: linear-gradient(135deg, #8b4513 0%, #a0522d 100%); width: 40px; height: 40px;">
                                                <i class="bi bi-person-fill text-white"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $admin->name }}</h6>
                                                @if(Auth::id() == $admin->id)
                                                    <small class="text-success">
                                                        <i class="bi bi-check-circle-fill me-1"></i>Anda
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <code>{{ $admin->username }}</code>
                                    </td>
                                    <td class="align-middle">
                                        <small class="text-muted">
                                            {{ $admin->created_at->format('d/m/Y') }}
                                        </small>
                                    </td>
                                    <td class="text-center align-middle">
                                        @if(Auth::id() != $admin->id)
                                            <form action="{{ route('admin.users.destroy', $admin->id) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirmDelete()">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @else
                                            <span class="badge bg-info">Akun Aktif</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        <div class="alert alert-light border-0" style="background: rgba(139, 69, 19, 0.05);">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-info-circle-fill me-3" style="color: #8b4513; font-size: 1.2rem;"></i>
                                <div>
                                    <small class="text-muted">
                                        <strong>Info:</strong> Hanya admin yang dapat menambah atau menghapus admin lainnya. 
                                        Anda tidak dapat menghapus akun sendiri.
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete() {
    return confirm('Apakah Anda yakin ingin menghapus admin ini?');
}
</script>

<style>
.avatar-sm {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.table-active {
    background-color: rgba(139, 69, 19, 0.05) !important;
    border-left: 4px solid #8b4513;
}

.table-active td {
    border-top: 1px solid rgba(139, 69, 19, 0.1);
    border-bottom: 1px solid rgba(139, 69, 19, 0.1);
}
</style>
@endsection