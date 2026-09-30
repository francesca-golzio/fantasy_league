@php

use App\EventTypes;

function cropTitle($title) {
if (strlen($title) > 25) {
return substr($title, 0, 22) . '...';
}
return $title;
}

@endphp

<x-app-layout>

    <x-slot name="header">
        <div class="flex gap-5 flex-wrap text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <span>{{ __('Event: ') }}</span>
            @if ($event?->type === EventTypes::Personal)
            <x-heroicon-s-user class="w-6 aspect-square text-indigo-500" />
            @elseif ($event?->type === EventTypes::Environmental)
            <x-heroicon-s-bug-ant class="w-6 aspect-square text-indigo-500" />
            @endif
            <h2 class="">
                {{ cropTitle($event?->name) }}
            </h2>
        </div>
    </x-slot>

    <div class="text-gray-900 dark:text-indigo-200 m-6">
        <a href="{{ route('admin.events.index') }}">back to list</a>
    </div>


    <div class="text-gray-900 dark:text-indigo-200 flex flex-col justify-center items-center gap-6 px-12 my-6 mx-auto max-w-3xl">

        <!-- Event Specs -->
        <div class="flex justify-between w-full">

            <!-- Points -->
            <div class="flex flex-wrap justify-start items-start gap-3">

                <div class="border-[2px] border-indigo-500 rounded-full w-[80px] h-[80px] relative">
                    <div class="text-xl text-center top-[30%] w-full absolute">{{ $event?->base_points }}</div>
                </div>

                <div class="uppercase">points</div>

            </div>

            <!-- Type -->
            <div class="flex flex-wrap justify-end idems-end md:items-start gap-3 w-[20px] h-[20px]">

                <div class="border-[2px] border-indigo-500 rounded-full p-3">
                    @if ($event?->type === EventTypes::Personal)
                    <x-heroicon-s-user class="w-6 h-6 text-indigo-500" />
                    @elseif ($event?->type === EventTypes::Environmental)
                    <x-heroicon-s-bug-ant class="w-6 h-6 text-indigo-500" />
                    @endif
                </div>

                <div class="uppercase">{{ $event?->type }}</div>

            </div>

        </div>

        <!-- Event -->
        <div class="text-indigo-950 dark:text-indigo-200 text-xl text-center text-balance bg-indigo-300 dark:bg-indigo-950 rounded-3xl p-6 my-6 mx-auto">{{ $event?->name }}</div>

        <!-- Event Actions -->
        <div class="flex justify-end gap-6 w-full">
            <x-edit-button href="{{ route('admin.events.edit', $event) }}" />
            <x-delete-button :entity="$event" modal_name="confirm-event-{{$event->id}}-deletion"/>
        </div>

    </div>

    <!-- Delete Modal -->
    <x-modal name="confirm-event-{{$event->id}}-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
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

</x-app-layout>