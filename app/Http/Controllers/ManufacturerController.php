<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Certificate;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $manufacturers = Manufacturer::where('vendor_id', $id)->get();
        return view('pages.vendor.manufacturers_index', compact('manufacturers'));
    }

    public function interface($id)
    {
        return view('pages.vendor.interface', compact('id'));
    }

    public function manageIndex()
    {
        if (Auth::user()->hasRole('Super Admin')) {
            $vendors = Vendor::all();
            $manufacturers = Manufacturer::all();
        } else {
            $vendors = Vendor::where('id', Auth::User()->vendor_id)->get();
            $manufacturers = Manufacturer::where('vendor_id', Auth::User()->vendor()->first()->id)->get();
        }


        return view('pages.vendor.manufacturer_manage', compact('vendors', 'manufacturers'));
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

        // Save the data to the database using the vendor model (replace 'Buyer' with your actual model)
        $manufacturer = new Manufacturer();
        $manufacturer->name = $data['name'];
        $manufacturer->vendor_id = $data['vendor'];

        // $destinationPath = 'public/logos';

        // $mainName = pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME);

        // // Get the file extension from the uploaded logo
        // $extension = $request->file('logo')->getClientOriginalExtension();

        // // Generate a unique file name with the main name, current timestamp, and extension
        // $newFileName = $mainName . '_' . time() . '.' . $extension;

        // // Move the logo file to the specified destination path
        // $logoPath = $request->file('logo')->storeAs($destinationPath, $newFileName);

        // // Set the logo path to the vendor model attribute
        // $department->logo = 'storage/logos/' . $newFileName;

        $manufacturer->save();

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

        // Save the data to the database using the vendor model (replace 'vendor' with your actual model)
        $manufacturer = Manufacturer::where('id', $id)->first();
        $manufacturer->name = $data['name'];
        $manufacturer->vendor_id = $data['vendor'];

        $manufacturer->save();

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
        $manufacturer = Manufacturer::where('id', $id)->first();

        // if ($manufacturer->logo) {
        //     // Remove the 'storage/' prefix from the file path
        //     $logoPath = str_replace('storage/', '', $manufacturer->logo);
        //     Storage::delete('public/' . $logoPath);
        // }

        $manufacturer->delete();

        return redirect()->back()->with('success', 'Data successfully deleted!');
    }

    // add certificates

    public function add_certificate(){
        if (Auth::user()->hasRole('Super Admin')) {
            $vendors = Vendor::all();
            $manufacturers = Manufacturer::all();

            $certificates = Certificate::all();
        } else {
            $vendors = Vendor::where('id', Auth::User()->vendor_id)->get();
            $manufacturers = Manufacturer::where('vendor_id', Auth::User()->vendor()->first()->id)->get();
        }

        return view('pages.vendor.manufacturer_certificate', compact('vendors', 'manufacturers', 'certificates'));
    }


    public function certicicate_store(Request $request){
        $data = $request->all();
        //dd($data);


        $certificate = new Certificate();
        $certificate->manufacturer_id = $data['maufacturer_id'];
        $certificate->name = $data['certicicate_name'];

        //certificate image process
        $destinationPath = 'public/logos';
        $mainName = pathinfo($request->file('certificate_image')->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $request->file('certificate_image')->getClientOriginalExtension();
        $newFileName = $mainName . '_' . time() . '.' . $extension;
        $logoPath = $request->file('certificate_image')->storeAs($destinationPath, $newFileName);
        //end

        $certificate->logo = 'storage/logos/' . $newFileName;
        $certificate->issue_date = $data['issue_date'];
        $certificate->valid_from = $data['valid_from'];
        $certificate->valid_to = $data['valid_to'];

        //pdf file upload process
        $destinationPath = 'public/logos';
        $mainName = pathinfo($request->file('pdf_file')->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $request->file('pdf_file')->getClientOriginalExtension();
        $newFileName = $mainName . '_' . time() . '.' . $extension;
        $logoPath = $request->file('pdf_file')->storeAs($destinationPath, $newFileName);
        //end

        $certificate->pdf_file = 'storage/logos/' . $newFileName;

        $certificate->save();

        // Redirect back to the previous page or any other page after successful form submission
        return redirect()->back()->with('success', 'Data saved successfully!');
    }

    public function certificate_update(Request $request, $id)
    {
        $data = $request->all();

        //$certificate = new Certificate();
        $certificate = Certificate::where('id', $id)->first();
        $certificate->manufacturer_id = $data['maufacturer_id'];
        $certificate->name = $data['certicicate_name'];

        //certificate image process
        if($request->file('certificate_image')){
            $destinationPath = 'public/logos';
            $mainName = pathinfo($request->file('certificate_image')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('certificate_image')->getClientOriginalExtension();
            $newFileName = $mainName . '_' . time() . '.' . $extension;
            $logoPath = $request->file('certificate_image')->storeAs($destinationPath, $newFileName);
            //end
            $certificate->logo = 'storage/logos/' . $newFileName;
        }


        $certificate->issue_date = $data['issue_date'];
        $certificate->valid_from = $data['valid_from'];
        $certificate->valid_to = $data['valid_to'];

        //pdf file upload process
        if($request->file('pdf_file')){

            $destinationPath = 'public/logos';
            $mainName = pathinfo($request->file('pdf_file')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('pdf_file')->getClientOriginalExtension();
            $newFileName = $mainName . '_' . time() . '.' . $extension;
            $logoPath = $request->file('pdf_file')->storeAs($destinationPath, $newFileName);
            //end
            $certificate->pdf_file = 'storage/logos/' . $newFileName;

        }


        $certificate->save();

        // // Save the data to the database using the vendor model (replace 'vendor' with your actual model)
        // $manufacturer = Manufacturer::where('id', $id)->first();
        // $manufacturer->name = $data['name'];
        // $manufacturer->vendor_id = $data['vendor'];

        // $manufacturer->save();

        // Redirect back to the previous page or any other page after successful form submission
        return redirect()->back()->with('success', 'Data saved successfully!');
    }


    public function certificate_index($id)
    {
        //$contacts = Certificate::where('vendor_manufacturer_id', $id)->get();
        $certificates = Certificate::all();
        return view('pages.vendor.manufacturers_certificate_index', compact('certificates'));
    }

}
