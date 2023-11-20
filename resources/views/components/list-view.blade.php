{{-- card about --}}
<x-dropdown>
    <x-slot name="trigger">
        More information
    </x-slot>

    <x-slot name="content">

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
    </x-slot>
</x-dropdown>

{{-- card body --}}
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
            <p class="py-2 text-xl italic">
                {{ $book->authors }}
            </p>
        @endisset
    </div>

    @isset($book->epub)
        <div class="py-2 mb-2 text-xl text-center text-white underline">
            <a href="{{ $book->epub }}">eBook {{ $book->price }}</a>
        </div>
    @endisset
</div>

{{-- Card header --}}
@if (Request::is('list/*'))
    <x-dropdown>
        <x-slot name="trigger">
            Book Options
        </x-slot>
        <x-slot name="content">
            <div class="flex justify-center">
                <x-book-delete :book="$book" />
                <x-list-update :book="$book" />
            </div>
        </x-slot>
    </x-dropdown>
@else
    <x-card-dropdown>
        <x-slot name="trigger">
            Add to List
        </x-slot>
        <x-slot name="content">
            <div class="flex justify-center">
                <x-list-add name="finished" :book="$book" />
                <x-list-add name="current" :book="$book" />
                <x-list-add name="wishlist" :book="$book" />
            </div>
        </x-slot>
    </x-card-dropdown>
@endif
