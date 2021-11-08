<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imóveis</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">    
    <link rel="stylesheet" href="{{ asset('css/site/style.css') }}">    
</head>
<body>
    {{-- barra de navagação --}}
    <nav>
        <div class="container">         
            <div class="nav-wrapper">
                <a href="#" class="brand-logo center">Logo</a>                
            </div>
        </div>
    </nav>  {{-- fim barra de navagação --}}
    {{-- slider --}}
    @yield('slider')
    {{-- corpo --}}
    <div class="container">
        @yield('content')
    </div>
    {{-- Compiled and minified JavaScript  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>      
    <script>
        document.addEventListener('DOMContentLoaded',function(){
            //Slider
            var sliders = document.querySelectorAll('.slider');
            M.Slider.init(sliders,{
                indicators:false,
                height:400,
            });

            //Material Box
            var boxes = document.querySelectorAll('.materialboxed');
            M.Materialbox.init(boxes);
        });
    </script>      
</body>
</html>