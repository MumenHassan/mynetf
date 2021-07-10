@extends('layouts.dashboard.app')
@section('content')
    <h2>Users</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.users.index')}}">Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="tile mb-4">
        <form action="{{route('dashboard.users.update',$user->id)}}" method="post">
            @csrf
            @method('put')
            @include('dashboard.partials._errors')
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name',$user->name)}}">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{old('email',$user->email)}}">
            </div>


            <div class="form-group">
                <label>Roles</label>
                <select name="role_id" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{ $role->id}}"  {{ $user->hasRole($role->name) ? 'selected': '' }}>{{$role->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button>
            </div>
        </form>
    </div>
@endsection

