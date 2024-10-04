<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiches de présence</title>
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"-->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/bootstrap.min.css')}}">


</head>
<body>
    @extends('layouts.template')
    @section('content')



    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        <a href="{{ route('dashboard') }}"><i class="fa fa-arrow-left" style="margin-right:2500px"></i></a>
<br><br>
        <h2 class="page-title" style="color:#051946; font-family:poppins; text-align:center;justfy-content:center">FICHE DE PRESENCE</h2>

        <h1>Fiche de présence du {{ $today->format('d/m/Y') }}</h1>

        <form action="{{ route('presences.enregistrer') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Présent</th>
                        <th>Absent</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($presences as $presence)
                    <tr>
                        <td>{{ $presence->employe->nom }}</td>
                        <td>{{ $presence->employe->prenom }}</td>
                        <td>
                            <input type="checkbox" name="presences[{{ $presence->id }}][est_present]" value="1" {{ $presence->est_present ? 'checked' : '' }}>
                        </td>
                        <td>
                            <input type="checkbox" name="presences[{{ $presence->id }}][est_present]" value="0" {{ !$presence->est_present ? 'checked' : '' }}>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Enregistrer les présences</button>
        </form>
        
    </div>        
   
   
<!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script-->
<script src="{{asset('asset/bootstrap/bootstrap.bundle.min.js')}}"></script>
@endsection
</body>
</html>