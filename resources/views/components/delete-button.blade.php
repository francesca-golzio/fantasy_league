@props(['entity'])

<x-danger-button
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirm-{{$entity->slug}}-deletion')"
    aria-label='delete button'>
        <x-heroicon-o-trash class="w-6 h-6" />
        &nbsp;
        {{ __('delete') }}
</x-danger-button>