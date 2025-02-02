@section('title', "Exporter les données")
@php
    use \App\Http\Controllers\NotesController;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Exporter les données') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="xs:w-full sm:w-1/2 lg:w-1/3  bg-white xs:mx-6 my-6 sm:mx-auto shadow-lg rounded-lg overflow-hidden">
            <form class="mt-8 p-5 w-full" action="{{route('export')}}" method="POST">

                @csrf

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="bg-red-100 p-5 w-full rounded mb-4">
                            <div class="flex justify-between">
                                <div class="flex space-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                         class="flex-none fill-current text-red-500 h-4 w-4">
                                        <path
                                            d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"/>
                                    </svg>
                                    <div class="flex-1 leading-tight text-sm text-red-700 font-medium">{{$error}}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                <div class="shadow-sm w-full">
                    <div class="inline-block relative w-full">
                        <select onchange="handleYearChange(this)" name="year"
                                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option disabled {{old('year')=='' ? 'selected':null}}>-- Choisir L'année --</option>
                            <option value="3" {{old('year')=='1' ? 'selected':null}}>3ème année</option>
                            <option value="4" {{old('year')=='2' ? 'selected':null}}>4ème année</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="shadow-sm mt-5 w-full">
                    <div class="inline-block relative w-full">
                        <select name="filiere"
                                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option disabled selected>-- Choisir la Filière --</option>
                            @foreach (NotesController::getFilieres(4) as $key=>$filiere)
                                <option id="_fi-{{$key}}"
                                        {{old('filiere')==$key ? 'selected':null}} value="{{$key}}">{{$filiere}}</option>
                            @endforeach
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mt-6 w-full">
                    <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Exporter
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const aiFiliere = document.querySelector('#_fi-I')
        function handleYearChange(el) {
            switch (+el.value) {
                case 3:
                    aiFiliere.style.display = 'none';
                    break;
                case 4:
                    aiFiliere.style.display = 'block';
                    break;
            }
        }
    </script>
</x-app-layout>
