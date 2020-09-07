@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-8 offset-2">
            <div class="card">
                <div class="card-header">
                    Add new advert
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('add.advert') }}">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input
                                name="title"
                                type="text"
                                class="form-control  @error('title') is-invalid @enderror"
                                value="{{ old('title') }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select
                                class="form-control @error('ctg') is-invalid @enderror"
                                name="ctg">
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}"
                                        {{ old('ctg') == $category->id ? 'selected' : '' }}
                                    >
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ctg')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="desc"
                                      class="form-control @error('desc') is-invalid @enderror"
                                      rows="3">{{ old('desc') }}</textarea>
                            @error('desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <select
                                class="form-control @error('city') is-invalid @enderror"
                                name="city">
                                @foreach($cities as $city)
                                    <option
                                        value="{{ $city->id }}"
                                        {{ old('city') == $city->id ? 'selected' : '' }}
                                    >
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input
                                name="price"
                                type="text"
                                class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price') }}">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group float-right">
                            <input class="btn btn-outline-primary" type="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
