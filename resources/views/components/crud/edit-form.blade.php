@props(['route'=> '#', 'entity', 'slot'])

<div class="max-w-3xl my-12 mx-auto">
    <form 
        {{ $attributes->merge([
            'action' => $route,
            'method' => 'POST',
            'enctype' => 'multipart/form-data',
            'class' => 'flex flex-col flex-wrap justify-center gap-6 mx-5'
        ]) }}>
        @csrf
        @method('PUT')
            
        <fieldset class="relative flex flex-wrap justify-between gap-6 border border-amber-500 rounded-xl p-6">
            
            <label class="block_label absolute -top-3.5 px-3 bg-gray-900 text-amber-700 dark:text-amber-500">
                
                {{ __('Update the ') }}{{ $entity ?? '' }}

            </label>

            {{ $slot }}

        </fieldset>

    <x-crud.edit-button />
    </form>
</div>
