@props(['name'=>'', 'placeholder'=>''])

<textarea 
    {{ $attributes->merge([
        'name' => $name, 
        'placeholder' => $placeholder,
        'rows' => '3',
        'class' => 'rounded text-emerald-900 dark:text-emerald-200 placeholder:text-emerald-900 dark:placeholder:text-emerald-200 caret-emerald-500 bg-emerald-200 dark:bg-emerald-900 border-none placeholder:capitalize'
    ]) }}>
</textarea>