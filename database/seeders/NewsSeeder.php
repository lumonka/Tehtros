<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("news")->insert([
            [
                "image" => "recent-post-1-1",
                "name" => "Валы гибкие проволочные типа ВС и ВУ соответствуют техническому условию «Валы гибкие проволочные с бронёй» ТУ22-178-02-90",
                "description" => "",
            ],
            [
                "image" => "recent-post-1-1",
                "name" => "Валы гибкие проволочные типа ВС и ВУ соответствуют техническому условию «Валы гибкие проволочные с бронёй» ТУ22-178-02-90",
                "description" => "",
            ],
            [
                "image" => "recent-post-1-1",
                "name" => "Валы гибкие проволочные типа ВС и ВУ соответствуют техническому условию «Валы гибкие проволочные с бронёй» ТУ22-178-02-90",
                "description" => "",
            ],
        ]);
    }
}
