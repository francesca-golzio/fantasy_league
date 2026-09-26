@props(['entity'])

<x-danger-button
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirm-{{$entity->slug}}-deletion')"
    aria-label='delete button'>
        {{ __('delete') }}
</x-danger-button>