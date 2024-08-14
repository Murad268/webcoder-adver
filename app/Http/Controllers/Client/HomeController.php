<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Modules\About\Repositories\ModelRepository;
use Modules\MenuLinks\Models\Menu;

class HomeController extends Controller
{
    public function __construct(public ModelRepository $aboutRepository, public \Modules\Work\Repositories\ModelRepository $workRepository, public \Modules\Blog\Repositories\ModelRepository $blogRepository)
    {

    }
    public function index()
    {
        $about = $this->aboutRepository->findWith(1, ['home_page_about_image']);
        $works = $this->workRepository->active_all(6, ['image']);
        $blogs = $this->blogRepository->active_all(3, ['image']);
        $seo = Menu::where('code', 'home')->first();
        return view('front.home.index', compact('about', 'works', 'blogs', 'seo'));
    }
}
