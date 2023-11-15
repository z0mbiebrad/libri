<div class="px-3">
    <div class="mx-auto text-center">

        @isset($book->title)
            <p class="py-2 text-xl italic font-bold">
                {{ $book->title }}
            </p>
        @endisset
        <img class="flex justify-center w-1/2 mx-auto my-2 border rounded-sm shadow-lg shadow-slate-600 border-slate-600"
            src="{{ $book->thumbnail ?? url('/images/book.jpg') }}" alt="">

        @isset($book->authors)
            <p class="py-2 text-xl">
                {{ $book->authors }}
            </p>
        @endisset
    </div>
    <div x-data="{ show: false }" class="relative" @click.away="show = false">
        <x-dropdown-trigger>
            More information
        </x-dropdown-trigger>

        <x-dropdown-links>
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
                        <x-rating-icon />
                    </p>
                @endisset
                <p class="pb-3 not-italic">
                    {!! strip_tags($book->description, '<b><br><i>') ?? 'Description not available.' !!}
                </p>
            </div>
        </x-dropdown-links>

        @if (request('epub') === 'epub')
            @isset($book->epub)
                <div class="py-2 text-xl text-center text-white underline">
                    <a href="{{ $book->epub }}">eBook {{ $book->price }}</a>
                </div>
            @endisset
        @endif

    </div>
</div>
