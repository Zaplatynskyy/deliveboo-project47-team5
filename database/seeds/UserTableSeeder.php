<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => 'ciao2022',
                'address' => 'admin',
                'p_iva' => '00000000000',
                'telephone' => '0000000000',
                'image' => 'image',
                'shipping' => '0',
                'min_price' => '0',
                'categories' => [1]
            ],
            [
                'name' => 'Pizzeria da Ciro',
                'email' => 'ciro@gmail.com',
                'password' => 'ciao2022',
                'address' => 'Via X Settembre, 10',
                'p_iva' => '84124245248',
                'telephone' => '0623413455',
                'image' => 'uploads/IyJPGGXGfieGOe4ANZJJQsvRTlfyzgmMR5JGJK42.jpg',
                'shipping' => '1',
                'min_price' => '10',
                'categories' => [1, 3]
            ],
            [
                'name' => 'Gino Piada',
                'email' => 'gino@gmail.com',
                'password' => 'ciao2022',
                'address' => 'Via Mantova, 10',
                'p_iva' => '34823413440',
                'telephone' => '0634234235',
                'image' => 'uploads/piadina-al-crudo.jpg',
                'shipping' => '2',
                'min_price' => '10',
                'categories' => [1, 10]
            ],
            [
                'name' => 'Da Giovanni - Gelateria Duse Dal 1958',
                'email' => 'duse@gmail.com',
                'password' => 'ciao2022',
                'address' => 'Corso Trieste, 151',
                'p_iva' => '72443242314',
                'telephone' => '069023437',
                'image' => 'uploads/gelato-1024x683.jpg',
                'shipping' => '2.20',
                'min_price' => '15',
                'categories' => [1, 11]
            ],
            [
                'name' => "McDonald's",
                'email' => 'mcdonalds@gmail.com',
                'password' => 'ciao2022',
                'address' => 'Via Trento, 131',
                'p_iva' => '75323242314',
                'telephone' => '089023437',
                'image' => 'uploads/mcdonalds.jpg',
                'shipping' => '2.00',
                'min_price' => '15',
                'categories' => [2, 9]
            ],
            [
                'name' => 'Ingordo Sushi',
                'email' => 'ingordosushi@gmail.com',
                'password' => 'ciao2022',
                'address' => 'Via Roma, 260',
                'p_iva' => '75323241214',
                'telephone' => '089643437',
                'image' => 'uploads/ingordo-sushi.jpg',
                'shipping' => '2.00',
                'min_price' => '20',
                'categories' => [5]
            ],
            [
                'name' => 'Indian Restaurant',
                'email' => 'indian@gmail.com',
                'password' => 'ciao2022',
                'address' => 'Via Nizza, 73',
                'p_iva' => '45323241214',
                'telephone' => '089963437',
                'image' => 'uploads/indian-restaurant.jpg',
                'shipping' => '2.00',
                'min_price' => '10',
                'categories' => [6]
            ],
            [
                'name' => 'La Muraglia',
                'email' => 'muraglia@gmail.com',
                'password' => 'ciao2022',
                'address' => 'Via Laspro, 23',
                'p_iva' => '45323212214',
                'telephone' => '081963437',
                'image' => 'uploads/muraglia.jpg',
                'shipping' => '2.00',
                'min_price' => '10',
                'categories' => [4]
            ],
            [
                'name' => 'Ahorita Mexican Bowl',
                'email' => 'ahorita@gmail.com',
                'password' => 'ciao2022',
                'address' => 'Via Carmine, 105',
                'p_iva' => '21323212214',
                'telephone' => '084963437',
                'image' => 'uploads/ahorita.jpg',
                'shipping' => '1.00',
                'min_price' => '15',
                'categories' => [7]
            ],
            [
                'name' => 'Buonissimo Kebab',
                'email' => 'kebab@gmail.com',
                'password' => 'ciao2022',
                'address' => 'Via Calenda, 47',
                'p_iva' => '45623212214',
                'telephone' => '098963437',
                'image' => 'uploads/kebab-buonissimo.jpg',
                'shipping' => '1.00',
                'min_price' => '5',
                'categories' => [8]
            ],
        ];

        foreach ($users as $user) {
            $newUser = new User();
            $newUser->name = $user['name'];
            $newUser->slug = Str::of($user['name'])->slug('-');
            $newUser->email = $user['email'];
            $newUser->password = Hash::make($user['password']);
            $newUser->address = $user['address'];
            $newUser->image = $user['image'];
            $newUser->p_iva = $user['p_iva'];
            $newUser->telephone = $user['telephone'];
            $newUser->shipping = $user['shipping'];
            $newUser->min_price = $user['min_price'];
            $newUser->save();
            $newUser->categories()->sync($user['categories']);
        }
    }
}
