<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listes des configurations</title>
 <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"-->
 <link rel="stylesheet" href="{{asset('assets/bootstrap/bootstrap.min.css')}}">


</head>
<body>
    @extends('layouts.template')
@section('content')
    <div class="container text-center">
        <a href="{{ route('dashboard') }}"><i class="fa fa-arrow-left" style="margin-right:2500px"></i></a>
        <div class="row" >
            <h2 class="page-title" style="color:#051946; font-family:poppins">CONFIGURATIONS</h2>
            <hr class="sidebar-divider my-0">
            <a style="width:250px" href="{{route('configurations.create')}}" class="btn btn-primary">Nouvelle configuration</a>
            
            <br>
            <hr>

            @if (session('success_message'))
                <div class="alert alert-success">
                    {{ session('success_message')}}
                </div>
            @endif

            @if (!empty($paymentNotification))
                <div class="alert alert-danger">
                    {{ $paymentNotification }}
                </div>
            @endif


        
            <table class="table " >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Valeur</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $ide = 1;
                    @endphp

                @foreach($allConfigurations as $config)
                    <tr>
                        <td>{{ $ide }}</td>
                        <td>

                            @if ($config->type === 'PAYMENT_DATE')
                                Date mensuel de paiement
                                
                            @endif

                            @if ($config->type === 'APP_NAME')
                                Nom de l'appplication
                               
                            @endif
                            
                            @if ($config->type === 'DEVELOPPER_NAME')
                                Equipe de dévéloppement
                            @endif

                            @if ($config->type === 'ANOTHER')
                                Autre option
                             @endif

                            

                        </td>
                        <td>{{ $config->value }}
                            @if ($config->type === 'PAYMENT_DATE')
                                De chaque mois
                            @endif
                        </td>
                        <td>
                            <a href="{{route('configurations.delete', $config->id)}}" 
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette configuration ?')"
                              style="font-size: 10px" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    
                    </tr>
                    

                    @php
                        $ide += 1;
                    @endphp

                    
                @endforeach
                </tbody>
            </table>
            {{ $allConfigurations->links()}}
        

        </div>
    </div>
   
<!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script-->
<script src="{{asset('asset/bootstrap/bootstrap.bundle.min.js')}}"></script>
@endsection
</body>
</html>