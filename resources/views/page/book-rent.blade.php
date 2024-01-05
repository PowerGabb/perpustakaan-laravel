@extends('layouts.main')
@section('content')

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Tambah Peminjaman</h5>
                <small class="text-muted float-end"></small>
            </div>
            <div class="card-body">
                <form action="/book-rent" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="user">User</label>
                        <div class="col-sm-10">
                            <select name="user_id" id="user" class="form-select inputbox">
                                <option value="">Select User</option>
                                @foreach ($users as $items)
                                    <option value="{{ $items->id }}">{{ Str::ucfirst($items->username) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="book">Book</label>
                        <div class="col-sm-10">
                            <select name="book_id" id="book" class="form-select inputbox">
                                <option value="">Select Book</option>
                                @foreach ($books as $item)
                                    <option value="{{ $item->id }}">{{ Str::ucfirst($item->title) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="bs-toast toast fade show bg-danger position-fixed bottom-0 end-0 m-3" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bx bx-bell me-2"></i>
                <div class="me-auto fw-semibold">Berhasil</div>
                <small>Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ $errors->first() }}
            </div>
        </div>

        <style>
            @media (max-width: 767px) {
                .bs-toast {
                    max-width: 200px;
                    font-size: 12px;
                }
            }
        </style>
    @endif
    
    @if (Session::get('status') == 'failed')
        <div class="bs-toast toast fade show @if (Session::get('message') == 'Buku berhasil di pinjam')
        bg-success
        @else
        bg-danger
        @endif position-fixed bottom-0 end-0 m-3" role="alert"
            aria-live="assertive" aria-atomic="true">
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

        <style>
            @media (max-width: 767px) {
                .bs-toast {
                    max-width: 200px;
                    font-size: 12px;
                }
            }
        </style>
    @endif

@endsection
