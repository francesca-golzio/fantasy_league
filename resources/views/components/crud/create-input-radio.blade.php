@props(['name'=>'', 'value', 'label'=>''])

<div>
    <input
        {{ $attributes->merge([
        'class' => 'outline-none focus:ring-0 focus:ring-offset-0 focus:[box-shadow:none] accent-emerald-500 checked:bg-emerald-500 checked:focus:bg-emerald-500 checked:border-emerald-500 checked:focus:border-emerald-500 bg-emerald-200', 
        'type' => 'radio'
    ]) }}
        name="{{ $name }}"
        id="{{ $value }}"
        value="{{ $value }}">

    <label {{ $attributes->merge(['class' => 'text-emerald-700 dark:text-emerald-200', 'aria-label' => $label]) }} for={{ $value }}>
        {{ $label ?? $slot }}
    </label>
</div>