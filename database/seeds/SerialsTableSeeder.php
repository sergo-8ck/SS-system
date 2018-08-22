<?php

use App\Entity\Serials;
use Illuminate\Database\Seeder;

class SerialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Serials::class, 100)->create();
    }
}
