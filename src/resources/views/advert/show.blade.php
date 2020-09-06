@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $advert->title }}</h5>
                        <p class="card-text"><b>Price:</b> ${{ $advert->price }}</p>
                        <p class="card-text"><small class="text-muted">{{ $advert->pub_date }} City: {{ $advert->city->name }}</small></p>
                    </div>
                    <img class="card-img-bottom" src="..." alt="Advert Photo">
                    <div class="card-body">
                        <p class="card-text">{{ $advert->description }}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <img src="..." class="card-img-top" alt="User Photo">
                    <div class="card-body">
                        <p class="card-text">
                            <span>
                                <b>Name:</b>
                                {{ $advert->user->name }}
                            </span><br>
                            <span>
                                <b>On the Site:</b>
                                from {{ $advert->user->date_reg }}
                            </span><br>
                            <span>
                                <b>Advert count::</b>
                                {{ $advert->user->adverts->count() }}
                            </span><br>
                            <span>
                                <b>Phone:</b>
                                {{ $advert->user->phone }}
                            </span><br>
                            <span>
                                <b>About Me:</b>
                                {{ $advert->user->about }}
                            </span><br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
