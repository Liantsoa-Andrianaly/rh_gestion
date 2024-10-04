<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Configuration;
use App\Models\Payment;
use Carbon\Carbon;
use  PDF;



class PaymentController extends Controller
{
    public function index()
    {

        $configPaymentDay = \DB::table('configurations')->where('type', 'PAYMENT_DATE')->value('value');
    
    // Date actuelle
    $currentDate = \Carbon\Carbon::now();

    // Ajouter l'année et le mois actuels pour former une date complète
        $currentYear = $currentDate->year;
        $currentMonth = $currentDate->month;
        $paymentDate = \Carbon\Carbon::createFromDate($currentYear, $currentMonth, $configPaymentDay);

        $defaultPaymentDateQuery = Configuration::where('type', 'PAYMENT_DATE')->first();
        $defaultPaymentDate = $defaultPaymentDateQuery->value;
        $convertedPaymentDate = intval($defaultPaymentDate);
        $today = date('d');

        //$isPaymentDay = false;

        $isPaymentDay = $currentDate->isSameDay($paymentDate);

        if($today == $convertedPaymentDate){
            $isPaymentDay = true;
        }

        // Récupérer tous les paiements
        $payments = Payment::with('employe')->get();
        return view('payments.index', compact('payments','paymentDate', 'isPaymentDay'));
    }

    public function create()
    {
        // Récupérer tous les employés pour le formulaire
        $employes = Employe::all();
        return view('payments.create', compact('employes'));
    }

    public function store(Request $request)
{
    // Valider les données
    $request->validate([
        'employe_id' => 'required|exists:employes,id',
        'amount' => 'required|numeric',
        'payment_date' => 'required|date',
    ]);

    // Extraire le mois et l'année de la date de paiement
    $paymentDate = Carbon::parse($request->payment_date);
    $month = $paymentDate->month;
    $year = $paymentDate->year;

    // Créer un nouveau paiement
    Payment::create([
        'employe_id' => $request->employe_id,
        'amount' => $request->amount,
        'payment_date' => $request->payment_date,
        'month' => $month,
        'year' => $year,
        'status' => 'completed', // Vous pouvez gérer le statut selon vos besoins
    ]);

    $message = "Paiement créé pour le {$month}ème mois {$year}.";

    return redirect()->route('payments.index')->with('success', $message);
    }

   public function downloadInvoice($paymentId){
    $payment = Payment::with('employe')->find($paymentId);

    if (!$payment) {
        return redirect()->back()->withErrors(['message' => 'Payment not found.']);
    }

    // Générer le PDF
    $pdf = PDF::loadView('payments.facture', compact('payment'));

    // Télécharger le PDF
    return $pdf->download('facture_' . $payment->employe->prenom . '.pdf');

   }    
}
