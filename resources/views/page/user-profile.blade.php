@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
          </div>
        </div>
        <hr class="my-0">
        <div class="card-body">
          <form id="formAccountSettings" method="POST" onsubmit="return false">
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Username</label>
                <input class="form-control" type="text" id="firstName" name="firstName"  placeholder="{{$user->username}}" readonly>
              </div>
              <div class="mb-3 col-md-6">
                <label for="lastName" class="form-label">Phone</label>
                <input class="form-control" type="text" name="lastName" id="lastName"  placeholder="{{$user->phone}}" readonly> 
              </div>
              <div class="mb-3 col-md-12">
                <label for="email" class="form-label">Address</label>
                <input class="form-control" type="text" id="email" name="email"  placeholder="{{$user->address}}" readonly>
              </div>
              <div class="mb-3 col-md-6">
                <label for="organization" class="form-label">Status</label>
                <input type="text" class="form-control" id="organization" name="organization"  placeholder="{{$user->status}}" readonly>
              </div>
              
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Save changes</button>
              <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
          </form>
        </div>
        <!-- /Account -->
      </div>
      @if ($user->status != 'inactive')
      <div class="card">
        <h5 class="card-header">Delete Account</h5>
        <div class="card-body">
          <div class="mb-3 col-12 mb-0">
            <div class="alert alert-warning">
              <h6 class="alert-heading fw-bold mb-1">Apakah kamu yakin ingin menonaktifkan akun ini?</h6>
              <p class="mb-0">*Akun yang di hapus masih bisa di aktifkan kembali di halaman users.</p>
            </div>
          </div>
        
            <a type="submit" class="btn btn-danger deactivate-account" href="/user-nonaktifkan/{{$user->slug}}">Deactivate Account</a>
          
        </div>
      </div>
      @endif
    </div>
  </div>

  <div class="mt-5">
    <x-rent-log-table :rentlog="$rent_logs" title='Data Buku Di Pinjam'/>
  </div>
@endsection