@if (request()->routeIs('list.*'))
    @php
        $allLists = ['finished', 'current', 'wishlist'];
        $currentList = $book->list ?? null;
        $availableLists = array_diff($allLists, [$currentList]);
    @endphp

    @foreach ($availableLists as $list)
        <form action="{{ route('book.update', [$book, $list]) }}" method="post"
            class="bg-neutral-50 px-4 py-1 text-base text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-hidden dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white hover:cursor-pointer">
            @csrf
            <button type="submit" class="hover:cursor-pointer mx-auto italic">
                {{ ucwords($list) }}
            </button>
        </form>
    @endforeach
    <form action="{{ route('book.destroy', $book) }}" method="post"
        class="bg-neutral -50 px-4 py-1 text-base text-red-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-hidden dark:bg-neutral-900 dark:text-red-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white hover:cursor-pointer">
        @csrf
        @method('DELETE')
        <button type="submit" class="hover:cursor-pointer mx-auto italic">
            Delete
        </button>
    </form>
@else
    @php
        $allLists = ['finished', 'current', 'wishlist'];
        $bookSearch = request('bookSearch');
    @endphp

    @foreach ($allLists as $list)
        <form action="{{ route('book.store', [$bookSearch, $list, $book]) }}" method="POST"
            class="bg-neutral-50 px-4 py-1 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-hidden dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white hover:cursor-pointer">
            @csrf
            <input type="hidden" value="{{ $book }}" class="flex items-center">
            <button type="submit" class="hover:cursor-pointer mx-auto italic">
                {{ ucwords($list) }}
            </button>
        </form>
    @endforeach
@endif
