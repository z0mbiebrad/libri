<svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
    <path :class="{ 'hidden': show, 'inline-flex': !show }" class="inline-flex" stroke-linecap="round"
        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    <path :class="{ 'hidden': !show, 'inline-flex': show }" class="hidden" stroke-linecap="round" stroke-linejoin="round"
        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
</svg>
