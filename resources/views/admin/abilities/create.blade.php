@php
$isImmune = false;
@endphp

<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-indigo-950 dark:text-indigo-300 leading-tight">
      {{ __('Add a New Ability') }}
    </h2>
  </x-slot>

  <x-crud.create-form :route="route('admin.abilities.store')" entity="Ability" class="max-w-lg mx-auto">

    <!-- Event related to the Ability -->
      <x-crud.create-input list="event_type_id_suggestions" type="text" name="event_type_id" placeholder="event id" />
      <datalist id="event_type_id_suggestions" class="">
        @foreach ($events as $event)
          <option value="{{ $event->id }}">{{ $event->name }}</option>
        @endforeach
      </datalist>
      
      <!-- Character who owns the Ability -->
      <x-crud.create-input list="character_id_suggestions" type="text" name="character_id" placeholder="character id" />
      <datalist id="character_id_suggestions" class="">
        @foreach ($characters as $character)
          <option value="{{ $character->id }}">{{ $character->getFullName() }}</option>
        @endforeach
      </datalist>

    <!-- Ability Kind -->
    <div class="flex gap-6">
      <x-crud.create-input-radio name="kind" value="multiplier" label="multiplier"/>
      <x-crud.create-input-radio name="kind" value="immunity" label="immunity"/>
    </div>

    <!-- Ability Factor -->
    <fieldset class="flex justify-center items-end gap-3">
      <label for="factor" class="text-emerald-700 dark:text-emerald-200">multiplier factor</label>
      <x-crud.create-input type="number" name="factor" id="factor" placeholder="0" class="w-24"/>
    </fieldset>

  </x-crud.create-form>

</x-app-layout>

<!-- Handle the case where the kind is "immunity" and the factor must be 0 -->
<script>
  const immunity = document.querySelector('input[name="kind"][value="immunity"]');
  const factor = document.querySelector('input[name="factor"]');

  function handleFactor() {
    factor.readOnly = immunity.checked;

    if (immunity.checked) factor.value = 0;

    factor.classList.toggle('opacity-50', immunity.checked);
    factor.classList.toggle('bg-gray-100', immunity.checked);
    factor.classList.toggle('cursor-not-allowed', immunity.checked);
  }

  document.querySelector('input[name="kind"]').form.addEventListener('change', handleFactor);

  handleFactor();
</script>