<?php

namespace App\Http\Livewire\Me\Post;

use App\Services\Contracts\PostService;
use Livewire\Component;

class Destroy extends Component
{
    public $redirect = false;
    public bool $confirmingDeletion = false;
    public $postIdToDelete;

    protected $listeners = [
        'confirmingDeletion',
    ];

    public function confirmingDeletion($id)
    {
        $this->confirmingDeletion = $id;
        $this->postIdToDelete = $id;
    }

    public function deletePost(PostService $postService)
    {
        $postService->delete($this->postIdToDelete);
        $this->confirmingDeletion = false;
        $this->postIdToDelete = null;

        if ($this->redirect) {
            return redirect()->route('me.posts.index');
        }

        $this->dispatchBrowserEvent('success', ['message' => 'Post deleted successfully']);
        $this->emit('post.deleted');
    }

    public function render()
    {
        return view('livewire.me.post.destroy');
    }
}
