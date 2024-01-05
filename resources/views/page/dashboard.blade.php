@extends('layouts.main')
@section('content')

<div class="mb-3">
    <H1>Welcome {{Auth::user()->username }}</H1>
    <hr>
    
</div>
<div class="col-lg-12  order-1">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img
                  src="../assets/img/icons/unicons/chart-success.png"
                  alt="chart success"
                  class="rounded"
                />
              </div>
              <div class="dropdown">
                <button
                  class="btn p-0"
                  type="button"
                  id="cardOpt3"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                  <a class="dropdown-item" href="/books">View More</a>
                  
                </div>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Total Books</span>
            <h3 class="card-title mb-2">{{$book_count}}</h3>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img
                  src="../assets/img/icons/unicons/wallet-info.png"
                  alt="Credit Card"
                  class="rounded"
                />
              </div>
              <div class="dropdown">
                <button
                  class="btn p-0"
                  type="button"
                  id="cardOpt6"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="/categories">View More</a>
                  
                </div>
              </div>
            </div>
            <span>Total Category</span>
            <h3 class="card-title text-nowrap mb-1">{{$category_count}}</h3>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img
                  src="../assets/img/icons/unicons/wallet-info.png"
                  alt="Credit Card"
                  class="rounded"
                />
              </div>
              <div class="dropdown">
                <button
                  class="btn p-0"
                  type="button"
                  id="cardOpt6"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="/users">View More</a>
                  
                </div>
              </div>
            </div>
            <span>Total Users</span>
            <h3 class="card-title text-nowrap mb-1">{{$user_count}}</h3>
            
          </div>
        </div>
      </div>
    </div>
    </div>

    <x-rent-log-table :rentlog="$rent_log" title="List Peminjaman"/>
  </div>
@endsection