<?php

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'date_naissance'
    ];

    public function cours()
    {
        return $this->belongsToMany(Cours::class);
    }
}