<?php

use App\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;


class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'name' => 'Leonardo',
                'cognome' => 'Rosso',
                'email' => 'rossoleo@gmail.com',
                'address' => 'Via X Settembre, 4',
            ],
            [
                'name' => 'Onesto',
                'cognome' => 'Focaccia',
                'email' => 'focaccioso@gmail.com',
                'address' => 'Via Luca, 10',
            ],
            [
                'name' => 'Sifrido',
                'cognome' => 'Oliveto',
                'email' => 'sifredi@hotmail.com',
                'address' => 'Via Centrale, 5',
            ],
            [
                'name' => 'Osmildo',
                'cognome' => 'Ponzetto',
                'email' => 'ponzettino@gmail.it',
                'address' => 'Via Roma, 25',
            ],
            [
                'name' => 'Tersina',
                'cognome' => 'Ziano',
                'email' => 'tiziazia@gmail.com',
                'address' => 'Via Giovani D\'ercole, 30',
            ],
            [
                'name' => 'Primo',
                'cognome' => 'Nardecchi',
                'email' => 'secondo@gmail.com',
                'address' => 'Via Garibaldi, 28',
            ],
            [
                'name' => 'Ruperto',
                'cognome' => 'Aggravi',
                'email' => 'rupertoruperto@gmail.com',
                'address' => 'Via Ponzi, 12',
            ],
            [
                'name' => 'Mirko',
                'cognome' => 'Marcantoni',
                'email' => 'mirko@gmail.com',
                'address' => 'Piazza Venezia, 12',
            ],
            [
                'name' => 'Lorenzo',
                'cognome' => 'Di Alessandro',
                'email' => 'lorenz@gmail.com',
                'address' => 'Rua Grande, 2',
            ],
            [
                'name' => 'Samuel',
                'cognome' => 'Odubanjo',
                'email' => 'sammy@gmail.com',
                'address' => 'Largo Vittorio, 10',
            ],
            [
                'name' => 'Roberto',
                'cognome' => 'Vico',
                'email' => 'vico@gmail.com',
                'address' => 'Via Togliatti, 7',
            ],
            [
                'name' => 'Silvio',
                'cognome' => 'Di Marco',
                'email' => 'dmsilvio@gmail.com',
                'address' => 'Via Pompei, 12',
            ],
            [
                'name' => 'Stefano',
                'cognome' => 'De Amicis',
                'email' => 'steph@gmail.com',
                'address' => 'Via della Gloria, 42',
            ],
            [
                'name' => 'Donato',
                'cognome' => 'La Grazia',
                'email' => 'donny@gmail.com',
                'address' => 'Via dei Martiri, 32',
            ],
            [
                'name' => 'Grazia',
                'cognome' => 'Negata',
                'email' => 'thanks@gmail.com',
                'address' => 'Via Gran Sasso, 6',
            ],
            [
                'name' => 'Andrea',
                'cognome' => 'Di Andrea',
                'email' => 'andreas@gmail.com',
                'address' => 'Piano Solare, 44',
            ],
            [
                'name' => 'Leonardo',
                'cognome' => 'Kasper',
                'email' => 'leofantasma@gmail.com',
                'address' => 'Via Ponzi, 76',
            ],
            [
                'name' => 'Luca',
                'cognome' => 'Aggravi',
                'email' => 'luca@gmail.com',
                'address' => 'Via Ponzi, 14',
            ],
            [
                'name' => 'Danny',
                'cognome' => 'Grossi',
                'email' => 'grossidan@gmail.com',
                'address' => 'Via Napoleone, 12',
            ],
            [
                'name' => 'Sabrina',
                'cognome' => 'Arcangeli',
                'email' => 'sabry@gmail.com',
                'address' => 'Quartiere dei fiori, 18',
            ],
            [
                'name' => 'Luigi',
                'cognome' => 'Massimi',
                'email' => 'gigimax@gmail.com',
                'address' => 'Corso San Giorgio, 2',
            ],
            [
                'name' => 'Sandro',
                'cognome' => 'De Magicis',
                'email' => 'sandrino@gmail.com',
                'address' => 'Corso Vittorio Emanuele, 34',
            ],
            [
                'name' => 'Fantino',
                'cognome' => 'Esposito',
                'email' => 'fante@gmail.com',
                'address' => 'Via Madonna Delle Grazie, 1',
            ],
            [
                'name' => 'Daria',
                'cognome' => 'Gallo',
                'email' => 'dariag@gmail.com',
                'address' => 'Via Salvi, 88',
            ],
            [
                'name' => 'Gilberto',
                'cognome' => 'Colombo',
                'email' => 'gilcolo@gmail.com',
                'address' => 'Via Salvi, 65',
            ],
            [
                'name' => 'Eleuterio',
                'cognome' => 'Moretti',
                'email' => 'morettishow@gmail.com',
                'address' => 'Piazzetta Scalette Rubiani, 10',
            ],
            [
                'name' => 'Lina',
                'cognome' => 'Calabresi',
                'email' => 'linacal@gmail.com',
                'address' => 'Via Enrico Fermi, 10',
            ],
        ];

        foreach ($orders as $order) {
            $newOrder = new Order();
            $newOrder->name = $order['name'];
            $newOrder->cognome = $order['cognome'];
            $newOrder->email = $order['email'];
            $newOrder->user_id = rand(2, count(User::all()));
            $newOrder->address = $order['address'];
            $newOrder->telephone = '3' . rand(111111111, 999999999);
            $newOrder->total = rand(10, 250);
            $newOrder->save();

            $random = rand(1, 4);
            $foods = [];
            for ($i = 0; $i < $random; $i++) {
                $newFood = rand(1, 3);
                if (!in_array($newFood, $foods)) {
                    $foods[] = $newFood;
                }
            }

            foreach ($foods as $food) {
                $newOrder->foods()->attach($food, ['quantity' => rand(1, 4)]);
            }
        }
    }
}
