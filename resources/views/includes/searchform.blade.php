<form class="text-sm tracking-widest text-gray-800 block" action="{{ route($link['route']) }}" method="GET" role="search">
    <div class="flex flex-row items-center">

        <input type="text" class="form-control py-1 px-6 text-sm lg:text-md w-full lg:border-2 lg:border-white lg:rounded-r-none lg:rounded-full bg-white focus:outline-none focus:border-orange" name="q" placeholder="Search...">
        <input type="submit" id="search-btn" class="hidden"></input>
        <div class="text-white border-r-2 border-white lg:rounded-r-full cursor-pointer">
            <a onclick="document.getElementById('search-btn').click()">
                <svg class="w-8 p-2 bg-orange rounded-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </a>
        </div>
    </div>
</form>
