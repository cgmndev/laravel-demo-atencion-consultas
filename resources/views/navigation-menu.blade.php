{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">

                    @if (in_array(auth()->user()->rol->codigo, ['ADMIN', 'OPER']))
                        <a href="{{ route('admin_dashboard') }}">
                            <x-application-mark class="block h-9 w-auto" />
                        </a>
                    @elseif (in_array(auth()->user()->rol->codigo, ['ALU']))
                        <a href="{{ route('alumno_dashboard') }}">
                            <x-application-mark class="block h-9 w-auto" />
                        </a>
                    @endif

                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if (in_array(auth()->user()->rol->codigo, ['ADMIN', 'OPER']))
                        <x-nav-link href="{{ route('admin_dashboard') }}" :active="request()->routeIs('admin_dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @elseif (in_array(auth()->user()->rol->codigo, ['ALU']))
                        <x-nav-link href="{{ route('alumno_dashboard') }}" :active="request()->routeIs('alumno_dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if (in_array(auth()->user()->rol->codigo, ['ADMIN', 'OPER']))
                <x-responsive-nav-link href="{{ route('admin_dashboard') }}" :active="request()->routeIs('admin_dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @elseif (in_array(auth()->user()->rol->codigo, ['ALU']))
                <x-responsive-nav-link href="{{ route('alumno_dashboard') }}" :active="request()->routeIs('alumno_dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @endif

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

            </div>
        </div>
    </div>
</nav> --}}



<div class="flex-none md:flex max-w-full md:max-w-2x1 md:h-full md:min-h-full text-gray-100 ">
    <div
        class="bg-sidebar flex flex-col px-0 text-sm w-full md:w-24 fixed md:min-h-screen z-50 bg-gray-800 text-gray-400 ">

        <div class="h-8 md:h-16 text-white font-medium flex items-center mb-3 md:block md:flex-1 ">
            <div class="md:hidden block mr-6 mt-4 ml-3">
                {{-- <button onClick={()=> toggleExpansion(!isExpanded)} >
                    <svg class="fill-current text-cyan-600 h-8 w-8" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M16.4 9H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zm0 4H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zM3.6 7h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1z" />
                    </svg>
                </button> --}}
            </div>

            <div class="flex flex-row md:flex-col ">

                <h3
                    class="w-32 md:w-full text-left md:text-center text-slate-500 font-semibold text-sm my-auto pt-5 md:pt-5 ml-3 md:ml-0">
                    Sistema de Atención de consultas
                </h3>
            </div>
        </div>

        {{-- <div id="menu-detalle" class={`${isExpanded ? `block` : `hidden`} px-2 md:block md:flex-1 text-sm `}> --}}
        <div id="menu-detalle" class='hidden px-2 md:block md:flex-1 text-sm '>
            <div class="my-5" />

            {{-- MENU ROLES ADMINISTRADOR Y OPERADOR. --}}
            @if (in_array(auth()->user()->rol->codigo, ['ADMIN', 'OPER']))
                <x-nav-link href="{{ route('admin_dashboard') }}" :active="request()->routeIs('admin_dashboard')">
                    <x-ri-dashboard-fill class="h-6 w-6 mx-auto" />
                    <span class='inline-block text-xs w-auto md:w-full ml-2 md:ml-0'>
                        Dashboard
                    </span>
                </x-nav-link>

                <x-nav-link href="{{ route('admin.consultas.listar') }}" :active="request()->routeIs('admin.consultas.listar')">
                    <x-ri-question-fill class="h-6 w-6 mx-auto" />
                    <span class='inline-block text-xs w-auto md:w-full ml-2 md:ml-0'>
                        Consultas
                    </span>
                </x-nav-link>

                <x-nav-link href="{{ route('admin.usuarios.listar') }}" :active="request()->routeIs('admin.usuarios.listar')">
                    <x-ri-user-fill class="h-6 w-6 mx-auto" />
                    <span class='inline-block text-xs w-auto md:w-full ml-2 md:ml-0'>
                        Usuarios
                    </span>
                </x-nav-link>




            {{-- MENU ROL ALUMNO --}}
            @elseif (in_array(auth()->user()->rol->codigo, ['ALU']))
                <x-nav-link href="{{ route('alumno_dashboard') }}" :active="request()->routeIs('alumno_dashboard')">
                    <x-ri-dashboard-fill class="h-6 w-6 mx-auto" />
                    Dashboard
                </x-nav-link>

                <x-nav-link href="{{ route('alumno.consultas.listar') }}" :active="request()->routeIs('alumno.consultas.listar')">
                    <x-ri-question-fill class="h-6 w-6 mx-auto" />
                    <span class='inline-block text-xs w-auto md:w-full ml-2 md:ml-0'>
                        Consultas
                    </span>
                </x-nav-link>




            @endif
            {{-- FIN MENU ROL ALUMNO --}}

        </div>
    </div>
</div>
</div>
