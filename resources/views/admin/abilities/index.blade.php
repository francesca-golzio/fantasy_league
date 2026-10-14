<x-app-layout>

    <x-slot name="header">
        <div class="flex gap-12">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Abilities') }}
            </h2>
            <x-add-new-button href="{{ route('admin.abilities.create') }}"></x-add-new-button>
        </div>
    </x-slot>
    
    <div class="max-w-7xl my-12 mx-auto">
        <table class="text-left text-indigo-900 dark:text-indigo-200 my-6 mx-auto">
            <thead>
                <tr>
                    <th class="font-medium text-indigo-400 dark:text-indigo-300 py-3 px-3">character</th>
                    <th class="font-medium text-indigo-400 dark:text-indigo-300 py-3 px-3">ability type</th>
                    <th class="font-medium text-indigo-400 dark:text-indigo-300 py-3 px-3">factor</th>
                    <th class="font-medium text-indigo-400 dark:text-indigo-300 py-3 px-3" colspan="3">actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($abilities as $ability)
                <tr>
                    <td class="py-3 px-3">{{ $ability->character->getFullName() }}</td>
                    <td class="py-3 px-3">{{ $ability->kind }}</td>
                    <td class="py-3 px-3">{{ $ability->factor }}</td>
                    <td class="py-3 px-3"><x-show-button href="{{ route('admin.abilities.show', $ability) }}"></x-show-button></td>
                    <td class="py-3 px-3"><x-edit-button href="{{ route('admin.abilities.edit', $ability) }}"></x-edit-button></td>
                    <td class="py-3 px-3"><x-delete-button :entity="$ability" modal_name="confirm-ability-{{$ability->id}}-deletion"></x-delete-button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Delete Modal -->
    @foreach ($abilities as $ability)
      <x-modal name="confirm-ability-{{$ability->id}}-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('admin.abilities.destroy', $ability) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete this ability?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once the ability is deleted, all of its resources and data will be permanently deleted.') }}
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