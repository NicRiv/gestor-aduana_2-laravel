<div class="px-2 py-2 flex items-center justify-between bg-white">
    <div class="flex items-center gap-x-7">
        {{-- BOTON --}}
        <div>
            <div class="inline-flex">
                <span
                    class="w-12 px-2 flex items-center justify-center bg-slate-400 text-white text-lg rounded cursor-pointer duration-200"
                    wire:click="menu">
                    @if ($open)
                        X
                    @else
                        ☰
                    @endif
                </span>
            </div>
        </div>

        {{-- LOGO --}}
        <div class="border border-black px-2">
            <span class=" text-sm">VALMAN</span>
        </div>
    </div>

    <div>
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf

            <x-jet-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="hover:bg-white hover:text-black">
                Cerrar sesión
            </x-jet-nav-link>
        </form>
    </div>
</div>
