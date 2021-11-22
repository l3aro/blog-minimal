<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Services\Contracts\UserService;
use Livewire\Component;
use Livewire\WithFileUploads;

/**
 * @property UserService $userService
 */
class Edit extends Component
{
    use WithFileUploads;

    public User $user;
    public $image;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'user.name' => 'required|string|max:255',
        'password' => 'nullable|string|min:6|confirmed',
        'image' => 'nullable|image|max:2048|dimensions:ratio=1/1',
    ];

    public function mount(User $user)

    {
        $this->user = $user;
    }

    protected function save()
    {
        $this->validate();

        if ($this->password) {
            $this->user->password = $this->password;
        }

        $this->userService->update($this->user->id, $this->user->getDirty());

        if ($this->image) {
            $this->userService->uploadAvatar($this->user->id, $this->image);
        }
    }

    public function saveAndView()
    {
        $this->save();

        return redirect()->route('me.index');
    }

    public function saveAndContinue()
    {
        $this->save();

        $this->dispatchBrowserEvent('success', [
            'message' => 'Your profile has been updated successfully.',
        ]);
    }

    public function getUserServiceProperty()
    {
        return app(UserService::class);
    }

    public function render()
    {
        return view('livewire.user.edit');
    }
}
