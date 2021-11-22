<?php

namespace App\Http\Livewire\Post;

use App\Enums\PostStatusEnum;
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

    public function mount()
    {
        $this->sort = ['id' => 'desc'];
    }

    public function render()
    {
        return view('livewire.post.index', [
            'posts' => $this->queryBuilder($this->postService->query())
                ->filter()
                ->with('author:id,name,email')
                ->paginate($this->perPage),
        ]);
    }

    public function getPostServiceProperty()
    {
        return app(PostService::class);
    }

    public function getPostStatusProperty()
    {
        return app(PostStatusEnum::class);
    }
}
