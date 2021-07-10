
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Netflixify</title>

    <!--font awesome-->
    <link rel="stylesheet" href="{{asset('front_files/css/font-awesome5.11.2.min.css')}}">

    <!--bootstrap-->
    <link rel="stylesheet" href="{{asset('front_files/css/bootstrap.min.css')}}">

    <!--vendor css-->
    <link rel="stylesheet" href="{{asset('front_files/css/vendor.min.css')}}">

    <!--google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500,700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!--main styles -->
    <link rel="stylesheet" href="{{asset('front_files/css/main.min.css')}}">
    <!--auto complete styles -->
    <link rel="stylesheet" href="{{asset('front_files/plugins/autocomplete/easy-autocomplete.min.css')}}">
    <style>
        .easy-autocomplete{
            width: 90%;
        }
        .easy-autocomplete input{
            color: white !important;
        }
        .eac-icon-left .eac-item img {

            max-height: 60px !important;
        }
    </style>
</head>
<body>

@yield('content')



<!--jquery-->
<script src="{{asset('front_files/js/jquery-3.4.0.min.js')}}"></script>

<!--bootstrap-->
<script src="{{asset('front_files/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front_files/js/popper.min.js')}}"></script>

<!--vendor js-->
<script src="{{asset('front_files/js/vendor.min.js')}}"></script>

<!--main scripts-->
<script src="{{asset('front_files/js/main.min.js')}}"></script>

<!--player -->
<script src="{{asset('front_files/js/playerjs.js')}}"></script>

<!--easy auto complete -->
<script src="{{asset('front_files/plugins/autocomplete/jquery.easy-autocomplete.min.js')}}"></script>

<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-Token':$('meta[name="csrf-token"]').attr('content')
        }
    });

    var options = {
        url: function(search) {
            return "/movies/?search=" + search;
        },

        getValue: "name",

        template: {
            type: "iconLeft",
            fields: {
                iconSrc: "poster_path"
            }
        },
        list: {
            onChooseEvent: function() {
                var movie =  $('.form-control[type="search"]').getSelectedItemData();
                var url = window.location.origin+ '/movies/'+movie.id;
                window.location.replace(url);
            }
        }
    };
    $('.form-control[type="search"]').easyAutocomplete(options);
    $(document).ready(function () {

        $("#banner .movies").owlCarousel({
            loop: true,
            nav: false,
            items: 1,
            dots: false,
        });

        $(".listing .movies").owlCarousel({
            loop: true,
            nav: false,
            stagePadding: 50,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                900: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            },
            dots: false,
            margin: 15,
            loop: true,
        });

    });
</script>
@stack('scripts')
</body>
</html>
