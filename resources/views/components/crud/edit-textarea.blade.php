@props(['name'=>'', 'placeholder'=>''])

<textarea 
    {{ $attributes->merge([
        'name' => $name, 
        'placeholder' => $placeholder,
        'rows' => '3',
        'class' => 'rounded text-amber-900 dark:text-amber-200 placeholder:text-amber-900 dark:placeholder:text-amber-200 caret-amber-500 bg-amber-200 dark:bg-amber-900 border-none placeholder:capitalize'
    ]) }}>
    {{ $value }}
</textarea>