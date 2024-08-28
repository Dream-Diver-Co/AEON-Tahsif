<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentDd;
use Illuminate\Http\Request;

class DDController extends Controller
{
    public function manageIndex()
    {
        if (Auth::user()->hasRole('Super Admin')) {
            $department_dds = DepartmentDd::all();
        } else {
            // Adjust access based on user role if necessary
        }

        return view('pages.buyer.ddd_manage', compact('department_dds'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $department = new DepartmentDd();
        $department->name = $request->input('name');
        $department->save();

        return redirect()->back()->with('success', 'Department saved successfully!');
    }

    public function destroy($id)
    {
        $department = DepartmentDd::find($id);

        if ($department) {
            $department->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}
