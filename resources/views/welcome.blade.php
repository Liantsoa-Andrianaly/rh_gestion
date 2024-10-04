<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IDEA</title>
    <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
        
</head>
<body>
    <header>
        <div class="logo">
            <!--a href="index.html"><span>Air</span>  Travel</a-->
            <img src="{{asset('img/Idea noir.png')}}" alt="">
        </div>
        <ul class="menu">
            @if (Route::has('login'))
                                @auth
                                    <li><a href="{{ url('/dashboard') }}" >Dashboard</a></li>
                                    @else
                                        <li><a
                                            href="{{ route('login') }}">Se connecter</a></li>

                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}">Registre</a></li>
                                    @endif
                                @endauth
                        
             @endif
            
        </ul>
        
    </header>
    <div class="container">
        <div class="container-text" >
            <h1 style="font-family: poppins">Bienvenue sur le portail de gestion des ressources humaines</h1>
        
            <br>
        
            <h2 style="font-family: poppins">Impulse Digital Entreprise Agency - IDEA
                <a href="https://e-ideagency.com" style="color:darkgoldenrod"> e-ideagency.com </a>
            </h2>
        
        </div>
    </div>
    
    
</body>
</html>