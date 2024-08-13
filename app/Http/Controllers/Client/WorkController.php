<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Work\Repositories\ModelRepository;

class WorkController extends Controller
{
    public function __construct(public ModelRepository $repository)
    {

    }
    public function index()
    {
        $works = $this->repository->active_all(null, ['image']);
        return view('front.work.index', compact('works'));
    }


    public function work($slug)
    {
        $work = $this->repository->getBySlug('slug', $slug, 'image');

        return view('front.work.details', compact('work'));
    }
}
