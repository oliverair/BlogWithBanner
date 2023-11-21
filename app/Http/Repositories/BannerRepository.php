<?php

namespace App\Http\Repositories;

use App\Models\Banner;
use Illuminate\Support\Collection;

class BannerRepository
{
    protected Banner $model;

    public function __construct(Banner $model)
    {
        $this->model = $model;
    }


    /**
     * Get list of all models
     * @return \Illuminate\Support\Collection
     */
    public function getAll() :Collection
    {
        return $this->model::get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getBanner(int $id)
    {
        return $this->model::where(Banner::COLUMN_ID, $id)->firstOrFail();
    }

    /**
     * @param int $id
     * @return array
     */
    public function getRelation(int $id) :array
    {
        $banner = $this->model::where(Banner::COLUMN_ID, $id)
                                ->with('posts')
                                ->with('cards')
                                ->firstOrFail();

        return [
            'posts' => $banner->posts,
            'cards' => $banner->cards
        ];
    }
}
