<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Characters') }}
        </h2>
    </x-slot>
    
    
    <div class="py-12">
        <div class="max-w-max mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("sono la index: ecco i personaggi!") }}
                </div>
            </div>
        </div>
    </div>

    <div>
      <table class="text-left text-gray-900 dark:text-gray-100 mx-auto">
        <thead>
          <tr>
            <th class="py-1 px-3"></th>
            <th class="py-1 px-3">fullname</th>
            <th class="py-1 px-3">cost</th>
            <th class="py-1 px-3" colspan="3">actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($characters as $character)
          <tr>
            <td class="py-1 px-3"><img src="{{ $character->img_profile }}" alt="{{ $character->getFullName() }}" class="rounded-full size-[30px]"></td>
            <td class="py-1 px-3">{{ $character->getFullName() }}</td>
            <td class="py-1 px-3">{{ $character->cost }}</td>
            <td class="py-1 px-3"><a href="{{ route('admin.characters.show', $character) }}">{{ __('show') }}</a></td>
            <td class="py-1 px-3"><a href="{{ route('admin.characters.edit', $character) }}">{{ __('edit') }}</a></td>
            <td class="py-1 px-3">
              <x-danger-button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-{{$character->slug}}-deletion')">
                  {{ __('delete') }}
              </x-danger-button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
    </div>
    
    <!-- Delete Modal -->
    @foreach ($characters as $character)
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

    @endforeach

</x-app-layout>