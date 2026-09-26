<x-app-layout>

    <x-slot name="header">
        <div class="flex gap-12">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Characters') }}
            </h2>
            <x-add-new-button href="{{ route('admin.characters.create') }}"></x-add-new-button>
        </div>
    </x-slot>
    
    <div class="max-w-7xl my-12 mx-auto">
        <table class="text-left text-indigo-900 dark:text-indigo-200 my-6 mx-auto">
            <thead>
                <tr>
                    <th class="font-medium text-indigo-400 dark:text-indigo-300 py-3 px-3"></th>
                    <th class="font-medium text-indigo-400 dark:text-indigo-300 py-3 px-3">fullname</th>
                    <th class="font-medium text-indigo-400 dark:text-indigo-300 py-3 px-3">cost</th>
                    <th class="font-medium text-indigo-400 dark:text-indigo-300 py-3 px-3" colspan="3">actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($characters as $character)
                <tr>
                    <td class="py-3 px-3"><img src="{{ $character->img_profile }}" alt="{{ $character->getFullName() }}" class="rounded-full size-[30px]"></td>
                    <td class="py-3 px-3">{{ $character->getFullName() }}</td>
                    <td class="py-3 px-3">{{ $character->cost }}</td>
                    <td class="py-3 px-3"><x-show-button href="{{ route('admin.characters.show', $character) }}"></x-edit-button></td>
                    <td class="py-3 px-3"><x-edit-button href="{{ route('admin.characters.edit', $character) }}"></x-edit-button></td>
                    <td class="py-3 px-3"><x-delete-button :entity="$character"></x-delete-button></td>
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