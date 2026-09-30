@props(['name'=>'', 'value', 'label'=>'', 'checked' => false])

<div>
    <input
        {{ $attributes->merge([
        'class' => 'outline-none focus:ring-0 focus:ring-offset-0 focus:[box-shadow:none] accent-amber-500 checked:bg-amber-500 checked:focus:bg-amber-500 checked:border-amber-500 checked:focus:border-amber-500 bg-amber-200', 
        'type' => 'radio'
    ]) }}
        name="{{ $name }}"
        id="{{ $value }}"
        value="{{ $value }}"
        @checked($checked)>

    <label 
        class="text-amber-700 dark:text-amber-200"
        aria-label="{{ $label ?: $slot }}" 
        for={{ $value }}>
        {{ $label ?: $slot }}
    </label>
</div>