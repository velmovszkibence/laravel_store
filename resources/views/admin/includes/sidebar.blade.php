<nav class="bg-blue-600 text-md text-white top-0 pb-10 lg:pb-0 lg:h-screen lg:static">
    <div class="h-full flex flex-col pt-10 lg:pt-0">
        <ul class="flex flex-col m-auto tracking-widest w-1/2 sm:w-2/3 sm:overflow-auto lg:ul-height lg:overflow-hidden lg:w-full">
            <li class="pb-6 lg:pb-20 my-auto {{ Request::is('admin/dashboard') ? 'sm:pl-8 sm:pr-0' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="{{ Request::is('admin/dashboard') ? 'bg-white text-blue-600 sm:pl-32 lg:pl-2' : 'sm:pl-40 lg:pl-10' }} py-2 flex items-center rounded-lg lg:rounded-l-full">
                    <svg class="w-8 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>Dashboard
                </a>
            </li>
            <li class="my-auto {{ Request::is('admin/account') ? 'sm:pl-8 sm:pr-0' : '' }}">
                <a href="{{ route('admin.account.index') }}" class="{{ Request::is('admin/account') ? 'bg-white text-blue-600 sm:pl-32 lg:pl-2' : 'sm:pl-40 lg:pl-10' }} py-2 flex items-center rounded-lg lg:rounded-l-full">
                    <svg class="w-8 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>Account
                </a>
            </li>
            <li class="my-auto {{ Request::is('admin/product') ? 'sm:pl-8 sm:pr-0' : '' }}">
                <a href="{{ route('admin.product.index') }}" class="{{ Request::is('admin/product') ? 'bg-white text-blue-600 sm:pl-32 lg:pl-2' : 'sm:pl-40 lg:pl-10' }} py-2 flex items-center rounded-lg lg:rounded-l-full">
                    <svg class="w-8 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                    </svg>Product
                </a>
            </li>
            <li class="my-auto {{ Request::is('admin/categories') ? 'sm:pl-8 sm:pr-0' : '' }}">
                <a href="{{ route('admin.category.index') }}" class="{{ Request::is('admin/categories') ? 'bg-white text-blue-600 sm:pl-32 lg:pl-2' : 'sm:pl-40 lg:pl-10' }} py-2 flex items-center rounded-lg lg:rounded-l-full">
                    <svg class="w-8 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                      </svg>Category
                </a>
            </li>
            <li class="my-auto {{ Request::is('admin/order') ? 'sm:pl-8 sm:pr-0' : '' }}">
                <a href="{{ route('admin.order.index') }}" class="{{ Request::is('admin/order') ? 'bg-white text-blue-600 sm:pl-32 lg:pl-2' : 'sm:pl-40 lg:pl-10' }} py-2 flex items-center rounded-lg lg:rounded-l-full">
                    <svg class="w-8 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>Order
                </a>
            </li>
            <li class="my-auto {{ Request::is('admin/stock') ? 'sm:pl-8 sm:pr-0' : '' }}">
                <a href="{{ route('admin.stock.index') }}" class="{{ Request::is('admin/stock') ? 'bg-white text-blue-600 sm:pl-32 lg:pl-2' : 'sm:pl-40 lg:pl-10' }} py-2 flex items-center rounded-lg lg:rounded-l-full">
                    <svg class="w-8 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>Stock
                </a>
            </li>
            <li class="my-auto {{ Request::is('admin/statistic') ? 'sm:pl-8 sm:pr-0' : '' }}">
                <a href="{{ route('admin.statistic.index') }}" class="{{ Request::is('admin/statistic') ? 'bg-white text-blue-600 sm:pl-32 lg:pl-2' : 'sm:pl-40 lg:pl-10' }} py-2 flex items-center rounded-lg lg:rounded-l-full">
                    <svg class="w-8 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                    </svg>Statistic
                </a>
            </li>
            <li class="my-auto {{ Request::is('admin/help') ? 'sm:pl-8 sm:pr-0' : '' }}">
                <a href="{{ route('admin.help.index') }}" class="{{ Request::is('admin/help') ? 'bg-white text-blue-600 sm:pl-32 lg:pl-2' : 'sm:pl-40 lg:pl-10' }} py-2 flex items-center rounded-lg lg:rounded-l-full">
                    <svg class="w-8 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>Help
                </a>
            </li>
            <li class="my-auto">
                <a href="{{ route('product.index') }}" class="py-2 sm:pl-40 flex items-center rounded-lg lg:rounded-l-full lg:pl-10">
                    <svg class="w-8 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>Home
                </a>
            </li>
            <li class="pt-6 lg:pt-20 my-auto">
                <a href="{{ route('user.logout') }}" class="py-2 sm:pl-40 flex items-center rounded-lg lg:rounded-l-full lg:pl-10">
                    <svg class="w-8 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
