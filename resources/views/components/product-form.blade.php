<div class="max-w-sm mx-auto p-6 shadow-slate-950 shadow-2xl bg-blue-700 text-white rounded-lg ring-2 m-6">
    <h2 class="text-3xl font-semibold text-white text-center mb-6 py-2.5">{{(isset($product)) ? 'Edit Product' : 'Create A New Product'}}</h2>
    <form method="POST" action="{{(isset($product)) ? route($routeName, $product) : route($routeName)}}">
        @csrf
        @method($method)
        @if ($errors->any())
            <div class="alert alert-danger font-semibold">
                <ul>
                    @foreach ($errors->all() as $error)
                        <ul style="list-style-position: inside; text-align: center; padding-left: 0;">
                            <li>- <font color="#FF0000">{{ $error }}</font></li>
                        </ul>
                    @endforeach
                </ul>
                <br>
            </div>
        @endif
        <div class="flex flex-col gap-4 items-center">
            <!-- Name Input -->
            <div class="flex items-center gap-2">
                <label for="name" class="font-semibold">Name: </label>
                <input type="text" id="name" name="name"
                       autocomplete="off"
                       placeholder=" Enter Product's Name"
                       required pattern="^[A-Za-z][A-Za-z0-9_-]*$"
                       value="{{$product->name ?? ''}}"
                       class="border-2 bg-blue-800 rounded shadow shadow-blue-700 border-gray-400 text-gray-200 hover:border-gray-300 focus:outline-white focus:outline-1 px-3 py-2">
            </div>

            <!-- Price Input -->
            <div class="flex items-center gap-2">
                <label for="price" class="font-semibold">Price: </label>
                <input type="number" id="price" name="price"
                       autocomplete="off"
                       placeholder=" Enter Product Price"
                       required min="0" step="1"
                       oninvalid="this.setCustomValidity('Price must be a whole number and at least 0.')"
                       oninput="this.setCustomValidity('')"
                       value="{{$product->price ?? ''}}"
                       class="border-2 bg-blue-800 rounded shadow shadow-blue-700 border-gray-400 text-gray-200 hover:border-gray-300 focus:outline-white focus:outline-1 px-3 py-2">
            </div>

            <!-- Available Section (Inline) -->
            <div class="flex items-center gap-6 py-1">
                <label class="font-semibold">Available:</label>

                <!-- Yes Option -->
                <input type="radio" id="available_yes" name="available" value="yes"
                       required {{ ($product->available ?? '') == 'yes' ? 'checked' : '' }} class="hidden peer/yes">
                <label for="available_yes" class="bg-blue-800 flex items-center justify-center px-4 py-2.5 border-2 border-gray-400 rounded-2xl cursor-pointer text-gray-400 transition-all hover:border-gray-300 peer-checked/yes:bg-blue-500 peer-checked/yes:text-white peer-checked/yes:border-blue-400 peer-checked/yes:outline-1">
                    Yes
                </label>

                <!-- No Option -->
                <input type="radio" id="available_no" name="available" value="no"
                       required {{ ($product->available ?? '') == 'no' ? 'checked' : '' }} class="hidden peer/no">
                <label for="available_no" class="bg-blue-800 flex items-center justify-center px-4 py-2.5 border-2 border-gray-400 rounded-2xl cursor-pointer text-gray-400 transition-all hover:border-gray-300 peer-checked/no:bg-red-500 peer-checked/no:text-white peer-checked/no:border-red-400 peer-checked/no:outline-1">
                    No
                </label>
            </div>
            <input type="submit" class="m-2 bg-white text-blue-800 font-semibold text-xl px-3 py-3 border-4 border-blue-600 rounded-4xl hover:shadow-blue-900 hover:shadow-xs hover:border-blue-700 hover:bg-blue-50 hover:text-blue-700 focus:bg-blue-500 focus:text-white focus:border-blue-700" {{(isset($product)) ? 'value=Update' : 'value=Create'}}>
        </div>
    </form>
</div>
