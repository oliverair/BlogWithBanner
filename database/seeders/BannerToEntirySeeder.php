<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;
use App\Models\Post;
use App\Models\Card;
use App\Models\Entity;

class BannerToEntirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = Banner::get();

        foreach ($banners as $banner) {
            //Add multiple posts to one banner to relate morphToMany
            $times = rand(1,3);
            for($i=0; $i<= $times; $i++) {
                $entity = rand(0,1) ? Post::get()->random() : Card::get()->random();
                //We could minimize load for our DB making Bulk insert, but to simplify make this
                Entity::insert([
                    Entity::COLUMN_BANNER_ID => $banner->id,
                    Entity::COLUMN_ENTITY_TYPE => $entity::class,
                    Entity::COLUMN_ENTITY_ID => $entity->id
                ]);
            }
        }
    }
}
