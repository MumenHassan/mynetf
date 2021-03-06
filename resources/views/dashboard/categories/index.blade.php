@extends('layouts.dashboard.app')

@section('content')
    <h2>Categories</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Categories</li>
        </ol>
    </nav>

    <div class="tile mb-4">
        <div class="row" >
            <div class="col-12">

                <form action="">
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" autofocus placeholder="search"  value="{{request()->search}}">
                        </div>
                    </div> <!-- end of column -->
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
                        @if(auth()->user()->hasPermission('categories_create'))
                        <a href="{{route('dashboard.categories.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                        @else
                            <a disabled href="#" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>

                        @endif
                    </div> <!-- end of column -->
                    </div><!-- end of row -->
                </form>
            </div> <!-- end of column 12 -->
        </div><!-- end of row -->

        <div class="row" >
            <div class="col-md-12">
                @if($categories->count()>0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Movie count</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $index=>$category)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->movies_count}}</td>
                                <td>
                                    @if(auth()->user()->hasPermission('categories_update'))
                                    <a href="{{route('dashboard.categories.edit',$category->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>
                                    @else
                                        <a href="#" disabled class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                    @endif
                                        @if(auth()->user()->hasPermission('categories_delete'))
                                    <form action="{{route('dashboard.categories.destroy',$category->id)}}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete </button>

                                    </form>
                                        @else
                                            <a href="#" disabled class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete </a>
                                        @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    {{ $categories->appends(request()->query())->links() }}
                @else
                    <h3>Sorry,No category found</h3>
                @endif
            </div>
        </div><!-- end of row -->
    </div><!-- end of tile -->
@endsection
