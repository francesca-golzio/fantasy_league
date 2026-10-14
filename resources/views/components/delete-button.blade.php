@props(['entity', 'modal_name'=>''])

<x-danger-button
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', '{{ $modal_name }}')"
    aria-label='delete button'
    {{ $attributes->merge(['class' => 'shrink-0']) }}>
    <x-heroicon-o-trash class="w-6 h-6" />
    &nbsp;
    {{ __('delete') }}
</x-danger-button>