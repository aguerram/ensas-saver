<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enregistrement 3éme année') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div
            class="xs:w-full sm:w-1/2 lg:w-1/3 flex bg-white xs:mx-6 my-6 sm:mx-auto shadow-lg rounded-lg overflow-hidden">
    <form class="mt-8 p-5 w-full " action="{{route('enrg3_submit')}}" method="POST">
                @csrf
                <div class="w-full">
                    <input id="user" value="{{old('user')}}" aria-label="CIN or Maricule" name="user"
                        type="text" required
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