@extends('layout.default')

@section('content')
    <div class="row">
        <div class="col s4">
            <select-component
                v-bind:list="{{ $categories }}"
                title="Category"
            ></select-component>
        </div>

        <div class="col s4">
            <select-component
                v-bind:list="{{ $cities }}"
                title="City"
            ></select-component>
        </div>

        <div class="col s4 row">
            <div class="input-field inline">
                <input id="email_inline" type="email" class="validate">
            </div>
            <i class="material-icons">search</i>
        </div>

        <h2 class="center-align">Actual adverts</h2>
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
