@php
    Request::is('results') ? ($href = 'results.show') : ($href = 'book.show');
@endphp

<div class="w-5/6 mx-auto">

    <div x-data="{ show: false }" @click.away="show = false">
        {{-- Trigger --}}
        <div @click="show = ! show">
            <img class="w-full mb-4 border rounded-sm shadow-lg shadow-slate-700 lg:w-1/6 border-slate-700"
                src="{{ $book->thumbnail ?? url('/images/book.jpg') }}" alt="">
            <p class="pb-6 underline">More information</p>
        </div>
        @isset($book->title)
            <p class="py-2">
                {{ $book->title }}
            </p>
        @endisset
        @isset($book->published_date)
            <p class="py-2 italic">
                {{ $book->published_date }}
            </p>
        @endisset
        @isset($book->categories)
            <p class="py-2 italic">
                {{ $book->categories }}
            </p>
        @endisset
        @isset($book->authors)
            <p class="py-2">
                {{ $book->authors }}
            </p>
        @endisset


        {{-- Links  --}}
        <div x-show="show" style="display:none">
            <div>
                @isset($book->rating)
                    <p class="flex items-center py-2 italic">
                        Rating:
                        {{ $book->rating }}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="gold" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                    </p>
                @endisset
                <p class="py-2 mb-5">
                    {!! strip_tags($book->description, '<b><br><i>') ?? 'Description not available.' !!}
                </p>
            </div>
        </div>
    </div>
</div>
