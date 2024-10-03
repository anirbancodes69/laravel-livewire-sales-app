<?php

namespace App\Livewire;

use App\Models\Sale;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SalesFormTable extends Component
{
    public $product = '';
    public $quantity = 0;
    public $unit_cost = 0;
    private $total_cost = 0;
    private $shipping_cost = 10;
    private $profit_margin = 0;
    public $selling_price = 0;

    protected $rules = [
        'product'=> 'required|string',
        'quantity'=> 'required|numeric|min:0.01',
        'unit_cost'=> 'required|numeric|min:0.01',
    ];

    public function addSalesRecord()
    {
        $this->validate();

        $this->calcSellingPrice();

        // Save the sale to the database
        Sale::create([
            'product_name' => $this->product,
            'quantity' => $this->quantity,
            'unit_cost' => $this->unit_cost,
            'profit_margin' => $this->profit_margin,
            'shipping_cost' => $this->shipping_cost,
            'total_cost' => $this->total_cost,
            'selling_price' => $this->selling_price,
        ]);

        $this->product = "";
        $this->quantity = 0;
        $this->unit_cost = 0;


        request()->session()->flash('success', 'Sales record added successfully!');
    }

    private function calcSellingPrice()
    {
        if ($this->product === 'Gold Coffee') {
            $this->profit_margin = 0.25;
        } else {
            $this->profit_margin = 0.15;
        }

        // Calculate total cost
        $this->total_cost = $this->quantity * $this->unit_cost;

        // Calculate selling price using profit margin and shipping cost
        $this->selling_price = round(($this->total_cost / (1 - $this->profit_margin)) + $this->shipping_cost, 2);
    }


    public function getSellingPriceProperty()
    {


        if ($this->quantity === 0 || $this->unit_cost === 0 || $this->product === '') {
            return 0;
        }

        $this->calcSellingPrice();

        return $this->selling_price;
    }

    public function render()
    {
        $salesRecords = Sale::all();
        return view('livewire.sales-form-table', ['salesRecords' => $salesRecords]);
    }
}
