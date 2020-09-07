@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="row" action="" method="GET">
            <div class="form-group col-sm-4">
                <select class="form-control" name="ctg">
                    <option value="" disabled selected>Choose category</option>
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ request()->get('ctg') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-sm-4">
                <select class="form-control" name="city">
                    <option value="" disabled selected>Choose city</option>
                    @foreach($cities as $city)
                        <option
                            value="{{ $city->id }}"
                            {{ request()->get('city') == $city->id ? 'selected' : '' }}
                        >
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group form-inline col-sm-4 row">
                <div class="col-sm-8">
                    <input
                        placeholder="Search..."
                        class="form-control"
                        name="search"
                        type="text"
                        value="{{ request()->get('search') }}"
                    >
                </div>
                <button type="submit" class="btn btn-outline-primary col-sm-4">Search</button>
            </div>
        </form>

        <div class="card">
            <h5 class="card-header">My adverts</h5>
            @foreach($adverts as $advert)
                <div class="card-body row">
                    <div class="col-sm-8">
                        <h4 class="card-title d-inline"><b>{{ $advert->title }}</b></h4>
                        <a
                            class="btn btn-outline-primary btn-sm"
                            href="{{ route('show.edit.form.advert', ['id' => $advert->id]) }}"
                        >
                            Edit
                        </a>
                        <a
                            class="btn btn-outline-primary btn-sm"
                            href="{{ route('close.advert', ['id' => $advert->id]) }}"
                        >
                            Close
                        </a>
                        <div class="text-secondary">
                            <b>{{ $advert->pub_date }}</b>
                            <b>Category:</b> {{ $advert->category->name }}
                            <b>City:</b> {{ $advert->city->name }}
                        </div>
                        <p class="card-text">{{ $advert->description }}</p>
                    </div>
                    <div class="col-sm-4">
                        <b>Status:</b>
                        @switch($advert->status)
                            @case(\App\Advert::ACTIVE_STATUS) Active @break
                            @case(\App\Advert::CLOSED_STATUS) Closed @break
                        @endswitch
                        <br>
                        <b>Price:</b> {{ $advert->price }}
                        <div class="photo">
                            <img src="..." alt="Advert photo">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
