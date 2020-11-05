@section('title', "Importer les notes")


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$pageTitle}}
        </h2>
        <livewire:filieres-list :year="$year"/>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--               --------------Start------------------}}

                <div class="container mx-auto px-4 sm:px-8">
                    <div class="py-8">
                        <div>
                            <h2 class="text-2xl font-semibold leading-tight">{{$filiereTitle}}</h2>
                        </div>
                        <div class="my-2 flex sm:flex-row flex-col">
                            <form method="get" class="block relative">
                    <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                            </path>
                        </svg>
                    </span>
                                <input type="hidden" name="year" value="{{$year}}">
                                <input type="hidden" name="filiere" value="{{$filiere}}">
                                <input name="q"
                                       value="{{Request::query("q")}}"
                                       placeholder="Search"
                                       class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none"/>
                            </form>
                        </div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            @if(session("success"))
                                <div
                                    class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                                    role="alert">
                                    <div class="flex">
                                        <div class="py-1">
                                            <svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-bold">{{session("success")}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <form action="{{route("notes_update")}}" method="POST"
                                  class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <div class="flex justify-between">

                                    <a href="#"
                                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Export Excel
                                    </a>

                                    <button type="submit"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        Enregistrer
                                    </button>
                                </div>

                                <input type="hidden" name="year" value="{{$year}}">
                                <input type="hidden" name="filiere" value="{{$filiere}}">
                                @csrf
                                <table class="min-w-full leading-normal">
                                    <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Nom & Prénom
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            CNE
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            CIN
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Matricule
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Ville
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <a href="{{$orderLink}}">
                                                Note
                                                @if(Request::query("order"))
                                                    @if(Request::query("order") === "asc")
                                                        🔺
                                                    @else
                                                        🔻
                                                    @endif
                                                @else
                                                    🔷
                                                @endif
                                            </a>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($etudiants as $et)
                                        <tr @if($et["{$alias}note_preselection"]<=0) class="bg-red-tr" @endif>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$et["{$alias}nom"]}} {{$et["{$alias}prenom"]}}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$et["{$alias}massar"]}}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$et["{$alias}cin"]}}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$et["{$alias}matricule"]}}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$et["{$alias}ldn"]}}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <input
                                                        class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-2 pr-2 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none"
                                                        type="number"
                                                        step="0.01"
                                                        min="0"
                                                        max="20"
                                                        name="{{$et["{$alias}cin"]}}"
                                                        value="{{$et["{$alias}note_preselection"]}}"
                                                    />
                                                </p>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if($etudiants->count()<=0)
                                        <p class="text-red-500">Aucun résultat</p>
                                    @endif
                                    </tbody>
                                </table>
                                {{$etudiants->withQueryString()->links()}}
                            </form>
                        </div>
                    </div>
                </div>
                {{--                ------------- END --------}}
            </div>
        </div>
    </div>
</x-app-layout>
