@extends('layouts.main')
@section('content')
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Category</h5>
            <small class="text-muted float-end"></small>
        </div>
        <div class="card-body">
            <form action="/book-update/{{$books->slug}}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('put')

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Code Buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-name" name="book_code" value="{{$books->book_code}}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Judul Buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-name" name="title" value="{{$books->title}}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Cover Buku</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="basic-default-name" name="image">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Cover Buku Sebelumnya</label>
                    <div class="col-sm-10">
                        @if ($books->cover == '')
                            <p>Cover image tidak ada</p>
                        @else
                        <img src="{{ asset('storage/cover-book/' . $books->cover) }}" alt="image">
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-name" name="status" value="{{$books->status}}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Category</label>
                    <div class="col-sm-10">
                        <select class="basic-multiple form-select" name="categories[]" multiple>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Kategori Sebelumnya</label>
                    <div class="col-sm-10">
                        <ul>
                            @foreach ($books->categories as $categoryName)
                                <li>{{ $categoryName->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="bs-toast toast fade show bg-danger position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <i class="bx bx-bell me-2"></i>
      <div class="me-auto fw-semibold">Berhasil</div>
      <small>Now</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      {{$errors->first()}}
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
