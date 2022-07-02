@php
$link_perfil = [
    [
        'name' => 'Perfil',
        'route' => route('profile.show'),
        'active' => request()->routeIs('profile.*'),
    ],
];
$link_principal = [
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
        'active' => request()->routeIs('dashboard'),
    ],
    [
        'name' => 'Gestión aduana',
        'route' => route('ingresos'),
        'active' => false,
    ],
];
$link_configuracion = [
    [
        'name' => 'Materiales/Productos',
        'route' => route('materiales-productos'),
        'active' => false,
    ],
    [
        'name' => 'Depósitos',
        'route' => route('depositos'),
        'active' => false,
    ],
    [
        'name' => 'Areas',
        'route' => route('areas'),
        'active' => false,
    ],
    [
        'name' => 'Ubicaciones',
        'route' => route('ubicaciones'),
        'active' => false,
    ],
    [
        'name' => 'Condiciones Ambientales',
        'route' => route('condiciones-ambientales'),
        'active' => false,
    ],
    [
        'name' => 'Unidades Logísticas',
        'route' => route('unidades-logisticas'),
        'active' => false,
    ],
    [
        'name' => 'Divisiones',
        'route' => route('divisiones'),
        'active' => false,
    ],
    [
        'name' => 'Tipo de Ingresos/Egresos',
        'route' => route('tipos-ingresos-egresos'),
        'active' => false,
    ],
];
$link_administracion = [
    [
        'name' => 'Usuarios',
        'route' => route('usuarios'),
        'active' => false,
    ],
    [
        'name' => 'Roles',
        'route' => route('roles'),
        'active' => false,
    ],
    [
        'name' => 'Control impresiones',
        'route' => route('control-impresiones'),
        'active' => false,
    ],
    [
        'name' => 'Audit Trail',
        'route' => route('audit-trail'),
        'active' => false,
    ],
];
@endphp

<div
    class="min-h-screen bg-indigo-900 px-3 py-2 {{ $open_sidebar ? 'w-72' : 'w-[4.1rem]' }} text-slate-200 duration-300">
    {{-- PERFIL --}}
    <ul>
        @foreach ($link_perfil as $link)
            <li class="p-2 cursor-pointer hover:bg-cyan-700 rounded-md my-1">
                <a href="{{ $link['route'] }}" class="gap-x-4 flex items-center">
                    <span class="px-2 block rounded-full float-left bg-slate-200 text-cyan-900">
                        {{ $link['name'][0] }}
                    </span>
                    <span class="text-sm font-medium flex-1 duration-100 {{ !$open_sidebar ? 'hidden' : '' }}">
                        {{ $link['name'] }}
                    </span>
                </a>
            </li>
        @endforeach
    </ul>

    {{-- PRINCIPAL --}}
    <div class="mt-1 py-3 flex items-center">
        <div class="w-full border-t border-slate-400 duration-200 {{ !$open_sidebar ? '' : 'scale-0' }}"></div>
        <span
            class="absolute flex items-center text-slate-400 float-left duration-200 {{ !$open_sidebar ? 'scale-0' : '' }}">
            PRINCIPAL
        </span>
    </div>
    {{-- Links principal --}}
    <ul>
        @foreach ($link_principal as $link)
            <li class="p-2 cursor-pointer hover:bg-cyan-700 rounded-md my-1">
                <a href="{{ $link['route'] }}" class="gap-x-4 flex items-center">
                    <span class="px-2 block rounded-md float-left bg-slate-200 text-cyan-900">
                        {{ $link['name'][0] }}
                    </span>
                    <span class="text-sm font-medium flex-1 duration-100 {{ !$open_sidebar ? 'hidden' : '' }}">
                        {{ $link['name'] }}
                    </span>
                </a>
            </li>
        @endforeach
    </ul>

    {{-- CONFIGURACION --}}
    <div class="mt-1 py-3 flex items-center">
        <div class="w-full border-t border-slate-400 duration-200 {{ !$open_sidebar ? '' : 'opacity-0' }}"></div>
        <span class="absolute text-slate-400 float-left duration-200 {{ !$open_sidebar ? 'scale-0' : '' }}">
            CONFIGURACION
        </span>
    </div>
    {{-- Links config --}}
    <ul>
        @foreach ($link_configuracion as $link)
            <li class="p-2 cursor-pointer hover:bg-cyan-700 rounded-md my-1">
                <a href="{{ $link['route'] }}" class="gap-x-4 flex items-center">
                    <span class="px-2 block rounded-md float-left bg-slate-200 text-cyan-900">
                        {{ $link['name'][0] }}
                    </span>
                    <span class="text-sm font-medium flex-1 duration-100 {{ !$open_sidebar ? 'hidden' : '' }}">
                        {{ $link['name'] }}
                    </span>
                </a>
            </li>
        @endforeach
    </ul>

    {{-- ADMINISTRACION --}}
    @can('Link Administración')
        <div class="mt-1 py-3 flex items-center">
            <div class="w-full border-t border-slate-400 duration-200 {{ !$open_sidebar ? '' : 'opacity-0' }}"></div>
            <span class="absolute text-slate-400 float-left duration-200 {{ !$open_sidebar ? 'scale-0' : '' }}">
                ADMINISTRACION
            </span>
        </div>
        {{-- Links administracion --}}
        <ul>
            @foreach ($link_administracion as $link)
                <li class="p-2 cursor-pointer hover:bg-cyan-700 rounded-md my-1">
                    <a href="{{ $link['route'] }}" class="gap-x-4 flex items-center">
                        <span class="px-2 block rounded-md float-left bg-slate-200 text-cyan-900">
                            {{ $link['name'][0] }}
                        </span>
                        <span class="text-sm font-medium flex-1 duration-100 {{ !$open_sidebar ? 'hidden' : '' }}">
                            {{ $link['name'] }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    @endcan


    {{-- Divisor --}}
    <div class="py-2">
        <div class="w-full border-t border-slate-400 duration-200"></div>
    </div>
    {{-- Logo --}}
    <div class="mt-2 flex items-center justify-center">
        <h1 class="text-slate-400 duration-200 {{ !$open_sidebar ? 'scale-0' : '' }}">
            Pharmware
        </h1>
    </div>
</div>
