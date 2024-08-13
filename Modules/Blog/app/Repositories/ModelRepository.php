<?php

namespace Modules\Blog\Repositories;

use Modules\Blog\Models\Blog;
use App\Repositories\Repository;
class ModelRepository extends Repository
{
    protected $modelClass = Blog::class;

    public function search($query, $limit = 1, $relation=[])
    {
        return $this->modelClass::where('title->' . app()->getLocale(), 'like', "%{$query}%")
            ->with($relation)->paginate($limit);
    }
    public function active_all($limit = null, $relation = [])
    {
        return $this->modelClass::orderByDesc('created_at')->where('status', 1)->with($relation)->paginate($limit);
    }
    public function popular($limit = null, $relation = [])
    {
        return $this->modelClass::orderByDesc('views_count')->where('status', 1)->with($relation)->paginate($limit);
    }
    public function popularNoneCurrent($limit = null, $relation = [], $blog_id)
    {
        return $this->modelClass::orderByDesc('views_count')->where('status', 1)->where('id', '!=', $blog_id)->with($relation)->paginate($limit);
    }
}
