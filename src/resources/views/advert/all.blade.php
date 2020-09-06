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
        <div class="advert-list">
            @foreach($adverts as $advert)
            <div class="advert-cart">
                <div class="advert-photo">
                    <img src="{{ is_null($advert->main_photo) ? 'default_photo' : $advert->main_photo->path }}" alt="">
                </div>
                <div class="advert-desc font-weight-bold">
                    <div class="advert--title blue-text">{{ $advert->title }}</div>
                    <div class="advert-price text-darken-4">{{ $advert->price }}</div>
                    <div class="advert-city grey-text">{{ $advert->city->name }}</div>
                    <div class="advert-pub-date grey-text">{{ $advert->pub_date }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
