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
@endif
@auth
    <x-dropdown>
        <x-slot name="trigger">
            Add to List
        </x-slot>
        <x-slot name="content">
            <div class="flex justify-around">
                <x-list-add name="finished" :book="$book" />
                <x-list-add name="current" :book="$book" />
                <x-list-add name="wishlist" :book="$book" />
            </div>
        </x-slot>
    </x-dropdown>
@else
    <div class="flex justify-center">
        <a href="{{ route('login') }}" class="text-sm italic text-center text-slate-600">Login to add to your lists</a>
    </div>
@endauth


{{-- card body --}}
<div class="">
    <div class="mx-auto text-center">

        @isset($book->title)
            <p class="py-2 text-xl italic font-bold">
                {{ $book->title }}
            </p>
        @endisset
        <img class="flex justify-center w-1/2 mx-auto my-2 border rounded-xs shadow-lg shadow-slate-600 border-slate-600"
            src="{{ $book->thumbnail ?? url('/images/book.jpg') }}" alt="">

        @isset($book->authors)
            <p class="py-2 text-xl italic">
                {{ $book->authors }}
            </p>
        @endisset
    </div>

    @isset($book->epub)
        <div class="px-0 pt-2 pb-4 text-xl text-center text-white underline border-b-4 border-slate-800">
            <a href="{{ $book->epub }}">eBook {{ $book->price }}</a>
        </div>
    @endisset
</div>

{{-- card about --}}
<x-dropdown>
    <x-slot name="trigger">
        More information
    </x-slot>

    <x-slot name="content">
        <div class="space-y-2 italic">
            @isset($book->subtitle)
                <p class="pt-2">
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
            <p class="not-italic">
                {!! strip_tags($book->description, '<b><br><i>') ?? 'Description not available.' !!}
            </p>
        </div>
    </x-slot>
</x-dropdown>
