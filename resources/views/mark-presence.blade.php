<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Request::is('enrg3') ? __('Enregistrement 3éme année') : __('Enregistrement 4éme année') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div
            class="xs:w-full sm:w-1/2 lg:w-1/2 flex bg-white xs:mx-6 my-6 sm:mx-auto shadow-lg rounded-lg overflow-hidden">
            <form class="mt-8 p-5 w-full"
                action="{{Request::is('enrg3') ? route('mark-presence3') : route('mark-presence4')}}" method="POST">
                @if (isset($message))
                @php
                $color= $error ? "red":"green";
                @endphp
                <div class="bg-{{$color}}-100 p-5 w-full rounded mb-4">
                    <div class="flex justify-between">
                        <div class="flex space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="flex-none fill-current text-{{$color}}-500 h-4 w-4">
                                <path
                                    d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z" />
                            </svg>
                            <div class="flex-1 leading-tight text-sm text-{{$color}}-700 font-medium">{{$message}}</div>
                        </div>
                    </div>
                </div>
                @endif
                @csrf
                <input id="user" value="{{Request::is('enrg3') ? $user['3a_cin'] : $user['4a_cin']}}" name="user"
                    type="hidden" required>

                <div class="box flex">
                    <div class="w-1/3">
                        <img src="https://dyl80ryjxr1ke.cloudfront.net/external_assets/hero_examples/hair_beach_v1785392215/original.jpeg"
                            class="img-res" alt="">
                    </div>
                    <div class="w-2/3 pl-5 flex">
                        <div class="w-1/2">
                            <div><strong>Nom complet</strong></div>
                            <div class="pt-3"><strong>CIN</strong></div>
                            <div class="pt-3"><strong>CNE</strong></div>
                            <div class="pt-3"><strong>Filiere</strong></div>
                            <div class="pt-3"><strong>Matricule</strong></div>
                        </div>
                        <div class="w-1/2">
                            <div>
                                {{Request::is('enrg3') ? $user['3a_nom']." ".$user['3a_prenom'] : $user['4a_nom']." ".$user['4a_prenom']}}
                            </div>
                            <div class="pt-3">{{Request::is('enrg3') ? $user['3a_cin'] : $user['4a_cin']}}</div>
                            <div class="pt-3">{{Request::is('enrg3') ? $user['3a_massar'] : $user['4a_massar']}}</div>
                            <div class="pt-3">{{Request::is('enrg3') ? $user['3a_filiere'] : $user['4a_filiere']}}</div>
                            <div class="pt-3">{{Request::is('enrg3') ? $user['3a_matricule'] : $user['4a_matricule']}}
                            </div>
                        </div>

                    </div>

                </div>

                <div class="mt-6 w-full">
                    <button id="Valider" type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Marquer la présence
                    </button>
                    <a href="{{Request::is('enrg3') ? route('enrg3') : route('enrg4')}}"
                        class="mt-3 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-black bg-gray-200 hover:bg-gray-300 text-black-800 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>