<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductColorVariant;

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
    


}
