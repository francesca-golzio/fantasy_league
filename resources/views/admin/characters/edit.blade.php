<x-app-layout>

  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Update the Character') }}
      </h2>
  </x-slot>

  <x-crud.edit-form :route="route('admin.characters.update', $character)" entity="Character">

      <x-crud.edit-input type="text" name="name" :value="$character->name" placeholder="name" class="w-full sm:w-1/3"/>

      <x-crud.edit-input type="text" name="surname" :value="$character->surname" placeholder="surname" class="w-full sm:w-1/3"/>

      <x-crud.edit-input type="text" name="cost" :value="$character->cost" placeholder="cost" class="w-full sm:w-1/5"/>

      <x-crud.edit-textarea name="description" placeholder="description" class="w-full">
        <x-slot:value>{{ $character->description }}</x-slot>
      </x-crud.edit-textarea>

      <x-crud.edit-img-block 
        :img_src="asset('storage/' . $character->img_profile)"
        alt="{{ $character->getFullName() }}"
        img_class="rounded-full size-[50px]"
        name="img_profile"
        label="portrait image"/>
        
        <x-crud.edit-img-block 
        :img_src="asset('storage/' . $character->img_full)"
        :alt="$character->getFullName()"
        img_class="rounded h-[150px]"
        name="img_full"
        label="fullbody image"/>
      
  </x-crud.edit-form>

</x-app-layout>