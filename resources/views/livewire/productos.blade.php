<x-slot name="header">
    <h1 class="text-gray-900">CRUD Livewire</h1>
</x-slot>

<div class="py-12">
    @if(session()->has('message'))
    <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
        <div class="flex">
            <div>
                <h4>{{ session('message')}}</h4>
            </div>
        </div>
    </div>
    @endif

    <div class="">
        <button wire:click="crear()" class="px-4 py-3 rounded-lg bg-green-500 font-bold text-white">Nuevo</button>
    </div>
    <div>
        @if ($modal)
            @include('livewire.crear')
        @endif
    </div>
    <div class="">
        <table class="table-fixed w-full">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-3">id</th>
                    <th class="py-3">decripcion</th>
                    <th class="py-3">cantidad</th>
                    <th class="py-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td class="border px-4 py-2">{{ $producto->id }}</td>
                    <td class="border px-4 py-2">{{ $producto->descripcion }}</td>
                    <td class="border px-4 py-2">{{ $producto->cantidad }}</td>
                    <td class="border px-4 py-2 text-center">
                        <button wire:click="editar({{$producto->id}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                        <button wire:click="borrar({{$producto->id}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
