<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\About\Repositories\ModelRepository;
use Modules\MenuLinks\Models\Menu;

class AboutController extends Controller
{

    public function __construct(public ModelRepository $repository)
    {

    }
    public function index()
    {
        $about = $this->repository->findWith(1, ['about_page_about_image']);
        $seo = Menu::where('code', 'about')->first();
        return view('front.about.index', compact('about', 'seo'));
    }
}
