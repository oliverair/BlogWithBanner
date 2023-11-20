<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\PostRepository;

class PostController extends Controller
{
    protected PostRepository $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * All posts
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        try {
            $posts = $this->repository->getPosts();

            return view('posts', compact('posts'));
        } catch (\Exception $exception) {
            abort(404);
        }
    }

    /**
     * Post by id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function post(Request $request)
    {
        try {
            $id = $request->route('id');
            $post = $this->repository->getPost($id);

            return view('post', compact('post'));
        } catch (\Exception $exception) {
            abort(404);
        }

    }
}
