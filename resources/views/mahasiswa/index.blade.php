<<<<<<< HEAD
@extends('layouts.app')

@section('title', 'Mahasiswa')
=======
{{-- resources/views/mahasiswa/index.blade.php --}}
@extends('layouts.app')
@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', 'Data Mahasiswa')
>>>>>>> 93f3c832ecf478fe90b79c99a5ff6e32cb71a03d
@section('page-title', 'Data Mahasiswa')

@section('page-action')
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-sm shadow-sm">
<<<<<<< HEAD
        <i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Tambah Mahasiswa
=======
        <i class="fas fa-plus fa-sm mr-1"></i> Tambah Mahasiswa
>>>>>>> 93f3c832ecf478fe90b79c99a5ff6e32cb71a03d
    </a>
@endsection

@section('content')
<<<<<<< HEAD
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-users mr-2"></i>Daftar Mahasiswa
            </h6>
        </div>
        <div class="card-body">
            <form method="GET" class="row g-3 mb-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama atau NIM" value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-control">
                        <option value="">-- Semua Status --</option>
                        <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="cuti" {{ request('status') == 'cuti' ? 'selected' : '' }}>Cuti</option>
                        <option value="lulus" {{ request('status') == 'lulus' ? 'selected' : '' }}>Lulus</option>
                        <option value="dropout" {{ request('status') == 'dropout' ? 'selected' : '' }}>Dropout</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="prodi_id" class="form-control">
                        <option value="">-- Semua Prodi --</option>
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}" {{ request('prodi_id') == $prodi->id ? 'selected' : '' }}>
                                {{ $prodi->nama_prodi }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Filter</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th width="70">No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Angkatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mahasiswas as $mahasiswa)
                            <tr>
                                <td class="text-center font-weight-bold">
                                    {{ $mahasiswas->firstItem() + $loop->index }}
                                </td>
                                <td>{{ $mahasiswa->nim }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($mahasiswa->foto)
                                            <img src="{{ asset('storage/' . $mahasiswa->foto) }}"
                                                 class="rounded-circle border border-primary shadow-sm mr-2"
                                                 style="width:36px;height:36px;object-fit:cover;"
                                                 onerror="this.onerror=null;this.src='{{ asset('vendor/startbootstrap-sb-admin-2/img/undraw_profile.svg') }}';">
                                        @else
                                            <div class="rounded-circle bg-gradient-primary d-inline-flex align-items-center justify-content-center border border-primary shadow-sm mr-2"
                                                 style="width:36px;height:36px;font-size:13px;font-weight:700;color:white;">
                                                {{ strtoupper(substr($mahasiswa->nama, 0, 1)) }}
                                            </div>
                                        @endif
                                        <span>{{ $mahasiswa->nama }}</span>
                                    </div>
                                </td>
                                <td>{{ $mahasiswa->prodi->nama_prodi ?? '-' }}</td>
                                <td>{{ $mahasiswa->angkatan }}</td>
                                <td>
                                    <span class="badge badge-{{ $mahasiswa->statusLabel }}">
                                        {{ ucfirst($mahasiswa->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('mahasiswa.show', $mahasiswa) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah yakin menghapus data ini?');">
                                            <i class="fas fa-trash"></i>
                                        </button>
=======

    {{-- Form Filter --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">
                <i class="fas fa-filter mr-2"></i>Filter Data
            </h6>
        </div>
        <div class="card-body py-3">
            <form method="GET" action="{{ route('mahasiswa.index') }}">
                <div class="form-row align-items-end">
                    <div class="form-group col-md-4 mb-2">
                        <label class="small font-weight-bold">Cari Nama / NIM</label>
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="form-control form-control-sm" placeholder="Ketik nama atau NIM...">
                    </div>
                    <div class="form-group col-md-2 mb-2">
                        <label class="small font-weight-bold">Status</label>
                        <select name="status" class="form-control form-control-sm">
                            <option value="">Semua Status</option>
                            @foreach(['aktif', 'cuti', 'lulus', 'dropout'] as $s)
                                <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>
                                    {{ ucfirst($s) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <label class="small font-weight-bold">Program Studi</label>
                        <select name="prodi_id" class="form-control form-control-sm">
                            <option value="">Semua Prodi</option>
                            @foreach($prodis as $prodi)
                                <option value="{{ $prodi->id }}" {{ request('prodi_id') == $prodi->id ? 'selected' : '' }}>
                                    {{ $prodi->nama_prodi }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2 mb-2">
                        <label class="small font-weight-bold">Angkatan</label>
                        <input type="number" name="angkatan" value="{{ request('angkatan') }}"
                            class="form-control form-control-sm" placeholder="2022">
                    </div>
                    <div class="form-group col-md-1 mb-2">
                        <button type="submit" class="btn btn-primary btn-sm btn-block">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                @if(request()->hasAny(['search', 'status', 'prodi_id', 'angkatan']))
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-times mr-1"></i>Reset Filter
                    </a>
                @endif
            </form>
        </div>
    </div>

    {{-- Tabel Data --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-users mr-2"></i>Daftar Mahasiswa
            </h6>
            <span class="text-muted small">{{ $mahasiswas->total() }} data ditemukan</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">#</th>
                            <th width="12%">NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th width="8%">Angkatan</th>
                            <th width="10%">Status</th>
                            <th width="18%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mahasiswas as $mhs)
                            <tr>
                                <td>{{ $mahasiswas->firstItem() + $loop->index }}</td>
                                <td><code>{{ $mhs->nim }}</code></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($mhs->foto)
                                            <img src="{{ asset('storage/' . $mhs->foto) }}" class="rounded-circle mr-2" width="32"
                                                height="32" style="object-fit:cover" alt="Foto {{ $mhs->nama }}">
                                        @else
                                            <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center mr-2 text-white"
                                                style="width:32px;height:32px;font-size:14px;flex-shrink:0">
                                                {{ strtoupper(substr($mhs->nama, 0, 1)) }}
                                            </div>
                                        @endif
                                        <div>
                                            <div class="font-weight-bold">{{ $mhs->nama }}</div>
                                            <small class="text-muted">{{ $mhs->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $mhs->prodi->nama_prodi ?? '-' }}</td>
                                <td class="text-center">{{ $mhs->angkatan }}</td>
                                <td>
                                    @php
                                        $badgeColor = match ($mhs->status) {
                                            'aktif' => 'success',
                                            'cuti' => 'warning',
                                            'lulus' => 'info',
                                            'dropout' => 'danger',
                                            default => 'secondary'
                                        };
                                    @endphp
                                    <span class="badge badge-{{ $badgeColor }}">
                                        {{ ucfirst($mhs->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('mahasiswa.show', $mhs) }}" class="btn btn-info btn-sm" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('mahasiswa.edit', $mhs) }}" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="konfirmasiHapus({{ $mhs->id }}, '{{ $mhs->nama }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form id="form-hapus-{{ $mhs->id }}" action="{{ route('mahasiswa.destroy', $mhs) }}"
                                        method="POST" style="display:none">
                                        @csrf
                                        @method('DELETE')
>>>>>>> 93f3c832ecf478fe90b79c99a5ff6e32cb71a03d
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
<<<<<<< HEAD
                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                    Belum ada data mahasiswa.
=======
                                    <i class="fas fa-search fa-2x mb-2 d-block"></i>
                                    Tidak ada data mahasiswa yang sesuai filter.
>>>>>>> 93f3c832ecf478fe90b79c99a5ff6e32cb71a03d
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
<<<<<<< HEAD

            <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">
                    Menampilkan {{ $mahasiswas->firstItem() }}–{{ $mahasiswas->lastItem() }} dari {{ $mahasiswas->total() }} data
=======
            <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">
                    Menampilkan {{ $mahasiswas->firstItem() }}–{{ $mahasiswas->lastItem() }}
                    dari {{ $mahasiswas->total() }} data
>>>>>>> 93f3c832ecf478fe90b79c99a5ff6e32cb71a03d
                </small>
                {{ $mahasiswas->links() }}
            </div>
        </div>
    </div>
@endsection
<<<<<<< HEAD
=======

@push('scripts')
    <script>
        function konfirmasiHapus(id, nama) {
            if (confirm('Hapus mahasiswa "' + nama + '"?
            Semua data nilai mahasiswa ini juga akan terhapus!')) {
                    document.getElementById('form-hapus-' + id).submit();
        }
            }
    </script>
@endpush
>>>>>>> 93f3c832ecf478fe90b79c99a5ff6e32cb71a03d
