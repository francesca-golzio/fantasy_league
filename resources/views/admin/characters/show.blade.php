<x-app-layout>

    <x-slot name="header">
        <div class="flex gap-5 flex-wrap items-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <span>{{ __('Character: ') }}</span>
            <div><img src="{{ asset('storage/' . $character?->img_profile) }}" alt="{{ $character?->getFullName() }}" class="rounded-full size-[50px]"></div>
            <h2 class="font-semibold">
                {{ $character?->getFullName() }}
            </h2>
            <small>{{ __('cost: ') }}{{ $character?->cost }}</small>
        </div>
    </x-slot>
  
    <div class="text-gray-900 dark:text-gray-100 m-6">
        <a href="{{ route('admin.characters.index') }}">back to list</a>
    </div>
  
  
    <div class="text-gray-900 dark:text-gray-100 flex flex-column flex-wrap justify-center md:flex-nowrap gap-12 px-12 my-6 mx-auto max-w-4xl">

        <div class="flex flex-col w-full">

            <div class="my-6">
                {{ $character?->description }}
            </div>

            <div class="my-6">
                {{ $character?->slug }}
            </div>

            <div class="flex gap-5 my-6">
                <x-edit-button href="{{ route('admin.characters.edit', $character) }}"></x-edit-button>   
                <x-delete-button :entity="$character"  modal_name="confirm-{{$character->slug}}-deletion"></x-delete-button>
            </div>

        </div>

        <div class="">
            <img 
                src="{{ asset('storage/' . $character?->img_full) }}" 
                alt="{{ $character?->getFullName() }}" 
                class="rounded-xl max-h-[600px] outline outline-[12px] outline-indigo-900 mb-12">
        </div>
    
    </div>

    <!-- Delete Modal -->
    <x-modal name="confirm-{{$character->slug}}-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('admin.characters.destroy', $character) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete ') . $character->getFullName() . '?' }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once the character is deleted, all of its resources and data will be permanently deleted.') }}
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