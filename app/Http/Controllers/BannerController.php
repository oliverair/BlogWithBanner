<?php

namespace App\Http\Controllers;

use App\Http\Repositories\BannerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
class BannerController extends Controller
{

    protected BannerRepository $repository;

    public function __construct(BannerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        return view('app');
    }

    /**
     * @return JsonResponse
     */
    public function getAll() :JsonResponse
    {
        $banners =  $this->repository->getAll();

        return response()->json([
            'banners' => $banners
        ], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRelation(Request $request) :JsonResponse
    {
        $id = $request->route('id');
        $relations = $this->repository->getRelation($id);
        return response()->json($relations, 200);
    }
}
