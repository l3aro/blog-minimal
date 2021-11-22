<?php

namespace App\Services\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\UploadedFile;

interface UserService
{
    function query(): Builder;
    function create(array $data): User;
    function update(User|int $modelOrId, array $data): User;
    function delete(User|int $modelOrId): void;
    function find(User|int $modelOrId): ?User;
    function uploadAvatar(User|int $modelOrId, UploadedFile $photo): User;
}
