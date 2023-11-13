<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300">
            {{ __('Book Search') }}
        </h2>
    </x-slot>

    <x-booksearch />

    <div class="w-5/6 h-full py-8 m-auto space-y-6 text-xl sm:text-2xl text-slate-300">
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
                effortlessly with three distinct lists: Finished Books, Currently Reading, and Wishlist.
            </p>
            <p>
                Just type in the full or partial name of a book, and you will be presented with a list of the
                top
                ten closest matches. Found what you're looking for? A simple selection lets you add it seamlessly to
                your
                preferred list.
            </p>
            <p>
                While the search feature is accessible to all, utilizing the full potential of Libri Search's Book Lists
                requires a quick account creation and login.
            </p>
            <p>
                Happy reading!
            </p>
        @endauth
    </div>
</x-app-layout>
