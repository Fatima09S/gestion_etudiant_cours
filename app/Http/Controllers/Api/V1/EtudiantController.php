<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Etudiant;
use App\Http\Resources\EtudiantResource;
use App\Http\Requests\StoreEtudiantRequest;
use App\Http\Requests\UpdateEtudiantRequest;

class EtudiantController extends Controller
{
    public function index()
{
    $etudiants = Etudiant::paginate(10);

    return EtudiantResource::collection($etudiants);
}

public function store(StoreEtudiantRequest $request)
{
    $etudiant = Etudiant::create($request->validated());

    return new EtudiantResource($etudiant);
}

public function show(Etudiant $etudiant)
{
    return new EtudiantResource($etudiant);
}

public function update(UpdateEtudiantRequest $request, Etudiant $etudiant)
{
    $etudiant->update($request->validated());

    return new EtudiantResource($etudiant);
}

public function destroy(Etudiant $etudiant)
{
    $etudiant->delete();

    return response()->noContent();
}
}
