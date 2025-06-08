<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Password manager</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @include('partials.head')
</head>

<body
    class=" dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                        Iniciar Sesión
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Registrarse
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main
            class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row rounded-xl overflow-hidden shadow-xl">
            <!-- Sección de texto -->
            <div
                class="flex-1 p-8 lg:p-12  dark:bg-[#161615] rounded-es-lg rounded-ee-lg lg:rounded-ss-lg lg:rounded-ee-none text-neutral-800 dark:text-white">
                <div class="flex items-center mb-6">
                    <svg class="w-8 h-8 text-red-500" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <span class="ml-2 text-xl font-bold text-zinc-800 dark:text-white">PassManager</span>
                </div>

                <h1 class="text-2xl font-bold text-zinc-800 dark:text-white mb-4">Administra tus contraseñas</h1>

                <p class="text-zinc-600 dark:text-zinc-400 mb-6">
                    Guarda todas tus contraseñas en un solo lugar seguro y accede a ellas fácilmente cuando las necesites. Nunca más vuelvas a olvidar una contraseña.
                </p>

                <!-- Características -->
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center text-zinc-600 dark:text-zinc-400">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Almacenamiento seguro de contraseñas
                    </li>
                    <li class="flex items-center text-zinc-600 dark:text-zinc-400">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Acceso rápido a tus credenciales
                    </li>
                    <li class="flex items-center text-zinc-600 dark:text-zinc-400">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Organización sencilla de tus cuentas
                    </li>
                </ul>

                <!-- Botones -->
                <div class="flex flex-col sm:flex-row gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-6 py-3 bg-zinc-700 hover:bg-zinc-800 text-white font-medium rounded-lg transition-colors duration-200 text-center">
                            Ir al Panel
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Sección de imagen -->
            <div
                class="bg-[rgb(7,7,7)] relative lg:-ms-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-e-lg aspect-[335/376] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden flex items-center justify-center">
                <!-- Tu imagen principal -->
                <img src="{{ asset('img/logo-principal.png') }}" alt="Password Manager"
                    class="w-full max-w-xs object-contain">

                <!-- Borde decorativo -->
                <div
                    class="absolute inset-0 rounded-t-lg lg:rounded-t-none lg:rounded-e-lg shadow-[inset_0px_0px_0px_1px_rgba(255,250,237,0.1)]">
                </div>
            </div>
        </main>
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
