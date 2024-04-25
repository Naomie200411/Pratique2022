<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorie::Create([
            'nomCategorie'=>'Trésors royaux'
        ]);

        Categorie::Create([
            'nomCategorie'=>'Arts contemporains'
        ]);
    }
}
