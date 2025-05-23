<?php

namespace app\Livewire\Tables;

use app\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductByUnitTable extends Component
{
    use WithPagination;

    public $perPage = 5;

    public $search = '';

    public $sortField = 'name';

    public $sortAsc = true;

    public $unit = null;

    public function sortBy($field): void
    {
        if($this->sortField === $field)
        {
            $this->sortAsc = ! $this->sortAsc;

        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function mount($unit)
    {
        $this->unit = $unit;
    }

    public function render()
    {
        return view('livewire.tables.product-by-unit-table', [
            'products' => Product::query()
            ->where('account_id', auth()->user()->account_id)
            ->where('unit_id', $this->unit->id)
                ->search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
    }
}
