<?php

namespace App\Http\Repositories;

use App\Models\Post;

class PostRepository
{
    protected Post $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function getPosts()
    {
        $posts = $this->model::with('banners')
            ->get();

        return $posts;
    }

    public function getPost(int $id)
    {
        return $this->model::where(Post::COLUMN_ID, $id)
                            ->with('banners')
                            ->firstOrFail();
    }
}
