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
                'categories' => [1,2]
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
                'categories' => [1,10]
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
                'categories' => [1,11]
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
