<?php

use App\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            "Primo", "Secondo", "Contorno", "Antipasto", "Panino", "Pizza", "Stuzzicheria", "Sushi", "Dolce", "Bevande"
        ];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->slug = Str::of($newType->name)->slug("-");;
            $newType->save();
        }
    }
}
