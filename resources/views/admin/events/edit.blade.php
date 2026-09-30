<x-app-layout>

  <!-- Page Header -->
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-indigo-950 dark:text-indigo-300 leading-tight">
      {{ __('Add a New Event') }}
    </h2>
  </x-slot>

  <!-- Edit Form -->
  <x-crud.edit-form :route="route('admin.events.update', $event)" entity="Event">

    <!-- Event Name -->
    <x-crud.edit-input type="text" name="name" :value="$event->name" placeholder="event" class="w-full"/>

    <!-- Event Type -->
    <div class="flex gap-6">
      <x-crud.edit-input-radio name="type" value="environmental" label="environmental" :checked="$event->type->value == 'environmental'" />
      <x-crud.edit-input-radio name="type" value="personal" label="personal" :checked="old('type', $event->type->value == 'personal')"/>
    </div>

    <!-- Event Points -->
    <x-crud.edit-input type="number" name="base_points" :value="intval($event->base_points)" placeholder="points +/-" />

  </x-crud.edit-form>

</x-app-layout>