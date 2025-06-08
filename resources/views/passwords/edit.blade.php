<x-layouts.app :title="__('Create Password')">
    {{-- BreadCrumb --}}
    <div class="mb-4 lg:w-3/4 xl:w-1/2 mx-auto">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}">Home</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('passwords.edit', $password->id) }}">Editar</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    {{--! Formulario --}}
    
    @livewire('password-form-edit', ['password' => $password])
</x-layouts.app>