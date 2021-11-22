<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['image_url'];

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    public function scopeFilter($query)
    {
        return app(Pipeline::class)
            ->send($query)
            ->through([
                new \App\Models\Filters\SearchFilter(),
                new \App\Models\Filters\StatusFilter(),
                (new \App\Models\Filters\DateFromFilter)->filterOn('published_at'),
                (new \App\Models\Filters\DateToFilter())->filterOn('published_at'),
                new \App\Models\Filters\Sort(),
            ])
            ->thenReturn();
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('id', $search)
                ->orWhere('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        });
    }

    public function updateImage(UploadedFile $file)
    {
        tap($this->image, function ($previous) use ($file) {
            $this->forceFill([
                'image' => $file->storePublicly('', ['disk' => $this->imageDisk()]),
            ])->save();

            if ($previous) {
                Storage::disk($this->imageDisk())->delete($previous);
            }
        });
    }

    public function imageDisk()
    {
        return 'posts';
    }

    public function getImageUrlAttribute()
    {
        return $this->image
            ? Storage::disk($this->imageDisk())->url($this->image)
            : $this->defaultImageUrl();
    }

    public function defaultImageUrl()
    {
        return asset('/assets/images/blog-cover.webp');
    }

    public function nextPost(): ?self
    {
        return self::query()->published()
            ->where('published_at', '>', $this->published_at)
            ->orderBy('published_at', 'asc')
            ->first();
    }

    public function previousPost(): ?self
    {
        return self::query()->published()
            ->where('published_at', '<', $this->published_at)
            ->orderBy('published_at', 'desc')
            ->first();
    }
}
