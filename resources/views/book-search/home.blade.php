<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight ">
            {{ __('Book Search') }}
        </h2>
    </x-slot>

    <x-booksearch />

    <div class="w-5/6 h-full py-8 m-auto space-y-6 text-xl sm:text-2xl ">
        @auth
            <p>Welcome back, {{ Auth::user()->name }}!</p>
            @isset($book)
                <p>You are currently reading {{ $book->title }} by {{ $book->authors }}.</p>
                <p>Would you like to see more books by this author? <a class="underline"
                        href="{{ route('results.show', ['query' => 'inauthor', 'bookSearch' => $book->authors]) }}">Click
                        Here</a>
                </p>
            @endisset
            <p>Happy reading!</p>
        @else
            <h3>Welcome to Libri Search!</h3>
            <p>
                Libri Search is a user-friendly book search tool. Discover, organize, and curate your reading journey
                effortlessly with three distinct lists: Finished, Current, and Wishlist.
            </p>
            <p>
                Just type in the full or partial name of a book, and you will be presented with a list of the
                top
                ten closest matches. Found what you're looking for? A simple selection lets you add it seamlessly to
                your
                preferred list.
            </p>
            <p>
                Although the search feature is available to everyone, unlocking the complete capabilities of Libri Search's
                Book Lists involves a brief account creation and login.
            </p>
            <p>
                Creating an account enables you to access more
                refined search results. You have the option to narrow down your searches by specifying a title or author,
                and you can also apply filters to exclusively display ebooks.
            </p>
            <p>
                Happy reading!
            </p>
        @endauth
    </div>
</x-app-layout>
