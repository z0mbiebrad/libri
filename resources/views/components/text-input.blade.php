@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-slate-500 focus:ring-slate-500 rounded-md shadow-xs text-black',
]) !!}>
