<?php

use App\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


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
                'user_id' => 2,
                'address' => 'Via X Settembre, 4',
            ],
            [
                'name' => 'Onesto',
                'cognome' => 'Focaccia',
                'email' => 'focaccioso@gmail.com',
                'user_id' => 2,
                'address' => 'Via Luca, 10',
            ],
            [
                'name' => 'Sifrido',
                'cognome' => 'Oliveto',
                'email' => 'sifredi@hotmail.com',
                'user_id' => 2,
                'address' => 'Via Centrale, 5',
            ],
            [
                'name' => 'Osmildo',
                'cognome' => 'Ponzetto',
                'email' => 'ponzettino@gmail.it',
                'user_id' => 2,
                'address' => 'Via Roma, 25',
            ],
            [
                'name' => 'Tersina',
                'cognome' => 'Ziano',
                'email' => 'tiziazia@gmail.com',
                'user_id' => 2,
                'address' => 'Via Giovani D\'ercole, 30',
            ],
            [
                'name' => 'Primo',
                'cognome' => 'Nardecchi',
                'email' => 'secondo@gmail.com',
                'user_id' => 2,
                'address' => 'Via Garibaldi, 28',
            ],
            [
                'name' => 'Ruperto',
                'cognome' => 'Aggravi',
                'email' => 'rupertoruperto@gmail.com',
                'user_id' => 2,
                'address' => 'Via Ponzi, 12',
            ],
        ];

        foreach ($orders as $order) {
            $newOrder = new Order();
            $newOrder->name = $order['name'];
            $newOrder->cognome = $order['cognome'];
            $newOrder->email = $order['email'];
            $newOrder->user_id = $order['user_id'];
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
