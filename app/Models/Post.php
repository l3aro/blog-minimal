<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
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
}
