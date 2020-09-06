@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 row">
                <div class="col-md-4">
                    <img src="..." class="card-img-top" alt="User Photo">
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.save') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" disabled class="form-control-plaintext"
                                               value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input name="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name') ?? Auth::user()->name }}">
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <select class="form-control @error('city') is-invalid @enderror" name="city">
                                            <option value="" disabled selected>Choose city</option>
                                            @foreach($cities as $city)
                                                <option
                                                    value="{{ $city->id }}"
                                                    {{ Auth::user()->city_id == $city->id ? 'selected' : '' }}
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
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone</label>

                                    <div class="col-md-9">
                                        <input
                                            name="phone"
                                            type="text"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            value="{{ Auth::user()->phone }}">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">About Me</label>
                                    <div class="col-sm-9">
                                        <textarea name="about" class="form-control"
                                                  rows="3">{{ Auth::user()->about }}</textarea>
                                    </div>
                                    @error('about')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="row offset-3" style="padding-left: 15px">
                                        <input type="submit" class="btn btn-outline-primary" value="Save">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
