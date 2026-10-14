<x-app-layout>

  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-indigo-300 leading-tight">
          {{ __('Add a New League') }}
      </h2>
  </x-slot>

  <div class="max-w-md mx-auto">
    <x-crud.create-form :route="route('leagues.store')" entity="League">
    
      <x-crud.create-input type="text" name="name" value="{{ old('name') }}" placeholder="league name" class="w-full" required aria-label="required"/>

      @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
      @error('slug') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror

    </x-crud.create-form>
  </div>

</x-app-layout>