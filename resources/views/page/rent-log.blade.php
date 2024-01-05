@extends('layouts.main')
@section('content')

@php
    $currentPage = request()->input('page', 1); // Mendapatkan nomor halaman saat ini
    $perPage = $rents->perPage(); // Mendapatkan jumlah item per halaman
    $startingNumber = ($currentPage - 1) * $perPage + 1; // Menghitung nomor awal pada halaman saat ini
@endphp


        <x-rent-log-table :rentlog="$rents" title="List Peminjaman"/>
    

@if (Session::get('status') == 'success')
<div class="bs-toast toast fade show bg-success position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold">Berhasil</div>
        <small>Now</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        {{ Session::get('message') }}
    </div>
</div>
@endif

<style>
    @media (max-width: 767px) {
        .bs-toast {
            max-width: 200px;
            font-size: 12px;
        }
    }
</style>

@endsection
