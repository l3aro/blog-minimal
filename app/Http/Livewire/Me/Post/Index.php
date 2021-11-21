<?php

namespace App\Http\Livewire\Me\Post;

use App\Http\Livewire\Traits\HasDataTable;
use App\Services\Contracts\PostService;
use Livewire\Component;

/**
 * @property PostService $postService
 */
class Index extends Component
{
    use HasDataTable;

    protected $queryString = [
        'filter' => ['except' => []],
        'sort' => ['except' => [
            'id' => 'desc',
        ]],
    ];

    protected $listeners = [
        'post.deleted' => '$refresh',
    ];

    public function mount()
    {
        $this->sort = ['id' => 'desc'];
    }

    public function render()
    {
        return view('livewire.me.post.index', [
            'posts' => $this->queryBuilder($this->postService->query())
                ->whereCreatedBy(auth()->id())
                ->filter()
                ->paginate($this->perPage),
        ]);
    }

    public function getPostServiceProperty()
    {
        return app(PostService::class);
    }
}
