@extends('layouts.app')
@section('content')
    <section class="listing text-white" style="height: 100vh; padding: 10% 0;">

        @include('layouts.front._nav')
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="fw-300">
                        {{request()->category_name}} Movies
                    </h2>
                </div>
            </div>

            <div class="row">
                    @foreach($movies as $movie)
                    <div class="movie p-1  my-3">
                        <img src="{{$movie->poster_path}}" class="img-fluid" alt="">

                        <div class="movie__details text-white">

                            <div class="d-flex justify-content-between">
                                <p class="mb-0 movie__name">{{$movie->name}}</p>
                                <p class="mb-0 movie__year align-self-center">{{$movie->year}}</p>
                            </div>

                            <div class="d-flex movie__rating">
                                <div class="mr-2">
                                    @for($i=0;$i<$movie->rating;$i++)
                                        <i class="fas fa-star text-primary mr-1"></i>
                                    @endfor

                                </div>
                                <span>{{$movie->rating}}</span>
                            </div>

                            <div class="movie___views">
                                <p>Views: {{$movie->views}}</p>
                            </div>

                            <div class="d-flex movie__cta">
                                <a href="{{route('movies.show',$movie->id)}}" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                                <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                            </div>

                        </div><!-- end of movie details -->

                    </div><!-- end of col -->
                @endforeach
            </div>
        </div>

    </section>

    @endsection

