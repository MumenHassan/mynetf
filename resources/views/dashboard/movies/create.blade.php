@extends('layouts.dashboard.app')
@section('content')

    @push('styles')
        <style>
            #movie__wrapper{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 25vh;
                flex-direction: column;
                cursor: pointer;
                border: 1px solid black;
            }
        </style>
    @endpush
    <h2>Movies</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            @if(auth()->user()->hasPermission('movies_read'))
            <li class="breadcrumb-item"><a href="{{route('dashboard.movies.index')}}">Movies</a></li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>

    <div class="tile mb-4">
        <div
             id="movie__wrapper"
             style="display: {{$errors->any() ? 'none' : 'flex' }}"
        onclick="document.getElementById('movie__input-file').click()">
            <i class="fa fa-video-camera fa-2x"></i>
                <h4> Click to upload</h4>

        </div>
        <input type="file" name="" data-movie-id="{{$movie->id}}" data-url="{{route('dashboard.movies.store')}}" id="movie__input-file" style="display: none">
        <form action="{{route('dashboard.movies.update',['movie'=>$movie->id,'type'=> 'publish'])}}" method="post" id="movie__properties" style="display: {{$errors->any() ? 'block' : 'none' }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('dashboard.partials._errors')
            <div class="form-group" style="display: {{$errors->any() ? 'none' : 'block' }}">
                <label id="movie__progress-status">Uploading</label>
                <div class="progress">
                    <div class="progress-bar" id="movie__progress" role="progressbar" ></div>
                </div>
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="movie__name" value="{{old('name')}}" class="form-control">
            </div>

            <div class="form-group">
                <label >Description</label>
                <textarea name="description" id="movie__description" class="form-control">{{old('description',$movie->description)}}</textarea>
            </div>
            <div class="form-group">
                <label>Poster</label>
                <input type="file" name="poster" id="movie__poster" class="form-control">
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" id="movie__image" class="form-control">
            </div>

            <div class="form-group">
                <label>Category</label>
                <select name="categories[]" id="" class="form-control select2" multiple>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{in_array($category->id,$movie->categories->pluck('id')->toArray()) ? 'selected' :''}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Year</label>
                <input type="text" name="year" value="{{old('year',$movie->year)}}" class="form-control">
            </div>
            <div class="form-group">
                <label>Rating</label>
                <input type="number" name="rating" value="{{old('rating',$movie->rating)}}" min="1" class="form-control">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="movie__submit" style="display: {{$errors->any() ? 'block' : 'none' }}"><i class="fa fa-plus"></i>Publish</button>
            </div>

        </form>

    </div>
@endsection
