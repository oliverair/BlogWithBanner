<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Card;

class Entity extends Model
{
    use HasFactory;

    const COLUMN_ID = 'id';

    const COLUMN_BANNER_ID = 'banner_id';

    const COLUMN_MORPH_NAME = 'entity';
    const COLUMN_ENTITY_ID = 'entity_id';
    const COLUMN_ENTITY_TYPE = 'entity_type';

}
