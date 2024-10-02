<div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md">
    <!-- Form -->
    <form wire:submit="addSalesRecord">
        <h2 class="text-2xl font-semibold mb-6" style="color: green">
            @if (session('success'))
            {{ session('success') }}
            @endif
        </h2>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label for="product" class="block text-gray-700 font-medium mb-1">Product</label>
                <select id="product" wire:model.lazy="product"
                    class="border border-gray-300 rounded p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">Select</option>
                    <option value="Gold Coffee">Gold Coffee</option>
                    <option value="Arabia Coffee">Arabic Coffee</option>
                </select>
                @error('product')
                <span class="alert bg-red-100 text-red-500" style="color: red">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label for="quantity" class="block text-gray-700 font-medium mb-1">Quantity</label>
                <input type="number" step="0.01" id="quantity" wire:model.lazy="quantity"
                    class="border border-gray-300 rounded p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('quantity')
                <span class="alert bg-red-100 text-red-500" style="color: red">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label for="unit_cost" class="block text-gray-700 font-medium mb-1">Unit Cost</label>
                <input type="number" step="0.01" id="unit_cost" wire:model.lazy="unit_cost"
                    class="border border-gray-300 rounded p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('unit_cost')
                <span class="alert bg-red-100 text-red-500" style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <span class="text-lg font-bold text-gray-600 bg-gray-100 py-2 px-4 rounded-full">
            Selling Price: £{{$this->getSellingPriceProperty()}}
        </span>

        <button
            class="px-6 py-2 mb-4 mt-4 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
            Record Sales
        </button>

    </form>

    <!-- Table -->
    <h1 class="text-xl font-semibold mb-4">Previous Sales</h1>
    <div class="overflow-y-auto max-h-screen">
        <table class="mt-6 w-full border border-gray-300 overflow-x-auto sm:w-full md:w-full lg:w-full xl:w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2 text-left">Product</th>
                    <th class="border px-4 py-2 text-left">Quantity</th>
                    <th class="border px-4 py-2 text-left">Unit Cost</th>
                    <th class="border px-4 py-2 text-left">Selling Price</th>
                    <th class="border px-4 py-2 text-left">Sold at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salesRecords as $salesRecord)
                <tr>
                    <td class="border px-4 py-2">{{ $salesRecord['product_name'] }}</td>
                    <td class="border px-4 py-2">{{ $salesRecord['quantity'] }}</td>
                    <td class="border px-4 py-2">£{{ $salesRecord['unit_cost'] }}</td>
                    <td class="border px-4 py-2">£{{ $salesRecord['selling_price'] }}</td>
                    <td class="border px-4 py-2">{{ date_format(\Carbon\Carbon::parse($salesRecord['created_at']),
                        "Y-m-d H:i")
                        }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>