<?php
namespace App\Http\Controllers;

use App\Models\FabricContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FabricContentController extends Controller
{
    public function manageIndex()
    {
        if (Auth::user()->hasRole('Super Admin')) {
            $fabric_contents = FabricContent::all();
        } else {
            // Adjust access based on user role if necessary
        }

        return view('pages.buyer.fabric_content_manage', compact('fabric_contents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $fabric_content = new FabricContent();
        $fabric_content->name = $request->input('name');
        $fabric_content->save();

        return redirect()->back()->with('success', 'Data saved successfully!');
    }

    public function destroy($id)
    {
        $fabric_content = FabricContent::findOrFail($id);
        $fabric_content->delete();

        return redirect()->back()->with('success', 'Data successfully deleted!');
    }
}
