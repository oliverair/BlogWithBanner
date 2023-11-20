<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Banner;

class Post extends Model
{
    use HasFactory;

    const COLUMN_ID = 'id';
    const COLUMN_STATUS = 'status';
    const COLUMN_NAME = 'name';
    const COLUMN_TEXT = 'text';

    /**
     * Get all banners
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function banners()
    {
        return $this->morphToMany(Banner::class , Entity::COLUMN_MORPH_NAME);
    }

    /**
     * Random Banner from list
     * @return mixed
     */
    public function getRandomBanner()
    {
        return $this->banners->random();
    }


}
