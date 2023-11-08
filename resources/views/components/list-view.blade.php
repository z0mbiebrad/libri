<div class="px-3">
    <div class="mx-auto text-center">

        @isset($book->title)
            <p class="py-2 text-xl font-bold">
                {{ $book->title }}
            </p>
        @endisset
        <img class="flex justify-center w-1/2 mx-auto my-2 border rounded-sm shadow-lg shadow-slate-600 border-slate-600"
            src="{{ $book->thumbnail ?? url('/images/book.jpg') }}" alt="">

        @isset($book->authors)
            <p class="py-2 text-xl italic">
                {{ $book->authors }}
            </p>
        @endisset
    </div>
    <div x-data="{ show: false }" class="relative" @click.away="show = false">

        {{-- Trigger --}}
        <div @click="show = ! show" class="flex justify-center">
            <button class="flex items-center py-2 mb-4 border-b-2">
                More information
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 pt-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0l-3.75-3.75M17.25 21L21 17.25" />
                </svg>
            </button>
        </div>

        {{-- Links  --}}
        <div x-show="show" style="display:none"
            class="z-50 w-full px-4 py-2 m-auto mt-2 overflow-auto bg-black rounded-md text-slate-300 max-h-72">
            <div class="space-y-2 italic">
                @isset($book->subtitle)
                    <p>
                        {{ $book->subtitle }}
                    </p>
                @endisset
                @isset($book->categories)
                    <p>
                        {{ $book->categories }}
                    </p>
                @endisset
                @isset($book->published_date)
                    <p>
                        {{ $book->published_date }}
                    </p>
                @endisset
                @isset($book->rating)
                    <p class="flex items-center">
                        {{ $book->rating }}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="gold" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                    </p>
                @endisset
                <p class="pb-3 not-italic">
                    {!! strip_tags($book->description, '<b><br><i>') ?? 'Description not available.' !!}
                </p>
            </div>
        </div>
    </div>
</div>
