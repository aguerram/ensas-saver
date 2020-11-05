<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List des filieres
        </h2>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @foreach($filieres as $key=>$fil)
                    <a class="card" href="/notes/{{$year}}/?filiere={{$key}}" >
                        <span class="focus:bg-gray-400 inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                            {{$fil}}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-app-layout>
