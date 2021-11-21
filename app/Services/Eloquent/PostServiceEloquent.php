<?php

namespace App\Services\Eloquent;

use App\Models\Post;
use App\Services\Contracts\PostService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\UploadedFile;

class PostServiceEloquent implements PostService
{
    public function query(): Builder
    {
        return Post::query();
    }

    public function create(array $data): Post
    {
        $data['created_by'] = auth()->id();
        return Post::create($data);
    }

    public function update(Post|int $modelOrId, array $data): Post
    {
        $model = $modelOrId instanceof Post ? $modelOrId : Post::find($modelOrId);

        $model->update($data);

        return $model;
    }

    public function delete(Post|int $modelOrId): void
    {
        $model = $modelOrId instanceof Post ? $modelOrId : Post::find($modelOrId);

        $model->delete();
    }

    public function find(Post|int $modelOrId): ?Post
    {
        return $modelOrId instanceof Post ? $modelOrId : Post::find($modelOrId);
    }

    public function uploadImage(Post|int $modelOrId, UploadedFile $image): Post
    {
        $model = $modelOrId instanceof Post ? $modelOrId : Post::find($modelOrId);

        $model->update([
            'image' => $image->store('posts', 'public'),
        ]);

        return $model;
    }
}
