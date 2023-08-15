<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300">
            {{ __('Book Search') }}
        </h2>
    </x-slot>

    <x-booksearch></x-booksearch>

    <div class="flex items-center h-full">
        <div class="p-3 m-auto text-xl sm:text-3xl text-slate-300 sm:w-4/5">
            <h3 class="px-4 py-4">Welcome to Libri Search!</h3>
            <p class="px-4 py-4">
                Libri Search is a user-friendly book search tool. Discover, organize, and curate your reading journey
                effortlessly with three distinct lists: Finished Books, Currently Reading, and Wishlist.
            </p>
            <p class="px-4 py-4">
                Just type in the full or partial name of a book, and you will be presented with a list of the
                top
                ten closest matches. Found what you're looking for? A simple selection lets you add it seamlessly to
                your
                preferred list.
            </p>
            <p class="px-4 py-4">
                While the search feature is accessible to all, utilizing the full potential of Libri Search's Book Lists
                requires a quick account creation and login.
            </p>
            <p class="px-4 py-4">
                Happy reading!
            </p>
        </div>
    </div>
</x-app-layout>
