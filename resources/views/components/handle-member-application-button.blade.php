@props(['href'])

<a href="{{ $href }}" {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-950 uppercase tracking-widest hover:bg-indigo-400 active:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shrink-0', 'aria-label' => 'button handle new members applications']) }}>
    <x-heroicon-o-cog-8-tooth class="w-6 h-6" />
    &nbsp;
    {{ __('applications') }}
</a>