<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-indigo-950 dark:text-indigo-300 leading-tight">
      {{ __('Add a New Event') }}
    </h2>
  </x-slot>

  <x-crud.create-form :route="route('admin.events.store')" entity="Event">

    <!-- Event Name -->
    <x-crud.create-input type="text" name="name" placeholder="event" class="w-full" />

    <!-- Event Type -->
    <div class="flex gap-6">
      <x-crud.create-input-radio name="type" value="environmental" label="environmental"/>
      <x-crud.create-input-radio name="type" value="personal" label="personal"/>
    </div>

    <!-- Event Points -->
    <x-crud.create-input type="number" name="base_points" placeholder="points +/-" class="" />

  </x-crud.create-form>

</x-app-layout>