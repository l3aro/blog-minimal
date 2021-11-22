<?php

namespace App\Http\Livewire\User;

use App\Enums\PostStatusEnum;
use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.user.show', [
            'post_count' => $this->user->posts()->count(),
            'post_draft_count' => $this->user->posts()->where('status', PostStatusEnum::DRAFT)->count(),
            'post_published_count' => $this->user->posts()->where('status', PostStatusEnum::PUBLISHED)->count(),
        ]);
    }
}
