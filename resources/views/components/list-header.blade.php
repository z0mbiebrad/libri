      @if (count($books) === 0)
          <p class="pt-4 pl-6">No books in this list, check back after adding!</p>
      @endif

      @if (Request::is('list/*'))
          <x-slot name="header">
              <h2 class="text-xl font-semibold leading-tight">
                  {{ __(ucwords(Str::of(Request::path())->substr(5)) . ' Books') }}
              </h2>
          </x-slot>
      @else
          <x-booksearch />
      @endif
