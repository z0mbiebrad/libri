@if (session('status'))
    <div class="ml-2 alert alert-success text-slate-300">
        {{ session('status') }}
    </div>
@endif
