@if (session('status'))
    <div class="relative flex border-neutral-300 bg-zinc-200 p-4 text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 border-b">
        <p class="text-sm text-pretty mx-auto">
            {!! session('status') !!}
        </p>
    </div>
@endif