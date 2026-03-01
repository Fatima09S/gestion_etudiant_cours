<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantCoursController extends Controller
{
    public function attach(Request $request, $id)
    {
        $etudiant = Etudiant::findOrFail($id);

        $request->validate([
            'cours_ids' => 'required|array',
            'cours_ids.*' => 'exists:cours,id'
        ]);

        $etudiant->cours()->attach($request->cours_ids);

        return response()->json([
            'message' => 'Cours attachés avec succès'
        ], 200);
    }

    public function detach(Request $request, $id)
    {
        $etudiant = Etudiant::findOrFail($id);

        $request->validate([
            'cours_ids' => 'required|array',
            'cours_ids.*' => 'exists:cours,id'
        ]);

        $etudiant->cours()->detach($request->cours_ids);

        return response()->json([
            'message' => 'Cours retirés avec succès'
        ], 200);
    }

    public function sync(Request $request, $id)
    {
        $etudiant = Etudiant::findOrFail($id);

        $request->validate([
            'cours_ids' => 'required|array',
            'cours_ids.*' => 'exists:cours,id'
        ]);

        $etudiant->cours()->sync($request->cours_ids);

        return response()->json([
            'message' => 'Cours synchronisés avec succès'
        ], 200);
    }
}