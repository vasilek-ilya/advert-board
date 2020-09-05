@extends('layout.default')

@section('content')
    <div class="row">
        <form action="" method="GET">
            <div>
                <div>
                    <select name="ctg">
                        <option value="" disabled selected>Choose your option</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <label>Category</label>
                </div>
            </div>

            <div>
                <div>
                    <select name="city">
                        <option value="" disabled selected>Choose your option</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    <label>City</label>
                </div>
            </div>

            <div>
                <div>
                    <input name="search" type="text">
                </div>
                <input type="submit" value="Search">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, options);
        });
    </script>
@endsection
