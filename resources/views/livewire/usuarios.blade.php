<div>
    {{-- HEADER --}}
    <div class="flex justify-between px-5 py-5 bg-slate-200">
        <div class="flex items-center justify-start gap-x-2">
            <h4 class="font-medium leading-tight text-2xl mt-0 mb-2">Usuarios</h4>
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
        Inicio / {Usuarios}
    </div>

    {{-- TABLAS --}}
    <div class="m-5 p-5 rounded-lg shadow-lg bg-slate-200">
        <div class="flex item-center">
            <x-jet-input class="flex-1 mx-4" placeholder="Buscar..." type="text" wire:model="search" />
        </div>

        @if ($users->count())
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
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('email')">
                                Roles
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr
                                class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                <td class="px-6 py-4">
                                    {{ $user['id'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user['name'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user['email'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user['roles'][0]['name'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($users->hasPages())
                    <div class="p-2 bg-gray-50">
                        {{ $users->links() }}
                    </div>
                @endif
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
        @else
            <div class="mx-5 mt-5">
                No se encontraron registros coincidentes.
            </div>
        @endif
    </div>

    {{-- MODAL FORM --}}
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            CREAR USUARIO
        </x-slot>

        <x-slot name="content">
            {{-- NOMBRE --}}
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model.defer="nombre" />
                {{-- Mensaje de error --}}
                <x-jet-input-error for="nombre" />
            </div>

            {{-- ROLES --}}
            <div class="mb-4">
                <x-jet-label value="Rol" />
                <select class="w-full" wire:model="rol">
                    <option value="" selected></option>
                    @foreach ($roles as $rol)
                        <option value="{{ $rol['name'] }}">{{ $rol['name'] }}</option>
                    @endforeach
                </select>
                {{-- Mensaje de error --}}
                <x-jet-input-error for="rol" />
            </div>

            {{-- EMAIL --}}
            <div class="mb-4">
                <x-jet-label value="Email" />
                <x-jet-input type="text" class="w-full" wire:model.defer="email" />
                {{-- Mensaje de error --}}
                <x-jet-input-error for="email" />
            </div>

            {{-- CONTRASE??A --}}
            <div class="mb-4">
                <x-jet-label value="Contrase??a" />
                <x-jet-input type="password" class="w-full" wire:model.defer="contrase??a" />
                {{-- Mensaje de error --}}
                <x-jet-input-error for="contrase??a" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="flex gap-x-4">
                <x-jet-secondary-button wire:click="$set('open', false)">
                    Cancelar
                </x-jet-secondary-button>
                <x-jet-button wire:click="save" wire:loading.attr="disabled" class="disabled:opacity-15">
                    Crear
                </x-jet-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
</div>
