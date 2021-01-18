
{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminController@storeProduct', 'files' => true]) !!}
<div class="container">
    <div class="grid grid-cols sm:grid-cols-2">
        <div class="flex flex-col mx-auto w-auto md:w-64">
            <div class="w-full px-3 mb-8">
                <label class="block text-gray-600 text-sm font-semibold" for="name">Title</label>
                <input placeholder="{{ $product->name }}" class="border-l border-r border-solid border-blue-500 text-center block w-full p-3 mt-2 text-gray-700 bg-gray-200 focus:bg-gray-300 focus:shadow-inner focus:outline-none" id="name" name="name" type="text" required placeholder="Blue T-shirt">
            </div>
            <div class="w-full flex flex-col sm:flex-row px-3 mb-8 justify-evenly">
                <div class="w-1/3">
                    <label class="block text-gray-600 text-sm font-semibold" for="price">
                        Price
                    </label>
                    <input placeholder="{{ $product->price }}" class="border-l border-r border-solid border-blue-500 text-center block w-full p-3 mt-2 text-gray-700 bg-gray-200 focus:bg-gray-300 focus:shadow-inner focus:outline-none" id="price" name="price" type="number" placeholder="30.4" step="0.01">
                </div>
                <div class="w-1/3">
                    <label class="block text-gray-600 text-sm font-semibold" for="discount">
                        Discount
                    </label>
                    <input placeholder="{{ $product->discount }} %" class="border-l border-r border-solid border-blue-500 text-center block w-full p-3 mt-2 text-gray-700 bg-gray-200 focus:bg-gray-300 focus:shadow-inner focus:outline-none" id="discount" name="discount" type="number" placeholder="0 %">
                </div>
            </div>
            <div class="w-full px-3 mb-8">
                <label class="block text-gray-600 text-sm font-semibold" for="stock">
                    Stock
                </label>
                <input placeholder="{{ $product->stock }}" class="border-l border-r border-solid border-blue-500 text-center block w-full p-3 mt-2 text-gray-700 bg-gray-200 focus:bg-gray-300 focus:shadow-inner focus:outline-none" id="stock" name="stock" type="number" placeholder="15">
            </div>
            <div class="w-full px-3 mb-8">
                <label class="block text-gray-600 text-sm font-semibold" for="description">
                    Description
                </label>
                <textarea placeholder="{{ $product->description }}" class="border-l border-r border-solid border-blue-500 block w-full p-3 mt-2 text-gray-700 bg-gray-200 focus:bg-gray-300 focus:shadow-inner focus:outline-none" rows="10" id="description" name="description" cols="30"></textarea>
            </div>

        </div>




        <div class="flex flex-col mx-auto mt-10 justify-evenly">
            <div class="flex flex-col md:flex-row md:items-end">
                <div class="w-full md:w-1/3 px-3 mb-8">
                    <img id="product-image-src-f" class="mx-auto mb-10" width="200px" />
                    <a onclick="document.getElementById('product-image-f').click()" class="w-2/3 py-1 cursor-pointer shadow bg-blue-600 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded">Upload Image</a>
                    <input type="file" class="hidden" id="product-image-f" name="product-image-f" required>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-8">
                    <img id="product-image-src-s" class="mx-auto mb-10" width="200px" />
                    <a onclick="document.getElementById('product-image-s').click()" class="w-2/3 py-1 cursor-pointer shadow bg-blue-600 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded">Upload Image</a>
                    <input type="file" class="hidden" id="product-image-s" name="product-image-s" required>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-8">
                    <img id="product-image-src-t" class="mx-auto mb-10" width="200px" />
                    <a onclick="document.getElementById('product-image-t').click()" class="w-2/3 py-1 cursor-pointer shadow bg-blue-600 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded">Upload Image</a>
                    <input type="file" class="hidden" id="product-image-t" name="product-image-t" required>
                </div>
            </div>

            <div class="w-full px-3 mb-8">
                <input type="submit" value="Create" class="w-2/3 py-1 cursor-pointer shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded">
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
