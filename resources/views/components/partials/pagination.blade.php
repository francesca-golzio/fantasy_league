{{--
    Pagination Nav Component

    Renders first / prev / current / next / last page links.
    Renders nothing when there is only one page.

    Usage:
        <x-partials.pagination :items="$leagues" />
        <x-partials.pagination :items="$leagues" class="my-0" />

    Props:
        items   Required. 
        Must be the return value of ->paginate();
        simplePaginate() and cursorPaginate() are NOT supported.
--}}

@props(['items'])

@if ($items->hasPages())
@php
$currentPage = $items->currentPage();
$lastPage = $items->lastPage();

$linkClass = "bg-indigo-200 dark:bg-indigo-950 border-2 border-transparent hover:border-indigo-500 rounded-md px-3";
$currentClass = "bg-indigo-300 dark:bg-indigo-800 border-2 border-transparent rounded-md px-3";
@endphp      

<nav {{ $attributes->merge(['class' => 'text-indigo-800 dark:text-indigo-300 flex justify-center gap-3 my-6 px-6', 'aria-label' => 'Pagination']) }}>

  {{-- first page --}}
  @if ($currentPage > 1)
  <a href="{{ $items->url(1) }}" class="{{ $linkClass }}">
    1
  </a>
  @endif

  {{-- previous page --}}
  @if ($currentPage > 2)
  <a href="{{ $items->url($currentPage - 1) }}"  class="{{ $linkClass }}">
    prev
  </a>
  @endif
  
  {{-- current page --}}            
  <span class="{{ $currentClass }}" aria-current="page">
    {{ $currentPage }}
  </span>
  
  {{-- next page --}}
  @if ($currentPage < ($lastPage - 1))
  <a href="{{ $items->url($currentPage + 1) }}"  class="{{ $linkClass }}">
    next
  </a>
  @endif

  {{-- last page --}}
  @if ($currentPage < $lastPage)
  <a href="{{ $items->url($lastPage) }}"  class="{{ $linkClass }}">
    {{ $lastPage }}
  </a>
  @endif

</nav>
@endif 