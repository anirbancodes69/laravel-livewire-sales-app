<?php

namespace Tests\Feature\Livewire;

use App\Livewire\SalesFormTable;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class SalesFormTableTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::factory()->create();
        Livewire::actingAs($user);

        $this->get('/sales')
            ->assertSeeLivewire(SalesFormTable::class);
    }

    /** @test */
    public function can_set_product()
    {
        Livewire::test(SalesFormTable::class)
            ->set('product', 'Random Coffee')
            ->assertSet('product', 'Random Coffee');
    }

    /** @test */
    public function can_set_quantity()
    {
        Livewire::test(SalesFormTable::class)
            ->set('quantity', 1)
            ->assertSet('quantity', 1);
    }

    /** @test */
    public function can_set_unit_cost()
    {
        Livewire::test(SalesFormTable::class)
            ->set('unit_cost', 10)
            ->assertSet('unit_cost', 10);
    }

    /** @test */
    public function validation_fields_are_required()
    {
        Livewire::test(SalesFormTable::class)
            ->set('product', '')
            ->set('quantity', '')
            ->set('unit_cost', '')
            ->call('addSalesRecord')
            ->assertHasErrors(['product' => ['required']])
            ->assertHasErrors(['quantity' => ['required']])
            ->assertHasErrors(['unit_cost' => ['required']]);
    }

    /** @test */
    public function record_and_display_sales_records()
    {
        Sale::factory()->create([
            'product_name' => 'Gold Coffee',
            'quantity' => 1,
            'unit_cost' => 1,
            'profit_margin' => 0.25,
            'shipping_cost' => 10,
            'total_cost' => 1,
            'selling_price' => 11.33
        ]);

        Livewire::test(SalesFormTable::class)
            ->assertSee('Gold Coffee');
    }


}
