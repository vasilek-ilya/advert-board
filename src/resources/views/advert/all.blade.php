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

        <h2>Actual adverts</h2>
        <div class="advert-list row">
            @foreach($adverts as $advert)
                <div class="card col-sm-6">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a
                                href="{{ route('show.advert', ['id' => $advert->id]) }}"
                                class="stretched-link"
                            >
                                {{ $advert->title }}
                            </a>
                        </h5>
                        <p class="card-text">
                            <span class="font-weight-bold">${{ $advert->price }}</span><br>
                            <span class="text-secondary">
                                {{ $advert->city->name }}<br>
                                {{ date('jS \of F Y H:i:s', strtotime($advert->pub_date)) }}
                            </span>

                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
