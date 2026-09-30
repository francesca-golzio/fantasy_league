@props(['href'])

<a href="{{ $href }}" {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-amber-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-950 uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shrink-0', 'edit' => 'edit button']) }}>
    <x-heroicon-o-pencil-square class="w-6 h-6" />
    &nbsp;
    {{ __('edit') }}
</a>
