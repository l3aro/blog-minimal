<?php

namespace App\Services\Eloquent;

use App\Models\Post;
use App\Services\Contracts\PostService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\UploadedFile;

class PostServiceEloquent implements PostService
{
    use AuthorizesRequests;

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
        $model = $this->find($modelOrId);

        $this->authorize('update', $model);

        $model->update($data);

        return $model;
    }

    public function delete(Post|int $modelOrId): void
    {
        $model = $this->find($modelOrId);

        $this->authorize('delete', $model);

        $model->delete();
    }

    public function find(Post|int $modelOrId): ?Post
    {
        $model = $modelOrId instanceof Post ? $modelOrId : Post::find($modelOrId);
        $this->authorize('view', $model);
        return $model;
    }

    public function uploadImage(Post|int $modelOrId, UploadedFile $image): Post
    {
        $model = $this->find($modelOrId);

        $this->authorize('update', $model);

        $model->updateImage($image);

        return $model;
    }

    public function schedule(Post|int $modelOrId, \DateTimeInterface $date): Post
    {
        /** @var Post */
        $model = $this->find($modelOrId);
        $model->forceFill([
            'published_at' => $date,
        ])->saveQuietly();

        return $model;
    }

    public function unpublish(Post|int $modelOrId): Post
    {
        /** @var Post */
        $model = $this->find($modelOrId);
        $model->forceFill([
            'published_at' => null,
        ])->saveQuietly();

        return $model;
    }
}
