<div>
    {{-- HEADER --}}
    <div class="flex justify-between px-5 py-5 bg-slate-200">
        <div class="flex items-center justify-start gap-x-2">
            <h4 class="font-medium leading-tight text-2xl mt-0 mb-2">Ubicaciones ></h4>
            <select wire:model="search_div">
                <option value="">Area</option>
                @foreach ($areas as $area)
                    <option value="{{ $area['nombre'] }}">{{ $area['nombre'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center gap-x-4">
            <x-jet-secondary-button>
                Lista
            </x-jet-secondary-button>
            @can('Crear Ubicación')
                <x-jet-button wire:click="$set('open', true)">
                    Agregar
                </x-jet-button>
            @endcan
        </div>
    </div>
    {{-- Direccion --}}
    <div class="flex justify-between px-5 py-2 bg-white border-y-2 border-slate-400">
        Inicio / {Areas} / {Ubicaciones}
    </div>

    {{-- TABLAS --}}
    <div class="m-5 p-5 rounded-lg shadow-lg bg-slate-200">
        <div class="flex item-center">
            <x-jet-input class="flex-1 mx-4" placeholder="Buscar..." type="text" wire:model="search" />
        </div>

        @if ($ubicaciones->count())
            {{-- Tabla --}}
            <div class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('id')">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('area')">
                                área
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('nombre')">
                                Nombre / código ubicación
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('condicion')">
                                Condiciones ambientales
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('unidad_logistica')">
                                Unidades Logísticas
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer"
                                wire:click="order('cantidad_almacenaje')">
                                Cantidad Almacenaje
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer"
                                wire:click="order('cantidad_disponible')">
                                Cantidad Disponible
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('stock')">
                                Stock
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('comentarios')">
                                Comentarios
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('activo')">
                                Activo
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ubicaciones as $ubicacion)
                            <tr
                                class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                <td class="px-6 py-4">
                                    {{ $ubicacion['id'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $ubicacion['area'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $ubicacion['nombre'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $ubicacion['condicion'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $ubicacion['unidad_logistica'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $ubicacion['cantidad_almacenaje'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $ubicacion['cantidad_disponible'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $ubicacion['stock'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $ubicacion['comentarios'] }}
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="block text-center {{ $ubicacion['activo'] ? 'block px-2 bg-lime-400 text-white' : '' }}">
                                        {{ $ubicacion['activo'] ? 'Si' : 'No' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($ubicaciones->hasPages())
                    <div class="p-2 bg-gray-50">
                        {{ $ubicaciones->links() }}
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
            CREAR UBICACIÓN
        </x-slot>

        <x-slot name="content">
            {{-- DEPOSITO --}}
            <div class="mb-4">
                <x-jet-label value="Depósito" />
                <select class="w-full" wire:model="deposito">
                    <option value="" selected></option>
                    @foreach ($depositos as $deposito)
                        <option value="{{ $deposito['nombre'] }}">{{ $deposito['nombre'] }}</option>
                    @endforeach
                </select>
                {{-- Mensaje de error --}}
                <x-jet-input-error for="deposito" />
            </div>

            {{-- AREA --}}
            <div class="mb-4">
                <x-jet-label value="Área" />
                <select class="w-full" wire:model="area">
                    <option value="" selected></option>
                    @foreach ($areas as $area)
                        <option value="{{ $area['nombre'] }}">{{ $area['nombre'] }}</option>
                    @endforeach
                </select>
                {{-- Mensaje de error --}}
                <x-jet-input-error for="area" />
            </div>

            {{-- NOMBRE / CODIGO --}}
            <div class="mb-4">
                <x-jet-label value="Nombre / Código" />
                <x-jet-input type="text" class="w-full" wire:model.defer="nombre" />
                {{-- Mensaje de error --}}
                <x-jet-input-error for="nombre" />
            </div>

            {{-- CONDICIONES AMBIENTALES --}}
            <div class="mb-4">
                <x-jet-label value="Condiciones Ambientales" />
                <select class="w-full" wire:model="condicion">
                    <option value="" selected></option>
                    @foreach ($ambientes as $ambiente)
                        <option value="{{ $ambiente['nombre'] }}">{{ $ambiente['nombre'] }}</option>
                    @endforeach
                </select>
                {{-- Mensaje de error --}}
                <x-jet-input-error for="condicion" />
            </div>

            {{-- UNIDADES LOGISTICAS --}}
            <div class="mb-4">
                <x-jet-label value="Unidades Logísticas" />
                <select class="w-full" wire:model="unidad_logistica">
                    <option value="" selected></option>
                    @foreach ($unidades as $unidad)
                        <option value="{{ $unidad['nombre'] }}">{{ $unidad['nombre'] }}</option>
                    @endforeach
                </select>
                {{-- Mensaje de error --}}
                <x-jet-input-error for="unidad_logistica" />
            </div>

            {{-- CANTIDAD ALMACENAJE --}}
            <div class="mb-4">
                <x-jet-label value="Cantidad Almacenaje" />
                <x-jet-input type="number" class="w-full" wire:model.defer="cantidad_almacenaje" />
                {{-- Mensaje de error --}}
                <x-jet-input-error for="cantidad_almacenaje" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Comentario" />
                <textarea class="w-full" rows="6" wire:model.defer="comentarios"></textarea>
            </div>

            <x-jet-label value="Activo" />
            <x-jet-checkbox wire:model.defer="activo" />
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
