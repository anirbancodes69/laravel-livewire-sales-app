<div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md">
    <!-- Form -->
    <form wire:submit.prevent="submit">
        <h2 class="text-2xl font-semibold mb-6">Record Sales</h2>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label for="product" class="block text-gray-700 font-medium mb-1">Product</label>
                <select id="product" wire:model.lazy="product"
                    class="border border-gray-300 rounded p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">Select</option>
                    <option value="gold">Gold Coffee</option>
                    <option value="arabic">Arabic Coffee</option>
                </select>
                @error('product')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label for="quantity" class="block text-gray-700 font-medium mb-1">Quantity</label>
                <input type="number" id="quantity" wire:model.lazy="quantity"
                    class="border border-gray-300 rounded p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('quantity')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label for="unit_cost" class="block text-gray-700 font-medium mb-1">Unit Cost</label>
                <input type="number" step="0.01" id="unit_cost" wire:model.lazy="unit_cost"
                    class="border border-gray-300 rounded p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('unit_cost')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Display Selling Price -->
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-1">Estimated Selling Price</label>
            <input type="text" value="£{{ $this->sellingPrice }}"
                class="border border-gray-300 rounded p-3 w-full bg-gray-100" readonly>
        </div>

        <button type="submit"
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
                @foreach($items as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item['product_name'] }}</td>
                    <td class="border px-4 py-2">{{ $item['quantity'] }}</td>
                    <td class="border px-4 py-2">£{{ $item['unit_cost'] }}</td>
                    <td class="border px-4 py-2">£{{ $item['selling_price'] }}</td>
                    <td class="border px-4 py-2">{{ date_format(\Carbon\Carbon::parse($item['created_at']), "Y-m-d H:i")
                        }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>