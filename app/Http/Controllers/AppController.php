<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Configuration;
use Carbon\Carbon;

class AppController extends Controller
{
    public function index()
    {
        // Récupérer le nombre total d'employés
        $totalEmployes = Employe::count();

        // Initialiser la variable $paymentNotification à une chaîne vide pour éviter l'erreur
        $paymentNotification = "";

        // Récupérer la date actuelle
        $currentDate = Carbon::now()->day;

        // Récupérer la configuration de la date de paiement
        $defaultPaymentDateQuery = Configuration::where('type', 'PAYMENT_DATE')->first();

        if ($defaultPaymentDateQuery) {
            $defaultPaymentDate = $defaultPaymentDateQuery->value;
            $convertedPaymentDate = intval($defaultPaymentDate);

            // Si la date de paiement est future, générer la notification pour ce mois
            if ($currentDate < $convertedPaymentDate) {
                $currentMonthName = Carbon::now()->translatedFormat('F'); // Mois actuel en français

                $paymentNotification = "Le paiement doit avoir lieu le " . $defaultPaymentDate . " de ce mois de " . $currentMonthName . ".";
            } 
            // Si la date de paiement est passée, générer la notification pour le mois suivant
            else {
                $nextMonth = Carbon::now()->addMonth();
                $nextMonthName = $nextMonth->translatedFormat('F'); // Mois suivant en français

                $paymentNotification = "Le paiement doit avoir lieu le " . $defaultPaymentDate . " du mois de " . $nextMonthName . ".";
            }
        }

        // Passer les variables à la vue
        return view('dashboard', compact('totalEmployes', 'paymentNotification'));
    }
}
