@extends('layouts.dashboard.app')

@section('content')
    <h2>Roles</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Roles</li>
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
                        @if(auth()->user()->hasPermission('roles_create'))
                        <a href="{{route('dashboard.roles.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                        @else
                            <a href="#" disabled class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                        @endif

                    </div> <!-- end of column -->
                    </div><!-- end of row -->
                </form>
            </div> <!-- end of column 12 -->
        </div><!-- end of row -->

        <div class="row" >
            <div class="col-md-12">
                @if($roles->count()>0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <td>Permissions</td>
                            <td>Users Count</td>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $index=>$role)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$role->name}}</td>
                                <td>
                                    @foreach($role->permissions as $permission)
                                        <p ><span class="badge badge-primary">{{$permission->name}}</span> </p>
                                    @endforeach
                                </td>
                                <td>{{$role->users_count}}</td>
                                <td>
                                    @if(auth()->user()->hasPermission('roles_create'))
                                    <a href="{{route('dashboard.roles.edit',$role->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>
                                    @else
                                        <a disabled href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>
                                    @endif
                                        @if(auth()->user()->hasPermission('roles_delete'))
                                        <form action="{{route('dashboard.roles.destroy',$role->id)}}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete </button>
                                            @else
                                                <a href="#" disabled class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</a>
                                            @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    {{ $roles->appends(request()->query())->links() }}
                @else
                    <h3>Sorry,No role found</h3>
                @endif
            </div>
        </div><!-- end of row -->
    </div><!-- end of tile -->
@endsection
