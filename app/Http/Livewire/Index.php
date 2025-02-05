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
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $startDate;
    public $endDate;

    public function mount()
    {
        // Default Date Range: Last 30 Days
        $this->startDate = Carbon::now()->subDays(30)->format('Y-m-d');
        $this->endDate = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        // Count Models within Date Range
        $seasons = Season::whereBetween('created_at', [$this->startDate, $this->endDate])->count();
        $colors = Color::whereBetween('created_at', [$this->startDate, $this->endDate])->count();
        $factories = Factory::whereBetween('created_at', [$this->startDate, $this->endDate])->count();
        $categories = Category::whereBetween('created_at', [$this->startDate, $this->endDate])->count();
        $products = Product::whereBetween('created_at', [$this->startDate, $this->endDate])->count();
        $materials = Material::whereBetween('created_at', [$this->startDate, $this->endDate])->count();

        // Count Product Statuses
        $productStatuses = Product::whereBetween('created_at', [$this->startDate, $this->endDate])
            ->selectRaw("status, COUNT(*) as count")
            ->groupBy("status")
            ->pluck("count", "status");

        // Count ProductColorVariant Statuses
        $variantStatuses = ProductColorVariant::whereBetween('created_at', [$this->startDate, $this->endDate])
            ->selectRaw("status, COUNT(*) as count")
            ->groupBy("status")
            ->pluck("count", "status");

        return view('livewire.index', compact(
            'seasons', 'colors', 'factories', 'categories', 'products', 'materials',
            'productStatuses', 'variantStatuses'
        ));
    }
}
