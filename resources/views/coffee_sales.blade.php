<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New ☕️ Sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="#">
                        @csrf
                        <div class="form-group">
                            <div>
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}">
                            </div>
                            <div class="error">
                                @error('quantity')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="unit_cost">Unit Cost</label>
                                <input type="number" name="unit_cost" id="unit_cost" value="{{ old('unit_cost') }}">
                            </div>
                            <div class="error">
                                @error('unit_cost')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="unit_cost">Selling Price: </label>
                                <span id="selling_price"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="submit" name="record_sale_btn" id="record_sale_btn" value="Record Sale">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script>
            $(document).ready(function() {
                function calculate() {
                    const quantity = parseFloat($('#quantity').val());
                    const unit_cost = parseFloat($('#unit_cost').val());

                    if (!isNaN(quantity) && !isNaN(unit_cost)) {
                        const cost = quantity * unit_cost;
                        let sellingPrice = (cost / (1 - 0.25)) + 10;
                        sellingPrice = sellingPrice.toFixed(2);
                        $('#selling_price').text(`${sellingPrice}`);
                    } else {
                        $('#selling_price').text(''); // Clear result if any field is empty
                    }
                }
                // Add input event listeners to both fields
                $('#quantity, #unit_cost').on('input', calculate);
            });
        </script>
    </x-slot>
</x-app-layout>