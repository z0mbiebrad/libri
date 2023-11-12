<div x-show="show" style="display:none"
    class="z-50 flex justify-around w-full px-4 py-2 mx-auto mt-2 mb-4 overflow-auto rounded-md lg:absolute bg-slate-800 text-slate-300 max-h-72">
    @if (Auth::user())
        {{ $slot }}
    @endif
</div>
