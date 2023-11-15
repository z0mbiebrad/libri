<div
    class="w-5/6 max-w-xs rounded-md mx-auto mb-6 text-lg border shadow-inner bg-slate-900  shadow-slate-600 border-slate-600 lg:mt-6 {{ $loop->iteration === 1 ? 'mt-6' : '' }} {{ $loop->odd ? 'lg:mr-6' : 'lg:ml-6' }}">
    {{ $slot }}
</div>
