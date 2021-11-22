<?php

namespace App\Services\Contracts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\UploadedFile;

interface PostService
{
    function query(): Builder;
    function create(array $data): Post;
    function update(Post|int $modelOrId, array $data): Post;
    function delete(Post|int $modelOrId): void;
    function find(Post|int $modelOrId): ?Post;
    function uploadImage(Post|int $modelOrId, UploadedFile $image): Post;
    function schedule(Post|int $modelOrId, \DateTimeInterface $date): Post;
    function unpublish(Post|int $modelOrId): Post;
}
