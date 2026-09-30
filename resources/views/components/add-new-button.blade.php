@props(['href'])

<a href="{{ $href }}" {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-950 uppercase tracking-widest hover:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shrink-0', 'aria-label' => 'button add new']) }}>
    <x-heroicon-o-sparkles class="w-6 h-6" />
    &nbsp;
    {{ __('add new') }}
</a>