@php
$title=Request::is('enrg3') ? __('Enregistrement 3éme année') : __('Enregistrement 4éme année')
@endphp

@section('title', $title)

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$title}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div
            class="xs:w-full sm:w-1/2 lg:w-1/3 flex bg-white xs:mx-6 my-6 sm:mx-auto shadow-lg rounded-lg overflow-hidden">
            <form class="mt-8 p-5 w-full"
                action="{{Request::is('enrg3') ? route('enrg3_submit') : route('enrg4_submit')}}" method="POST">
                @if (isset($message))
                <div class="bg-red-100 p-5 w-full rounded mb-4">
                    <div class="flex justify-between">
                        <div class="flex space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="flex-none fill-current text-red-500 h-4 w-4">
                                <path
                                    d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z" />
                            </svg>
                            <div class="flex-1 leading-tight text-sm text-red-700 font-medium">{{$message}}</div>
                        </div>
                    </div>
                </div>
                @endif
                @csrf
                <div class="w-full">
                    <input id="user" value="{{old('user')}}" aria-label="CIN or Matricule" name="user" type="text"
                        required
                        class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                        placeholder="CIN or Maricule">
                </div>

                <div class="mt-6 w-full">
                    <button id="Valider" type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Valider
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>