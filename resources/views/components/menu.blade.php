<!-- Menu lateral-->
@php
    $nav_links = [
        [
            'name' => 'Perfil',
            'route' => route('profile.show'),
            'active' => request()->routeIs('profile.*'),
        ],    
        [
            'name' => 'Dashboard',
            'route' => route('dashboard'),
            'active' => request()->routeIs('dashboard'),
        ],
        [
            'name' => 'Gestión aduana',
            'route' => "#",
            'active' => false,
        ],
        [
            'name' => 'Materiales/Productos',
            'route' => "#",
            'active' => false,
        ],
        [
            'name' => 'Depósitos',
            'route' => "#",
            'active' => false,
        ],
        [
            'name' => 'Areas',
            'route' => "#",
            'active' => false,
        ],
        [
            'name' => 'Ubicaciones',
            'route' => "#",
            'active' => false,
        ],
        [
            'name' => 'Condiciones Ambientales',
            'route' => "#",
            'active' => false,
        ],
        [
            'name' => 'Unidades Logísticas',
            'route' => "#",
            'active' => false,
        ],
        [
            'name' => 'Divisiones',
            'route' => "#",
            'active' => false,
        ],
        [
            'name' => 'Tipo de Ingresos/Egresos',
            'route' => "#",
            'active' => false,
        ],
        [
            'name' => 'Usuarios',
            'route' => "#",
            'active' => false,
        ],
        [
            'name' => 'Roles',
            'route' => "#",
            'active' => false,
        ],
        [
            'name' => 'Control impresiones',
            'route' => "#",
            'active' => false,
        ],
        [
            'name' => 'Audit Trail',
            'route' => "#",
            'active' => false,
        ],
        
    ];
@endphp

<nav class="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <div class="flex flex-col">
                @foreach ($nav_links as $nav_link)
                    <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                        {{ $nav_link['name'] }}
                    </x-jet-nav-link>                    
                @endforeach
            </div>
        </div>
    </div>
</nav>