<div>
    {{-- HEADER --}}
    <div class="flex justify-between px-5 py-5 bg-slate-200">
        <div class="flex items-center justify-start gap-x-2">
            <h4 class="font-medium leading-tight text-2xl mt-0 mb-2">Ingresos ></h4>
            <select wire:model="search_div">
                <option value="">Division</option>
                <option value="EPD">EPD</option>
                <option value="ADD">ADD</option>
            </select>
        </div>
        <div class="flex items-center gap-x-4">
            <x-jet-secondary-button>
                Ingresos
            </x-jet-secondary-button>
            <x-jet-secondary-button>
                Egresos
            </x-jet-secondary-button>
            <x-jet-secondary-button>
                Anulados
            </x-jet-secondary-button>
            <x-jet-button wire:click="$set('open', true)">
                Agregar
            </x-jet-button>
        </div>
    </div>
    {{-- Direccion --}}
    <div class="flex justify-between px-5 py-2 bg-white border-y-2 border-slate-400">
        Inicio / Divisiones / {Ingresos}
    </div>

    {{-- TABLAS --}}
    <div class="m-5 p-5 rounded-lg shadow-lg bg-slate-200">
        <div class="flex item-center">
            <x-jet-input class="flex-1 mx-4" placeholder="Buscar..." type="text" wire:model="search" />
        </div>

        @if ($ingresos->count())
            {{-- Tabla --}}
            <div class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 cursor-pointer" 
                                wire:click="order('numero_ingreso')">
                                N° de ingreso
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('tipo')">
                                Tipo
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('division')">
                                Division
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" >
                                Cantidad
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" >
                                Stock
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" >
                                Egresado
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" >
                                Sin ubicar
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('created_at')">
                                Fecha ingreso
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('vencimiento')">
                                Vencimiento
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ingresos as $ingreso)
                            <tr
                                class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                <td class="px-6 py-4">
                                    {{-- 04092019 --}}
                                    {{ $ingreso['numero_ingreso'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $ingreso['tipo'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $ingreso['division'] }}
                                </td>
                                <td class="px-6 py-4">
                                    -
                                </td>
                                <td class="px-6 py-4">
                                    -
                                </td>
                                <td class="px-6 py-4">
                                    -
                                </td>
                                <td class="px-6 py-4">
                                    -
                                </td>
                                <td class="px-6 py-4">
                                    {{-- 2019-09-04 --}}
                                    {{ $ingreso['created_at'] }}
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="{{ strtotime(now()) > strtotime($ingreso['vencimiento']) ? 'bg-red-400 text-white' : '' }}">
                                        {{ $ingreso['vencimiento'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($ingresos->hasPages())
                    <div class="p-2 bg-gray-50">
                        {{ $ingresos->links() }}
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
            CREAR INGRESO
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Numero de ingreso" />
                <x-jet-input type="text" class="w-full" wire:model.defer="numero_ingreso" />
                {{-- Mensaje de error --}}
                <x-jet-input-error for="numero_ingreso" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Tipo" />
                <select class="mx-2" wire:model="tipo">
                    <option value="" selected></option>
                    <option value="importacion">Importación</option>
                    <option value="exportacion">Exportación</option>
                </select>
                {{-- Mensaje de error --}}
                <x-jet-input-error for="tipo" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Division" />
                <select class="mx-2" wire:model="division">
                    <option value="" selected></option>
                    <option value="EPD">EPD</option>
                    <option value="ADD">ADD</option>
                </select>
                {{-- Mensaje de error --}}
                <x-jet-input-error for="division" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Vencimiento" />
                <x-jet-input type="date" class="w-full" wire:model.defer="vencimiento" />
                {{-- Mensaje de error --}}
                <x-jet-input-error for="vencimiento" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Comentario" />
                <textarea class="w-full" rows="6" wire:model.defer="comentario"></textarea>
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
