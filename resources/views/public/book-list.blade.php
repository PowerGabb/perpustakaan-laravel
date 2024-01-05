@extends('layouts.main')




@section('content')


<form action="">
    <div class="row">
        <div class="col-6 col-md-3 col-lg-4 ">
            <div class="input-group mb-3">
                <select name="category" id="" class="form-select ">
                    <option value="">Search Category</option>
                    @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-6 col-md-3 col-lg-8 ">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" name="title"/>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </div>
</form>

<div class="row">
    @foreach ($books as $item)
    <div class="col-sm-6 col-md-6 col-lg-4 mb-3">
        <div class="card h-100">
            <img draggable="false" class="img-fluid d-flex mx-auto my-4" @if ($item->cover != '')
            src="{{ asset('storage/cover-book/'.$item->cover) }}"
            @else
            src="{{asset('assets/img/icons/brands/image-not-found.png')}}"
            @endif
                alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$item->title}}</h5>
                <p class="card-text">
                    Kode Buku: {{$item->book_code}}
                </p>
                <div class="d-flex justify-content-between">
                    @if (Auth::user() == '')
                    <a href="/Login" class="btn btn-outline-primary btn-sm">Login</a>
                    @else
                    <a href="/book-rent-user/{{$item->slug}}" class="btn btn-outline-primary btn-sm">Pinjam</a>
                    @endif
                    <p
                        class="card-text text-end {{$item->status == 'in stock' ? 'text-success' : 'text-danger'}}">{{$item->status}}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

    

@endsection
