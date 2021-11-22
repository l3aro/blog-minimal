<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use App\Services\Contracts\PostService;
use Illuminate\Support\Carbon;
use Livewire\Component;

/**
 * @property PostService $postService
 */
class Show extends Component
{
    public Post $post;
    public bool $onScheduleAction = false;
    public $publishDate;

    public function mount($post)
    {
        $this->post = $this->postService->find($post);
        $this->publishDate = $this->post->published_at ? $this->post->published_at->format('Y-m-d H:i') : null;
    }

    public function render()
    {
        return view('livewire.post.show');
    }

    public function showScheduleForm()
    {
        $this->onScheduleAction = true;
    }

    public function schedule()
    {
        $this->validate([
            'publishDate' => 'required|date',
        ]);
        $publishDate = Carbon::parse($this->publishDate);
        $this->postService->schedule($this->post, $publishDate);
        $this->onScheduleAction = false;
        $this->dispatchBrowserEvent('success', [
            'message' => 'Post scheduled successfully at ' . $this->publishDate,
        ]);
    }

    public function unpublish()
    {
        $this->postService->unpublish($this->post);
        $this->onScheduleAction = false;
        $this->publishDate = null;
        $this->dispatchBrowserEvent('success', [
            'message' => 'Post unpublished successfully',
        ]);
    }

    public function getPostServiceProperty()
    {
        return app(PostService::class);
    }
}
