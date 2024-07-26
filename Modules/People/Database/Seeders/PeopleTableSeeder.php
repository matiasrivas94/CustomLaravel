<?php

namespace Modules\People\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\People\Entities\People;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        People::factory()->count(5)->create();
    }
}
