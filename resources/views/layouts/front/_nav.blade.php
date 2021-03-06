<nav class="navbar navbar-expand-lg navbar-dark fixed-top">

    <div class="container">

        <a class="navbar-brand" href="{{route('welcome')}}">Netflix<span class="text-primary font-weight-bold">ify</span></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <form action="" class="col-12 col-md-6 p-0 mt-1">
                <div class="input-group">
                    <input type="search" class="form-control bg-transparent border-0" placeholder="Search for your favorite movies" aria-label="Search for your favorite movies" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-white border-0" id="basic-addon2"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </form><!-- end of form -->

            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <a href="" class="nav-link text-white" style="position: relative">
                            <i class="fa fa-heart"></i>
                            <span class="bg-primary text-white d-flex justify-content-center align-items-center " style="position: absolute;top: 0; right: -15px; width: 30px;height: 20px; border-radius: 50px">+9</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown ml-2">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{auth()->user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if(auth()->user()->hasRole('super_admin'))
                                <a class="dropdown-item" href="{{route('dashboard.welcome')}}">
                                    <i class="fa fa-home"></i> Dashboard
                                </a>
                            @endif
                              <a class="dropdown-item fa fa-sign-out-alt" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{route('logout')}}">
                                  Logout
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                              </a>

                        </div>
                    </li>

                @else
                    <a href="{{route('login')}}" class="btn btn-primary mb-2 mb-md-0 mr-0 mr-md-2">Login</a>
                    <a href="{{route('register')}}" class="btn btn-outline-light">Register</a>

                @endauth

            </ul>

        </div><!-- end of collapse -->

    </div><!-- end of container fluid-->

</nav><!-- end of nav -->
