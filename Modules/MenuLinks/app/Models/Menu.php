<?php

namespace Modules\MenuLinks\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\MenuLinks\Database\Factories\MenuFactory;

use Spatie\Translatable\HasTranslations;
class Menu extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
    public $translatable = ['title', 'slug', 'seo_title', 'seo_keywords', 'seo_description'];
    protected $table = 'menu_links';
    protected static function newFactory(): MenuFactory
    {
        //return MenuFactory::new();
    }

}
