<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('pages.vendor.index', compact('vendors'));
    }

    public function manageIndex()
    {
        $vendors = Vendor::all();
        return view('pages.vendor.manage', compact('vendors'));
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

        // Save the data to the database using the vendor model (replace 'vendor' with your actual model)
        $vendor = new Vendor();
        $vendor->name = $data['name'];
        $vendor->email = $data['email'];

        $destinationPath = 'public/logos';

        $mainName = pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME);

        // Get the file extension from the uploaded logo
        $extension = $request->file('logo')->getClientOriginalExtension();

        // Generate a unique file name with the main name, current timestamp, and extension
        $newFileName = $mainName . '_' . time() . '.' . $extension;

        // Move the logo file to the specified destination path
        $logoPath = $request->file('logo')->storeAs($destinationPath, $newFileName);

        // Set the logo path to the vendor model attribute
        $vendor->logo = 'storage/logos/' . $newFileName;

        $vendor->save();

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

        $vendor = Vendor::where('id', $id)->first();

        $vendor->name = $data['name'];
        $vendor->email = $data['email'];

        $oldLogoPath = $vendor->logo;

        if ($request->hasFile('logo')) {
            $destinationPath = 'public/logos';

            $mainName = pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME);

            // Get the file extension from the uploaded logo
            $extension = $request->file('logo')->getClientOriginalExtension();

            // Generate a unique file name with the main name, current timestamp, and extension
            $newFileName = $mainName . '_' . time() . '.' . $extension;

            // Move the logo file to the specified destination path
            $logoPath = $request->file('logo')->storeAs($destinationPath, $newFileName);

            // Set the logo path to the vendor model attribute
            $vendor->logo = 'storage/logos/' . $newFileName;

            if ($oldLogoPath) {
                // Remove the 'storage/' prefix from the file path
                $oldLogoPath = str_replace('storage/', '', $oldLogoPath);
                Storage::delete('public/' . $oldLogoPath);
            }
        }

        $vendor->save();

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
        $vendor = Vendor::where('id', $id)->first();

        if ($vendor->logo) {
            // Remove the 'storage/' prefix from the file path
            $logoPath = str_replace('storage/', '', $vendor->logo);
            Storage::delete('public/' . $logoPath);
        }

        $vendor->delete();

        return redirect()->back()->with('success', 'Data successfully deleted!');
    }
}
