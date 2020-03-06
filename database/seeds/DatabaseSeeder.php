<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    /*    factory(App\Type::class, 10)->create();
      $ids = range(1, 10);
      factory(App\film::class, 40)->create()->each(function ($film) use($ids) {
          shuffle($ids);
          $film->types()->attach(array_slice($ids, 0, rand(1, 4)));
      }); */

      factory(App\Actor::class, 10)->create();
        $categories = [
            'Comédie',
            'Drame',
            'Action',
            'Fantastique',
            'Horreur',
            'Animation',
            'Espionnage',
            'Guerre',
            'Policier',
            'Pornographique',
        ];
        foreach($categories as $category) {
            App\Type::create(['name' => $category]);
        }
        $ids = range(1, 10);
        factory(App\film::class, 40)->create()->each(function ($film) use($ids) {
            shuffle($ids);
            $film->types()->attach(array_slice($ids, 0, rand(1, 4)));
            shuffle($ids);
            $film->actors()->attach(array_slice($ids, 0, rand(1, 4)));
        });
    }


}
