<?php

namespace Modules\About\Models;

use App\Models\SystemFiles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\About\Database\Factories\AboutFactory;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
    public $translatable = ['about_page_about_text', 'home_page_about_text'];



    public function images()
    {
        return $this->hasMany(SystemFiles::class, 'relation_id')->where('model_type', 'about')->where('file_type', 'image');
    }
    public function home_page_about_image()
    {
        return $this->hasOne(SystemFiles::class, 'relation_id')->where('model_type', 'about')->where('file_type', 'image')->where('type', 'home_page_image');
    }
    protected static function newFactory(): AboutFactory
    {
        //return AboutFactory::new();
    }
}
