<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Category as Category;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

        $this->call( 'CategoryTableSeeder' );

        $this->command->info( 'Category table seeded!' );
    }

}

class CategoryTableSeeder extends Seeder {

    public function run() {
        Category::create( ['category' => 'Shoes' ] );
        Category::create( ['category' => 'Clothes' ] );
    }

}
