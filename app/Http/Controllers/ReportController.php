<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColorVariant;
use App\Models\Season;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index()
    {
        // Eager load all necessary relations
        $product_color_variants = ProductColorVariant::with([
            'productcolor.color',
            'productcolor.product.category',
            'productcolor.product.season',
            'productcolor.product.factory'
        ])->get();
    
        return view('reports.receive', compact('product_color_variants'));
    }
    

    public function productStatusReportForSeason(Request $request)
    {
        // Initialize the query
        $query = Season::select(
            'seasons.name as season',
            DB::raw('(SELECT COUNT(*) FROM products WHERE products.season_id = seasons.id) as product_count'),
            DB::raw('(SELECT COUNT(*) FROM product_colors WHERE product_colors.product_id IN 
                     (SELECT id FROM products WHERE products.season_id = seasons.id)) as color_count'),
            DB::raw('(SELECT COUNT(*) FROM products WHERE products.season_id = seasons.id AND status = "new") as new_count'),
            DB::raw('(SELECT COUNT(*) FROM products WHERE products.season_id = seasons.id AND status = "processing") as processing_count'),
            DB::raw('(SELECT COUNT(*) FROM products WHERE products.season_id = seasons.id AND status = "postponed") as postponed_count'),
            DB::raw('(SELECT COUNT(*) FROM products WHERE products.season_id = seasons.id AND status = "cancel") as cancel_count'),
            DB::raw('(SELECT COUNT(*) FROM products WHERE products.season_id = seasons.id AND status = "complete") as complete_count'),
            DB::raw('(SELECT COUNT(*) FROM products WHERE products.season_id = seasons.id AND status = "partial") as partial_count')
        );

        // Apply date filter if provided
        if ($request->filled('startDate') && $request->filled('endDate')) {
            $startDate = Carbon::parse($request->startDate)->startOfDay();
            $endDate = Carbon::parse($request->endDate)->endOfDay();

            $query->whereHas('products', function ($q) use ($startDate, $endDate) {
                $q->whereBetween('created_at', [$startDate, $endDate]);
            });
        }

        $seasons = $query->get();

        return view('reports.product-status-season', compact('seasons'));
    }

    public function categoryStatusReport(Request $request)
    {
        // Initialize the query
        $query = Category::select(
            'categories.name as category',
            DB::raw('(SELECT COUNT(*) FROM products WHERE products.category_id = categories.id) as product_count'),
            DB::raw('(SELECT COUNT(*) FROM product_colors WHERE product_colors.product_id IN 
                     (SELECT id FROM products WHERE products.category_id = categories.id)) as color_count'),
            DB::raw('(SELECT COUNT(*) FROM products WHERE products.category_id = categories.id AND status = "new") as new_count'),
            DB::raw('(SELECT COUNT(*) FROM products WHERE products.category_id = categories.id AND status = "processing") as processing_count'),
            DB::raw('(SELECT COUNT(*) FROM products WHERE products.category_id = categories.id AND status = "postponed") as postponed_count'),
            DB::raw('(SELECT COUNT(*) FROM products WHERE products.category_id = categories.id AND status = "cancel") as cancel_count'),
            DB::raw('(SELECT COUNT(*) FROM products WHERE products.category_id = categories.id AND status = "complete") as complete_count'),
            DB::raw('(SELECT COUNT(*) FROM products WHERE products.category_id = categories.id AND status = "partial") as partial_count')
        );

        // Apply date filter if provided
        if ($request->filled('startDate') && $request->filled('endDate')) {
            $startDate = Carbon::parse($request->startDate)->startOfDay();
            $endDate = Carbon::parse($request->endDate)->endOfDay();

            $query->whereHas('products', function ($q) use ($startDate, $endDate) {
                $q->whereBetween('created_at', [$startDate, $endDate]);
            });
        }

        $categories = $query->get();

        return view('reports.category-status', compact('categories'));
    }

}
