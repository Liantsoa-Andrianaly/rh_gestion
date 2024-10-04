<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listes de présence</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
</head>
<body>
    @extends('layouts.template')
    @section('content')

    <div class="container">
        <a href="{{ route('dashboard') }}"><i class="fa fa-arrow-left" style="margin-right:2500px"></i></a>

        <br><br>
        <h2 class="page-title" style="color:#051946; font-family:poppins; text-align:center; justify-content:center">ENREGISTREMENT</h2>

        @foreach ($presences as $date => $presencesParDate)
            <strong>Date : {{ $date }}</strong>
            <form action="{{ route('presences.update_motif_ajax') }}" method="POST">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date</th>
                            <th>Présent</th>
                            <th>Motif d'absence</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presencesParDate as $presence)
                        <tr>
                            <td>{{ $presence->employe->nom }}</td>
                            <td>{{ $presence->employe->prenom }}</td>
                            <td>{{ $presence->date }}</td>
                            <td>{{ $presence->est_present ? 'Oui' : 'Non' }}</td>
                            <td>
                                @if (!$presence->est_present)
                                    <input type="text" id="motif_{{ $presence->id }}" value="{{ $presence->motif ?? '' }}" placeholder="Motif d'absence">
                                    <button type="button" onclick="enregistrerMotif({{ $presence->id }})" id="btn_{{ $presence->id }}" class="btn btn-primary">Enregistrer</button>
                                @else
                                    Aucun(e)
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        @endforeach

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function enregistrerMotif(presenceId) {
                var motif = $('#motif_' + presenceId).val();

                $.ajax({
                    url: "{{ route('presences.update_motif_ajax') }}", // Assurez-vous que c'est le bon nom de route
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        presence_id: presenceId,
                        motif: motif
                    },
                    success: function(response) {
                        if (response.success) {
                            // Mettre à jour dynamiquement le tableau
                            $('#motif_' + presenceId).val(motif).prop('disabled', true); // Mettre à jour le champ
                            $('#btn_' + presenceId).hide(); // Cacher le bouton
                            alert('Motif enregistré avec succès');
                        } else {
                            alert('Erreur lors de l\'enregistrement du motif');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Erreur :', error);
                    }
                });
            }
        </script>
        
    </div>

    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
    @endsection
</body>
</html>
