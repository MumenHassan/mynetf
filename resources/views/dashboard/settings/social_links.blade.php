@extends('layouts.dashboard.app')
@section('content')
    <h2>Settings</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.settings.social_links')}}">Social Links</a></li>

        </ol>
    </nav>

    <div class="tile mb-4">
        <form action="{{route('dashboard.settings.store')}}" method="post">
            @csrf
            @method('post')
            @include('dashboard.partials._errors')
            @php
                $socials = ['facebook','gmail','twitter'];
            @endphp
            @foreach($socials as $social)
                <div class="form-group">
                    <label class="text-capitalize">{{$social}} link</label>
                    <input type="text" name="{{$social}}_link" class="form-control" value="{{setting($social.'_link')}}">
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

