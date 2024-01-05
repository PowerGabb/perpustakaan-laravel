@extends('layouts.main')
@section('content')

@php
    $currentPage = request()->input('page', 1); // Mendapatkan nomor halaman saat ini
    $perPage = $users->perPage(); // Mendapatkan jumlah item per halaman
    $startingNumber = ($currentPage - 1) * $perPage + 1; // Menghitung nomor awal pada halaman saat ini
@endphp

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">List Category</h5>
       <div class="d-flex ">
        <a href="/add-users" class="btn btn-dark btn-sm me-2">Aktivasi Akun</a>
        <a href="/users-deleted" class="btn btn-primary btn-sm">List Blokir</a>
       </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Category</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($users as $item)
                <tr>
                    <td><strong>{{ $startingNumber++ }}</strong></td>
                    <td>{{ Str::ucfirst($item->username) }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->status }}</td>
                    <td><a href="/user-active/{{$item->slug}}" class="btn btn-primary btn-sm">Active</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if ($users->links()->paginator->hasPages())
    <div class="mt-4 p-4 box has-text-centered">
        {{ $users->links() }}
    </div>
    @endif
</div>

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
