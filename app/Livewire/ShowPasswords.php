<?php

namespace App\Livewire;

use App\Models\Password;
use Livewire\Attributes\Url;
use Livewire\Component;

class ShowPasswords extends Component
{
    #[Url]
    public $search = '';
    public function render()
    {
        $passwords = Password::where('user_id', auth()->user()->id)
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('place', 'like', "%{$this->search}%")
                        ->orWhere('category', 'like', "%{$this->search}%");
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('livewire.show-passwords', compact('passwords'));
    }

    public function destroy($id)
    {
        Password::destroy($id);
        $this->dispatch('alert', type: 'success', message: 'Contraseña eliminada correctamente');
    }
}
