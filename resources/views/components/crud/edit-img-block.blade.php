@props(['img_src', 'alt', 'name', 'label', 'value'=>'', 'img_class' => ''])

<div class="flex gap-3 justify-end w-full">
    <img src="{{ $img_src }}" alt="{{ $alt }}" class="{{ $img_class }}">
    <div class="flex flex-col gap-3">
        <label for="img_full" class="uppercase text-sm text-amber-700 dark:text-amber-500">{{ $label }}</label>
        <x-crud.edit-input type="file" name="{{ $name }}" value="{{ $value }}" placeholder="{{ $name }}"/>
    </div> 
</div>