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
}
