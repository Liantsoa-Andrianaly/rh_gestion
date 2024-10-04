<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listes des employés</title>
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"-->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/bootstrap.min.css')}}">


</head>
<body>
    @extends('layouts.template')
@section('content')


    <div class="container text-center">
        <a href="{{ route('dashboard') }}"><i class="fa fa-arrow-left" style="margin-right:2500px"></i></a>
        <br>
        
        <h2 class="page-title" style="color:#051946; font-family:poppins">LISTE DES PAIEMENTS</h2>
        <hr>
        <p>Prochaine date de paiement : {{ $paymentDate->format('d-m-Y') }}</p>


            @if ($isPaymentDay)
                <a href="{{route('payments.create')}}" class="btn btn-primary">Lancer les paiements</a>
                <br>
            @else
                <div class="alert alert-danger">Le paiement ne peut être effectué qu'à la date de paiement.</div>
            @endif
            

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
<br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employé</th>
                <th>Montant</th>
                <th>Date de paiement</th>
                <th>Mois</th>
                <th>Année</th>
                <th>Statut</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
                $ide = 1;
             @endphp

            @foreach($payments as $payment)
                <tr>
                    <td>{{ $ide }}</td>
                    <td>{{ $payment->employe->nom }}   {{ $payment->employe->prenom }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->payment_date }}</td>
                    <td>{{ $payment->month }}</td>
                    <td>{{ $payment->year }}</td>
                    <td><button class="btn btn-success">{{ $payment->status }}</button></td>
                    <td><a href="{{route('payment.download', $payment->id) }}" class="fa fa-download"></a></td>
                </tr>

                @php
                    $ide += 1;
                @endphp
            @endforeach
        </tbody>
        
    </table>

    </div>
   
<!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script-->
<script src="{{asset('asset/bootstrap/bootstrap.bundle.min.js')}}"></script>
@endsection
</body>
</html>