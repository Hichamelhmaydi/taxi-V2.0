<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'passager_id',
        'chauffeur_id',
        'date_heure_depart',
        'lieu_depart',
        'lieu_arrivee',
        'statut',
    ];
}

