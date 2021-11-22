<?php

namespace App\Http\Livewire\Blog;

use App\Http\Livewire\Traits\HasDataTable;
use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    use HasDataTable;

    public function render()
    {
        return view('livewire.blog.index', [
            'posts' => $this->queryBuilder(Post::query())
                ->with('author:id,name')
                ->published()
                ->filter()
                ->latest('published_at')
                ->paginate($this->perPage),
        ]);
    }
}
