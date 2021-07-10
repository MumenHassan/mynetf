@extends('layouts.dashboard.app')
@section('content')
    <h2>Movies</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.movies.index')}}">Movies</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="tile mb-4">
        <form action="{{route('dashboard.movies.update',['movie'=>$movie->id,'type'=> 'update'])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('dashboard.partials._errors')


            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="movie__name" value="{{old('name',$movie->name)}}" class="form-control">
            </div>

            <div class="form-group">
                <label >Description</label>
                <textarea name="description" id="movie__description" class="form-control">{{old('description',$movie->description)}}</textarea>
            </div>
            <div class="form-group">
                <label>Poster</label>
                <input type="file" name="poster" id="movie__poster" class="form-control">
                <img src="{{$movie->poster_path}}"  style="width: 150px;height: 200px; margin-top: 10px" alt="s">
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" id="movie__image" class="form-control">
                <img src="{{$movie->image_path}}"  style="width: 150px;height: 200px; margin-top: 10px" alt="s">
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
                <button type="submit" class="btn btn-primary" ><i class="fa fa-edit"></i>Edit</button>
            </div>

        </form>

    </div>
@endsection

