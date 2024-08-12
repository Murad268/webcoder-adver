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
        $about = $this->repository->find(1);
        dd($about);
        return view('front.about.index');
    }
}
