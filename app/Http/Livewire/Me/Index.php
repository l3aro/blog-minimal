<?php

namespace App\Http\Livewire\Me;

use App\Enums\PostStatusEnum;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        return view('livewire.me.index', [
            'user' => $user,
            'post_count' => $user->posts()->count(),
            'post_draft_count' => $user->posts()->where('status', PostStatusEnum::DRAFT)->count(),
            'post_published_count' => $user->posts()->where('status', PostStatusEnum::PUBLISHED)->count(),
        ]);
    }
}
