<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listes des employés</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
</head>
<body>
    @extends('layouts.template')
    @section('content')

    <div class="container text-center">
        <a href="{{ route('dashboard') }}"><i class="fa fa-arrow-left" style="margin-right:2500px"></i></a>
        <br><br>

        <form action="{{ route('search-employe') }}" method="GET" class="mb-4">
            <div class="input-group" style="width:300px">
                <input type="text" name="query" class="form-control" placeholder="Rechercher un employé" required>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search fa-fw"></i></button>
            </div>
        </form>

        <div class="row">
            <h2 class="page-title" style="color:#051946; font-family:poppins">LISTE DES EMPLOYES</h2>
            <hr class="sidebar-divider my-0">
            <a href="/ajouter" class="btn btn-primary">Ajouter un employé</a>
            <br>
            <hr class="sidebar-divider my-0"><hr>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <table class="table table-info">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Date de naissance</th>
                        <th>Poste</th>
                        <th>Departement</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $ide = 1;
                    @endphp

                    @if($employes->isEmpty())
                        <tr>
                            <td colspan="9" class="text-center">Aucun employé trouvé pour la recherche "{{ request('query') }}".</td>
                        </tr>
                    @else
                        @foreach($employes as $employe)
                            <tr>
                                <td>{{ $ide }}</td>
                                <td>{{ $employe->nom }}</td>
                                <td>{{ $employe->prenom }}</td>
                                <td>{{ $employe->date_naissance }}</td>
                                <td>{{ $employe->poste }}</td>
                                <td>{{ $employe->departement }}</td>
                                <td>{{ $employe->telephone }}</td>
                                <td>{{ $employe->adresses->first() ? $employe->adresses->first()->rue : '-' }}</td>
                                <td>
                                    <a href="/update-employe/{{$employe->id}}" style="font-size: 10px" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="/delete-employe/{{$employe->id}}" style="font-size: 10px" class="btn btn-danger" 
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?')"><i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>

                            @php
                                $ide += 1;
                            @endphp
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{ $employes->links() }}
        </div>
    </div>

    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
    @endsection
</body>
</html>
