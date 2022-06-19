<?php

namespace Database\Seeders;

use App\Models\Etudiant;
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
        Etudiant::factory(15)->create();
           // $this->call(ClassesTableSeeder::class);
    }
}
