<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Presence;
use Carbon\Carbon;

class PresenceController extends Controller
{
    /**
     * Afficher la fiche de présence pour la date du jour.
     */
    public function fiche_presence_du_jour()
    {
        // Obtenir la date d'aujourd'hui
        $today = Carbon::today();

        // Obtenir la liste des employés
        $employes = Employe::all();

        // Vérifier s'il y a déjà une fiche de présence pour aujourd'hui
        $presences = Presence::whereDate('date', $today)->get();

        // Si aucune présence pour aujourd'hui, créer une fiche de présence pour chaque employé
        if ($presences->isEmpty()) {
            foreach ($employes as $employe) {
                Presence::create([
                    'employe_id' => $employe->id,
                    'date' => $today,
                    'est_present' => true, // Par défaut, l'employé est marqué comme présent
                ]);
            }

            // Recharger les présences après création
            $presences = Presence::whereDate('date', $today)->get();
        }

        return view('presence.fiche_du_jour', compact('presences', 'today'));
    }

    /**
     * Enregistrer la fiche de présence soumise.
     */
    public function enregistrer_presence(Request $request)
    {
        foreach ($request->presences as $presenceId => $presenceData) {
            $presence = Presence::find($presenceId);
            
            // Mettre à jour la présence
            $presence->est_present = $presenceData['est_present'];
            
            // Motif seulement s'il est absent
            if ($presenceData['est_present'] == 0) {
                $presence->motif = $presenceData['motif'] ?? 'Non spécifié'; // Ajouter le motif
            } else {
                $presence->motif = null; // Aucun motif s'il est présent
            }
            
            $presence->save();
        }

        return redirect()->route('presences.liste')->with('status', 'Présences enregistrées avec succès !');
    }

    /**
     * Afficher la liste des présences, groupées par date.
     */
    public function liste_presences()
    {
        // Récupérer les présences avec les employés et les regrouper par date
        $presences = Presence::with('employe')->orderBy('date', 'desc')->get()->groupBy('date');

        return view('presence.liste', compact('presences'));
    }

    /**
     * Mettre à jour le motif d'absence via une requête AJAX.
     */
    public function update_motif_ajax(Request $request)
    {

        
        // Valider les données
        $request->validate([
            'presence_id' => 'required|exists:presences,id',
            'motif' => 'required|string|max:255',
        ]);

        // Trouver la présence
        $presence = Presence::find($request->presence_id);

        // Si l'employé est absent, mettre à jour le motif
        if (!$presence->est_present) {
            $presence->motif = $request->motif;
            $presence->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
