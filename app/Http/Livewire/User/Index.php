<?php

namespace App\Http\Livewire\User;

use App\Enums\UserRoleEnum;
use App\Http\Livewire\Traits\HasDataTable;
use App\Services\Contracts\UserService;
use Livewire\Component;

/**
 * @property UserRoleEnum $role
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

    public function render(UserService $userService)
    {
        return view('livewire.user.index', [
            'users' => $this->queryBuilder($userService->query())
                ->filter()
                ->paginate($this->perPage),
        ]);
    }

    public function getRoleProperty()
    {
        return app(UserRoleEnum::class);
    }
}
