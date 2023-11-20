<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Card;

class Banner extends Model
{
    use HasFactory;

    const TABLE_NAME = 'banners';
    const COLUMN_ID = 'id';
    const COLUMN_STATUS = 'status';
    const COLUMN_NAME = 'name';
    const COLUMN_TEXT = 'text';
    const COLUMN_URL = 'url';
//
//    const COLUMN_MORPH_NAME = 'entity';
//    const COLUMN_ENTITY_ID = 'entity_id';
//    const COLUMN_ENTITY_TYPE = 'entity_type';

    /**
     * Get all models who has Banners
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function bannerable()
    {
        return $this->morphTo();
    }

    /**
     * Relation to the posts
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function posts()
    {
        return $this->morphedByMany(Post::class, Entity::COLUMN_MORPH_NAME);
    }

    /**
     * Relation to the cards
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function cards()
    {
        return $this->morphedByMany(Card::class, Entity::COLUMN_MORPH_NAME);
    }
}
