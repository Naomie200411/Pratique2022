<?php

namespace Database\Seeders;

use App\Models\Artiste;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtisteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artiste::Create([
            'nom'=>'TOKOUDAGBA',
            'prenom'=>'Cyprien',
            'telephone'=>'+22990829540'

        ]);

        Artiste::Create([
            'nom'=>'PEDE',
            'prenom'=>'Apollinaire',
            'telephone'=>'+22941632564'
        ]);
    }
}
