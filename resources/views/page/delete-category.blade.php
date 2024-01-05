@extends('layouts.main')
@section('content')
<div class="card">
    <div class="d-flex align-items-end row">
      <div class="col-sm-7">
        <div class="card-body">
          <h5 class="card-title text-primary">Apakah kamu yakin ingin menghapus category ini?</h5>
          <p class="mb-4">
            {{$category->name}}
          </p>

          <a href="/category-destroy/{{$category->slug}}" class="btn btn-sm btn-outline-danger">Hapus</a>
          <a href="/categories" class="btn btn-sm btn-outline-danger">Batal</a>
        </div>
      </div>
      <div class="col-sm-5 text-center text-sm-left">
        <div class="card-body pb-0 px-0 px-md-4">
          <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
        </div>
      </div>
    </div>
  </div>
@endsection