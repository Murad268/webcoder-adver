<?php

namespace Modules\Work\Repositories;

use Modules\Work\Models\Work;
use App\Repositories\Repository;
class ModelRepository extends Repository
{
    protected $modelClass = Work::class;

    public function search($query, $limit = 1)
    {
        return $this->modelClass::where('title->' . app()->getLocale(), 'like', "%{$query}%")
            ->paginate($limit);
    }

}
