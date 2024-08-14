<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Repositories\ModelRepository;
use Modules\MenuLinks\Models\Menu;

class BlogController extends Controller
{
    public function __construct(public ModelRepository $repository)
    {

    }
    public function index(Request $request)
    {
        $seo = Menu::where('code', 'blogs')->first();
        $q = $request->q;
        if ($q) {
            $blogs = $this->repository->search($q, 3, ['image']);
        } else {
            $blogs = $this->repository->active_all(3, ['image']);
        }

        $popular_blogs = $this->repository->popular(4, ['image']);

        return view('front.blog.index', compact('blogs', 'popular_blogs', 'q', 'seo'));
    }

    public function blog($slug)
    {
        $blog = $this->repository->getBySlug('slug', $slug, 'image');
        $popular_blogs = $this->repository->popularNoneCurrent(4, ['image'], $blog->id);

        return view('front.blog.details', compact('blog', 'popular_blogs'));
    }
}
