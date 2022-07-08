<?php

use Illuminate\Database\Seeder;
use App\PotionIngredient;

class PotionIngredientsTableSeeder extends Seeder
{
    public function run()
    {
        // TODO: 1 ITEM
        if (PotionIngredient::where('name', 'Petalos')->where('potion_id','=',1)->first() == null ) {
            $PotionIngredient = new PotionIngredient();
            $PotionIngredient->name = "Petalos";
            $PotionIngredient->amount = 2;
            $PotionIngredient->price = 2000;
            $PotionIngredient->potion_id = 1;
            $PotionIngredient->save();
        }
        if (PotionIngredient::where('name', 'Sal de mar')->where('potion_id','=',1)->first() == null) {
            $PotionIngredient = new PotionIngredient();
            $PotionIngredient->name = "Sal de mar";
            $PotionIngredient->amount = 1;
            $PotionIngredient->price = 3000;
            $PotionIngredient->potion_id = 1;
            $PotionIngredient->save();
        }
        if (PotionIngredient::where('name', 'Vino')->where('potion_id','=',1)->first() == null) {
            $PotionIngredient = new PotionIngredient();
            $PotionIngredient->name = "Vino";
            $PotionIngredient->amount = 4;
            $PotionIngredient->price = 6000;
            $PotionIngredient->potion_id = 1;
            $PotionIngredient->save();
        }
        if (PotionIngredient::where('name', 'Polvo magico')->where('potion_id','=',1)->first() == null) {
            $PotionIngredient = new PotionIngredient();
            $PotionIngredient->name = "Polvo magico";
            $PotionIngredient->amount = 3;
            $PotionIngredient->price = 30000;
            $PotionIngredient->potion_id = 1;
            $PotionIngredient->save();
        }
        // TODO 2 ITEM
        if (PotionIngredient::where('name', 'Cenizas')->where('potion_id','=',2)->first() == null) {
            $PotionIngredient = new PotionIngredient();
            $PotionIngredient->name = "Cenizas";
            $PotionIngredient->amount = 3;
            $PotionIngredient->price = 2500;
            $PotionIngredient->potion_id = 2;
            $PotionIngredient->save();
        }
        if (PotionIngredient::where('name', 'Aloe vera')->where('potion_id','=',2)->first() == null) {
            $PotionIngredient = new PotionIngredient();
            $PotionIngredient->name = "Aloe vera";
            $PotionIngredient->amount = 3;
            $PotionIngredient->price = 1500;
            $PotionIngredient->potion_id = 2;
            $PotionIngredient->save();
        }
        if (PotionIngredient::where('name', 'Lagrima de gato')->where('potion_id','=',2)->first() == null) {
            $PotionIngredient = new PotionIngredient();
            $PotionIngredient->name = "Lagrima de gato";
            $PotionIngredient->amount = 1;
            $PotionIngredient->price = 9000;
            $PotionIngredient->potion_id = 2;
            $PotionIngredient->save();
        }
        if (PotionIngredient::where('name', 'Jugo magico')->where('potion_id','=',2)->first() == null) {
            $PotionIngredient = new PotionIngredient();
            $PotionIngredient->name = "Jugo magico";
            $PotionIngredient->amount = 3;
            $PotionIngredient->price = 27000;
            $PotionIngredient->potion_id = 2;
            $PotionIngredient->save();
        }

        // TODO: 3 ITEM
        if (PotionIngredient::where('name', 'Sanguijuelas')->where('potion_id','=',3)->first() == null) {
            $PotionIngredient = new PotionIngredient();
            $PotionIngredient->name = "Sanguijuelas";
            $PotionIngredient->amount = 2;
            $PotionIngredient->price = 13000;
            $PotionIngredient->potion_id = 3;
            $PotionIngredient->save();
        }
        if (PotionIngredient::where('name', 'Polvo de cuerno de bicornio')->where('potion_id','=',3)->first() == null) {
            $PotionIngredient = new PotionIngredient();
            $PotionIngredient->name = "Polvo de cuerno de bicornio";
            $PotionIngredient->amount = 1;
            $PotionIngredient->price = 65000;
            $PotionIngredient->potion_id = 3;
            $PotionIngredient->save();
        }
        if (PotionIngredient::where('name', 'Lagrima de gato')->where('potion_id','=',3)->first() == null) {
            $PotionIngredient = new PotionIngredient();
            $PotionIngredient->name = "Lagrima de gato";
            $PotionIngredient->amount = 3;
            $PotionIngredient->price = 9000;
            $PotionIngredient->potion_id = 3;
            $PotionIngredient->save();
        }
        if (PotionIngredient::where('name', 'Polvo magico')->where('potion_id','=',3)->first() == null) {
            $PotionIngredient = new PotionIngredient();
            $PotionIngredient->name = "Polvo magico";
            $PotionIngredient->amount = 2;
            $PotionIngredient->price = 30000;
            $PotionIngredient->potion_id = 3;
            $PotionIngredient->save();
        }
        if (PotionIngredient::where('name', 'Sal de mar')->where('potion_id','=',3)->first() == null) {
            $PotionIngredient = new PotionIngredient();
            $PotionIngredient->name = "Sal de mar";
            $PotionIngredient->amount = 1;
            $PotionIngredient->price = 3000;
            $PotionIngredient->potion_id = 3;
            $PotionIngredient->save();
        }
        if (PotionIngredient::where('name', 'Cenizas')->where('potion_id','=',3)->first() == null) {
            $PotionIngredient = new PotionIngredient();
            $PotionIngredient->name = "Cenizas";
            $PotionIngredient->amount = 3;
            $PotionIngredient->price = 2500;
            $PotionIngredient->potion_id = 3;
            $PotionIngredient->save();
        }

    }
}
