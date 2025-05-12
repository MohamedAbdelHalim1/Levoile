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
    public function render()
    {

        $user = auth()->user();

        if ($user && $user->role_id == 12) {
            $hasOpenOrder = \DB::table('open_orders')
                ->where('user_id', $user->id)
                ->where('is_opened', 1)
                ->exists();

            if ($hasOpenOrder) {
                // Redirect to the open order page
                return redirect()->route('branch.orders.index');
            }
        }

        // Get request parameters for date filtering
        $startDate = request('startDate');
        $endDate = request('endDate');

        // If no date range is selected, show all records
        $queryRange = [];
        if ($startDate && $endDate) {
            $queryRange = [['created_at', '>=', $startDate], ['created_at', '<=', $endDate]];
        }

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
            'seasons',
            'colors',
            'factories',
            'categories',
            'products',
            'materials',
            'productStatuses',
            'variantStatuses'
        ));
    }
}
