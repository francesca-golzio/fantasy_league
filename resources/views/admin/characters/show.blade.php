<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ $character?->getFullName() }}
      </h2>
  </x-slot>
  
  <div class="text-gray-900 dark:text-gray-100 m-6"><a href="{{ route('admin.characters.index') }}">back to list</a></div>
  
  
  <div class="text-gray-900 dark:text-gray-100 flex my-6 mx-auto max-w-3xl">

      <div class="flex flex-col">

        <div class="flex gap-5 my-6">
          <div><img src="{{ $character?->img_profile }}" alt="{{ $character?->getFullName() }}" class="rounded-full size-[50px]"></div>
          <h3>{{ $character?->getFullName() }}</h3>
          <div>{{ $character?->cost }}</div>
        </div>

        <div class="my-6">{{ $character?->description }}</div>

        <div class="my-6">{{ $character?->slug }}</div>

        <div class="flex gap-5 my-6">
          <a href="{{ route('admin.characters.edit', $character) }}">{{ __('edit') }}</a>
          <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-{{$character->slug}}-deletion')">
              {{ __('delete') }}
          </x-danger-button>
        </div>

      </div>

      <div><img src="{{ $character?->img_full }}" alt="{{ $character?->getFullName() }}"></div>
      
  </div>

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