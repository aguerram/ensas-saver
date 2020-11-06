<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="xs:w-full sm:w-1/2 lg:w-1/2  bg-white xs:mx-6 my-6 sm:mx-auto shadow-lg rounded-lg overflow-hidden">
            <div class="flex">
                <div class="p-4 w-1/2">
                    <h2 class="text-lg border-b-2 border-gray-300 mb-5 pb-2">3ème année</h2>
                    <a href="{{route('enrg3')}}"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Enregistrement
                    </a>
                    <a href="{{route('note3')}}"
                        class="mt-7 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Saisi les notes
                    </a>
                </div>
                <div class="p-4 w-1/2">
                    <h2 class="text-lg border-b-2 border-gray-300 mb-5 pb-2">4ème année</h2>
                    <a href="{{route('enrg4')}}"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Enregistrement
                    </a>
                    <a href="{{route('note4')}}"
                        class="mt-7 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Saisi les notes
                    </a>
                </div>
            </div>
            <div class="p-4 flex">
                <a href="{{route('export')}}"
                    class="mt-2 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition duration-150 ease-in-out">
                    Exporter les presents
                </a>
            </div>
        </div>
    </div>
</x-app-layout>