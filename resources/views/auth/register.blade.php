

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Registration</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">

    

</head>

<body class="" style="background-image:url('/img/design3.jpg')" >

    <div class="">

        <div class="" >
            <header>
                <div class="logo">
                    <img style="width: 150px;" src="{{asset('img/Idea noir.png')}}" alt="">
    
                </div>
            </header>
            

                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-white-900 mb-4" style="color: #fff; padding:50px"></h1>
                            </div>


                            <div class="container" style="padding-bottom:400px; ">
                                <div class="container-text">
                                    <form class="user" method="POST" action="{{route('register')}}">
                                    <div class="text-center">
                                        <h2 class="h4 text-white-900 mb-4" style="color: #fff;font-size:30px">Creer un compte</h2>
                                    </div>
                                        @csrf
                                    <div class="form-group">
                <!--x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /-->

                                        <input type="text" id="name" name="name" class="form-control form-control-user" 
                                            placeholder="NOM" required autofocus autocomplete="name">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2"  style="color: red"/>
                                    </div>
                                
                                <div class="form-group">
                                    <input type="email" id="email" name="email" class="form-control form-control-user" 
                                        placeholder="Adresse Email" required autocomplete="username">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red"/>  
                                </div>
                                <div class="form-group">
                                        <input type="password"name="password" id="password"  class="form-control form-control-user"
                                             placeholder="Mot de passe" required autocomplete="new-password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red" />
                                </div>

                                    <div class="form-group">
                                        <input type="password" id="password_confirmation" class="form-control form-control-user"
                                            name="password_confirmation" required autocomplete="new-password" placeholder="Comfirmer votre mot de passe">
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: red" />
                                    </div>
                                

                                <div class="flex items-center justify-end mt-4">
                                    <button class="btn btn-primary btn-user btn-block"  >Enregistrer</button><br>

                                    <a class="" href="{{ route('login') }}" style="color: white">
                                        {{ __('Vous avez déjà un compte ? Connectez-vous!') }}
                                    </a>
                        

                                </div>
                                
                                <hr>
                                
                            </form>
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
