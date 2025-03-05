@props(['active'])

@php
    $classes = $active ?? false ? 'shadow-inner shadow-slate-400 block w-full pl-3 pr-4 py-2 border-l-4 border-slate-400 text-left text-base font-medium text-white bg-slate-700 focus:outline-hidden focus:text-slate-800 focus:bg-slate-600 focus:border-slate-700 transition duration-150 ease-in-out' : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium  hover:text-slate-800 hover:bg-slate-50 hover:border-slate-300 focus:outline-hidden focus:textwhite focus:bg-slate-600 focus:border-slate-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
