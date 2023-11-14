<div @click="show = ! show" class="flex justify-center">
    <div class="flex items-center py-2 mb-2 border-b-2">
        <p class="pr-2">
            {{ $slot }}
        </p>
        <x-dropdown-icon />
    </div>
</div>
