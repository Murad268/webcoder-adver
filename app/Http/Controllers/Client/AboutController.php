<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\About\Repositories\ModelRepository;

class AboutController extends Controller
{

    public function __construct(public ModelRepository $repository)
    {

    }
    public function index()
    {
        $about = $this->repository->findWith(1, ['about_page_about_image']);
        return view('front.about.index', compact('about'));
    }
}
