<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'         => 'Xbox serie X',
            'description'  => 'Nueva consola de Microsoft para la siguiente generación',
            'created_at'   => now()
        ]);
        DB::table('categories')->insert([
            'name'         => 'Nintendo Switch',
            'description'  => 'Consola híbrida de Nintendo',
            'created_at'   => now()
        ]);
        $cat = new Category;
        $cat->name        = 'Play Station 5';
        $cat->description = 'Nueva consola de play station par la siguiente generación';
        $cat->save();
    }
}
