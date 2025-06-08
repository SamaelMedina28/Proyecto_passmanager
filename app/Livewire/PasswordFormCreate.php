<?php

namespace App\Livewire;

use App\Models\Password;
use Livewire\Component;
use Livewire\Attributes\Validate;

class PasswordFormCreate extends Component
{
    #[Validate('required|min:5|max:255')]
    public $place;

    #[Validate('required|min:5|max:255')]
    public $username;

    #[Validate('required|max:255')]
    public $password;

    #[Validate('required|min:5|max:255')]
    public $category;
    public $url;
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function store()
    {
        $this->validate();
        Password::create([
            'place' => $this->place,
            'username' => $this->username,
            'password' => $this->password,
            'category' => $this->category,
            'url' => $this->url,
            'user_id' => auth()->user()->id,
        ]);
        return $this->redirect(route('dashboard'), navigate: true);
    }
    public function render()
    {
        return view('livewire.password-form-create');
    }
}
