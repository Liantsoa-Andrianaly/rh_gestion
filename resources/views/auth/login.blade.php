<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Se connecter</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">


</head>

<body class="" style="background-image:url('/img/design3.jpg')">

    <div class="">

        <!-- Outer Row -->
        <div class="" >

            <div class="">
                <header>
                    <div class="logo">
                        <!--a href="index.html"><span>Air</span>  Travel</a-->
                        <img src="{{asset('img/Idea noir.png')}}" alt="">
                    </div>
                </header>
                <div class="">
                   

                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4" style="color: #fff; padding:50px"></h1>
                                    </div>

                                    <div class="container" style="padding-bottom:500px;">
                                        <div class="container-text">
                                            <form class="user" method="POST" action="{{route('login')}}">

                                                @csrf
                                                <div class="text-center">
                                                    <h1 class="" style="color: white;font-size:30px">ESPACE DE CONNEXION</h1>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <input type="email" id="email" name="email" class="form-control form-control-user"
                                                         aria-describedby="emailHelp"
                                                        placeholder="Entrer votre adresse email..." required autofocus autocomplete="username">
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red" />
                                                </div>
        
                                                <div class="form-group">
                                                    <input type="password" id="password" name="password" class="form-control form-control-user"
                                                         placeholder="Entrez votre mot de passe" required autocomplete="current-password">
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red" />
                                                </div>
        
        
        
                                                <!--div class="form-group">
                                                    <div class="custom-control custom-checkbox small">
                                                        <input type="checkbox" id="remember_me" name="remember" class="custom-control-input" id="customCheck">
                                                        <label class="custom-control-label" for="remember_me" style="color: white; font-size:20px">Remember
                                                            Me
                                                    </label>
                                                    </div>
                                                </div-->
        
                                                <div class="flex items-center justify-end mt-4" >
                                                <button class="btn btn-primary btn-user btn-block">Se connecter</button>
                                                <hr>
                                                @if (Route::has('password.request'))
                                                <a class="small" href="{{ route('password.request') }}" style="color: white;font-size:20px">
                                                    Mot de passe oublié?
                                                </a>
                                                <br>
                                                <a class="small" href="{{route('register')}}" style="color: white;font-size:20px">Créer un compte</a>
        
                                                
                                                
                                                @endif
                                            
        
                                                </div> 
                                            
                                        
                
                                            </form>
                                        </div>
                                    </div>
                                    
                                  
                                    
                                    
                                </div>
                            </div>
                        </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

</body>

</html>