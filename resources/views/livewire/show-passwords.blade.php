<div class="flex w-full lg:w-3/4 xl:w-1/2 mx-auto flex-col gap-4 rounded-xl">
    {{-- ? Botones --}}
    <div class="flex gap-2">
        <a href="{{ route('passwords.create') }}" wire:navigate
            class="flex items-center bg-black hover:bg-zinc-900 active:bg-zinc-800 text-white px-6 text-center text-sm justify-center rounded-lg cursor-pointer h-10">
            Agregar
        </a>
        @if (auth()->user()->passwords()->count() > 0)
            <a href="{{ route('passwords.export') }}"
                class="flex items-center bg-zinc-50 border border-zinc-200 dark:bg-zinc-700 dark:border-zinc-600 hover:bg-zinc-100 dark:hover:bg-zinc-600  dark:text-white text-black px-6 text-center text-sm justify-center rounded-lg cursor-pointer h-10">
                Exportar
            </a>
        @endif
    </div>
    {{-- ? Tabla principal --}}
    <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
        {{-- ? Buscador --}}
        <div>
            <input type="text" wire:model.live="search" placeholder="Buscar"
                class="w-full p-2 border border-neutral-200 dark:border-neutral-700 focus:outline-none focus:border-neutral-400 dark:focus:border-neutral-600 rounded-lg" />
        </div>
        {{-- ? Tabla vacia --}}
        <div class="flex flex-col w-full {{ $passwords->isEmpty() ? 'py-10' : 'pt-10' }} justify-center">
            @if ($passwords->isEmpty())
                <div class="flex flex-col items-center justify-center h-full">
                    <p class="text-2xl font-bold text-neutral-800 dark:text-white">No hay contraseñas</p>
                    <a href="{{ route('passwords.create') }}"
                        class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300"
                        wire:navigate>
                        Agregar contraseña
                    </a>
                </div>
            @else
                {{-- ? Tabla llena --}}
                @foreach ($passwords as $password)
                    <div
                        class="bg-white dark:bg-neutral-800 rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg dark:shadow-neutral-900/50">
                        <div class="p-5 border-b border-neutral-200 dark:border-neutral-700">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="text-lg font-semibold text-neutral-800 dark:text-white">
                                    {{ $password->place }}
                                </h3>
                                <span
                                    class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">
                                    {{ $password->category }}
                                </span>
                            </div>

                            <div class="space-y-3 text-sm text-neutral-600 dark:text-neutral-300">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-neutral-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>{{ $password->username }}</span>
                                </div>

                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-neutral-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    <span class="font-mono">{{ $password->password }}</span>
                                </div>

                                @if ($password->url)
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-neutral-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.653-5.653l-1.1 1.1" />
                                        </svg>
                                        <a href="{{ $password->url }}" target="_blank"
                                            class="text-blue-600 hover:underline dark:text-blue-400">
                                            {{ $password->url }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div
                            class="px-5 py-3 bg-neutral-50 dark:bg-neutral-700/30 text-xs text-neutral-500 dark:text-neutral-400">
                            <div class="flex items-center justify-end sm:justify-between">
                                <span class="hidden sm:block">Última actualización:
                                    {{ $password->updated_at->diffForHumans() }}</span>
                                <div class="flex space-x-4">
                                    <a href="{{ route('passwords.edit', $password->id) }}" wire:navigate
                                        class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 ">
                                        <svg class="w-6 h-6 sm:w-5 sm:h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <button wire:click="destroy({{ $password->id }})"
                                        class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">
                                        <svg class="w-6 h-6 sm:w-5 sm:h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="mx-auto w-1/2">
                {{ $passwords->links() }}
            </div>
        </div>
    </div>
</div>
