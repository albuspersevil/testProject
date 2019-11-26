<?php

use Illuminate\Database\Seeder;
use App\emp_model;
class emp_modelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 5000;
        factory(App\emp_model::class, $count)->create();
    }
}
