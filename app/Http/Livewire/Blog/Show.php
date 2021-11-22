<?php

namespace App\Http\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;

class Show extends Component
{
    public Post $post;
    public function mount($slug)
    {
        $this->post = Post::query()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.blog.show', [
            'nextPost' => $this->post->nextPost(),
            'previousPost' => $this->post->previousPost(),
        ])->layout('layouts.blog');
    }
}
