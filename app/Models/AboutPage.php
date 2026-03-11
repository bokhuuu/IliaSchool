<?php

namespace App\Models;

use App\Traits\ClearsInertiaCache;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class AboutPage extends Model implements HasMedia
{
    use HasTranslations, ClearsInertiaCache, InteractsWithMedia, LogsActivity;

    protected $table = 'about_page';


    protected $fillable = [
        'title',
        'content',
        'meta_title',
        'meta_description',
    ];


    public array $translatable = [
        'title',
        'content',
        'meta_title',
        'meta_description',
    ];


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
        $this->addMediaCollection('gallery');
        $this->addMediaCollection('og_image')->singleFile();
    }


    public function registerMediaConversions(?\Spatie\MediaLibrary\MediaCollections\Models\Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(250)
            ->sharpen(10);

        $this->addMediaConversion('small')
            ->width(400)
            ->height(500);

        $this->addMediaConversion('medium')
            ->width(800)
            ->height(1000);

        $this->addMediaConversion('large')
            ->width(1200)
            ->height(1500);
    }


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty();
    }
}
