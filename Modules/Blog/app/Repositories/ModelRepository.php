<?php

namespace Modules\Blog\Repositories;

use Modules\Blog\Models\Blog;
use App\Repositories\Repository;
class ModelRepository extends Repository
{
    protected $modelClass = Blog::class;

    public function search($query, $limit = 1)
    {
        return $this->modelClass::where('title->' . app()->getLocale(), 'like', "%{$query}%")
            ->paginate($limit);
    }
    public function active_all($limit = null, $relation = [])
    {
        return $this->modelClass::orderByDesc('order')->where('status', 1)->with($relation)->paginate($limit);
    }
}
