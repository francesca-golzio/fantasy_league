@props(['route', 'entity', 'slot'])

<div class="max-w-3xl my-12 mx-auto">
  <form {{$attributes->merge([
      'class' => 'flex flex-col flex-wrap justify-center gap-6 mx-5', 
      'action' => $route ?? '#', 
      'method' => 'POST', 
      'enctype' => 'multipart/form-data'])}}>
      @csrf

    <fieldset class="relative flex flex-wrap justify-between gap-6 border border-emerald-500 rounded-xl p-6">

      <label class="block_label absolute -top-3.5 px-3 bg-gray-900 text-emerald-700 dark:text-emerald-500">
          {{ __('Add a New ') }}{{ $entity ?? '' }}
      </label>

      {{ $slot }}

    </fieldset>

    <x-crud.create-button />

  </form>
</div>