@if(!$products->isEmpty())
    <table class="w-3/4 mx-auto border border-gray-300 shadow-gray-900 shadow-2xl rounded-2xl overflow-hidden my-8">
        <!-- Table Head -->
        <thead class="bg-blue-600 text-white rounded-t-2xl">
        <tr>
            <th class="p-4 border border-blue-400">ID</th>
            <th class="p-4 border border-blue-400">Product Name</th>
            <th class="p-4 border border-blue-400">Price</th>
            <th class="p-4 border border-blue-400">Available</th>
            <th class="p-4 border border-blue-400">Edit</th>
            <th class="p-4 border border-blue-400">Delete</th>
        </tr>
        </thead>

        <!-- Table Body -->
        <tbody class="bg-gray-900 divide-y divide-gray-300 rounded-b-2xl drop-shadow-xl shadow-black">
        @foreach($products as $product)
            <tr class="hover:bg-slate-800">
                <td class="text-white p-3 text-center border border-gray-300">{{$product->id}}</td>
                <td class="text-white p-3 text-center border border-gray-300">{{$product->name}}</td>
                <td class="text-white p-3 text-center border border-gray-300">${{$product->price}}</td>
                <td class="text-white p-3 text-center border border-gray-300">
                            <span class="px-3 py-1 rounded-full text-white
                                {{ $product->available == 'yes' ? 'bg-cyan-500' : 'bg-red-500' }}">
                                {{ ucfirst($product->available) }}
                            </span>
                </td>
                <td class="p-3 text-center border border-gray-300">
                    <form action="{{ route('products.edit', $product) }}" method="GET">
                        <button type="submit" class="bg-cyan-500 text-white px-4 py-2 rounded-md hover:bg-cyan-600 transition">
                            Edit
                        </button>
                    </form>
                </td>
                <td class="p-3 text-center border border-gray-300">
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete {{$product->name}}?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div class="flex flex-col items-center mt-18">
        <div class="text-gray-600 font-semibold text-xl inline border-2 rounded-xl mb-15 py-2.5 px-3">
            Empty
        </div>
        <a href="{{route('products.create')}}" class="bg-blue-600 text-white shadow-gray-900 shadow-lg text-xl font-semibold border-5 rounded-4xl px-4 py-3.5 hover:bg-blue-500 focus:bg-white focus:text-blue-600">
            Create A New Product
        </a>
    </div>
@endif
