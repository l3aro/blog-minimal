<?php

namespace App\Http\Livewire\Me\Post;

use App\Models\Post;
use App\Services\Contracts\PostService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

/**
 * @property PostService $postService
 */
class Edit extends Component
{
    use WithFileUploads;

    public Post $post;
    public $image;

    protected function rules(): array
    {
        return [
            'post.title' => 'required|min:3|max:100|unique:posts,title,' . $this->post->id,
            'post.slug' => 'required|min:3|max:100|unique:posts,slug,' . $this->post->id,
            'post.description' => 'required|min:3|max:255',
            'post.content' => 'required|min:3',
            'image' => 'nullable|image|max:10240',
        ];
    }

    public function mount(PostService $postService, $post)
    {
        $this->post = $postService->find($post);
    }

    public function updatedPostTitle()
    {
        $this->validateOnly('post.title');
        $this->post->slug = Str::slug($this->post->title);
    }

    public function save()
    {
        $this->resetErrorBag();
        $this->validate();

        $this->postService->update($this->post, $this->post->getDirty());
        if ($this->image) {
            $this->postService->uploadImage($this->post, $this->image);
        }
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', ['message' => 'Post updated successfully']);
        $this->emit('post.saved');
    }

    public function saveAndView()
    {
        $this->save();
        return redirect()->route('me.posts.show', $this->post);
    }

    public function getPostServiceProperty()
    {
        return app(PostService::class);
    }

    public function render()
    {
        return view('livewire.me.post.edit');
    }
}
