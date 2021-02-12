
{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminController@storeProduct', 'files' => true]) !!}
<div class="container">
    <div class="grid grid-cols sm:grid-cols-2 sm:px-6 lg:px-0">
        <div class="flex flex-col mx-auto w-auto lg:w-full xl:w-3/4 bg-gradient-to-r from-blue-600 via-blue-600 to-teal-500 py-4 px-8 rounded-lg shadow-lg shadow-outer">
            <div class="w-full px-3 mb-8">
                <label class="block text-white text-sm font-semibold" for="name">Title</label>
                <input class="border-2 border-gray-800 rounded-lg text-center block w-full p-3 mt-2 placeholder-white text-white bg-transparent focus:shadow-xl focus:shadow-outer focus:border-white focus:outline-none" id="name" name="name" type="text" required placeholder="Blue T-shirt">
            </div>
            <div class="w-full flex flex-col place-items-center px-3 mb-8 justify-evenly sm:flex-row">
                <div class="w-1/2 sm:w-1/4">
                    <label class="block text-white text-sm font-semibold" for="price">
                        Price
                    </label>
                    <input class="border-2 border-gray-800 rounded-lg text-center block w-full p-3 mt-2 placeholder-white text-white bg-transparent focus:shadow-xl focus:shadow-outer focus:border-white focus:outline-none" id="price" name="price" type="number" placeholder="30.4" step="0.01">
                </div>
                <div class="w-1/2 sm:w-1/4">
                    <label class="block text-white text-sm font-semibold" for="discount">
                        Discount
                    </label>
                    <input value="0" class="border-2 border-gray-800 rounded-lg text-center block w-full p-3 mt-2 placeholder-white text-white bg-transparent focus:shadow-xl focus:shadow-outer focus:border-white focus:outline-none" id="discount" name="discount" type="number" placeholder="0 %">
                </div>
                <div class="w-1/2 sm:w-1/4">
                    <label class="block text-white text-sm font-semibold" for="stock">
                        Stock
                    </label>
                    <input class="border-2 border-gray-800 rounded-lg text-center block w-full p-3 mt-2 placeholder-white text-white bg-transparent focus:shadow-xl focus:shadow-outer focus:border-white focus:outline-none" id="stock" name="stock" type="number" placeholder="15">
                </div>
            </div>
            <div class="w-full px-3 mb-8">
                <label class="block text-white text-sm font-semibold" for="category">
                    Category
                </label>

                <select name="category" id="category" class="appearance-none border-2 border-gray-800 rounded-lg text-center block w-full p-3 mt-2 placeholder-white text-black bg-transparent focus:shadow-xl focus:shadow-outer focus:border-white focus:outline-none">
                    <option value="{{ 0 }}">-------</option>
                    @if($parents && $subcategories)
                        @foreach($parents as $parent)
                        <option class="bg-gray-700 text-white">{{ $parent->category_name }}</option>
                            @if($subcategories)
                                @foreach($subcategories as $category)
                                    @if($parent->id == $category->parent_id)
                                        <option value="{{ $category->id }}">--{{ $category->category_name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="w-full px-3 mb-8">
                <label class="block text-white text-sm font-semibold" for="description">
                    Description
                </label>
                <textarea class="border-2 border-gray-800 rounded-lg block w-full p-3 mt-2 placeholder-white text-white bg-transparent focus:shadow-xl focus:shadow-outer focus:border-white focus:outline-none" rows="10" id="description" name="description" cols="30"></textarea>
            </div>

        </div>

        <div class="flex flex-col mx-auto mt-4 xl:mt-0 justify-evenly">
            <div class="flex flex-col xl:flex-row xl:items-end">
                <div class="w-full xl:w-1/3 px-3 mb-8">
                    <img id="product-image-src-f" class="mx-auto mb-10" width="200px" />
                    <a onclick="document.getElementById('product-image-f').click()" class="w-2/3 py-1 cursor-pointer shadow bg-blue-600 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded">Upload Image</a>
                    <input type="file" class="hidden" id="product-image-f" name="images[]">
                </div>
                <div class="w-full xl:w-1/3 px-3 mb-8">
                    <img id="product-image-src-s" class="mx-auto mb-10" width="200px" />
                    <a onclick="document.getElementById('product-image-s').click()" class="w-2/3 py-1 cursor-pointer shadow bg-blue-600 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded">Upload Image</a>
                    <input type="file" class="hidden" id="product-image-s" name="images[]">
                </div>
                <div class="w-full xl:w-1/3 px-3 mb-8">
                    <img id="product-image-src-t" class="mx-auto mb-10" width="200px" />
                    <a onclick="document.getElementById('product-image-t').click()" class="w-2/3 py-1 cursor-pointer shadow bg-blue-600 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded">Upload Image</a>
                    <input type="file" class="hidden" id="product-image-t" name="images[]">
                </div>
            </div>

            <div class="w-full px-3 mb-8">
                <input type="submit" value="Create" class="w-2/3 py-1 cursor-pointer shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded">
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
