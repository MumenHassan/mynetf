@extends('layouts.dashboard.app')
@section('content')
    <h2>Users</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>

            <li class="breadcrumb-item active">Social Login</li>


        </ol>
    </nav>

    <div class="tile mb-4">
        <form action="{{route('dashboard.settings.store')}}" method="post">
            @csrf
            @method('post')
            @include('dashboard.partials._errors')
            @php
                $socials = ['facebook','google'];
            @endphp
            @foreach($socials as $social)
                <div class="form-group">
                    <label class="text-capitalize">{{$social}} client id</label>
                    <input type="text" name="{{$social}}_client_id" class="form-control" value="{{setting($social.'_client_id')}}">
                </div>

                <div class="form-group">
                    <label class="text-capitalize">{{$social}} client secret</label>
                    <input type="text" name="facebook_client_secret" class="form-control" value="{{setting($social.'_client_secret')}}">
                </div>


                <div class="form-group">
                    <label class="text-capitalize">{{$social}} redirect url</label>
                    <input type="text" name="facebook_redirect_url" class="form-control" value="{{setting($social.'_redirect_url')}}">
                </div>

            @endforeach


            @if(auth()->user()->hasPermission('settings_create'))

            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
            </div>

        </form>
        @else
            <a href="#" disabled class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
        @endif
    </div>
@endsection
