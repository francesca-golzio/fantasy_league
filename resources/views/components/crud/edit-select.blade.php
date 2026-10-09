@props(['name'=>'', 'placeholder'=>''])

<select {{ $attributes->merge([
    'name' => $name,
    'placeholder' => $placeholder,
    'class' => 'rounded text-amber-900 dark:text-amber-200 placeholder:text-amber-900 dark:placeholder:text-amber-200 caret-amber-500 accent-amber-500 bg-amber-200 dark:bg-amber-900 placeholder:capitalize border-none',
]) }}>
    {{ $slot }}
</select>