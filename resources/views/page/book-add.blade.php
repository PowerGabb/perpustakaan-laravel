@extends('layouts.main')
@section('content')
    

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Tambah Category</h5>
                <small class="text-muted float-end"></small>
            </div>
            <div class="card-body">
                <form action="/book" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="book_code">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Judul Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="title">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Cover Buku</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="basic-default-name" name="image">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="status" class="form-select">
                                <option value="in stock">In Stock</option>
                                <option value="not available">Not Available</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Category</label>
                        <div class="col-sm-10">
                            <select class="inputbox form-select" name="categories[]" multiple>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
   <!-- jQuery -->

<!-- Your script -->



@endsection
