
{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminController@storeProduct', 'files' => true]) !!}
<div class="container">
    <div class="grid grid-cols sm:grid-cols-2">
        <div class="flex flex-col mx-auto w-auto md:w-64">
            <div class="w-full mb-8">
                <label class="block text-gray-600 text-sm font-semibold" for="name">
                    Title
                </label>
                <input class="bg-gray-200 border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange" id="name" name="name" type="text" required placeholder="Blue T-shirt">
            </div>
            <div class="w-full flex flex-row mb-8 justify-evenly">
                <div class="w-1/3">
                    <label class="block text-gray-600 text-sm font-semibold" for="price">
                        Price
                    </label>
                    <input class="bg-gray-200 border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange" id="price" name="price" type="number" placeholder="30.4" step="0.01">
                </div>
                <div class="w-1/3">
                    <label class="block text-gray-600 text-sm font-semibold" for="discount">
                        Discount
                    </label>
                    <input class="bg-gray-200 border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange" value="0" id="discount" name="discount" type="number" placeholder="0 %">
                </div>
            </div>
            <div class="w-full mb-8">
                <label class="block text-gray-600 text-sm font-semibold" for="stock">
                    Stock
                </label>
                <input class="bg-gray-200 border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange" id="stock" name="stock" type="number" required placeholder="15">
            </div>
            <div class="w-full mb-8">
                <label class="block text-gray-600 text-sm font-semibold" for="description">
                    Description
                </label>
                <textarea class="bg-gray-200 border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange" rows="10" id="description" name="description" cols="30"></textarea>
            </div>

        </div>

        <div class="flex flex-col mx-auto mt-10 justify-evenly">
            <div class="w-full px-3 mb-8">
                <a onclick="document.getElementById('product-image').click()" class="w-2/3 py-1 cursor-pointer shadow bg-blue-600 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded">Upload Image</a>
                <input type="file" class="hidden" id="product-image" name="product-image" required>
                <img src="" id="product-image-src" class="mx-auto mt-10" width="200px" />
            </div>
            <div class="w-full px-3 mb-8">
                <input type="submit" value="Create" class="w-2/3 py-1 cursor-pointer shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded">
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}

