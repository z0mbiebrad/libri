<div x-data="{ open: false }" class="mx-0" @click.away="open = false">
    <div x-show="open" style="display:none" x-transition class=""
        class="z-50 w-full px-4 py-2 mt-2 mb-4 overflow-auto rounded-md -mx-auto bg-slate-800 max-h-72">
        {{ $content }}
    </div>
    <div x-on:click="open = ! open">
        <div class="flex items-center p-2 shadow-inner shadow-gray-200">
            <p class="pr-2">
                {{ $trigger }}
            </p>
            <x-dropdown-icon />
        </div>
    </div>
</div>