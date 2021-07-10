@extends('layouts.dashboard.app')

@section('content')
    <h2>Movies</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Movies</li>
        </ol>
    </nav>

    <div class="tile mb-4">
        <div class="row" >
            <div class="col-12">

                <form action="">
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" autofocus   value="{{request()->search}}" placeholder="Search by name, description, rating, year ">
                        </div>

                    </div> <!-- end of column -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="category" class="form-control">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{request()->category == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div> <!-- end of column -->

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
                        <a href="{{route('dashboard.movies.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                    </div> <!-- end of column -->
                    </div><!-- end of row -->
                </form>
            </div> <!-- end of column 12 -->
        </div><!-- end of row -->

        <div class="row" >
            <div class="col-md-12">
                @if($movies->count()>0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>description</th>
                            <th>Year</th>
                            <th>Rating</th>
                            <th>Categories</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($movies as $index=>$movie)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$movie->name}}</td>
                                <td>{{Str::limit($movie->description,50)}}</td>
                                <td>{{$movie->year}}</td>
                                <td>{{$movie->rating}}</td>
                                <td>
                                    @foreach($movie->categories as $category)
                                        <h5 style="display: inline-block"><span class="badge badge-primary">{{$category->name}}</span> </h5>
                                    @endforeach
                                </td>


                                <td>
                                    @if(auth()->user()->hasPermission('movies_update'))
                                        <a href="{{route('dashboard.movies.edit',$movie->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>
                                    @else
                                        <a href="#" disabled class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                    @endif
                                    @if(auth()->user()->hasPermission('movies_delete'))
                                    <form action="{{route('dashboard.movies.destroy',$movie->id)}}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete </button>

                                    </form>
                                        @else
                                            <a href="#" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</a>
                                        @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    {{ $movies->appends(request()->query())->links() }}
                @else
                    <h3>Sorry,No user found</h3>
                @endif
            </div>
        </div><!-- end of row -->
    </div><!-- end of tile -->
@endsection
