@php
// TODO: sostituisci default con 'member'
$requestedFilter = $_GET['filter'] ?? 'all';

@endphp

<x-app-layout>

    <x-slot name="header">
        <div class="flex gap-12">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('leagues') }}
            </h2>
            <x-add-new-button href="{{ route('leagues.create') }}"></x-add-new-button>
        </div>
    </x-slot>

    <div class="max-w-7xl mb-12 mx-auto">

        <!-- Filter -->
        <form action="{{ route('leagues.index') }}" method="GET" class="flex gap-3 justify-center flex-wrap text-indigo-800 dark:text-indigo-400 mt-3 mx-auto w-6xl">
            <span class="text-center w-full md:w-auto">Which leagues do you want to see?</span>
            
            <!-- TODO: aggiungi un filtro per i membri: 'member' => "I'm a member", -->
            @foreach (['owned' => 'Owned', 'all' => 'All leagues'] as $value => $label)
                <button type="submit" name="filter" value="{{ $value }}"
                        class="{{ $requestedFilter === $value ? 'border-[1px] border-indigo-500 dark:border-indigo-800 rounded-md' : '' }} px-3 py-[0.5px]">
                    {{ $label }}
                </button>
            @endforeach
            
        </form>

        {{-- Display Status, when coming from a delete --}}
        {{-- TODO: convert this into a modal component --}}
        @if (session('status'))
        <p class="text-sm text-indigo-900 dark:text-indigo-300 bg-indigo-300 dark:bg-indigo-900 border-[1px] border-indigo-500 mx-auto rounded-md py-3 px-6 w-2/3 md:w-1/4">{{ session('status') }}</p>
        @endif

        <!-- Leagues List -->
        <table class="text-left text-indigo-900 dark:text-indigo-200 my-6 mb-6 mx-auto">
            <!-- Table Header -->
            <thead>
                <tr>
                    <th class="font-medium text-indigo-400 dark:text-indigo-300 py-3 px-3">league</th>
                    <th class="font-medium text-indigo-400 dark:text-indigo-300 py-3 px-3">points</th>
                    <th class="font-medium text-indigo-400 dark:text-indigo-300 py-3 px-3">owner</th>
                    <th class="font-medium text-center text-indigo-400 dark:text-indigo-300 py-3 px-3">members</th>
                    <th class="font-medium text-indigo-400 dark:text-indigo-300 py-3 px-3">actions</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
            @foreach ($leagues as $league)
                <tr>
                    <td class="whitespace-nowrap py-3 px-3 text-lg">{{ $league->name }}</td>
                    <!-- TODO: add the points -->
                    <td class="whitespace-nowrap py-3 px-3 text-lg">XXX</td>
                    <td class="whitespace-nowrap py-3 px-3">{{ $league->owner->name }}</td>
                    <!-- TODO: add the number of members -->
                    <td class=" text-center py-3 px-3">n</td>
                    <!-- Action buttons -->
                    <td>
                        <div class="flex justify-evenly gap-6 py-3 px-3">
                        @can('view', $league)
                            <x-show-button href="{{ route('leagues.show', $league) }}" />
                        @endcan
                        @can('update', $league)
                            <x-edit-button href="{{ route('leagues.edit', $league) }}" class="max-md:hidden"/>
                        @endcan
                        @can('delete', $league)
                            <x-delete-button :entity="$league" modal_name="confirm-league-{{$league->slug}}-deletion" class="max-sm:hidden"/>                        
                        @endcan
                        </div>
                    </td>
                    <!-- TODO: add the JOIN/LEAVE button -->
                     <!-- TODO: fix responsiveness dei buttons -->
                </tr>
                @endforeach
                
            </tbody>
        </table>

        <!-- List Pagination Nav -->        
        <x-partials.pagination :items="$leagues" />
        
    </div>



    <!-- Delete Modal -->
    @foreach ($leagues as $league)
    <x-modal name="confirm-league-{{$league->slug}}-deletion" focusable>
        <form method="post" action="{{ route('leagues.destroy', $league) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete the ') . $league->name . ' league?' }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once the league is deleted, all of its resources and data will be permanently deleted.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
    @endforeach

</x-app-layout>