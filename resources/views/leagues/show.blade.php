<x-app-layout>

    <x-slot name="header">
        <div class="flex gap-5 flex-wrap items-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <span>{{ __('League: ') }}</span>
            <h2 class="font-semibold">
                {{ $league->name }}
            </h2>
        </div>
    </x-slot>
  
    <div class="text-gray-900 dark:text-gray-100 m-6">
        <a href="{{ route('leagues.index') }}">back to list</a>
    </div>
  

    {{-- Display Status, when coming from a create/store or an edit/update --}}
    {{-- TODO: convert this into a modal component --}}
    @if (session('status'))
    <p class="text-sm text-indigo-900 dark:text-indigo-300 bg-indigo-300 dark:bg-indigo-900 border-[1px] border-indigo-500 mx-auto rounded-md py-3 px-6 w-2/3 md:w-1/4">{{ session('status') }}</p>
    @endif
  
    <div class="text-indigo-900 dark:text-indigo-200 flex flex-wrap justify-center md:flex-nowrap gap-12 px-12 my-6 mx-auto max-w-4xl">
        
        <div class="flex flex-col w-full">

            {{-- League Details --}}
            <div class="flex w-full">
                
                <div class="flex flex-col w-full">                    
                    {{-- League Name --}}
                    <div class="font-semibold text-2xl">
                        {{ $league->name }}
                    </div>
                    {{-- League Lord / Owner --}}
                    <p class="italic text-indigo-800 dark:text-indigo-400">
                        ~ hail to our lord {{ $league->owner->name }}
                    </p>                    
                </div>

                {{-- League Points --}}
                <div>
                    <span class="text-indigo-800 dark:text-indigo-400 text-sm italic ml-3">points</span>
                    <div class="flex gap-3 items-center">
                        <x-heroicon-s-sparkles class="text-indigo-800 dark:text-indigo-400 w-6 h-6" />
                        <span class="text-xl font-semibold">XXXX{{ $league->points }}</span>
                    </div>
                </div>
                
            </div>
            
            {{-- Members List --}}
            {{-- TODO: add list of members --}}
            <div class="my-6">Members List - coming soon</div>
        </div>

        {{-- Management Buttons --}}
        <div class="flex gap-5 flex-wrap justify-end my-3">
            <x-edit-button href="{{ route('leagues.edit', $league) }}" />   
            <x-delete-button :entity="$league"  modal_name="confirm-{{$league->slug}}-deletion" />
            {{-- TODO: implement buttons actions --}}
            <x-add-member-button href="#" />
            <x-handle-member-application-button href="#" />
        </div>

    </div>

    {{-- Delete Modal --}}
    <x-modal name="confirm-{{$league->slug}}-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('leagues.destroy', $league) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete ') . $league->name . '?' }}
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
    
</x-app-layout>