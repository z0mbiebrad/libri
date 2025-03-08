<x-app-layout>
    <x-booksearch />

    <article
        class="group flex rounded-sm max-w-2xl flex-col overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 mx-auto w-full mt-8">
        <div class="flex flex-col gap-4 p-6">
            <h1 class="text-2xl font-medium">Welcome to Librisearch</h1>
            <p id="featureDescription" class="text-pretty text-sm">
                Libri Search is a user-friendly book search tool built using the Google Books api. Discover, organize, and curate your reading journey. 
            </p>
            <p class="text-balance text-md lg:text-2xl font-bold text-neutral-900 dark:text-white"
                aria-describedby="featureDescription">
                Happy Reading!
            </p>
          
        </div>
    </article>
</x-app-layout>
