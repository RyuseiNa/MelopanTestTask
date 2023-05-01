<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'user_id' => '2',
                'uuid' => 'uuid1',
                'name' => 'Melonpan',
                'SKU' => '123456789',
                'description' => 'A melonpan is a type of sweet bun originating from and popular in Japan, as well as in Taiwan and China.',
                'imagename' => 'melonpan',
                'imagepath' => 'R01529-Melon-Pan-1500w.jpg',
                'created_at' =>'2023-01-01 12:00:00',
                'updated_at' =>'2023-05-01 12:00:00'
            ],
            [
                'user_id' => '3',
                'uuid' => 'uuid2',
                'name' => 'Ramen',
                'SKU' => '987654321',
                'description' => 'Ramen is a Japanese noodle dish. It consists of Chinese-style wheat noodles served in a broth;',
                'imagename' => 'ramen',
                'imagepath' => 'ramen-312341.jpeg',
                'created_at' =>'2023-01-01 12:00:00',
                'updated_at' =>'2023-05-01 12:00:00'
            ],
            [
                'user_id' => '3',
                'uuid' => 'uuid3',
                'name' => 'Sushi',
                'SKU' => '192837465',
                'description' => 'Sushi is a Japanese dish of prepared vinegared rice, usually with some sugar and salt, accompanied by a variety of ingredients, such as seafood—often raw—and vegetables. ',
                'imagename' => 'sushi',
                'imagepath' => '640px-Various_sushi,_beautiful_October_night_at_midnight.jpg',
                'created_at' =>'2023-01-01 12:00:00',
                'updated_at' =>'2023-05-01 12:00:00'
            ],

        ];
        foreach ($items as $item) {
            $merchandise = new Item();
            $merchandise->user_id = $item['user_id'];
            $merchandise->uuid = $item['uuid'];
            $merchandise->name = $item['name'];
            $merchandise->SKU = $item['SKU'];
            $merchandise->description = $item['description'];
            $merchandise->imagename = $item['imagename'];
            $merchandise->imagepath = $item['imagepath'];
            $merchandise->created_at = $item['created_at'];
            $merchandise->updated_at = $item['updated_at'];

            $merchandise->save();
        }
    }
}
