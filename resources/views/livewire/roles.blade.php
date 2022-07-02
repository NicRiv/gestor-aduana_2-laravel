<div>
    {{-- HEADER --}}
    <div class="flex justify-between px-5 py-5 bg-slate-200">
        <div class="flex items-center justify-start gap-x-2">
            <h4 class="font-medium leading-tight text-2xl mt-0 mb-2">Roles</h4>
        </div>
        <div class="flex items-center gap-x-4">
            <x-jet-secondary-button>
                Lista
            </x-jet-secondary-button>
            <x-jet-button wire:click="$set('open', true)">
                Agregar
            </x-jet-button>
        </div>
    </div>
    {{-- Direccion --}}
    <div class="flex justify-between px-5 py-2 bg-white border-y-2 border-slate-400">
        Inicio / {Roles}
    </div>

    {{-- TABLAS --}}
    <div class="m-5 p-5 rounded-lg shadow-lg bg-slate-200">
        <div class="flex item-center">
            <x-jet-input class="flex-1 mx-4" placeholder="Buscar..." type="text" wire:model="search" />
        </div>

        @if ($roles->count())
            {{-- Tabla --}}
            <div class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('id')">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('name')">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('email')">
                                Permisos
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr
                                class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                <td class="px-6 py-4">
                                    {{ $role['id'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $role['name'] }}
                                </td>
                                <td class="px-6 py-4">
                                    @foreach ($role['permissions'] as $permiso)
                                        <p>{{ $permiso['name'] }}</p>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($roles->hasPages())
                    <div class="p-2 bg-gray-50">
                        {{ $roles->links() }}
                    </div>
                    <div class="mt-3 p-2 flex items-center">
                        <span>Mostrar</span>
                        <select class="mx-2" wire:model="cantidad_paginas">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span>entradas</span>
        
                    </div>
                @endif
            </div>
        @else
            <div class="mx-5 mt-5">
                No se encontraron registros coincidentes.
            </div>
        @endif
    </div>
</div>
