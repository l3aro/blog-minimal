<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use App\Services\Contracts\PostService;
use Livewire\Component;

class Show extends Component
{
    public Post $post;

    public function mount(PostService $postService, $post)
    {
        $this->post = $postService->find($post);
    }

    public function render()
    {
        return view('livewire.post.show');
    }
}
