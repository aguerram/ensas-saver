@section("title",$pageTitle)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$pageTitle}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="post" action="{{route("excel_export:post",["year"=>$year,"filiere"=>$filiere ])}}">
                    @csrf
                    <input type="hidden" name="year" value="{{$year}}">
                    <input type="hidden" name="filiere" value="{{$filiere}}">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">Note
                                        miminal</label>
                                    <input id="first_name"
                                           value="0"
                                           type="number"
                                           name="min_note"
                                           min="0"
                                           class="mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">List
                                        principal</label>
                                    <input id="last_name"
                                           value="4"
                                           type="number"
                                           name="princ_list_count"
                                           min="0"
                                           class="mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email_address"
                                           class="block text-sm font-medium leading-5 text-gray-700">List
                                        d'attende</label>
                                    <input id="email_address"
                                           value="6"
                                           type="number"
                                           name="wait_list_count"
                                           min="0"
                                           class="mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                </div>
                                <div class="col-span-6">
                                    <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                        Enregistrer
                                    </button>
                                </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
