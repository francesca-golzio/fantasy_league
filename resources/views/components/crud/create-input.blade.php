@props(['type'=>'text', 'name'=>'', 'placeholder'=>''])

<input {{ $attributes->merge([
    'type' => $type,
    'name' => $name,
    'placeholder' => $placeholder,
    'class' => 'rounded text-emerald-900 dark:text-emerald-200 placeholder:text-emerald-900 dark:placeholder:text-emerald-200 caret-emerald-500 accent-emerald-500 bg-emerald-200 dark:bg-emerald-900 placeholder:capitalize border-none',
]) }}>