<form class="text-sm tracking-widest text-gray-600 py-2 px-6 block focus:outline-none" action="{{ route($link['route']) }}" method="GET" role="search">
    <div class="flex flex-row">
        <svg class="w-8 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <input type="text" class="form-control" name="q" placeholder="Search">
        <button type="submit" class="hidden"></button>
        <a href="{{ route($link['route']) }}">
            <svg class="w-8 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
        </a>
    </div>
</form>
