<?php

namespace App\Http\Controllers;

use App\Models\ReadyToShoot;
use App\Models\ShootingDelivery;
use App\Models\ShootingDeliveryContent;
use App\Models\ShootingGallery;
use App\Models\ShootingProduct;
use App\Models\ShootingProductColor;
use App\Models\ShootingSession;
use App\Models\SocialMediaProduct;
use App\Models\SocialMediaProductPlatform;
use App\Models\User;
use App\Models\WayOfShooting;
use App\Models\WebsiteAdminProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;


class WayOfShootingController extends Controller
{
    public function index()
    {
        $ways = WayOfShooting::all();
        return view('shooting_products.ways_of_shooting.index', compact('ways'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        WayOfShooting::create([
            'name' => $request->name,
        ]);

        return redirect()->route('ways-of-shooting.index')->with('success', 'تمت إضافة طريقة التصوير بنجاح');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        WayOfShooting::findOrFail($id)->update(['name' => $request->name]);
        return redirect()->back()->with('success', 'تم تحديث طريقة التصوير بنجاح');
    }

    public function destroy($id)
    {
        WayOfShooting::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'تم حذف طريقة التصوير');
    }
}
