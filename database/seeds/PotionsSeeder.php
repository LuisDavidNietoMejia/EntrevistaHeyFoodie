<?php

use Illuminate\Database\Seeder;
use App\Potion;

class PotionsTableSeeder extends Seeder
{
    public function run()
    {
        if (Potion::where('name', 'Poción de amor')->first() == null) {
            $Potion = new Potion();
            $Potion->name = "Poción de amor";
            $Potion->save();
        }
        if (Potion::where('name', 'Poción alisadora')->first() == null) {
            $Potion = new Potion();
            $Potion->name = "Poción alisadora";
            $Potion->save();
        }
        if (Potion::where('name', 'Poción multijugos')->first() == null) {
            $Potion = new Potion();
            $Potion->name = "Poción multijugos";
            $Potion->save();
        }
    }
}
