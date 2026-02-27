<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    public function etudiants()
{
    return $this->belongsToMany(Etudiant::class);
}
}
