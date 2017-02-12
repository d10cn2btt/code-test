<?php

use Illuminate\Database\Seeder;

class L25TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\L25::class, 4)->create();
        factory(\App\Models\L3::class, 20)->create();
        factory(\App\Models\L35::class, 100)->create();
    }
}
