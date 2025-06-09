<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full lg:w-3/4 xl:w-1/2 mx-auto flex-col gap-4 rounded-xl">
        <div class="flex gap-2">
            <a href="{{ route('passwords.create') }}" wire:navigate
                class="flex items-center bg-black hover:bg-zinc-900 active:bg-zinc-800 text-white px-6 text-center text-sm justify-center rounded-lg cursor-pointer h-10">
                Agregar
            </a>

            <a href="{{ route('passwords.export') }}"
                class="flex items-center bg-zinc-50 border border-zinc-200 dark:bg-zinc-700 dark:border-zinc-600 hover:bg-zinc-100 dark:hover:bg-zinc-600  dark:text-white text-black px-6 text-center text-sm justify-center rounded-lg cursor-pointer h-10">
                Exportar
            </a>
        </div>
        <livewire:show-passwords />
    </div>
</x-layouts.app>
