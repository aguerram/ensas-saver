@section('title', "List des fileres")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List des filieres
        </h2>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <livewire:filieres-list :year="$year"/>
            </div>
        </div>
    </x-slot>
</x-app-layout>
