<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("products")->insert([
            [
                "product_image" => "Tros.jpg",
                "product_name" => "Сантехнический трос",
                "product_desc" => "Трос, укомплектованный ручкой для вращения и сменной насадкой «Крюк». Трос свернут в бухту для удобства перемещения.",
                "product_price" => 1450,
                "product_qty" => 100,
            ],
            [
                "product_image" => "18be114c-2fed-4869-ae66-34a74368deb8.webp",
                "product_name" => "Рукавицы брезентовые",
                "product_desc" => "Двойной налодонник.",
                "product_price" => 1050,
                "product_qty" => 100,
            ],
            [
                "product_image" => "0f1ddc80835fb6e507f3efd27adbaaf3.jpg",
                "product_name" => "Проволока ВР-1400-1, d-5мм высокопрочная, высокоуглеродистая сталь по ГОСТ-7348-81",
                "product_desc" => "Более дешевая альтернатива сантехническому тросу, мотки до 200м.",
                "product_price" => 100,
                "product_qty" => 100,
            ],
            [
                "product_image" => "nasadka_1_2.jpg",
                "product_name" => "Насадка «Гарпун»",
                "product_desc" => "Насадка «ГАРПУН» используется для ударного воздействия на сложный и жесткий засор, а также для извлечения частиц засора из канализационной трубы.",
                "product_price" => 400,
                "product_qty" => 100,
            ],
            [
                "product_image" => "nasadka_1_4.jpg",
                "product_name" => "Насадка «Сфера»",
                "product_desc" => "Хорошо справляется с жесткими отложениями, песком, известью за счет своей сложной конструкции.",
                "product_price" => 1000,
                "product_qty" => 100,
            ],
            [
                "product_image" => "nasadka_1_5.jpg",
                "product_name" => "Насадка «Капля»",
                "product_desc" => "Насадка для воздействия на различные мягкие отложения, такие как жир или ил. Имеет пикообразную форму, легко проходит по центру трубы.",
                "product_price" => 550,
                "product_qty" => 100,
            ],
            [
                "product_image" => "nasadka_1_6.jpg",
                "product_name" => "Насадка «Лопасть»",
                "product_desc" => "",
                "product_price" => 800,
                "product_qty" => 100,
            ],
            [
                "product_image" => "nasadka_1_8.jpg",
                "product_name" => "Насадка «Крюк»",
                "product_desc" => "Насадка «КРЮК» используется для извлечения различных мягких засоров.",
                "product_price" => 300,
                "product_qty" => 100,
            ],
            [
                "product_image" => "nasadka_1_9.jpg",
                "product_name" => "Насадка «Х-образный пробойник»",
                "product_desc" => "Более дешевая альтернатива сантехническому тросу, мотки до 200м.",
                "product_price" => 600,
                "product_qty" => 100,
            ],
            [
                "product_image" => "nasadka_1_10.jpg",
                "product_name" => "Насадка СКРЕБОК - 50",
                "product_desc" => "Насадка «Скребок» используется для удаления различных жировых отложений с внутренних стенок канализационных труб, удаления нетвердых известковых отложений.",
                "product_price" => 900,
                "product_qty" => 100,
            ],
            [
                "product_image" => "nasadka_1_11.jpg",
                "product_name" => "Насадка СКРЕБОК - 100",
                "product_desc" => "Насадка «Скребок» используется для удаления различных жировых отложений с внутренних стенок канализационных труб, удаления нетвердых известковых отложений.",
                "product_price" => 900,
                "product_qty" => 100,
            ],
            [
                "product_image" => "nasadka_1_12.jpg",
                "product_name" => "Насадка ШНЕК - 100",
                "product_desc" => "«ШНЕК» используется для удаления песка и различных сыпучих загрязнений, нетвердых отложений на стенках канализационной трубы, так же для придания дополнительного поступательного движения тросу.",
                "product_price" => 1500,
                "product_qty" => 100,
            ],
            [
                "product_image" => "18-2.jpg",
                "product_name" => "Насадка «Малый пробойник»",
                "product_desc" => "Используется для разрушения твердых засоров во внутридомовых и квартирных системах канализации. Изготавливается на тросы d=8 и 10 мм.",
                "product_price" => 300,
                "product_qty" => 100,
            ],
            [
                "product_image" => "17-2.jpg",
                "product_name" => "Насадка «Усиленный пробойник»",
                "product_desc" => "Усиленный пробойник — Используется для разрушения твердых засоров.",
                "product_price" => 500,
                "product_qty" => 100,
            ],
            [
                "product_image" => "nasadka_1_15.jpg",
                "product_name" => "Насадка Спираль",
                "product_desc" => "",
                "product_price" => 800,
                "product_qty" => 100,
            ],
            [
                "product_image" => "nasadka_1_14.jpg",
                "product_name" => "Насадка Хвостовик на перфоратор SDS+ /SDS max",
                "product_desc" => "",
                "product_price" => 2000,
                "product_qty" => 100,
            ],
        ]);
    }
}
