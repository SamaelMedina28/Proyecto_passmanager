<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full lg:w-3/4 xl:w-1/2 mx-auto flex-col gap-4 rounded-xl">
        <a href="{{ route('passwords.create') }}" wire:navigate class="self-end flex items-center bg-black hover:bg-zinc-900 active:bg-zinc-800 text-white px-6 text-center text-sm justify-center rounded-lg cursor-pointer h-10">
            Agregar
        </a>
        <livewire:show-passwords/>
    </div>
</x-layouts.app>
