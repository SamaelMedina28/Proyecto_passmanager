<div>
    <div class="flex h-full w-full flex-col gap-4 rounded-xl lg:w-3/4 xl:w-1/2 mx-auto">
        <h1 class="text-2xl font-bold text-neutral-800 dark:text-white">Crear contraseña</h1>
        <form method="POST" wire:submit="store">
            @csrf
            <div class="flex flex-col gap-4">
                <x-input label="Lugar" name="place" wire:model.blur="place"/>
                <x-input label="Usuario" name="username" wire:model.blur="username"/>
                <x-input label="Contraseña" name="password" type="password" wire:model.blur="password"/>
                <x-input label="URL *" name="url" wire:model="url"/>
                <x-input label="Categoria" name="category" wire:model.blur="category"/>
            </div>
            <a href="{{ route('dashboard') }}" class="relative items-center font-medium justify-center gap-2 whitespace-nowrap disabled:opacity-75 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none h-10 text-sm rounded-lg px-4 inline-flex  bg-white hover:bg-zinc-50 dark:bg-zinc-700 dark:hover:bg-zinc-600/75 text-zinc-800 dark:text-white border border-zinc-200 hover:border-zinc-200 border-b-zinc-300/80 dark:border-zinc-600 dark:hover:border-zinc-600 shadow-xs [[data-flux-button-group]_&]:border-s-0 [:is([data-flux-button-group]>&:first-child,_[data-flux-button-group]_:first-child>&)]:border-s-[1px] my-5" wire:navigate>Cancelar</a>
            <button type="submit" class="bg-black hover:bg-zinc-900 active:bg-zinc-800 text-white px-4 text-center text-sm rounded-lg mx-3 cursor-pointer h-10">Guardar</button>
        </form>
    </div>
</div>
