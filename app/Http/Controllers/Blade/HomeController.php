<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Buyer;
use App\Models\Vendor;

class HomeController extends Controller
{
    public function index()
    {
        $buyers = Buyer::all();
        $vendors = Vendor::all();
        $is_role_exists = DB::select("SELECT COUNT(*) as cnt FROM `model_has_roles` WHERE model_id = " . auth()->id());

        if ($is_role_exists[0]->cnt)
            return view('pages.dashboard', compact('buyers', 'vendors'));
        else
            return view('welcome');
    }
}
