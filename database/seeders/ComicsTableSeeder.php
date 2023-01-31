<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_comics = config('comics');

        foreach ($data_comics as $one_data_comic) {
            
            $data = new Comic();

            $data->title = $one_data_comic['title'];
            $data->description = $one_data_comic['description'];
            $data->img = $one_data_comic['thumb'];
            $data->price = $one_data_comic['price'];
            $data->series = $one_data_comic['series'];
            $data->sale_date = $one_data_comic['sale_date'];
            $data->type = $one_data_comic['type'];

            $data->save();
            
        }
    }
}
