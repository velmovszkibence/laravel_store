<div id="navbar" class="hidden w-full lg:block">
    <nav class="bg-orange text-white text-sm 2xl:text-xl">
        <div class="container mx-auto flex flex-col justify-between px-4 py-6 lg:flex-row">
            <ul class="flex flex-col mx-auto items-center font-semibold text-center w-1/2 text-sm lg:text-base lg:w-full lg:flex-row">
                <li class="hidden lg:block">
                    <a href="{{ route('product.index') }}" class="nav-item">
                        E-Commerce Store
                    </a>
                </li>
                @if(Auth::check() && Auth::user()->is_admin)
                <li class="w-full py-2 bg-white text-orange shadow-md lg:w-auto lg:shadow-none lg:bg-transparent lg:text-white lg:ml-16 mt-3 lg:mt-0">
                    <a href="{{ route('admin.dashboard') }}" class="nav-item lg:px-3">Dashboard</a>
                </li>
                @endif
                <li class="w-full py-2 bg-white text-orange shadow-md lg:w-auto lg:shadow-none lg:bg-transparent lg:text-white lg:ml-6 mt-3 lg:mt-0">
                    <a href="#" class="nav-item lg:px-3">New Products</a>
                </li>
                <li class="w-full py-2 bg-white text-orange shadow-md lg:w-auto lg:shadow-none lg:bg-transparent lg:text-white lg:ml-6 mt-3 lg:mt-0">
                    <a href="#" class="nav-item lg:px-3">Contact</a>
                </li>

                @if(Request::is('/'))
                <li class="toggleable hoverable hover:text-white">
                    <input type="checkbox" value="selected" id="toggle-one" class="toggle-input">
                    <label for="toggle-one" class="block cursor-pointer py-6 px-4 lg:p-6">Categories</label>

                    @if($parents)
                    <div role="toggle" class="p-6 text-left mega-menu mb-16 z-20 sm:mb-0 shadow-xl bg-gradient-to-b from-orange to-red-600">
                        <div class="container mx-auto w-full flex flex-wrap justify-between mx-2">
                            @foreach($parents as $parent)
                            <ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-red-600 border-b sm:border-r lg:border-b-0 pb-6 pt-6 lg:pt-3">
                                <h3 class="font-bold text-xl text-white text-bold mb-2">{{ $parent->name }}</h3>
                                @if($subcategories)
                                @foreach($subcategories as $category)
                                    @if($parent->id == $category->parent_id)
                                    <li>
                                        <a href="#" class="block p-3 lg:pl-24 hover:bg-white text-white hover:text-orange text-center lg:text-left">{{ $category->name }}</a>
                                    </li>
                                    @endif
                                @endforeach
                                @endif
                            </ul>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </li>
                @endif

                @if (Auth::check())
                <li class="w-full py-2 bg-white text-orange shadow-md lg:w-auto lg:shadow-none lg:bg-transparent lg:text-white lg:ml-6 mt-3 lg:mt-0">
                    <a href="{{ route('user.profile') }}" class="nav-item lg:px-3">
                        Profile
                    </a>
                </li>
                <li class="w-full py-2 bg-white text-orange shadow-md lg:w-auto lg:shadow-none lg:bg-transparent lg:text-white lg:ml-6 mt-3 lg:mt-0">
                    <a href="{{ route('user.logout') }}" class="nav-item lg:px-3">
                        Logout
                    </a>
                </li>
                @endif
                <li class="search-form mt-10 pr-8 mx-auto sm:pr-0 lg:mt-0">
                    <?php $link = ['route' => 'product.index'] ?>
                    @include('includes.searchform', $link)
                </li>
            </ul>
            <ul class="flex flex-col items-center py-4 mt-10 lg:mt-0 lg:flex-row">
                <li class="border-white border-2 rounded-full lg:ml-auto">
                    <a href="{{ route('product.shoppingcart') }}" class="flex px-6 py-1">
                    <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="text-lg">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '' }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
