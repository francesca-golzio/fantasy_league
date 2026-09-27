<x-app-layout>

  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-indigo-300 leading-tight">
          {{ __('Add a New Character') }}
      </h2>
  </x-slot>

  <x-crud.create-form route="route('admin.characters.store')" entity="Character">
    
    <x-crud.create-input type="text" name="name" placeholder="name" class="w-full sm:w-1/3"/>
    
    <x-crud.create-input type="text" name="surname" placeholder="surname" class="w-full sm:w-1/3"/>
    
    <x-crud.create-input type="text" name="cost" placeholder="cost" class="w-full sm:w-1/5"/>

    <x-crud.create-textarea name="description" placeholder="description" class="w-full"/>

    <div class="flex gap-3 justify-end w-full">
      <label for="img_profile" class="uppercase text-sm text-emerald-700 dark:text-emerald-500">portrait&nbsp;image</label>
      <x-crud.create-input type="file" name="img_profile"/>
    </div>

    <div class="flex gap-3 justify-end w-full">
      <label for="img_full" class="uppercase text-sm text-emerald-700 dark:text-emerald-500">fullbody image</label>
      <x-crud.create-input type="file" name="img_full"/>
    </div>

  </x-crud.create-form>

</x-app-layout>