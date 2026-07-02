{{-- resources/views/nilai/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Data Nilai')
@section('page-title', 'Data Nilai')

@section('page-action')
    <a href="{{ route('nilai.create') }}" class="btn btn-primary btn-sm shadow-sm">
        <i class="fas fa-plus fa-sm mr-1"></i> Tambah Nilai
    </a>
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-clipboard-list mr-2"></i>Daftar Nilai Mahasiswa
            </h6>
            <span class="badge badge-primary badge-pill">
                {{ $nilais->total() }} data
            </span>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('nilai.index') }}" class="mb-3">
                <div class="form-row align-items-end">
                    <div class="form-group col-md-3 mb-2">
                        <label class="small font-weight-bold">Mahasiswa</label>
                        <select name="mahasiswa_id" class="form-control form-control-sm">
                            <option value="">Semua Mahasiswa</option>
                            @foreach($mahasiswas as $mahasiswa)
                                <option value="{{ $mahasiswa->id }}" {{ request('mahasiswa_id') == $mahasiswa->id ? 'selected' : '' }}>
                                    {{ $mahasiswa->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2 mb-2">
                        <label class="small font-weight-bold">Semester</label>
                        <select name="semester" class="form-control form-control-sm">
                            <option value="">Semua</option>
                            <option value="Ganjil" {{ request('semester') == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                            <option value="Genap" {{ request('semester') == 'Genap' ? 'selected' : '' }}>Genap</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2 mb-2">
                        <label class="small font-weight-bold">Tahun Akademik</label>
                        <input type="number" name="tahun_akademik" value="{{ request('tahun_akademik') }}" class="form-control form-control-sm" placeholder="2024">
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <label class="small font-weight-bold">Mata Kuliah</label>
                        <select name="kode_mk" class="form-control form-control-sm">
                            <option value="">Semua Mata Kuliah</option>
                            @foreach($matakuliahs as $mk)
                                <option value="{{ $mk->kode_mk }}" {{ request('kode_mk') == $mk->kode_mk ? 'selected' : '' }}>
                                    {{ $mk->nama_mk }} ({{ $mk->kode_mk }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2 mb-2">
                        <button type="submit" class="btn btn-primary btn-sm btn-block">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Mahasiswa</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Nilai Angka</th>
                            <th>Nilai Huruf</th>
                            <th>Semester</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nilais as $nilai)
                            <tr>
                                <td>{{ $nilais->firstItem() + $loop->index }}</td>
                                <td>{{ $nilai->mahasiswa->nama ?? '-' }}</td>
                                <td>{{ $nilai->nama_mk }}</td>
                                <td>{{ $nilai->sks }}</td>
                                <td>{{ $nilai->nilai_angka }}</td>
                                <td>
                                    <span class="badge badge-{{ $nilai->nilai_huruf === 'A' ? 'success' : 'secondary' }}">
                                        {{ $nilai->nilai_huruf }}
                                    </span>
                                </td>
                                <td>{{ $nilai->semester }}</td>
                                <td>{{ $nilai->tahun_akademik }}</td>
                                <td>
                                    <a href="{{ route('nilai.edit', $nilai) }}" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('nilai.destroy', $nilai) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Hapus data nilai ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                    Belum ada data nilai.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">
                    Menampilkan {{ $nilais->firstItem() }}–{{ $nilais->lastItem() }} dari {{ $nilais->total() }} data
                </small>
                {{ $nilais->links() }}
            </div>
        </div>
    </div>
@endsection
