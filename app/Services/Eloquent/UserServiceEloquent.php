<?php

namespace App\Services\Eloquent;

use App\Models\User;
use App\Services\Contracts\UserService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\UploadedFile;

class UserServiceEloquent implements UserService
{
    use AuthorizesRequests;

    public function query(): Builder
    {
        $this->authorize('viewAny', User::class);

        return User::query();
    }

    public function create(array $data): User
    {
        $this->authorize('create', User::class);

        $data = $this->preparePassword($data);

        return User::create($data);
    }

    protected function preparePassword(array $data): array
    {
        if (isset($data['password']) && $data['password'] !== '') {
            $data['password'] = bcrypt($data['password']);
            return $data;
        }

        unset($data['password']);
        return $data;
    }

    public function update(User|int $modelOrId, array $data): User
    {
        $model = $modelOrId instanceof User ? $modelOrId : User::find($modelOrId);

        $this->authorize('update', $model);

        $data = $this->preparePassword($data);

        $model->update($data);

        return $model;
    }

    public function delete(User|int $modelOrId): void
    {
        $model = $modelOrId instanceof User ? $modelOrId : User::find($modelOrId);

        $this->authorize('delete', $model);

        $model->delete();
    }

    public function find(User|int $modelOrId): ?User
    {
        return $modelOrId instanceof User ? $modelOrId : User::find($modelOrId);
    }

    public function uploadAvatar(User|int $modelOrId, UploadedFile $photo): User
    {
        $model = $modelOrId instanceof User ? $modelOrId : User::find($modelOrId);

        $this->authorize('update', $model);

        $model->updateAvatar($photo);

        return $model;
    }
}
