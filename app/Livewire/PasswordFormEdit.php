<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class PasswordFormEdit extends Component
{
    public $password_info;
    #[Validate('required|min:5|max:255')]
    public $place;
    #[Validate('required|min:5|max:255')]
    public $username;
    #[Validate('required|max:255')]
    public $password;
    #[Validate('required|min:5|max:255')]
    public $category;
    public $url;
    public function mount($password)
    {
        $this->password_info = $password;
        $this->place = $password->place;
        $this->username = $password->username;
        $this->password = $password->password;
        $this->category = $password->category;
        $this->url = $password->url;
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update() 
    {
        $this->validate();
        $this->password_info->update([
            'place' => $this->place,
            'username' => $this->username,
            'password' => $this->password,
            'category' => $this->category,
            'url' => $this->url,
        ]);
        return $this->redirect(route('dashboard'), navigate: true);
    }

    public function render()
    {
        return view('livewire.password-form-edit');
    }
}
