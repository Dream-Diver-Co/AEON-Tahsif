<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = Buyer::all();
        return view('pages.buyer.index', compact('buyers'));
    }

    public function manageIndex()
    {
        $buyers = Buyer::all();
        return view('pages.buyer.manage', compact('buyers'));
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
        $buyer = new Buyer();
        $buyer->name = $data['name'];

        $destinationPath = 'public/logos';

        $mainName = pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME);

        // Get the file extension from the uploaded logo
        $extension = $request->file('logo')->getClientOriginalExtension();

        // Generate a unique file name with the main name, current timestamp, and extension
        $newFileName = $mainName . '_' . time() . '.' . $extension;

        // Move the logo file to the specified destination path
        $logoPath = $request->file('logo')->storeAs($destinationPath, $newFileName);

        // Set the logo path to the Buyer model attribute
        $buyer->logo = 'storage/logos/' . $newFileName;

        $buyer->save();

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

        $buyer = Buyer::where('id', $id)->first();

        $buyer->name = $data['name'];

        $oldLogoPath = $buyer->logo;

        if ($request->hasFile('logo')) {
            $destinationPath = 'public/logos';

            $mainName = pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME);

            // Get the file extension from the uploaded logo
            $extension = $request->file('logo')->getClientOriginalExtension();

            // Generate a unique file name with the main name, current timestamp, and extension
            $newFileName = $mainName . '_' . time() . '.' . $extension;

            // Move the logo file to the specified destination path
            $logoPath = $request->file('logo')->storeAs($destinationPath, $newFileName);

            // Set the logo path to the Buyer model attribute
            $buyer->logo = 'storage/logos/' . $newFileName;

            if ($oldLogoPath) {
                // Remove the 'storage/' prefix from the file path
                $oldLogoPath = str_replace('storage/', '', $oldLogoPath);
                Storage::delete('public/' . $oldLogoPath);
            }
        }

        $buyer->save();

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
        $buyer = Buyer::where('id', $id)->first();

        if ($buyer->logo) {
            // Remove the 'storage/' prefix from the file path
            $logoPath = str_replace('storage/', '', $buyer->logo);
            Storage::delete('public/' . $logoPath);
        }

        $buyer->delete();

        return redirect()->back()->with('success', 'Data successfully deleted!');
    }
}
