<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $departments = Department::where('buyer_id', $id)->get();
        return view('pages.buyer.department_index', compact('departments'));
    }

    public function manageIndex()
    {
        if (Auth::user()->hasRole('Super Admin')) {
            $buyers = Buyer::all();
            $departments = Department::all();
        } else {
            $buyers = Buyer::where('id', Auth::User()->buyer_id)->get();
            $departments = Department::where('buyer_id', Auth::User()->buyer()->first()->id)->get();
        }


        return view('pages.buyer.department_manage', compact('buyers', 'departments'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // Save the data to the database using the Buyer model (replace 'Buyer' with your actual model)
        $department = new Department();
        $department->name = $data['name'];
        $department->buyer_id = $data['buyer'];

        // $destinationPath = 'public/logos';

        // $mainName = pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME);

        // // Get the file extension from the uploaded logo
        // $extension = $request->file('logo')->getClientOriginalExtension();

        // // Generate a unique file name with the main name, current timestamp, and extension
        // $newFileName = $mainName . '_' . time() . '.' . $extension;

        // // Move the logo file to the specified destination path
        // $logoPath = $request->file('logo')->storeAs($destinationPath, $newFileName);

        // // Set the logo path to the Buyer model attribute
        // $department->logo = 'storage/logos/' . $newFileName;

        $department->save();

        // Redirect back to the previous page or any other page after successful form submission
        return redirect()->back()->with('success', 'Data saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        // Save the data to the database using the Buyer model (replace 'Buyer' with your actual model)
        $department = Department::where('id', $id)->first();
        $department->name = $data['name'];
        $department->buyer_id = $data['buyer'];

        $department->save();

        // Redirect back to the previous page or any other page after successful form submission
        return redirect()->back()->with('success', 'Data saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::where('id', $id)->first();

        // if ($department->logo) {
        //     // Remove the 'storage/' prefix from the file path
        //     $logoPath = str_replace('storage/', '', $department->logo);
        //     Storage::delete('public/' . $logoPath);
        // }

        $department->delete();

        return redirect()->back()->with('success', 'Data successfully deleted!');
    }
}
