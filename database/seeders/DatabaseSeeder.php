<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Smartphone;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        // Ajouter quelques smartphones
        Smartphone::factory()->count(5)->create();  // Génère 5 smartphones

        // Ou créer un smartphone manuellement
        Smartphone::create([
            'nom' => 'Galaxy S21',
            'marque' => 'Samsung',
            'description' => 'Smartphone haut de gamme',
            'prix' => 999.99,
            'photo' => 's21.jpg',
            'ram' => '8GB',
            'rom' => '128GB',
            'ecran' => '6.2 pouces',
            'couleurs_disponibles' => 'Noir, Bleu, Argent',
        ]);
        
       
    }
   
}
