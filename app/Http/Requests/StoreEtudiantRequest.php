<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEtudiantRequest extends FormRequest
{
  public function authorize(): bool
{
    return true;
}

public function rules(): array
{
    return [
        'prenom' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'email' => 'required|email|unique:etudiants,email',
        'date_naissance' => 'required|date'
    ];
}
}
