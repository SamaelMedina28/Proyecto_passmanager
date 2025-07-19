<?php

namespace App\Livewire;

use App\Models\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShowPasswords extends Component
{
    #[Url]
    public $search = '';
    #[Layout('layouts.app')]
    public function render()
    {
        $passwords = Password::where('user_id', Auth::id())
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('place', 'like', "%{$this->search}%");
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString()
            ->onEachSide(1);
            
        return view('livewire.show-passwords', [
            'passwords' => $passwords
        ]);
    }

    public function destroy($id)
    {
        Password::destroy($id);
        $this->dispatch('alert', type: 'success', message: 'Contraseña eliminada correctamente');
    }
}
