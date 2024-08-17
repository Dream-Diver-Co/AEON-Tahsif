<?php
namespace App\Http\Controllers;

use App\Models\FabricQuality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FabricQualityController extends Controller
{
    public function manageIndex()
    {
        if (Auth::user()->hasRole('Super Admin')) {
            $fabric_qualitys = FabricQuality::all();
        } else {
            // Adjust access based on user role if necessary
        }

        return view('pages.buyer.fabric_quality_manage', compact('fabric_qualitys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $fabric_quality = new FabricQuality();
        $fabric_quality->name = $request->input('name');
        $fabric_quality->save();

        return redirect()->back()->with('success', 'Data saved successfully!');
    }

    public function destroy($id)
    {
        $fabric_quality = FabricQuality::findOrFail($id);
        $fabric_quality->delete();

        return redirect()->back()->with('success', 'Data successfully deleted!');
    }
}
