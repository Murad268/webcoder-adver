<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Modules\About\Repositories\ModelRepository;

class HomeController extends Controller
{
    public function __construct(public ModelRepository $aboutRepository)
    {

    }
    public function index()
    {
        $about = $this->aboutRepository->findWith(1, ['home_page_about_image']);

        return view('front.home.index', compact('about'));
    }
}
