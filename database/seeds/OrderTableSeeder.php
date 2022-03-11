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
                'user_id' => 1,
                'address' => 'Via X Settembre, 4',
                'telephone' => '336344325',
                'total' => '103.00'
            ],
            [
                'name' => 'Francesco',
                'cognome' => 'Diprè',
                'user_id' => 1,
                'address' => 'Via Pippo, 10',
                'telephone' => '304774134',
                'total' => '250.00'
            ],
        ];

        foreach ($orders as $order) {
            $newOrder = new Order();
            $newOrder->name = $order['name'];
            $newOrder->cognome = $order['cognome'];
            $newOrder->user_id = $order['user_id'];
            $newOrder->address = $order['address'];
            $newOrder->telephone = $order['telephone'];
            $newOrder->total = $order['total'];
            $newOrder->save();
        }
    }
}
