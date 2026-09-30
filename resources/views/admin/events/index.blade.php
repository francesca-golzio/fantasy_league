@php
use App\EventTypes;
@endphp

<x-app-layout>

    <x-slot name="header">
        <div class="flex gap-12">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Events') }}
            </h2>
            <x-add-new-button href="{{ route('admin.events.create') }}"></x-add-new-button>
        </div>
    </x-slot>

    <div class="max-w-7xl my-12 mx-auto">
        <table class="text-left text-indigo-900 dark:text-indigo-200 my-6 mx-auto">
            <thead>
                <tr>
                    <th colspan="2"></th>
                    <th class="font-medium text-indigo-400 dark:text-indigo-300 py-3 px-3" colspan="3">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td class="py-3 px-3">
                        @if ($event?->type === EventTypes::Personal)
                        <x-heroicon-s-user class="w-6 aspect-square text-indigo-500" />
                        @elseif ($event?->type === EventTypes::Environmental)
                        <x-heroicon-s-bug-ant class="w-6 aspect-square text-indigo-500" />
                        @endif
                    </td>
                    <td class="py-3 px-3 text-lg">{{ $event->name }}</td>
                    <td class="py-3 px-3"><x-show-button href="{{ route('admin.events.show', $event) }}"></x-edit-button></td>
                    <td class="py-3 px-3 max-md:hidden"><x-edit-button href="{{ route('admin.events.edit', $event) }}"></x-edit-button></td>
                    <td class="py-3 px-3 max-md:hidden"><x-delete-button :entity="$event" modal_name="confirm-event-{{$event->id}}-deletion"></x-delete-button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Delete Modal -->
    @foreach ($events as $event)
    <x-modal name="confirm-event-{{$event->id}}-deletion" focusable>
        <form method="post" action="{{ route('admin.events.destroy', $event) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete ') . $event->name . '?' }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once the event is deleted, all of its resources and data will be permanently deleted.') }}
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