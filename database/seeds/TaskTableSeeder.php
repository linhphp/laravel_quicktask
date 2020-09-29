<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Task;
class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *@return void
     */
    public function run()
    {
        $faker = Faker\Factory::create(); 
        for($i = 0; $i < 10; $i++){
            Task::create(
                ['name' => $faker->name()]
            );
        }
    }
}
