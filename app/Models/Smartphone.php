<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smartphone extends Model
{
    use HasFactory; // Assurez-vous que cette ligne est bien présente

    protected $fillable = [
        'nom', 'marque', 'description', 'prix', 'photo', 
        'ram', 'rom', 'ecran', 'couleurs_disponibles'
    ];
}

