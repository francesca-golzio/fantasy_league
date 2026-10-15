@php

use App\Enums\AbilityKind;

@endphp

<x-app-layout>

    <x-slot name="header">
        <div class="flex gap-5 flex-wrap text-xl text-gray-800 dark:text-gray-200 leading-tight">
          <span>{{ __('Abilities') }}</span>
        </div>
    </x-slot>

    <div class="text-gray-900 dark:text-indigo-200 m-6">
        <a href="{{ route('admin.abilities.index') }}">back to list</a>
    </div>


    <div class="text-gray-900 dark:text-indigo-200 flex flex-col justify-center items-center gap-6 px-12 my-6 mx-auto max-w-3xl">

        
        <div class="flex justify-between w-full">

          <!-- Owner -->
          <div class="flex flex-wrap justify-start items-start gap-3">
  
            <img src="{{ asset('storage/' . $ability?->character->img_profile) }}" alt="{{ $ability?->character?->getFullName() }}" class="w-[100px] h-[100px] rounded-full">
  
            <div class="uppercase">{{ $ability?->character->getFullName() }}</div>
  
          </div>
          
          <!-- Kind -->
          <div class="flex justify-end items-start gap-3 w-[20px] h-[20px]">
            
            <div class="uppercase">{{ $ability?->kind }}</div>
            
            <div class="flex nowrap justify-center items-center gap-1 border-[2px] border-indigo-500 aspect-square rounded-full p-3">
              @if ($ability?->kind === AbilityKind::MULTIPLIER)
              <x-heroicon-s-x-mark class="w-6 h-6 text-indigo-500" />
              <div class="text-xl text-center">{{ $ability?->factor }}</div>
              @elseif ($ability?->kind === AbilityKind::IMMUNITY)
              <x-heroicon-s-shield-check class="w-6 h-6 text-indigo-500" />
              @endif
            </div>
            
          </div>
          
        </div>

        <!-- Event -->
        <div class="text-indigo-950 dark:text-indigo-200 text-xl text-center text-balance bg-indigo-300 dark:bg-indigo-950 rounded-3xl p-6 my-6 mx-auto">{{ $ability?->eventType?->name }}</div>

        
        <!-- Ability Actions -->
        <div class="flex justify-end gap-6 w-full">
            <x-edit-button href="{{ route('admin.abilities.edit', $ability) }}" />
            <x-delete-button :entity="$ability" modal_name="confirm-ability-{{$ability->id}}-deletion"/>
        </div>
        
      </div>

    <!-- Delete Modal -->
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

</x-app-layout>