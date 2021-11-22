<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Services\Contracts\UserService;
use Livewire\Component;
use Livewire\WithFileUploads;

/**
 * @property UserService $userService
 */
class Create extends Component
{
    use WithFileUploads;

    public User $user;
    public $image;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'user.name' => 'required|string|max:255',
        'user.email' => 'required|string|email|max:255|unique:users,email',
        'user.is_admin' => 'required|boolean',
        'password' => 'required|string|min:6|confirmed',
        'image' => 'nullable|image|max:2048|dimensions:ratio=1/1',
    ];

    public function mount()
    {
        $this->user = new User;
    }

    protected function save()
    {
        $this->resetErrorBag();
        $this->validate();

        $this->user->password = $this->password;
        $user = $this->userService->create($this->user->getDirty());
        if ($this->image) {
            $this->userService->uploadAvatar($user, $this->image);
        }

        $this->user = new User;
        $this->image = null;
        $this->password = null;
        $this->password_confirmation = null;

        return $user;
    }

    public function saveAndView()
    {
        $user = $this->save();

        return redirect()->route('users.show', $user->id);
    }

    public function saveAndContinue()
    {
        $this->save();

        $this->dispatchBrowserEvent('success', [
            'message' => 'User created successfully.',
        ]);
    }

    public function getUserServiceProperty()
    {
        return app(UserService::class);
    }

    public function render()
    {
        return view('livewire.user.create');
    }
}
