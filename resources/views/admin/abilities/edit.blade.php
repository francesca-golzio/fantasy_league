<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-indigo-950 dark:text-indigo-300 leading-tight">
      {{ __('Update the Ability') }}
    </h2>
  </x-slot>

  <x-crud.edit-form :route="route('admin.abilities.update', $ability)" entity="Ability" class="max-w-lg mx-auto">

    <!-- Event related to the Ability -->
      <x-crud.edit-select name="event_type_id" placeholder="event id">
        @foreach ($events as $event)
          <option value="{{ $event->id }}" @selected(old('event_type_id', $event->id) == $ability->event_type_id)>{{ $event->name }}</option>
        @endforeach
      </x-crud.edit-select>
      
      <!-- Character who owns the Ability -->
      <x-crud.edit-select name="character_id" placeholder="character id">
        @foreach ($characters as $character)
          <option value="{{ $character->id }}" {{ $character->id == $ability->character_id ? 'selected' : '' }}>{{ $character->getFullName() }}</option>
        @endforeach
      </x-crud.edit-select>

    <!-- Ability Kind -->
    <fieldset class="flex gap-6">
      <x-crud.edit-input-radio name="kind" value="multiplier" label="multiplier" :checked="old('kind', $ability->kind->value) == 'multiplier'"/>
      <x-crud.edit-input-radio name="kind" value="immunity" label="immunity" :checked="old('kind', $ability->kind->value) == 'immunity'"/>
    </fieldset>

    <!-- Ability Factor -->
    <fieldset class="flex justify-center items-end gap-3">
      <label for="factor" class="text-amber-700 dark:text-amber-200">multiplier factor</label>
      <x-crud.edit-input type="number" name="factor" value="{{ old('factor', $ability->factor) }}" id="factor" placeholder="0" class="w-24"/>
    </fieldset>

  </x-crud.edit-form>

</x-app-layout>

<!-- Handle the case where the kind is "immunity" and the factor must be 0 -->
<script>
  const radios = document.querySelectorAll('input[name="kind"]');
  const immunity = document.querySelector('input[name="kind"][value="immunity"]');
  const factor = document.querySelector('input[name="factor"]');
  let lastFactor = factor.value;

  function handleFactor() {
    const isImmune = immunity.checked;

    factor.readOnly = isImmune;
    factor.value = isImmune ? 0 : lastFactor;

    factor.classList.toggle('opacity-50', immunity.checked);
    factor.classList.toggle('bg-gray-100', immunity.checked);
    factor.classList.toggle('cursor-not-allowed', immunity.checked);
  }

  radios.forEach(r => addEventListener('change', handleFactor));
  factor.addEventListener('input', () => {
    if(!factor.readOnly) lastFactor = factor.value;
  });

  handleFactor();
</script>