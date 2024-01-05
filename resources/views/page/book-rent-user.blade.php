@extends('layouts.main')
@section('content')
<div class="card">
    <div class="d-flex align-items-end row">
      <div class="col-sm-7">
        <div class="card-body">
          <h5 class="card-title text-primary">Apakah kamu yakin ingin mengajukan pinjaman untuk buku ini?</h5>
          <p class="mb-4">
            {{$book->title}}
          </p>
          <p class="color-red">Rules:</p>
          <ol>
            <li>Tidak boleh mengajukan pinjaman jika buku sedang dipinjam</li>
            <li>Batas peminjaman buku adalah 3 hari</li>
            <li>Siap bertanggung jawab atas buku</li>
            <li>Mengembalikan buku kepada pengawas tepat waktu</li>
          </ol>

          <form action="/book-rent-user" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{$book->id}}">
            <button type="submit" class="btn btn-sm btn-outline-primary">Ajukan Pinjaman</button>

            <a href="/books" class="btn btn-sm btn-outline-danger">Batal</a>
          </form>
          
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