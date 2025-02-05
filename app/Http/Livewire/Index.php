<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Season;
use App\Models\Color;
use App\Models\Factory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Material;
use App\Models\ProductColorVariant;
use Carbon\Carbon;

class Index extends Component
{
    public $startDate;
    public $endDate;
    public $applyFilter = false; // 🔹 Apply filter only when button is clicked

    public function mount()
    {
        // Initially, show all data without filtering
        $this->startDate = null;
        $this->endDate = null;
    }

    public function filterData()
    {
        $this->applyFilter = true;
    }

    public function resetFilter()
    {
        $this->startDate = null;
        $this->endDate = null;
        $this->applyFilter = false;
    }

    public function render()
    {
        // If filter is applied, use date range; otherwise, show all data
        $queryRange = $this->applyFilter ? [['created_at', '>=', $this->startDate], ['created_at', '<=', $this->endDate]] : [];

        // Count Models
        $seasons = Season::where($queryRange)->count();
        $colors = Color::where($queryRange)->count();
        $factories = Factory::where($queryRange)->count();
        $categories = Category::where($queryRange)->count();
        $products = Product::where($queryRange)->count();
        $materials = Material::where($queryRange)->count();

        // Count Product Statuses
        $productStatuses = Product::where($queryRange)
            ->selectRaw("status, COUNT(*) as count")
            ->groupBy("status")
            ->pluck("count", "status");

        // Count ProductColorVariant Statuses
        $variantStatuses = ProductColorVariant::where($queryRange)
            ->selectRaw("status, COUNT(*) as count")
            ->groupBy("status")
            ->pluck("count", "status");

        return view('livewire.index', compact(
            'seasons', 'colors', 'factories', 'categories', 'products', 'materials',
            'productStatuses', 'variantStatuses'
        ));
    }
}
