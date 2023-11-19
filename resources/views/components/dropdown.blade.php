<div x-data="{ show: false }" class="" @click.away="show = false">
    <div @click="show = ! show" class="">
        <div class="flex items-center py-2 mb-2 border-b-2">
            <p class="pr-2">
                {{ $trigger }}
            </p>
            <x-dropdown-icon />
        </div>
    </div>
    <div x-show="show" style="display:none"
        class="z-50 w-full px-4 py-2 mx-auto mt-2 mb-4 overflow-auto rounded-md bg-slate-800 max-h-72">
        {{ $content }}
    </div>
</div>
