@props(['entity'=>'', 'list_route'=>'admin.dashboard', 'create_route'=>'admin.dashboard'])

<div class="flex justify-center p-8">
    <div class=" bg-indigo-300 dark:bg-indigo-900 rounded-full w-sm-4/5 w-3/5 aspect-square relative">

        <!-- Entity name -->
        <div class="text-md-lg tracking-wider text-indigo-50 text-center uppercase font-semibold bg-indigo-600 px-[24px] px-md-[42px] py-2 rounded-tr-full rounded-bl-full border-[10px] border-double border-indigo-950 absolute top-[6%] -left-3 min-w-full -rotate-3 z-10">
            {{ __($entity) }}
        </div>
        
        <!-- List button -->
        <a href="{{ route($list_route) }}" class="flex justify-center items-center uppercase font-semibold text-indigo-950 bg-indigo-500 hover:bg-indigo-200 p-3 absolute top-[50%] top-md-[45%] -right-3 aspect-[3/1] rounded-tr-full rounded-bl-full border-[8px] border-double border-indigo-950 w-3/5 rotate-[8deg]" title="open the characters list" aria-label="open the characters list">
            <x-heroicon-o-list-bullet class="w-[50%] aspect-square dark:text-indigo-950" /> 
            
        </a>   
        
        <!-- Create button -->
        <a href="{{ route($create_route) }}" class="flex justify-center items-center uppercase font-semibold text-indigo-950 bg-indigo-500 hover:bg-emerald-500 hover:dark:bg-emerald-500 p-3 absolute top-[50%] left-3 aspect-square rounded-full border-[8px] border-double border-indigo-200 dark:border-indigo-950 w-2/5 rotate-6" title="add a new one" aria-label="add a new one">
            <x-heroicon-o-sparkles class="w-[80%] aspect-square dark:text-indigo-950" />
        </a>   

    </div>
</div>
