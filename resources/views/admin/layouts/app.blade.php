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

</head>
<body>
    {{-- barra de navagação --}}
    <nav>
        <div class="container">         
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Logo</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#">Imóveis</a></li>
                <li><a href="#">Cidades</a></li>
                </ul>
            </div>
        </div>
    </nav>  {{-- fim barra de navagação --}}
    {{-- corpo --}}
    <div class="container">
        @yield('content')
    </div>
    {{-- Compiled and minified JavaScript  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>   
    {{-- msg do sistema --}}
    <script>
        @if(session('menssage'))
            M.toast({html: "{{ session('menssage') }}" });
        @endif
    </script>
</body>
</html>