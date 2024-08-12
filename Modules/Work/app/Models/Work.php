<?php

namespace Modules\Work\Models;

use App\Models\SystemFiles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Work\Database\Factories\WorkFactory;
use Spatie\Translatable\HasTranslations;

class Work extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
    public $translatable = ['title', "card_title", 'slug', 'text', 'seo_title', 'seo_description', 'seo_keywords'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $maxOrder = self::max('order');
            $model->order = $maxOrder !== null ? $maxOrder + 1 : 1;
        });
    }

    public function images()
    {
        return $this->hasMany(SystemFiles::class, 'relation_id')->where('model_type', 'work')->where('file_type', 'image');
    }
    public function image()
    {
        return $this->hasOne(SystemFiles::class, 'relation_id')->where('model_type', 'work')->where('file_type', 'image');
    }
    protected static function newFactory(): WorkFactory
    {
        //return WorkFactory::new();
    }
}
