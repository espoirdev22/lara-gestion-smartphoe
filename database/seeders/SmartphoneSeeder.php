<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Smartphone;

class SmartphoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $smartphones = [
            [
                'nom' => 'Samsung Galaxy S24 Ultra',
                'marque' => 'Samsung',
                'description' => 'Écran Dynamic AMOLED 2X, appareil photo 200MP, batterie 5000mAh.',
                'prix' => 1299.99,
                'photo' => 'https://images.unsplash.com/photo-1610792516307-ea5acd9c3b00',
                'ram' => '12GB',
                'rom' => '256GB',
                'ecran' => '6.8"',
                'couleurs_disponibles' => 'Noir, Bleu, Vert',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'iPhone 15 Pro Max',
                'marque' => 'Apple',
                'description' => 'Écran Super Retina XDR, puce A17 Bionic, appareil photo triple 48MP.',
                'prix' => 1499.99,
                'photo' => 'https://images.pexels.com/photos/699122/pexels-photo-699122.jpeg',
                'ram' => '8GB',
                'rom' => '512GB',
                'ecran' => '6.7"',
                'couleurs_disponibles' => 'Or, Argent, Graphite',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Google Pixel 8 Pro',
                'marque' => 'Google',
                'description' => 'Écran OLED 120Hz, appareil photo triple 50MP, Android 14.',
                'prix' => 999.99,
                'photo' => 'https://images.unsplash.com/photo-1601784551446-20c9e07cdbdb',
                'ram' => '12GB',
                'rom' => '128GB',
                'ecran' => '6.7"',
                'couleurs_disponibles' => 'Noir, Blanc, Vert',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ajoutez ici les autres smartphones...
        ];

        foreach ($smartphones as $smartphone) {
            Smartphone::create($smartphone);
        }
    }
}
