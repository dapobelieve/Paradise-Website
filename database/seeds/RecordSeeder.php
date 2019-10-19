<?php

use Illuminate\Database\Seeder;
use App\Record;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Record::class, 1000)->create();
    }
}
