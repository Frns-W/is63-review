{{-- resources/views/mahasiswa/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detail Mahasiswa')
@section('page-title', 'Detail Mahasiswa')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                {{-- Tampilkan foto mahasiswa --}}
                @php
                    $fotoUrl = $mahasiswa->foto
                        ? asset('storage/' . $mahasiswa->foto)
                        : asset('vendor/startbootstrap-sb-admin-2/img/undraw_profile.svg');
                @endphp
                <img src="{{ $fotoUrl }}"
                     alt="Foto {{ $mahasiswa->nama }}"
                     class="img-thumbnail" width="150"
                     onerror="this.onerror=null;this.src='{{ asset('vendor/startbootstrap-sb-admin-2/img/undraw_profile.svg') }}';">
            </div>
            <div class="col-md-9">
                <h4 class="font-weight-bold">{{ $mahasiswa->nama }}</h4>
                <p class="mb-1"><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
                <p class="mb-1"><strong>Email:</strong> {{ $mahasiswa->email }}</p>
                <p class="mb-1"><strong>Program Studi:</strong> {{ $mahasiswa->prodi->nama_prodi ?? '-' }}</p>
                <p class="mb-1"><strong>Status:</strong> {{ ucfirst($mahasiswa->status) }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
