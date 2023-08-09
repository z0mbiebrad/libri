<div class="flex justify-around">
    <form class="p-2" action="{{ route('addFinished') }}" method="POST" class="">
        @csrf
        <input type="hidden" name="finished_google_book_id" value="{{ $book->id }}" class="flex items-center">
        <button type="submit"
            class="flex items-center p-2 mx-auto border rounded-md shadow-md text-slate-300 border-slate-600 shadow-slate-600"><svg
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="inline-block w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Finished</button>
    </form>
    <form class="p-2" action="{{ route('addCurrent') }}" method="POST">
        @csrf
        <input type="hidden" name="google_book_id" value="{{ $book->id }}">
        <button type="submit"
            class="flex items-center p-2 mx-auto border rounded-md shadow-md text-slate-300 border-slate-600 shadow-slate-600"><svg
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="inline-block w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Current</button>
    </form>
    <form class="p-2" action="{{ route('addWishlist') }}" method="POST">
        @csrf
        <input type="hidden" name="google_book_id" value="{{ $book->id }}">
        <button type="submit"
            class="flex items-center p-2 mx-auto border rounded-md shadow-md text-slate-300 border-slate-600 shadow-slate-600"><svg
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="inline-block w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Wishlist</button>
    </form>
</div>
