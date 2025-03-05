<x-app-layout>
    <x-booksearch />

    <article
        class="group flex rounded-sm max-w-2xl flex-col overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 mx-auto w-full mt-8">
        <div class="flex flex-col gap-4 p-6">
            <span class="text-sm font-medium">Librisearch</span>
            <h3 class="text-balance text-xl lg:text-2xl font-bold text-neutral-900 dark:text-white"
                aria-describedby="featureDescription">
                Happy Reading!
            </h3>
            <p id="featureDescription" class="text-pretty text-sm">
                Libri Search is a user-friendly book search tool. Discover, organize, and curate your reading journey.
            </p>
        </div>
    </article>
</x-app-layout>
