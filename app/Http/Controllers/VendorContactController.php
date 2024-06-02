<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Manufacturer;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $contacts = Contact::where('vendor_manufacturer_id', $id)->get();
        return view('pages.vendor.contect_index', compact('contacts'));
    }

    public function manageIndex()
    {
        if (Auth::User()->hasRole('Super Admin')) {
            $vendors = Vendor::all();
            $contacts = Contact::where('vendor_manufacturer_id', !null)->where('buyer_department_id', null)->get();
        } else {
            $vendors = Vendor::where('id', Auth::User()->vendor_id)->get();
            $contacts = [];
        }

        return view('pages.vendor.contact_manage', compact('vendors', 'contacts'));
    }

    public function getManufacturers($id)
    {
        $manufacturers = Manufacturer::where('vendor_id', $id)->get();
        return response()->json($manufacturers);
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

        $contact = new Contact();

        //image process
        $destinationPath = 'public/logos';
        $mainName = pathinfo($request->file('profile_image')->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $request->file('profile_image')->getClientOriginalExtension();
        $newFileName = $mainName . '_' . time() . '.' . $extension;
        $logoPath = $request->file('profile_image')->storeAs($destinationPath, $newFileName);


        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->phone = $data['phone'];
        $contact->profile_image = 'storage/logos/' . $newFileName;
        $contact->department = $data['department'];
        $contact->designation = $data['designation'];
        $contact->vendor_manufacturer_id = $data['maufacturer'];

        $contact->save();

        return redirect()->back();
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
        $contact = Contact::where('id', $id)->first();

        //image process
        $destinationPath = 'public/logos';
        $mainName = pathinfo($request->file('profile_image')->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $request->file('profile_image')->getClientOriginalExtension();
        $newFileName = $mainName . '_' . time() . '.' . $extension;
        $logoPath = $request->file('profile_image')->storeAs($destinationPath, $newFileName);

        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->phone = $data['phone'];
        $contact->profile_image = 'storage/logos/' . $newFileName;
        $contact->department = $data['department'];
        $contact->designation = $data['designation'];

        $contact->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::where('id', $id)->first();

        $contact->delete();

        return redirect()->back();
    }
}
