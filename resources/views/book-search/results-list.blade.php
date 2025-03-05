<x-app-layout>
    @isset($books)

        <x-list-header :books="$books" />

        <x-message />

        @foreach ($books as $book)
            <article class="group grid mx-auto rounded-sm max-w-lg my-12 grid-cols-8 overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-zinc-800 dark:text-neutral-300 {{ $loop->iteration === 1 ? 'mt-6' : '' }}">
                <!-- image -->
                <div class="col-span-4 colstart-2 overflow-hidden">
                    <img src="{{ $book->thumbnail ?? url('/images/book.jpg') }}"
                        class="h-full md:p-10 md:w-full object-contain transition duration-700 ease-out sm:group-hover:scale-105 -z-20" />
                </div>
                <!-- body -->
                <div class="flex flex-col justify-center col-span-4 px-10">
                    <h3 class="text-balance mt-4 text-xl font-bold text-neutral-900 lg:text-2xl dark:text-white"
                        aria-describedby="articleDescription">
                        {{ $book->title }}
                    </h3>
                    <div class="space-y-1">
                        @isset($book->authors)
                            <p class="max-w-lg mt-2 text-pretty text-base">
                                {{ $book->authors }}
                            </p>
                        @endisset
                        @isset($book->subtitle)
                            <p class="max-w-lg text-pretty text-base">
                                {{ $book->subtitle }}
                            </p>
                        @endisset
                        @isset($book->categories)
                            <p class="max-w-lg text-pretty text-base">
                                {{ $book->categories }}
                            </p>
                        @endisset   
                        
                        @isset($book->rating)
                            <p class="flex items-center">
                                {{ $book->rating }}
                                <x-rating-icon />
                            </p>
                        @endisset
                        @isset($book->epub)
                            <a class="bg-transparent rounded-radius py-2 text-base font-medium tracking-wide text-primary transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:text-primary-dark dark:focus-visible:outline-primary-dark flex items-center gap-x-1"
                                href="{{ $book->epub }}">
                                eBook {{ $book->price }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                                </svg>

                            </a>
                        @endisset
                        <x-book-options :book="$book"/>
                    </div>
                </div>
                    
                <x-dropdown>
                    <x-slot name="trigger">
                        Read description
                    </x-slot>

                    <x-slot name="content">
                        <div class="space-y-2 italic mt-2">
                            @isset($book->published_date)
                                <p class="max-w-lg text-pretty text-base">
                                    {{ $book->published_date }}
                                </p>
                            @endisset
                            <p class="not-italic">
                                {!! strip_tags($book->description, '<b><br><i>') ?? 'Description not available.' !!}
                            </p>
                        </div>
                    </x-slot>
                </x-dropdown>
            </article>
        @endforeach
    @else
        <p class="mt-2 text-xl text-center ">No results found, please try searching for something else!</p>
    @endisset

</x-app-layout>
