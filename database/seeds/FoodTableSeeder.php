<?php

use App\Food;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = [
            [
                "name" => "Margherita",
                "user_id" => 2,
                "image" => "uploads/Pizza-margherita-fatta-in-casa-orizzontale.jpeg",
                "price" => 5,
                "types" => 1,
                "ingredients" => "Pomodoro, Mozzarella, Basilico",
                "visible" => true
            ],
            [
                "name" => "Marinara",
                "image" => "uploads/pizza-marinara.jpg",
                "user_id" => 2,
                "types" => 1,
                "price" => 4,
                "ingredients" => "Pomodoro, Aglio, Origano",
                "visible" => true
            ],
            [
                "name" => "Diavola",
                "image" => "uploads/pizza-diavola.jpg",
                "user_id" => 2,
                "types" => 1,
                "price" => 6,
                "ingredients" => "Pomodoro, Mozzarella, Salame",
                "visible" => true
            ],
            [
                "name" => "Tonno e Cipolle",
                "image" => "uploads/pizza-tonno-cipolle.jpg",
                "user_id" => 2,
                "types" => 1,
                "price" => 7,
                "ingredients" => "Pomodoro, Mozzarella, Tonno, Cipolla",
                "visible" => true
            ],
            [
                "name" => "America",
                "image" => "uploads/pizza-america.jpg",
                "user_id" => 2,
                "types" => 1,
                "price" => 5,
                "ingredients" => "Mozzarella, Wurstel, Patatine Fritte",
                "visible" => true
            ],
            [
                "name" => "4 Stagioni",
                "image" => "uploads/pizza-4-stagioni.jpg",
                "user_id" => 2,
                "types" => 1,
                "price" => 7,
                "ingredients" => "Pomodoro, Mozzarella, Funghi, Prosciutto Cotto, Carciofi, Olive",
                "visible" => true
            ],
            [
                "name" => "Ortolana",
                "image" => "uploads/pizza-ortolana.jpg",
                "user_id" => 2,
                "types" => 1,
                "price" => 7,
                "ingredients" => "Mozzarella, Melanzane, Zucchine, Peperoni",
                "visible" => true
            ],
            [
                "name" => "4 Formaggi",
                "image" => "uploads/pizza-formaggi.jpg",
                "user_id" => 2,
                "types" => 1,
                "price" => 8,
                "ingredients" => "Mozzarella, Emmenthal, Fontina, Gorgonzola, Parmigiano",
                "visible" => true
            ],

            [
                "name" => "Big Mac",
                "image" => "uploads/big-mac.png",
                "user_id" => 5,
                "types" => 5,
                "price" => 6,
                "ingredients" => "Carne Bovina, Formaggio, Salsa Big Mac, Insalata, Cipolla, Cetriolo",
                "visible" => true
            ],
            [
                "name" => "Gran Crispy McBacon",
                "image" => "uploads/gran-crispy.png",
                "user_id" => 5,
                "types" => 5,
                "price" => 7,
                "ingredients" => "Carne Bovina, Formaggio, Bacon, Salsa Crispy",
                "visible" => true
            ],
            [
                "name" => "Double Cheeseburger",
                "image" => "uploads/double-cheeseburger.png",
                "user_id" => 5,
                "types" => 5,
                "price" => 5,
                "ingredients" => "Carne Bovina, Formaggio, Ketchup, Senape, Cipolla, Cetriolo",
                "visible" => true
            ],
            [
                "name" => "McChicken Originale",
                "image" => "uploads/mcchicken.png",
                "user_id" => 5,
                "types" => 5,
                "price" => 7,
                "ingredients" => "Petto di Pollo, Insalata Iceberg, Salsa McChicken",
                "visible" => true
            ],
            [
                "name" => "Filet-O-Fish",
                "image" => "uploads/filetofish.png",
                "user_id" => 5,
                "types" => 5,
                "price" => 5,
                "ingredients" => "Merluzzo Impanato, Formaggio, Salsa Tartara",
                "visible" => true
            ],
            [
                "name" => "Patatine",
                "image" => "uploads/patatine.png",
                "user_id" => 5,
                "types" => 3,
                "price" => 3,
                "ingredients" => "Patatine Fritte",
                "visible" => true
            ],
            [
                "name" => "Coca Cola",
                "image" => "uploads/cocacola.png",
                "user_id" => 5,
                "types" => 8,
                "price" => 3,
                "ingredients" => "Coca Cola",
                "visible" => true
            ],
            [
                "name" => "Sashimi Sake",
                "image" => "uploads/sashimi-sake.jpg",
                "user_id" => 6,
                "types" => 6,
                "price" => 8,
                "ingredients" => "Salmone",
                "visible" => true
            ],
            [
                "name" => "Sashimi Maguro",
                "image" => "uploads/sashimi-maguro.jpg",
                "user_id" => 6,
                "types" => 6,
                "price" => 8,
                "ingredients" => "Tonno",
                "visible" => true
            ],
            [
                "name" => "Philadelphia Roll",
                "image" => "uploads/philadeplhia-roll.jpg",
                "user_id" => 6,
                "types" => 6,
                "price" => 10,
                "ingredients" => "Salmone, philadelphia, avocado, ricoperto da philadelphia",
                "visible" => true
            ],
            [
                "name" => "Arakawa roll",
                "image" => "uploads/rice-violet.jpg",
                "user_id" => 6,
                "types" => 6,
                "price" => 14,
                "ingredients" => "Polpa di granchio, mango, philadelphia, ricoperto da philadelphia e salsa dello chef ",
                "visible" => true
            ],
            [
                "name" => "Gelato Artigianale 500gr",
                "image" => "uploads/gelato-al-cioccolato.jpg",
                "user_id" => 4,
                "types" => 7,
                "price" => 12.50,
                "ingredients" => "Cioccolato",
                "visible" => true
            ],
            [
                "name" => "Gelato Artigianale 500gr",
                "image" => "uploads/gelato-al-pistacchio.jpg",
                "user_id" => 4,
                "types" => 7,
                "price" => 12.50,
                "ingredients" => "Pistacchio",
                "visible" => true
            ],
            [
                "name" => "Gosht Shahi Korma",
                "image" => "uploads/gosht.jpg",
                "user_id" => 7,
                "types" => 2,
                "price" => 9,
                "ingredients" => "Spezzatino di agnello o manzo cucinato in salsa guarnita con crema di anacardi",
                "visible" => true
            ],
            [
                "name" => "Reshimi Chicken Tikka",
                "image" => "uploads/tikka.jpg",
                "user_id" => 7,
                "types" => 2,
                "price" => 7,
                "ingredients" => "Bocconcini di pollo su carbone marinati in yogurt e spezie",
                "visible" => true
            ],
            [
                "name" => "Spaghetti alla Piastra",
                "image" => "uploads/spaghetti-piastra.jpg",
                "user_id" => 8,
                "types" => 1,
                "price" => 4,
                "ingredients" => "Spaghetti alla piastra",
                "visible" => true
            ],
            [
                "name" => "Maiale in Agrodolce",
                "image" => "uploads/maiale-in-agrodolce.png",
                "user_id" => 8,
                "types" => 2,
                "price" => 4,
                "ingredients" => "Maiale in salsa agrodolce",
                "visible" => true
            ],
            [
                "name" => "Miss Veggie",
                "image" => "uploads/miss-veggie.jpg",
                "user_id" => 9,
                "types" => 2,
                "price" => 17,
                "ingredients" => "Riso, feta, olive, avocado, fagioli rossi, mais, pico de gallo, cavolo cappuccio, peperoni e guacamole",
                "visible" => true
            ],
            [
                "name" => "Mr Pulled Pork",
                "image" => "uploads/pulled-pork.jpg",
                "user_id" => 9,
                "types" => 2,
                "price" => 17,
                "ingredients" => "Riso, fagioli rossi, mais, pico, guacamole, peperone verde, cipolla sott'aceto, sour cream, pulled pork, salsa bbq",
                "visible" => true
            ],
            [
                "name" => "Piadina Doner Kebab",
                "image" => "uploads/kebab-piadina.jpg",
                "user_id" => 10,
                "types" => 5,
                "price" => 5,
                "ingredients" => "Doner Kebab",
                "visible" => true
            ],
            [
                "name" => "Panino Doner Kebab",
                "image" => "uploads/panino-kebab.jpg",
                "user_id" => 10,
                "types" => 5,
                "price" => 6,
                "ingredients" => "Panino Kebab",
                "visible" => true
            ],
            [
                "name" => "La Leggenda",
                "image" => "uploads/la-leggenda.jpg",
                "user_id" => 3,
                "types" => 5,
                "price" => 7,
                "ingredients" => "Crudo, squacquerone, rucola",
                "visible" => true
            ],
            [
                "name" => "La Trentina",
                "image" => "uploads/la-trentina.jpg",
                "user_id" => 3,
                "types" => 5,
                "price" => 7,
                "ingredients" => "Speck, mozzarella, melanzane grigliate, maionese, lattuga",
                "visible" => true
            ],
            [
                "name" => "La Delicata",
                "image" => "uploads/la-delicata.jpg",
                "user_id" => 3,
                "types" => 5,
                "price" => 7,
                "ingredients" => "Bresaola, formaggio cremoso, rucola, noci",
                "visible" => true
            ],
            [
                "name" => "Chicken Boom",
                "image" => "uploads/chicken-boom.png",
                "user_id" => 11,
                "types" => 5,
                "price" => 6,
                "ingredients" => "Pollo, Cheddar, Bacon, Crispy Onion, Salsa bbq",
                "visible" => true
            ],
            [
                "name" => "Colonel's Burger",
                "image" => "uploads/colonel-burger.png",
                "user_id" => 11,
                "types" => 5,
                "price" => 7,
                "ingredients" => "Pollo, Cheddar, Bacon, Crispy Onion, Insalata, Maionese, Salsa bbq",
                "visible" => true
            ],
            [
                "name" => "Zinger",
                "image" => "uploads/zinger.jpg",
                "user_id" => 11,
                "types" => 5,
                "price" => 6,
                "ingredients" => "Pollo Hot & Spicy, Cheddar, Lattuga, Maionese",
                "visible" => true
            ],
            [
                "name" => "Double Krunch",
                "image" => "uploads/double-crunch.jpg",
                "user_id" => 11,
                "types" => 5,
                "price" => 7,
                "ingredients" => "2 Tender Crispy, Cheddar, Insalata, Maionese, Salsa al pepe nero",
                "visible" => true
            ],
            [
                "name" => "Chicken Grilled",
                "image" => "uploads/chicken-grilled.png",
                "user_id" => 11,
                "types" => 5,
                "price" => 5,
                "ingredients" => "Pollo grigliato, Cheddar, Insalata, Salsa al pepe nero",
                "visible" => true
            ],
            [
                "name" => "Bucket Tender Crispy",
                "image" => "uploads/bucket-tender.jpg",
                "user_id" => 11,
                "types" => 4,
                "price" => 12,
                "ingredients" => "Un Bucket con 12 deliziosi Tender Crispy",
                "visible" => true
            ],
            [
                "name" => "Coca Cola",
                "image" => "uploads/cocacola.png",
                "user_id" => 11,
                "types" => 8,
                "price" => 3,
                "ingredients" => "Coca Cola",
                "visible" => true
            ],
            [
                "name" => "Margherita",
                "user_id" => 12,
                "image" => "uploads/Pizza-margherita-fatta-in-casa-orizzontale.jpeg",
                "price" => 6,
                "types" => 1,
                "ingredients" => "Pomodoro, fior di latte di Agerola, olio e basilico",
                "visible" => true
            ],
            [
                "name" => "Marinara",
                "image" => "uploads/pizza-marinara.jpg",
                "user_id" => 12,
                "types" => 1,
                "price" => 6,
                "ingredients" => "Pomodoro, Aglio, Origano",
                "visible" => true
            ],
            [
                "name" => "Cosacca",
                "image" => "uploads/cosacca.jpg",
                "user_id" => 12,
                "types" => 1,
                "price" => 6,
                "ingredients" => "Pomodoro, Pecorino, olio e basilico",
                "visible" => true
            ],
            [
                "name" => "Marita",
                "image" => "uploads/marita.jpg",
                "user_id" => 12,
                "types" => 1,
                "price" => 6,
                "ingredients" => "Mezza Margherita e Mezza Marinara",
                "visible" => true
            ],
            [
                "name" => "Pizza Fritta",
                "image" => "uploads/pizza-fritta.jpg",
                "user_id" => 12,
                "types" => 1,
                "price" => 9,
                "ingredients" => "Pomodoro, Ricotta agerola, Provola, Ciccioli di maiale, Pepe",
                "visible" => true
            ],
            [
                "name" => "Sashimi Sake",
                "image" => "uploads/sashimi-sake.jpg",
                "user_id" => 13,
                "types" => 6,
                "price" => 8,
                "ingredients" => "Salmone",
                "visible" => true
            ],
            [
                "name" => "Sashimi Maguro",
                "image" => "uploads/sashimi-maguro.jpg",
                "user_id" => 13,
                "types" => 6,
                "price" => 8,
                "ingredients" => "Tonno",
                "visible" => true
            ],
            [
                "name" => "Philadelphia Roll",
                "image" => "uploads/philadeplhia-roll.jpg",
                "user_id" => 13,
                "types" => 6,
                "price" => 10,
                "ingredients" => "Salmone, philadelphia, avocado, ricoperto da philadelphia",
                "visible" => true
            ],
            [
                "name" => "Arakawa roll",
                "image" => "uploads/rice-violet.jpg",
                "user_id" => 13,
                "types" => 6,
                "price" => 14,
                "ingredients" => "Polpa di granchio, mango, philadelphia, ricoperto da philadelphia e salsa dello chef ",
                "visible" => true
            ],
            [
                "name" => "Sashimi Sake",
                "image" => "uploads/sashimi-sake.jpg",
                "user_id" => 14,
                "types" => 6,
                "price" => 8,
                "ingredients" => "Salmone",
                "visible" => true
            ],
            [
                "name" => "Sashimi Maguro",
                "image" => "uploads/sashimi-maguro.jpg",
                "user_id" => 14,
                "types" => 6,
                "price" => 8,
                "ingredients" => "Tonno",
                "visible" => true
            ],
            [
                "name" => "Philadelphia Roll",
                "image" => "uploads/philadeplhia-roll.jpg",
                "user_id" => 14,
                "types" => 6,
                "price" => 10,
                "ingredients" => "Salmone, philadelphia, avocado, ricoperto da philadelphia",
                "visible" => true
            ],
            [
                "name" => "Arakawa roll",
                "image" => "uploads/rice-violet.jpg",
                "user_id" => 14,
                "types" => 6,
                "price" => 14,
                "ingredients" => "Polpa di granchio, mango, philadelphia, ricoperto da philadelphia e salsa dello chef ",
                "visible" => true
            ],
            [
                "name" => "Margherita",
                "user_id" => 15,
                "image" => "uploads/Pizza-margherita-fatta-in-casa-orizzontale.jpeg",
                "price" => 5,
                "types" => 1,
                "ingredients" => "Pomodoro, Mozzarella, Basilico",
                "visible" => true
            ],
            [
                "name" => "Marinara",
                "image" => "uploads/pizza-marinara.jpg",
                "user_id" => 15,
                "types" => 1,
                "price" => 4,
                "ingredients" => "Pomodoro, Aglio, Origano",
                "visible" => true
            ],
            [
                "name" => "Diavola",
                "image" => "uploads/pizza-diavola.jpg",
                "user_id" => 15,
                "types" => 1,
                "price" => 6,
                "ingredients" => "Pomodoro, Mozzarella, Salame",
                "visible" => true
            ],
            [
                "name" => "Tonno e Cipolle",
                "image" => "uploads/pizza-tonno-cipolle.jpg",
                "user_id" => 15,
                "types" => 1,
                "price" => 7,
                "ingredients" => "Pomodoro, Mozzarella, Tonno, Cipolla",
                "visible" => true
            ],
            [
                "name" => "America",
                "image" => "uploads/pizza-america.jpg",
                "user_id" => 15,
                "types" => 1,
                "price" => 5,
                "ingredients" => "Mozzarella, Wurstel, Patatine Fritte",
                "visible" => true
            ],
            [
                "name" => "4 Stagioni",
                "image" => "uploads/pizza-4-stagioni.jpg",
                "user_id" => 15,
                "types" => 1,
                "price" => 7,
                "ingredients" => "Pomodoro, Mozzarella, Funghi, Prosciutto Cotto, Carciofi, Olive",
                "visible" => true
            ],
            [
                "name" => "Ortolana",
                "image" => "uploads/pizza-ortolana.jpg",
                "user_id" => 15,
                "types" => 1,
                "price" => 7,
                "ingredients" => "Mozzarella, Melanzane, Zucchine, Peperoni",
                "visible" => true
            ],
            [
                "name" => "4 Formaggi",
                "image" => "uploads/pizza-formaggi.jpg",
                "user_id" => 15,
                "types" => 1,
                "price" => 8,
                "ingredients" => "Mozzarella, Emmenthal, Fontina, Gorgonzola, Parmigiano",
                "visible" => true
            ],
            [
                "name" => "Margherita",
                "user_id" => 16,
                "image" => "uploads/Pizza-margherita-fatta-in-casa-orizzontale.jpeg",
                "price" => 5,
                "types" => 1,
                "ingredients" => "Pomodoro, Mozzarella, Basilico",
                "visible" => true
            ],
            [
                "name" => "Marinara",
                "image" => "uploads/pizza-marinara.jpg",
                "user_id" => 16,
                "types" => 1,
                "price" => 4,
                "ingredients" => "Pomodoro, Aglio, Origano",
                "visible" => true
            ],
            [
                "name" => "Diavola",
                "image" => "uploads/pizza-diavola.jpg",
                "user_id" => 16,
                "types" => 1,
                "price" => 6,
                "ingredients" => "Pomodoro, Mozzarella, Salame",
                "visible" => true
            ],
            [
                "name" => "Tonno e Cipolle",
                "image" => "uploads/pizza-tonno-cipolle.jpg",
                "user_id" => 16,
                "types" => 1,
                "price" => 7,
                "ingredients" => "Pomodoro, Mozzarella, Tonno, Cipolla",
                "visible" => true
            ],
            [
                "name" => "America",
                "image" => "uploads/pizza-america.jpg",
                "user_id" => 16,
                "types" => 1,
                "price" => 5,
                "ingredients" => "Mozzarella, Wurstel, Patatine Fritte",
                "visible" => true
            ],
            [
                "name" => "4 Stagioni",
                "image" => "uploads/pizza-4-stagioni.jpg",
                "user_id" => 16,
                "types" => 1,
                "price" => 7,
                "ingredients" => "Pomodoro, Mozzarella, Funghi, Prosciutto Cotto, Carciofi, Olive",
                "visible" => true
            ],
            [
                "name" => "Ortolana",
                "image" => "uploads/pizza-ortolana.jpg",
                "user_id" => 16,
                "types" => 1,
                "price" => 7,
                "ingredients" => "Mozzarella, Melanzane, Zucchine, Peperoni",
                "visible" => true
            ],
            [
                "name" => "4 Formaggi",
                "image" => "uploads/pizza-formaggi.jpg",
                "user_id" => 16,
                "types" => 1,
                "price" => 8,
                "ingredients" => "Mozzarella, Emmenthal, Fontina, Gorgonzola, Parmigiano",
                "visible" => true
            ],
            [
                "name" => "La Leggenda",
                "image" => "uploads/la-leggenda.jpg",
                "user_id" => 17,
                "types" => 5,
                "price" => 7,
                "ingredients" => "Crudo, squacquerone, rucola",
                "visible" => true
            ],
            [
                "name" => "La Trentina",
                "image" => "uploads/la-trentina.jpg",
                "user_id" => 17,
                "types" => 5,
                "price" => 7,
                "ingredients" => "Speck, mozzarella, melanzane grigliate, maionese, lattuga",
                "visible" => true
            ],
            [
                "name" => "La Delicata",
                "image" => "uploads/la-delicata.jpg",
                "user_id" => 17,
                "types" => 5,
                "price" => 7,
                "ingredients" => "Bresaola, formaggio cremoso, rucola, noci",
                "visible" => true
            ],
            [
                "name" => "La Leggenda",
                "image" => "uploads/la-leggenda.jpg",
                "user_id" => 18,
                "types" => 5,
                "price" => 7,
                "ingredients" => "Crudo, squacquerone, rucola",
                "visible" => true
            ],
            [
                "name" => "La Trentina",
                "image" => "uploads/la-trentina.jpg",
                "user_id" => 18,
                "types" => 5,
                "price" => 7,
                "ingredients" => "Speck, mozzarella, melanzane grigliate, maionese, lattuga",
                "visible" => true
            ],
            [
                "name" => "La Delicata",
                "image" => "uploads/la-delicata.jpg",
                "user_id" => 18,
                "types" => 5,
                "price" => 7,
                "ingredients" => "Bresaola, formaggio cremoso, rucola, noci",
                "visible" => true
            ],
            [
                "name" => "La Leggenda",
                "image" => "uploads/la-leggenda.jpg",
                "user_id" => 19,
                "types" => 5,
                "price" => 7,
                "ingredients" => "Crudo, squacquerone, rucola",
                "visible" => true
            ],
            [
                "name" => "La Trentina",
                "image" => "uploads/la-trentina.jpg",
                "user_id" => 19,
                "types" => 5,
                "price" => 7,
                "ingredients" => "Speck, mozzarella, melanzane grigliate, maionese, lattuga",
                "visible" => true
            ],
            [
                "name" => "La Delicata",
                "image" => "uploads/la-delicata.jpg",
                "user_id" => 19,
                "types" => 5,
                "price" => 7,
                "ingredients" => "Bresaola, formaggio cremoso, rucola, noci",
                "visible" => true
            ],
            [
                "name" => "Spaghetti alla Piastra",
                "image" => "uploads/spaghetti-piastra.jpg",
                "user_id" => 20,
                "types" => 1,
                "price" => 4,
                "ingredients" => "Spaghetti alla piastra",
                "visible" => true
            ],
            [
                "name" => "Maiale in Agrodolce",
                "image" => "uploads/maiale-in-agrodolce.png",
                "user_id" => 20,
                "types" => 2,
                "price" => 4,
                "ingredients" => "Maiale in salsa agrodolce",
                "visible" => true
            ],
            [
                "name" => "Spaghetti alla Piastra",
                "image" => "uploads/spaghetti-piastra.jpg",
                "user_id" => 21,
                "types" => 1,
                "price" => 4,
                "ingredients" => "Spaghetti alla piastra",
                "visible" => true
            ],
            [
                "name" => "Maiale in Agrodolce",
                "image" => "uploads/maiale-in-agrodolce.png",
                "user_id" => 21,
                "types" => 2,
                "price" => 4,
                "ingredients" => "Maiale in salsa agrodolce",
                "visible" => true
            ],
            [
                "name" => "Gelato Artigianale 500gr",
                "image" => "uploads/gelato-al-cioccolato.jpg",
                "user_id" => 22,
                "types" => 7,
                "price" => 12.50,
                "ingredients" => "Cioccolato",
                "visible" => true
            ],
            [
                "name" => "Gelato Artigianale 500gr",
                "image" => "uploads/gelato-al-pistacchio.jpg",
                "user_id" => 22,
                "types" => 7,
                "price" => 12.50,
                "ingredients" => "Pistacchio",
                "visible" => true
            ],
            [
                "name" => "Gelato Artigianale 500gr",
                "image" => "uploads/gelato-al-cioccolato.jpg",
                "user_id" => 23,
                "types" => 7,
                "price" => 12.50,
                "ingredients" => "Cioccolato",
                "visible" => true
            ],
            [
                "name" => "Gelato Artigianale 500gr",
                "image" => "uploads/gelato-al-pistacchio.jpg",
                "user_id" => 23,
                "types" => 7,
                "price" => 12.50,
                "ingredients" => "Pistacchio",
                "visible" => true
            ],
            [
                "name" => "Gosht Shahi Korma",
                "image" => "uploads/gosht.jpg",
                "user_id" => 24,
                "types" => 2,
                "price" => 9,
                "ingredients" => "Spezzatino di agnello o manzo cucinato in salsa guarnita con crema di anacardi",
                "visible" => true
            ],
            [
                "name" => "Reshimi Chicken Tikka",
                "image" => "uploads/tikka.jpg",
                "user_id" => 24,
                "types" => 2,
                "price" => 7,
                "ingredients" => "Bocconcini di pollo su carbone marinati in yogurt e spezie",
                "visible" => true
            ],
        ];

        foreach ($foods as $food) {
            $newFood = new Food();
            $newFood->name = $food['name'];
            $newFood->type_id = $food['types'];
            $newFood->user_id = $food['user_id'];
            $newFood->image = $food['image'];
            $newFood->price = $food['price'];
            $newFood->ingredients = $food['ingredients'];
            $newFood->visible = $food['visible'];
            $newFood->save();
        }
    }
}
