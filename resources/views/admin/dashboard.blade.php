<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

        <div class="py-12">
            <div class="max-w-max mx-auto sm:px-6 lg:px-8">
                <div class="bg-indigo-300 dark:bg-indigo-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-indigo-950 dark:text-indigo-50">
                        {{ __("Welcome, Admin!") }}
                    </div>
                </div>
            </div>
        </div>

        <x-dashboard-entity-panel entity="characters" list_route="admin.characters.index" create_route="admin.characters.create" />
        


    </div>
    
</x-app-layout>