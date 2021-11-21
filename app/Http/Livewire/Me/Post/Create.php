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
class Create extends Component
{
    use WithFileUploads;

    public Post $post;
    public $image;

    protected function rules(): array
    {
        return [
            'post.title' => 'required|min:3|max:100|unique:posts,title',
            'post.slug' => 'required|min:3|max:100|unique:posts,slug',
            'post.description' => 'required|min:3|max:255',
            'post.content' => 'required|min:3',
            'image' => 'required|image|max:10240',
        ];
    }

    public function mount()
    {
        $this->post = new Post;
    }

    public function updatedPostTitle()
    {
        $this->validateOnly('post.title');
        $this->post->slug = Str::slug($this->post->title);
    }

    public function render()
    {
        return view('livewire.me.post.create');
    }

    protected function save()
    {
        $this->resetErrorBag();
        $this->validate();

        $post = $this->postService->create($this->post->toArray());
        $this->postService->uploadImage($post, $this->image);

        $this->post = new Post;
        $this->image = null;

        return $post;
    }

    public function saveAndView()
    {
        $post = $this->save();

        return redirect()->route('me.posts.show', $post->id);
    }

    public function saveAndCreate()
    {
        $this->save();

        return redirect()->route('me.posts.create');
    }

    public function getPostServiceProperty()
    {
        return app(PostService::class);
    }
}
