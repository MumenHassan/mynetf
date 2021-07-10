@extends('layouts.dashboard.app')
@section('content')
    <h2>Roles</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            @if(auth()->user()->hasPermission('roles_read'))
            <li class="breadcrumb-item"><a href="{{route('dashboard.roles.index')}}"> Roles</a></li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>

    <div class="tile mb-4">
        <form action="{{route('dashboard.roles.store')}}" method="post">
            @csrf
            @method('post')
            @include('dashboard.partials._errors')
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <h4>Permissions</h4>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th style="width: 8%">#</th>
                        <th style="width: 22%">Model</th>
                        <th>Permissions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $models= ['categories','users','movies','settings'];
                    @endphp


                    @foreach($models as $index=>$model)

                        <tr>
                            <td>{{$index+1}}</td>
                            <td class="text-capitalize">{{$model}}</td>
                            <td>
                                @php
                                    $permission_maps = ['create','read',"update","delete"];
                                @endphp
                                @if($model =='settings')
                                    @php
                                        $permission_maps = ['create','read'];
                                    @endphp
                                @endif
                                <select name="permissions[]" class="form-control select2" multiple>
                                @foreach($permission_maps as $permission_map)
                                        <option value="{{$model.'_'.$permission_map}}">{{$permission_map}}</option>
                                @endforeach
                                </select>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if(auth()->user()->hasPermission('roles_create'))
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
            </div>
            @else
                <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
            @endif
        </form>
    </div>
@endsection
