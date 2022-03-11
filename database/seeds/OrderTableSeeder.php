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
                'user_id' => 2,
                'address' => 'Via X Settembre, 4',
            ],
            [
                'name' => 'Onesto',
                'cognome' => 'Focaccia',
                'user_id' => 2,
                'address' => 'Via Luca, 10',
            ],
            [
                'name' => 'Sifrido',
                'cognome' => 'Oliveto',
                'user_id' => 2,
                'address' => 'Via Centrale, 5',
            ],
            [
                'name' => 'Osmildo',
                'cognome' => 'Ponzetto',
                'user_id' => 2,
                'address' => 'Via Roma, 25',
            ],
            [
                'name' => 'Tersina',
                'cognome' => 'Ziano',
                'user_id' => 2,
                'address' => 'Via Giovani D\'ercole, 30',
            ],
            [
                'name' => 'Primo',
                'cognome' => 'Nardecchi',
                'user_id' => 2,
                'address' => 'Via Garibaldi, 28',
            ],
            [
                'name' => 'Ruperto',
                'cognome' => 'Aggravi',
                'user_id' => 2,
                'address' => 'Via Ponzi, 12',
            ],
        ];

        foreach ($orders as $order) {
            $newOrder = new Order();
            $newOrder->name = $order['name'];
            $newOrder->cognome = $order['cognome'];
            $newOrder->user_id = $order['user_id'];
            $newOrder->address = $order['address'];
            $newOrder->telephone = '3'.rand(1111111111,9999999999);
            $newOrder->total = rand(10,250);
            $newOrder->save();
        }
    }
}
