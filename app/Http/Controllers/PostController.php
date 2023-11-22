<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\PostRepository;
use App\Http\Services\PostProcessService;

class PostController extends Controller
{
    protected PostRepository $repository;
    protected PostProcessService $service;

    public function __construct(PostRepository $repository, PostProcessService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
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
            $postRaw = $this->repository->getPost($id);
            $post = $this->service->process($postRaw);

            return view('post', compact('post'));
        } catch (\Exception $exception) {
            abort(404);
        }

    }
}
