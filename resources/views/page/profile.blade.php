@extends('layouts.main')
@section('content')
    <x-rent-log-table :rentlog="$rent_logs" title="Daftar Buku Di Pinjam" />

    @if (Session::get('status') == 'success')
        <div class="bs-toast toast fade show bg-success position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true" style="max-width: 200px;">
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

    @if (Session::get('status') == 'fail')
        <div class="bs-toast toast fade show bg-danger position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true" style="max-width: 200px;">
            <div class="toast-header">
                <i class="bx bx-bell me-2"></i>
                <div class="me-auto fw-semibold">Gagal</div>
                <small>Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ Session::get('message') }}
            </div>
        </div>
    @endif
@endsection
