<x-app-layout>

  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-indigo-300 leading-tight">
          {{ __('Update the League') }} {{ $league->name }}
      </h2>
  </x-slot>

  <div class="max-w-md mx-auto">
    <x-crud.edit-form :route="route('leagues.update', $league)" entity="League">
    
      <x-crud.edit-input type="text" name="name" :value="old('name', $league->name)" placeholder="league name" class="w-full" required aria-label="required"/>

      @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
      @error('slug') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror

    </x-crud.edit-form>
  </div>

</x-app-layout>