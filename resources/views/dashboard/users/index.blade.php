@extends('layouts.dashboard.app')

@section('content')
    <h2>Users</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                            <div class="form-group">
                                <select name="role_id" class="form-control">
                                    <option value="">All Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{request()->role_id == $role->id ? 'selected' : ''}}>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div> <!-- end of column -->
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
                        <a href="{{route('dashboard.users.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                    </div> <!-- end of column -->
                    </div><!-- end of row -->
                </form>
            </div> <!-- end of column 12 -->
        </div><!-- end of row -->

        <div class="row" >
            <div class="col-md-12">
                @if($users->count()>0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $index=>$user)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                               {{-- <td>{{ implode(' , ',$user->roles->pluck('name')->toArray()) }}</td>--}}
                                <td>
                                    @foreach($user->roles as $role)
                                        <h5 style="display: inline-block"><span class="badge badge-primary">{{$role->name}} </span></h5>
                                    @endforeach
                                </td>
                                <td>
                                    @if(auth()->user()->hasPermission('users_update'))
                                        <a href="{{route('dashboard.users.edit',$user->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>
                                    @else
                                        <a href="#" disabled class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                    @endif
                                    @if(auth()->user()->hasPermission('users_delete'))
                                    <form action="{{route('dashboard.users.destroy',$user->id)}}" method="post" style="display: inline-block">
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
                    {{ $users->appends(request()->query())->links() }}
                @else
                    <h3>Sorry,No user found</h3>
                @endif
            </div>
        </div><!-- end of row -->
    </div><!-- end of tile -->
@endsection
